import requests
from bs4 import BeautifulSoup
import pandas as pd

# html 주소 찾아가기
url = 'https://www.foodsafetykorea.go.kr/iframe/specialinfo/prdInfoDetail.do?prdlstReportLedgNo=2005021003789185&from=searchCompany'
r = requests.get(url)
html = r.text
soup = BeautifulSoup(html,'html.parser')

table1 = soup.find_all('table', {'class': 'col table-sm'})
table2 = table1[4]
td = table2.find_all('td')
# print(td)


# 3개씩 리스트화 시키기
b = 0
data = []
for i in range(int(len(td)/3)):
    # for aa in table2:
    if table2.find_all('td'):
        point = td[b].text
        sungbun = td[b+1].text
        bigo = td[b+2].text
        data.append([point, sungbun, bigo])
        b += 3
# print(data)


# 2열에 value가 있다면 () 씌워주기
for a in range(len(data)):
    if not data[a][2] == '':
        bb = "(" + data[a][2] + ")"
        # print(bb)
        data[a][2] = bb
        a += 1
        # print(p2)
# print(data)


# 제품명
title_class = soup.find('div', {"class": "inqq-info"})
title = title_class.find('span').text
# title = title.split('분말')    # 스프때문에
# title = title[0]    # 스프때문에
print(title)


# 데이터프레임화 시키기
df = pd.DataFrame(data, columns=["index", "성분 및 원료", "비고"])
df[title] = df["성분 및 원료"] + df["비고"]    # 새로운 열 생성
df2 = pd.DataFrame(df[title])    # "성분"열만 추출해서 새로운 데이터프레임 만들기
print(df2)


# 분말스프, 후레이크 열 제거/ 라면일때만
# df2 = df2[~df2[title].str.contains('분말스프')]
# df2 = df2[~df2[title].str.contains('후레이크')]
# print(df2)

df3 = df2.T
# print(df3)


# 브랜드 자동 크롤링
brand_class = soup.find_all('table', {"class": "col table-sm"})
brand_class = brand_class[0]
# print(brand_class)
brand = brand_class.find('a').text
# print(brand)


# 데이터 프레임에 columns 추가
df3.insert(0, "제품명", title)
df3.insert(1, "브랜드", brand)
# df3.insert(2, "분류", "면")
# df3.insert(2, "분류", "스프류")
print(df3)


# csv 생성
df3.to_csv('음료_원재료명_동원.csv', mode='a', header=False, index=False, encoding='cp949')    # # https://lovelydiary.tistory.com/23

# df4 = pd.read_csv('원재료_농심.csv', sep='\t', encoding='cp949')    # https://mskim8717.tistory.com/82
# # df5 = df4.sort_values(by=['제품명'], axis = 0)
# print(df4)