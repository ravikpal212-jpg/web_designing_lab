<?php
// Q14: Secure database access pattern
require "db.php";

$id=filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
if(!$id) die("Invalid ID.");

$stmt=$pdo->prepare("SELECT id,title,author,price,stock FROM books WHERE id=?");
$stmt->execute([$id]);
$book=$stmt->fetch();

if(!$book) die("Book not found.");

foreach($book as $key=>$value)
    $book[$key]=is_string($value)?htmlspecialchars($value):$value;

echo "<h2>{$book['title']}</h2>";
echo "<p>Author: {$book['author']}</p>";
echo "<p>Price: ₹{$book['price']}</p>";
echo "<p>Stock: {$book['stock']}</p>";
?>