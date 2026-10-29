<?php
require_once 'db.php';
$id=(int)($_GET['id']??0);
if($_SERVER['REQUEST_METHOD']==='POST'){$s=$pdo->prepare('UPDATE products SET name=?,category=?,price=? WHERE id=?');$s->execute([$_POST['name'],$_POST['category'],(float)$_POST['price'],(int)$_POST['id']]);echo 'Updated';exit;}
$s=$pdo->prepare('SELECT * FROM products WHERE id=?');$s->execute([$id]);$p=$s->fetch(PDO::FETCH_ASSOC);if(!$p)exit('Product not found');
?>
<form method="post"><input type="hidden" name="id" value="<?=$p['id']?>"><input name="name" value="<?=htmlspecialchars($p['name'])?>"><input name="category" value="<?=htmlspecialchars($p['category']??'')?>"><input name="price" value="<?=htmlspecialchars((string)$p['price'])?>"><button>Save</button></form>
