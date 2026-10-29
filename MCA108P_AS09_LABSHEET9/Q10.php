<?php
require_once 'db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){$s=$pdo->prepare('DELETE FROM products WHERE id=?');$s->execute([(int)$_POST['id']]);echo 'Deleted';}
?>
<form method="post" onsubmit="return confirm('Delete this product?')"><input type="number" name="id" required><button>Delete</button></form>
