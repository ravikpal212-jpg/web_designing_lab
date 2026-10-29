try:
    import mysql.connector
    print("mysql-connector-python is installed.")
except ImportError:
    try:
        import pymysql
        print("PyMySQL is installed.")
    except ImportError:
        print("No MySQL Python connector found.")
# Install with: python -m pip install mysql-connector-python
# or: python -m pip install PyMySQL
