# 오뚜기 면, 스프 , 없는 형태 + 대두 글자가 들어갔는데 밀은 없는것 + {} 없앰 + -없앰 + [] 없앰
from urllib.request import urlopen
from bs4 import BeautifulSoup
import pandas as pd
import re

df2 = pd.read_csv('ramyeon.csv', sep='\t', encoding='cp949')    # https://mskim8717.tistory.com/82
print(df2)

url = 'http://www.ottogi.co.kr/product/product_view.asp?page=3&hcode=9&mcode=&stxt=&orderby=BEST&idx=1862'
result = urlopen(url)
html = result.read()
soup = BeautifulSoup(html, 'html.parser')


table = soup.find('table')
# td = table.find_all('td')[2]
# print(table)

td = str(table.find_all('td')[2])    # 문자로 변환시킴
td_tag = re.sub('<.+?>', '', td, 0).strip()   # 태그 제거
td_bracket = re.sub(r'\(.*?\)', '', td_tag, 0).strip()    # 괄호와 괄호안 문자 제거
td_bracket = re.sub(r'\{[^)]*\}', '', td_bracket, 0).strip()    # 중괄호 제거
td_bracket = re.sub(r'\[[^)]*\]', '', td_bracket, 0).strip()    # 대괄호

# print(td_strip2)

td_strip1 = td_bracket.replace("*", "")
td_strip2 = td_strip1.strip('면:')
td_replace = td_strip2.replace("스프류:", "스프류:,")
td_replace = td_replace.replace("스프:", ",")
td_replace = td_replace.replace(" ", "")
td_replace = td_replace.replace("-", "")
td_split = td_replace.split("밀")
print(td_split)
td_split_index = td_split[0]
# myeon = td_split_index.rstrip('밀,')
# # print(myeon)
ramyeon = td_split_index.split(',')
print(ramyeon)
#
data = {'팥칼국수': [i for i in ramyeon]}
df = pd.DataFrame(data)
df_T = df.T
print(df_T)
# df_T.to_csv('ramyeon.csv', mode='a', header=False, index=True, encoding='cp949')    # # https://lovelydiary.tistory.com/23