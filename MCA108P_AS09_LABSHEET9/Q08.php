<?php
require_once 'db.php';
echo '<table border="1"><tr><th>Name</th><th>Category</th><th>Price</th></tr>';
foreach($pdo->query('SELECT * FROM products') as $p) echo '<tr><td>'.htmlspecialchars($p['name']).'</td><td>'.htmlspecialchars($p['category']??'').'</td><td>'.htmlspecialchars((string)$p['price']).'</td></tr>';
echo '</table>';
?>
