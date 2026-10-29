<?php
session_start(); require "db.php";
if (!isset($_SESSION["user_id"])) die("Please login.");
$stmt=$pdo->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY created_at DESC");
$stmt->execute([$_SESSION["user_id"]]); $orders=$stmt->fetchAll();
?>
<h2>My Order History</h2>
<table border="1" cellpadding="8"><tr><th>Order</th><th>Total</th><th>Status</th><th>Date</th></tr>
<?php foreach($orders as $o): ?><tr><td><?=$o["id"]?></td><td>₹<?=$o["total"]?></td><td><?=$o["status"]?></td><td><?=$o["created_at"]?></td></tr><?php endforeach; ?>
</table>