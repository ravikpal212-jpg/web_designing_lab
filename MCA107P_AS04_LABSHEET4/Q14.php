<?php
// Q14: Restricted MySQL user
// Run these SQL commands in MySQL/phpMyAdmin as an administrator:
//
// CREATE USER 'college_app'@'localhost' IDENTIFIED BY 'StrongPassword123!';
// GRANT SELECT, INSERT, UPDATE ON college_db.* TO 'college_app'@'localhost';
// FLUSH PRIVILEGES;

echo "<h2>MySQL User Privileges</h2>";
echo "Dedicated user: college_app<br>";
echo "Privileges: SELECT, INSERT, UPDATE";
?>