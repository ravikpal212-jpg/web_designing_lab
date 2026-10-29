import mysql.connector
conn=mysql.connector.connect(host="localhost",user="root",password="")
cur=conn.cursor(); cur.execute("SELECT VERSION()")
print("MySQL Server Version:",cur.fetchone()[0])
cur.close(); conn.close()
