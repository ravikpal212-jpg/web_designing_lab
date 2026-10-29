<?php
session_start(); require "db.php";
if (!($_SESSION["is_admin"] ?? false)) die("Admin access required.");
$message="";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    if ($_POST["action"]==="add") {
        $stmt=$pdo->prepare("INSERT INTO books(title,author,category,price,stock,image) VALUES(?,?,?,?,?,?)");
        $stmt->execute([$_POST["title"],$_POST["author"],$_POST["category"],$_POST["price"],$_POST["stock"],$_POST["image"]]);
        $message="Book added.";
    } else {
        $stmt=$pdo->prepare("UPDATE books SET price=?,stock=? WHERE id=?");
        $stmt->execute([$_POST["price"],$_POST["stock"],$_POST["id"]]);
        $message="Book updated.";
    }
}
?>
<h2>Admin Dashboard</h2><p><?=$message?></p>
<h3>Add Book</h3>
<form method="post"><input type="hidden" name="action" value="add">
<input name="title" placeholder="Title" required><input name="author" placeholder="Author" required>
<input name="category" placeholder="Category" required><input name="price" type="number" step=".01" placeholder="Price" required>
<input name="stock" type="number" placeholder="Stock" required><input name="image" placeholder="Image">
<button>Add Book</button></form>
<h3>Update Price/Stock</h3>
<form method="post"><input type="hidden" name="action" value="update">
<input name="id" type="number" placeholder="Book ID" required><input name="price" type="number" step=".01" placeholder="Price" required>
<input name="stock" type="number" placeholder="Stock" required><button>Update</button></form>