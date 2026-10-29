CREATE USER 'appuser'@'localhost' IDENTIFIED BY 'Use-A-Strong-Password';
GRANT SELECT, INSERT, UPDATE, DELETE ON webapp_db.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;
-- Replace the example password. Use this account in the app instead of root.
