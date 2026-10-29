<?php
require_once 'db.php';$allowed=['name','category','price'];$col=$_GET['sort']??'name';if(!in_array($col,$allowed,true))$col='name';$dir=($_GET['dir']??'ASC')==='DESC'?'DESC':'ASC';
foreach($pdo->query("SELECT name,category,price FROM products ORDER BY $col $dir") as $p)echo htmlspecialchars($p['name']).' - '.htmlspecialchars((string)$p['price']).'<br>';
?>
<a href="?sort=name&dir=ASC">Name ↑</a> <a href="?sort=price&dir=DESC">Price ↓</a>
