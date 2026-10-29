<?php
require "db.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) die("Invalid book ID.");

$stmt = $pdo->prepare("SELECT * FROM books WHERE id=?");
$stmt->execute([$id]);
$book = $stmt->fetch();
if (!$book) die("Book not found.");
?>
<!DOCTYPE html>
<html><head><title>Book Details</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="card">
<h2><?=htmlspecialchars($book['title'])?></h2>
<p><b>Author:</b> <?=htmlspecialchars($book['author'])?></p>
<p><b>Category:</b> <?=htmlspecialchars($book['category'])?></p>
<p><b>Price:</b> ₹<?=number_format($book['price'],2)?></p>
<p><b>Stock:</b> <?=$book['stock']?></p>
<a href="Q06.php?add=<?=$book['id']?>">Add to Cart</a>
</div>
</body></html>