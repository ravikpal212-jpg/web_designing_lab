<?php
session_start();
require "db.php";
if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];

if (isset($_GET["add"])) {
    $id = filter_var($_GET["add"], FILTER_VALIDATE_INT);
    $stmt = $pdo->prepare("SELECT id,stock FROM books WHERE id=?");
    $stmt->execute([$id]);
    $book = $stmt->fetch();

    if ($book && $book["stock"] > ($_SESSION["cart"][$id] ?? 0))
        $_SESSION["cart"][$id] = ($_SESSION["cart"][$id] ?? 0) + 1;
}
if (isset($_GET["remove"])) unset($_SESSION["cart"][(int)$_GET["remove"]]);
if (isset($_POST["update"])) {
    foreach ($_POST["qty"] as $id=>$qty) {
        $qty = max(0,(int)$qty);
        if ($qty === 0) unset($_SESSION["cart"][$id]);
        else $_SESSION["cart"][(int)$id] = $qty;
    }
}

$items=[]; $total=0;
foreach ($_SESSION["cart"] as $id=>$qty) {
    $stmt=$pdo->prepare("SELECT * FROM books WHERE id=?");
    $stmt->execute([$id]); $book=$stmt->fetch();
    if ($book) {$book["qty"]=$qty; $book["subtotal"]=$qty*$book["price"]; $total+=$book["subtotal"]; $items[]=$book;}
}
?>
<!DOCTYPE html><html><head><title>Cart</title><link rel="stylesheet" href="style.css"></head><body>
<h2>Shopping Cart</h2>
<form method="post"><table border="1" cellpadding="8">
<tr><th>Book</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Action</th></tr>
<?php foreach($items as $item): ?><tr>
<td><?=htmlspecialchars($item["title"])?></td><td>₹<?=$item["price"]?></td>
<td><input type="number" name="qty[<?=$item["id"]?>]" value="<?=$item["qty"]?>" min="0" max="<?=$item["stock"]?>"></td>
<td>₹<?=number_format($item["subtotal"],2)?></td>
<td><a href="Q06.php?remove=<?=$item["id"]?>">Remove</a></td>
</tr><?php endforeach; ?>
</table><p>Total: ₹<?=number_format($total,2)?></p><button name="update">Update Cart</button></form>
<a href="Q07.php">Checkout</a>
</body></html>