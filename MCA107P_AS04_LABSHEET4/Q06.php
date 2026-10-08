<?php
// Q6: Insert student using prepared statement
require "Q04.php";

$name = "Ravi Kumar";
$email = "ravi@example.com";
$date = date("Y-m-d");

$stmt = $pdo->prepare(
    "INSERT INTO students (name, email, enrollment_date)
     VALUES (:name, :email, :date)"
);
$stmt->execute([
    ":name" => $name,
    ":email" => $email,
    ":date" => $date
]);

echo "Student inserted successfully. ID: ".$pdo->lastInsertId();
?>