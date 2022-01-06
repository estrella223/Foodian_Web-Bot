import requests
from bs4 import BeautifulSoup
import re
import pandas as pd

url = 'https://mall.lottechilsung.co.kr/display/showDisplay.lecs?goodsNo=CF31132808&displayNo=CF1A01A02'
r = requests.get(url)
html = r.text
soup = BeautifulSoup(html, 'html.parser')

table1 = soup.find_all('table', {'class': 'lc_list_tbl basic'})
table2 = table1[0]

td = table2.find_all('td')
td2 = td[9]
td3 = str(td2)

td4 = re.sub('<.+?>', '', td3, 0).strip()
td5 = re.sub(r'\(.*?\)', '', td4, 0).strip()
td6 = td5.split(',')

data = {'비타파워': [i for i in td6]}
df = pd.DataFrame(data)
df2 = df.T
print(df2)

df2.to_csv('롯데칠성음료 홈페이지 크롤링.csv', header=False, mode="a", index=True, encoding='cp949')
# 처음 할때만 header=True 라고 하고 그 다음엔 다 False라고 하면 됨.mode="a"