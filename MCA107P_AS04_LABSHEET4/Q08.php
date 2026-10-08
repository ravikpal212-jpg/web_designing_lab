<?php
// Q8: Update student email by ID
require "Q04.php";

$id = 1;
$newEmail = "newemail@example.com";

$stmt = $pdo->prepare(
    "UPDATE students SET email = :email WHERE id = :id"
);
$stmt->execute([":email"=>$newEmail, ":id"=>$id]);

echo $stmt->rowCount() . " student record updated.";
?>