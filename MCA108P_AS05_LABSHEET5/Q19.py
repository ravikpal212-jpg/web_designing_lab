import re,mysql.connector
name=input("Name: ").strip(); email=input("Email: ").strip()
if not re.fullmatch(r"[A-Za-z ]{2,100}",name): raise ValueError("Invalid name")
if not re.fullmatch(r"[^@\s]+@[^@\s]+\.[^@\s]+",email): raise ValueError("Invalid email")
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
cur.execute("INSERT INTO users (name,email) VALUES (%s,%s)",(name,email)); conn.commit(); print("Validated data inserted successfully.")
cur.close(); conn.close()
