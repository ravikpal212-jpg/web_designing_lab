import mysql.connector
conn=mysql.connector.connect(host="localhost",user="root",password="")
cur=conn.cursor()
cur.execute("CREATE DATABASE IF NOT EXISTS python_web_db")
cur.execute("USE python_web_db")
cur.execute("CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,email VARCHAR(150) NOT NULL)")
print("Database and users table created successfully.")
cur.close(); conn.close()
