from mysql.connector import pooling
pool=pooling.MySQLConnectionPool(pool_name="mypool",pool_size=5,host="localhost",user="root",password="",database="python_web_db")
conn=pool.get_connection(); cur=conn.cursor(); cur.execute("SELECT COUNT(*) FROM users"); print("Total users:",cur.fetchone()[0])
cur.close(); conn.close(); print("Connection returned to pool.")
