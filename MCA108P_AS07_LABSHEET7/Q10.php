<?php
require "db.php";
$q=trim($_GET["q"]??""); $category=trim($_GET["category"]??"");
$sql="SELECT * FROM books WHERE 1"; $params=[];
if($q!==""){ $sql.=" AND (title LIKE ? OR author LIKE ? OR category LIKE ?)"; $like="%$q%"; $params=[$like,$like,$like]; }
if($category!==""){ $sql.=" AND category=?"; $params[]=$category; }
$sql.=" ORDER BY title";
$stmt=$pdo->prepare($sql); $stmt->execute($params); $books=$stmt->fetchAll();
?>
<h2>Search & Filter</h2>
<form><input name="q" value="<?=htmlspecialchars($q)?>" placeholder="Title, author or category">
<input name="category" value="<?=htmlspecialchars($category)?>" placeholder="Category"><button>Search</button></form>
<div class="grid"><?php foreach($books as $b): ?><div class="card"><h3><?=htmlspecialchars($b["title"])?></h3><p><?=htmlspecialchars($b["author"])?></p><p>₹<?=$b["price"]?></p></div><?php endforeach; ?></div>