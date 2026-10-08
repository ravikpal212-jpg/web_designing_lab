<?php
// Q9: Delete student using GET parameter
require "Q04.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    die("Please provide a valid ID, e.g. Q09.php?id=1");
}

$stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
$stmt->execute([":id"=>$id]);

echo $stmt->rowCount() . " student record deleted.";
?>