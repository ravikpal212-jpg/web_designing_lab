<?php
session_start();
require "db.php";
if (!isset($_SESSION["user_id"])) die("Please login first.");
$cart = $_SESSION["cart"] ?? [];
if (!$cart) die("Cart is empty.");

$message="";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $pdo->beginTransaction();
    try {
        $total=0; $items=[];
        foreach($cart as $id=>$qty) {
            $stmt=$pdo->prepare("SELECT * FROM books WHERE id=? FOR UPDATE");
            $stmt->execute([$id]); $book=$stmt->fetch();
            if (!$book || $qty > $book["stock"]) throw new Exception("Insufficient stock.");
            $total += $book["price"]*$qty;
            $items[] = [$book,$qty];
        }

        $stmt=$pdo->prepare("INSERT INTO orders(user_id,total,shipping_name,shipping_address,shipping_city,shipping_pin) VALUES(?,?,?,?,?,?)");
        $stmt->execute([$_SESSION["user_id"],$total,$_POST["name"],$_POST["address"],$_POST["city"],$_POST["pin"]]);
        $orderId=$pdo->lastInsertId();

        foreach($items as [$book,$qty]) {
            $pdo->prepare("INSERT INTO order_items(order_id,book_id,quantity,price) VALUES(?,?,?,?)")
                ->execute([$orderId,$book["id"],$qty,$book["price"]]);
            $pdo->prepare("UPDATE books SET stock=stock-? WHERE id=?")->execute([$qty,$book["id"]]);
        }
        $pdo->commit();
        $_SESSION["cart"]=[];
        header("Location: Q16.php?id=".$orderId); exit;
    } catch(Exception $e) {
        $pdo->rollBack(); $message=$e->getMessage();
    }
}
?>
<h2>Checkout</h2><p><?=htmlspecialchars($message)?></p>
<form method="post">
<input name="name" placeholder="Shipping Name" required><br>
<textarea name="address" placeholder="Address" required></textarea><br>
<input name="city" placeholder="City" required><br>
<input name="pin" placeholder="PIN" required><br>
<button>Place Order</button>
</form>