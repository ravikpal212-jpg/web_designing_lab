<?php
require_once 'db.php';
$s=$pdo->prepare('INSERT INTO products(name,category,price) VALUES(?,?,?)');
$s->execute([$_POST['name']??'Sample Product',$_POST['category']??'General',(float)($_POST['price']??99)]);
echo 'Product added';
?>
<form method="post"><input name="name" placeholder="Product" required><input name="category" placeholder="Category"><input name="price" type="number" step=".01" required><button>Add</button></form>
