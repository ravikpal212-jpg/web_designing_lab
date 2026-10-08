<?php
// Q7: Display all students
require "Q04.php";

$stmt = $pdo->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
<style>
table{border-collapse:collapse;width:70%;margin:30px auto}
th,td{border:1px solid #333;padding:10px}
th{background:#ddd}
</style>
</head>
<body>
<h2 style="text-align:center">Students</h2>
<table>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Enrollment Date</th></tr>
<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
<td><?=htmlspecialchars($row['id'])?></td>
<td><?=htmlspecialchars($row['name'])?></td>
<td><?=htmlspecialchars($row['email'])?></td>
<td><?=htmlspecialchars($row['enrollment_date'])?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>