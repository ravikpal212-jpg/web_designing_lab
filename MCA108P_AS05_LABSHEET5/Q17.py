import subprocess
from datetime import datetime
db="python_web_db"; out=f"{db}_backup_{datetime.now():%Y%m%d_%H%M%S}.sql"
try:
 with open(out,"w",encoding="utf-8") as f: subprocess.run(["mysqldump","-u","root",db],stdout=f,check=True)
 print("Backup created:",out)
except FileNotFoundError: print("mysqldump not found. Add MySQL bin directory to PATH.")
except subprocess.CalledProcessError as e: print("Backup failed:",e)
