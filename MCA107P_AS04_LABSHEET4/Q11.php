<?php
// Q11: Apache/PHP server environment using $_SERVER
echo "<h2>Server Information</h2>";
echo "Server Software: ".htmlspecialchars($_SERVER['SERVER_SOFTWARE'])."<br>";
echo "Server Name: ".htmlspecialchars($_SERVER['SERVER_NAME'])."<br>";
echo "Server Port: ".htmlspecialchars($_SERVER['SERVER_PORT'])."<br>";
echo "Request Method: ".htmlspecialchars($_SERVER['REQUEST_METHOD'])."<br>";
echo "Document Root: ".htmlspecialchars($_SERVER['DOCUMENT_ROOT'])."<br>";
echo "PHP Version: ".PHP_VERSION;
?>