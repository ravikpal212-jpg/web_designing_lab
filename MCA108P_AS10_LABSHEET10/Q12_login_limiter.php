<?php
session_start();$_SESSION['tries']??=0;$_SESSION['locked_until']??=0;
if(time()<$_SESSION['locked_until'])exit('Locked; try again later.');
$ok=($_POST['password']??'')==='demo';
if($ok){$_SESSION['tries']=0;echo 'Login OK';}
else{$_SESSION['tries']++;if($_SESSION['tries']>=3)$_SESSION['locked_until']=time()+60;echo 'Login failed';}
?>
<form method="post"><input type="password" name="password"><button>Login</button></form>
