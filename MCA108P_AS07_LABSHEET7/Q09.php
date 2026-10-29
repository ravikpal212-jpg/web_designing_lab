<?php
session_start(); require "db.php";
if (!($_SESSION["is_admin"] ?? false)) die("Admin access required.");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $stmt=$pdo->prepare("UPDATE orders SET status=? WHERE id=?");
    $stmt->execute([$_POST["status"],$_POST["id"]]);
}
$orders=$pdo->query("SELECT o.*,u.name FROM orders o JOIN users u ON u.id=o.user_id ORDER BY o.created_at DESC")->fetchAll();
?>
<h2>Customer Orders</h2>
<table border="1" cellpadding="8"><tr><th>ID</th><th>Customer</th><th>Total</th><th>Status</th><th>Update</th></tr>
<?php foreach($orders as $o): ?><tr>
<td><?=$o["id"]?></td><td><?=htmlspecialchars($o["name"])?></td><td>₹<?=$o["total"]?></td><td><?=$o["status"]?></td>
<td><form method="post"><input type="hidden" name="id" value="<?=$o["id"]?>">
<select name="status"><option>Pending</option><option>Shipped</option><option>Delivered</option></select><button>Update</button></form></td>
</tr><?php endforeach; ?></table>