import requests
from bs4 import BeautifulSoup
import re
import pandas as pd

id = 1
result_df = pd.DataFrame()

while id <= 10:
    url = 'http://vitamin.or.kr/bbs/board.php?bo_table=add_etc&wr_id={}&page=2'.format(id)
    r = requests.get(url)
    html = r.text
    soup = BeautifulSoup(html, 'html.parser')

    td = soup.find_all('td')
    td2 = td[19]
    td5 = str(td2)
    td6 = re.sub('<.+?>', '', td5, 0).strip()
    td6 = td6.replace('\xa0', "")

    use = soup.find_all('td')
    use2 = use[15]
    use5 = str(use2)
    use6 = re.sub('<.+?>', '', use5, 0).strip()
    use6 = use6.replace('\xa0', "")

    title = soup.find_all('td')
    title2 = title[1]
    title5 = str(title2)
    title6 = re.sub('<.+?>', '', title5, 0).strip()
    title7 = re.sub(r'\(.*?\)', '', title6, 0).strip()

    title7 = title7.replace('\xa0', "")
    title7 = title7.replace('\u200b', "")

    aaa = title7 + " : " + use6 + " : " + td6
    aaaa = aaa.split(':')

    df = pd.DataFrame(aaaa)
    df2 = df.T

    result_df = pd.concat([result_df, df2], ignore_index=True)
    id += 1

df2 = pd.read_csv('비타민연구소 식품첨가물 부작용 최종.csv', sep='\t', encoding='cp949')
print(df2.iloc[0])





