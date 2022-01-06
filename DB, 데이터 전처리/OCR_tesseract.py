from PIL import Image
from pytesseract import *
import configparser
import os
import cv2
import numpy as np
from matplotlib import pyplot as plt


pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

#Config Parser 초기화
config = configparser.ConfigParser()
#Config File 읽기
config.read(os.path.dirname(os.path.realpath(__file__)) + os.sep + 'envs' + os.sep + 'property.ini')


#이미지 -> 문자열 추출
def ocrToStr(fullPath, outTxtPath, fileName, lang='kor+eng'): #디폴트는 영어로 추출
    #이미지 경로

    img = Image.open(fullPath)
    # img_gray = cv2.imread(fullPath, cv2.COLOR_BGR2GRAY)
    # img_gray = cv2.imread(fullPath, cv2.IMREAD_GRAYSCALE)
    # cv2.imshow("grayscale", img_gray)


    # img = cv2.imread('KakaoTalk_20210827_215418728.jpg', 0)
    # img = cv2.medianBlur(img, 5)
    img_gray = cv2.imread(fullPath, cv2.COLOR_BGR2GRAY)
    img_gray = cv2.imread(fullPath, cv2.IMREAD_GRAYSCALE)
    ret, th1 = cv2.threshold(img_gray, 127, 255, cv2.THRESH_BINARY)
    th2 = cv2.adaptiveThreshold(img_gray, 255, cv2.ADAPTIVE_THRESH_MEAN_C, \
                               cv2.THRESH_BINARY, 11, 2)
    th3 = cv2.adaptiveThreshold(img_gray, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C, \
                               cv2.THRESH_BINARY, 11, 2)
    titles = ['Original Image', 'Global Thresholding (v = 127)',
              'Adaptive Mean Thresholding', 'Adaptive Gaussian Thresholding']
    images = [img, th1, th2, th3]
    for i in range(4):
        plt.subplot(2, 2, i + 1), plt.imshow(images[i], 'gray')
        plt.title(titles[i])
        plt.xticks([]), plt.yticks([])
    plt.show()



    txtName = os.path.join(outTxtPath, fileName.split('.')[0])

    #추출(이미지파일, 추출언어, 옵션)
    #preserve_interword_spaces : 단어 간격 옵션을 조절하면서 추출 정확도를 확인한다.
    #psm(페이지 세그먼트 모드 : 이미지 영역안에서 텍스트 추출 범위 모드)
    #psm 모드 : https://github.com/tesseract-ocr/tesseract/wiki/Command-Line-Usage
    outText = image_to_string(img, lang=lang, config='--psm 1 -c preserve_interword_spaces=1')

    print('+++ OCT Extract Result +++')
    print('Extract FileName ->>> : ', fileName, ' : <<<-')
    print('\n\n')
    #출력
    print(outText)
    #추출 문자 텍스트 파일 쓰기
    strToTxt(txtName, outText)

    cv2.waitKey(0)
    cv2.destroyAllWindows()

#문자열 -> 텍스트파일 개별 저장
def strToTxt(txtName, outText):
    with open(txtName + '.txt', 'w', encoding='utf-8') as f:
        f.write(outText)

#메인 시작
if __name__ == "__main__":

    #텍스트 파일 저장 경로
    outTxtPath = os.path.dirname(os.path.realpath(__file__)) + config['Path']['OcrTxtPath']

    #OCR 추출 작업 메인
    for root, dirs, files in os.walk(os.path.dirname(os.path.realpath(__file__)) + config['Path']['OriImgPath']):
        for fname in files:
            fullName = os.path.join(root, fname)
            #한글+영어 추출(kor, eng , kor+eng)
            ocrToStr(fullName, outTxtPath, fname,'kor+eng')