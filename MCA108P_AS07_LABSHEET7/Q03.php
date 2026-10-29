<?php
require "db.php";
$stmt = $pdo->query("SELECT * FROM books WHERE stock > 0 ORDER BY id DESC");
$books = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Books</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Available Books</h2>
<div class="grid">
<?php foreach ($books as $book): ?>
<div class="card">
<?php if ($book['image']): ?><img src="<?=htmlspecialchars($book['image'])?>" alt="Book"><?php endif; ?>
<h3><?=htmlspecialchars($book['title'])?></h3>
<p>Author: <?=htmlspecialchars($book['author'])?></p>
<p>₹<?=number_format($book['price'],2)?></p>
<p>Stock: <?=$book['stock']?></p>
<a href="Q04.php?id=<?=$book['id']?>">View Details</a>
</div>
<?php endforeach; ?>
</div>
</body></html>