<?php
require_once 'db.php';
$name=trim($_POST['name']??''); $email=filter_var($_POST['email']??'',FILTER_VALIDATE_EMAIL); $pw=$_POST['password']??'';
if(!$name||!$email||strlen($pw)<8) exit('Enter valid details; password must be 8+ characters.');
$s=$pdo->prepare('INSERT INTO users(name,email,password) VALUES(?,?,?)');
try{$s->execute([$name,$email,password_hash($pw,PASSWORD_DEFAULT)]);echo 'Registered';}catch(PDOException $e){echo 'Registration failed';}
?>
<form method="post"><input name="name" placeholder="Name" required><input name="email" type="email" placeholder="Email" required><input name="password" type="password" required><button>Register</button></form>
