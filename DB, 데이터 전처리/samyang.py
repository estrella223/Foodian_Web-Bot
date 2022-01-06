import io
from urllib.request import urlopen
from bs4 import BeautifulSoup
import pandas as pd
import re
import sys
import os

# sys.stdout = io.TextIOWrapper(sys.stdout.detach(), encoding='utf-8')
# sys.stdout = io.TextIOWrapper(sys.stderr.detach(), encoding='utf-8')

url = 'https://www.samyangfoods.com/kor/brand/view.do?pageIndex=6&pageUnit=10&searchCateCd1=45&searchCateCd2=&searchNewUseYn=&seq=73'
result = urlopen(url)
html = result.read()
soup = BeautifulSoup(html, 'html.parser')


# 태그 찾기
wrap = soup.find('div', {'class': "product-view-wrap"})
samyang = str(wrap.find_all('p')[5])    # 문자로 변환시킴
samyang_tag = re.sub('<.+?>', '', samyang, 0).strip()   # 태그 제거
samyang_bracket = re.sub(r'\(.*?\)', '', samyang_tag, 0).strip()    # 괄호와 괄호안 문자 제거
# print(samyang_bracket)


# 불용어 제거
samyang_replace = samyang_bracket.replace(" ", "")
samyang_replace = samyang_replace.replace("\xa0", "")
samyang_replace = samyang_replace.replace("\u200b", "")
samyang_strip1 = samyang_replace.strip('면:')
samyang_strip2 = samyang_strip1.replace("스프:", "")


# 면, 스프
samyang_final = samyang_strip2.split('.')
samyang_myeon = samyang_final[0]
samyang_soup = samyang_final[1]
# print(samyang_myeon)
# print(samyang_soup)


# 타이틀
title = soup.find("div", {'class': "sub-title01"})
title = str(title.find_all('h3'))
title_tag = re.sub('<.+?>', '', title, 0).strip()   # 태그 제거
title_tag = title_tag.strip("[")
title_tag = title_tag.strip("]")
print(title_tag)

# 면, 스프 분리
# ramyeon = samyang_myeon.split(',')
# print(ramyeon)

ramyeon = samyang_soup.split(',')
print(ramyeon)


# 데이터 프레임
data = {title_tag: [i for i in ramyeon]}
df = pd.DataFrame(data)

df_T = df.T
# print(df_T)

df_T.insert(0, "제품명", title_tag)
df_T.insert(1, "브랜드", "삼양식품(주)")
# df_T.insert(2, "분류", "면")
df_T.insert(2, "분류", "스프류")

print(df_T)
df_T.to_csv('라면_원재료명_삼양식품.csv', mode='a', header=False, index=True, encoding='cp949')