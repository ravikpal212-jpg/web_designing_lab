<?php
// Q2: php.ini display_errors verification
// In php.ini set: display_errors = On
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h2>PHP Configuration</h2>";
echo "<p>display_errors: " . ini_get('display_errors') . "</p>";
phpinfo();
?>