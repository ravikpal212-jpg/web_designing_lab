<?php
if(isset($_POST['email'],$_POST['remember']))setcookie('remember_email',$_POST['email'],['expires'=>time()+2592000,'path'=>'/','httponly'=>true,'samesite'=>'Lax']);
$email=$_COOKIE['remember_email']??'';echo 'Welcome '.htmlspecialchars($email);
?>
<form method="post"><input type="email" name="email" required><label><input type="checkbox" name="remember"> Remember Me</label><button>Continue</button></form>
