<?php
require_once 'db.php';$page=max(1,(int)($_GET['page']??1));$limit=5;$offset=($page-1)*$limit;
$s=$pdo->prepare('SELECT id,name,price FROM products LIMIT ? OFFSET ?');$s->bindValue(1,$limit,PDO::PARAM_INT);$s->bindValue(2,$offset,PDO::PARAM_INT);$s->execute();
foreach($s as $p)echo htmlspecialchars($p['name']).' - '.htmlspecialchars((string)$p['price']).'<br>';
echo '<a href="?page='.max(1,$page-1).'">Previous</a> | <a href="?page='.($page+1).'">Next</a>';
?>
