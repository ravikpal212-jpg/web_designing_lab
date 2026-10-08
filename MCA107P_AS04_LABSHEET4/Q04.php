<?php
// Q4: Secure MySQL PDO connection
$host = "localhost";
$db   = "college_db";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "PDO connection successful.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>