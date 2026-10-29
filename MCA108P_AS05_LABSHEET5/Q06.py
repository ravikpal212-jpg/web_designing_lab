import mysql.connector, html
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db")
cur=conn.cursor(); cur.execute("SELECT id,name,email FROM users")
out='<html><body><h2>User Records</h2><table border="1"><tr><th>ID</th><th>Name</th><th>Email</th></tr>'
for r in cur.fetchall(): out+=f'<tr><td>{r[0]}</td><td>{html.escape(r[1])}</td><td>{html.escape(r[2])}</td></tr>'
out+='</table></body></html>'; print(out)
cur.close(); conn.close()
