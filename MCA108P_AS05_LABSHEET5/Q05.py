import mysql.connector
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db")
cur=conn.cursor()
users=[("Ravi","ravi@example.com"),("Aman","aman@example.com"),("Priya","priya@example.com")]
cur.executemany("INSERT INTO users (name,email) VALUES (%s,%s)",users)
conn.commit(); print(cur.rowcount,"records inserted.")
cur.close(); conn.close()
