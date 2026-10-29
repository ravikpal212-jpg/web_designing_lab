<?php
session_start(); require "db.php";
if(!isset($_SESSION["cart"])) $_SESSION["cart"]=[];
$id=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
$message="";
if($id){
    $stmt=$pdo->prepare("SELECT id,title,stock FROM books WHERE id=?"); $stmt->execute([$id]); $book=$stmt->fetch();
    if(!$book) $message="Book not found.";
    else {
        $current=$_SESSION["cart"][$id]??0;
        if($current < $book["stock"]) { $_SESSION["cart"][$id]=$current+1; $message="Added to cart."; }
        else $message="Cannot add more than available stock.";
    }
}
?>
<h2>Stock Check</h2><p><?=htmlspecialchars($message)?></p><a href="Q06.php">View Cart</a>