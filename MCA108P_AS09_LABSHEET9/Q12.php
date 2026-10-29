<?php
require_once 'db.php';$term='%'.($_GET['q']??'').'%';$min=(float)($_GET['min']??0);$max=(float)($_GET['max']??999999);
$s=$pdo->prepare('SELECT name,category,price FROM products WHERE (name LIKE ? OR category LIKE ?) AND price BETWEEN ? AND ?');$s->execute([$term,$term,$min,$max]);
foreach($s as $p)echo htmlspecialchars($p['name']).' - '.htmlspecialchars($p['category']??'').' - '.htmlspecialchars((string)$p['price']).'<br>';
?>
<form><input name="q" placeholder="Name/category"><input name="min" type="number" placeholder="Min price"><input name="max" type="number" placeholder="Max price"><button>Search</button></form>
