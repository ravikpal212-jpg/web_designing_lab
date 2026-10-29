<?php
require_once 'db.php';$q='%'.($_GET['q']??'').'%';$s=$pdo->prepare('SELECT name FROM products WHERE name LIKE ? LIMIT 10');$s->execute([$q]);
foreach($s as $p)echo htmlspecialchars($p['name'])."\n";
?>
