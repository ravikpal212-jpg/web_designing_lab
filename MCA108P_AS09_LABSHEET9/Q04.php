<?php
session_start(); require_once 'db.php';
$s=$pdo->prepare('SELECT id,password FROM users WHERE email=?');$s->execute([$_POST['email']??'']);$u=$s->fetch(PDO::FETCH_ASSOC);
if($u&&password_verify($_POST['password']??'',$u['password'])){session_regenerate_id(true);$_SESSION['uid']=$u['id'];echo 'Login successful';}else echo 'Invalid credentials';
?>
<form method="post"><input name="email" type="email" required><input name="password" type="password" required><button>Login</button></form>
