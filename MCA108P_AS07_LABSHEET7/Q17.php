<?php
session_start(); require "db.php";
if(!isset($_SESSION["user_id"])) die("Please login.");
if(isset($_GET["add"])){
    $id=(int)$_GET["add"];
    $stmt=$pdo->prepare("INSERT IGNORE INTO wishlist(user_id,book_id) VALUES(?,?)");
    $stmt->execute([$_SESSION["user_id"],$id]);
}
$stmt=$pdo->prepare("SELECT b.* FROM wishlist w JOIN books b ON b.id=w.book_id WHERE w.user_id=?");
$stmt->execute([$_SESSION["user_id"]]); $books=$stmt->fetchAll();
?>
<h2>My Wishlist</h2>
<div class="grid"><?php foreach($books as $b): ?><div class="card"><h3><?=htmlspecialchars($b["title"])?></h3><p>₹<?=$b["price"]?></p><a href="Q06.php?add=<?=$b["id"]?>">Add to Cart</a></div><?php endforeach; ?></div>