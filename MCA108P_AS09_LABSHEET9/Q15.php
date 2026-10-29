<?php
// Vulnerable example — never use with real input:
$email=$_GET['email']??''; $unsafe="SELECT * FROM users WHERE email='$email'";
// Safe prepared statement:
require_once 'db.php';$s=$pdo->prepare('SELECT id,name FROM users WHERE email=?');$s->execute([$email]);$user=$s->fetch(PDO::FETCH_ASSOC);
echo $user?htmlspecialchars($user['name']):'No user found';
?>
