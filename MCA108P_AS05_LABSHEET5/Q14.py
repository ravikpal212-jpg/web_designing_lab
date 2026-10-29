import csv,mysql.connector
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
with open("users.csv",newline="",encoding="utf-8") as f:
 reader=csv.reader(f); next(reader,None); rows=[(r[0],r[1]) for r in reader if len(r)>=2]
cur.executemany("INSERT INTO users (name,email) VALUES (%s,%s)",rows); conn.commit(); print(len(rows),"CSV records inserted.")
cur.close(); conn.close()
