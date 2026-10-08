CREATE USER 'college_app'@'localhost'
IDENTIFIED BY 'StrongPassword123!';

GRANT SELECT, INSERT, UPDATE
ON college_db.* TO 'college_app'@'localhost';

FLUSH PRIVILEGES;