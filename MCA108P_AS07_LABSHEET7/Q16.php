<?php
session_start(); require "db.php";
$id=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
if(!$id) die("Invalid order.");
$stmt=$pdo->prepare("SELECT o.*,u.name FROM orders o JOIN users u ON u.id=o.user_id WHERE o.id=?");
$stmt->execute([$id]); $order=$stmt->fetch();
if(!$order) die("Order not found.");
$stmt=$pdo->prepare("SELECT oi.*,b.title FROM order_items oi JOIN books b ON b.id=oi.book_id WHERE oi.order_id=?");
$stmt->execute([$id]); $items=$stmt->fetchAll();
?>
<h2>Invoice #<?=$order["id"]?></h2>
<p>Customer: <?=htmlspecialchars($order["name"])?></p>
<p>Address: <?=htmlspecialchars($order["shipping_address"])?>, <?=htmlspecialchars($order["shipping_city"])?></p>
<table border="1" cellpadding="8"><tr><th>Book</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>
<?php foreach($items as $i): ?><tr><td><?=htmlspecialchars($i["title"])?></td><td><?=$i["quantity"]?></td><td>₹<?=$i["price"]?></td><td>₹<?=number_format($i["price"]*$i["quantity"],2)?></td></tr><?php endforeach; ?>
</table><h3>Total: ₹<?=$order["total"]?></h3>