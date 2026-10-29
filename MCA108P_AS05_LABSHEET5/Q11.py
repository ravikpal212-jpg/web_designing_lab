import mysql.connector
keyword=input("Enter name to search: ")
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
cur.execute("SELECT id,name,email FROM users WHERE name LIKE %s",("%"+keyword+"%",))
for row in cur.fetchall(): print(row)
cur.close(); conn.close()
