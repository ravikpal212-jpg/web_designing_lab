<?php
// Q17: Export students table to CSV
require "Q04.php";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=students.csv");

$out = fopen("php://output", "w");
fputcsv($out, ["ID","Name","Email","Enrollment Date"]);

$stmt = $pdo->query("SELECT id,name,email,enrollment_date FROM students");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    fputcsv($out, $row);

fclose($out);
exit;
?>