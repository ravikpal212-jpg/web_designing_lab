import mysql.connector
try:
 uid=int(input("Enter user ID to delete: "))
 conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor()
 cur.execute("DELETE FROM users WHERE id=%s",(uid,)); conn.commit(); print(cur.rowcount,"record deleted.")
except mysql.connector.Error as e: print("Database error:",e)
except ValueError: print("Please enter a valid numeric ID.")
finally:
 try: cur.close(); conn.close()
 except: pass
