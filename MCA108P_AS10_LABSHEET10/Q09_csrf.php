<?php
session_start();$_SESSION['csrf']??=bin2hex(random_bytes(32));
if($_SERVER['REQUEST_METHOD']==='POST'){
 if(!hash_equals($_SESSION['csrf'],$_POST['csrf']??''))exit('Invalid CSRF token');
 echo 'Form accepted';
}
?>
<form method="post"><input type="hidden" name="csrf" value="<?=htmlspecialchars($_SESSION['csrf'])?>"><button>Submit</button></form>
