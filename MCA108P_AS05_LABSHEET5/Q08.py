import mysql.connector
uid=int(input("Enter user ID: ")); name=input("Enter new name: "); email=input("Enter new email: ")
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
cur.execute("UPDATE users SET name=%s,email=%s WHERE id=%s",(name,email,uid)); conn.commit(); print(cur.rowcount,"record updated.")
cur.close(); conn.close()
