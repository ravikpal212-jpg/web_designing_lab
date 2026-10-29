import mysql.connector
conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
cur.execute("SELECT COUNT(*) FROM users"); total=cur.fetchone()[0]
cur.execute("SELECT AVG(id) FROM users"); avg_id=cur.fetchone()[0]
cur.execute("SELECT MIN(id),MAX(id) FROM users"); first_id,last_id=cur.fetchone()
print("=== ADMIN DASHBOARD REPORT ==="); print("Total users:",total); print("Average ID:",avg_id); print("First ID:",first_id); print("Last ID:",last_id)
cur.close(); conn.close()
