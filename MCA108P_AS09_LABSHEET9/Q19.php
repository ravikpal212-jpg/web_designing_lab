<?php
session_start();require_once 'db.php';
if(!isset($_SESSION['uid']))exit('Please log in first.');
$cart=$_SESSION['cart']??[];if(!$cart)exit('Cart is empty.');
try{$pdo->beginTransaction();$s=$pdo->prepare('INSERT INTO orders(user_id,product_id,qty) VALUES(?,?,?)');foreach($cart as $pid=>$qty)$s->execute([$_SESSION['uid'],(int)$pid,(int)$qty]);$pdo->commit();unset($_SESSION['cart']);echo 'Order placed';}catch(Throwable $e){if($pdo->inTransaction())$pdo->rollBack();echo 'Checkout failed';}
?>
