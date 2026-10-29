#!/usr/bin/env python3
import cgi, html, mysql.connector
print("Content-Type: text/html\n")
form=cgi.FieldStorage(); name=form.getfirst("name","").strip(); email=form.getfirst("email","").strip()
if not name or not email: print("<h3>Name and email are required.</h3>")
else:
 conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
 cur.execute("INSERT INTO users (name,email) VALUES (%s,%s)",(name,email)); conn.commit()
 print(f"<h3>User inserted successfully.</h3><p>Name: {html.escape(name)}</p><p>Email: {html.escape(email)}</p>")
 cur.close(); conn.close()
