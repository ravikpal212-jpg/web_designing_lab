import logging, mysql.connector
logging.basicConfig(filename="server_db.log",level=logging.INFO,format="%(asctime)s - %(levelname)s - %(message)s")
logging.info("Database access started.")
try:
 conn=mysql.connector.connect(host="localhost",user="root",password="",database="python_web_db"); cur=conn.cursor(); cur.execute("SELECT COUNT(*) FROM users"); print("User count:",cur.fetchone()[0]); logging.info("Query completed successfully."); cur.close(); conn.close()
except mysql.connector.Error as e: logging.error("Database error: %s",e); print("Database error:",e)
