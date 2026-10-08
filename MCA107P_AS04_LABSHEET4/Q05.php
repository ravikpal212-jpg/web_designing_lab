<?php
// Q5: Create students table
require "Q04.php"; // Uses the PDO connection

$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    enrollment_date DATE NOT NULL
)";

try {
    $pdo->exec($sql);
    echo "students table created successfully.";
} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
}
?>