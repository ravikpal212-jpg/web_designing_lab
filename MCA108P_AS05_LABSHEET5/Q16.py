#!/usr/bin/env python3
import json,mysql.connector
print("Content-Type: application/json\n")
try:
 conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor(dictionary=True); cur.execute("SELECT id,name,email FROM users"); print(json.dumps(cur.fetchall())); cur.close(); conn.close()
except mysql.connector.Error as e: print(json.dumps({"error":str(e)}))
