<?php
$email=filter_var($_POST['email']??'',FILTER_VALIDATE_EMAIL);
$url=filter_var($_POST['url']??'',FILTER_VALIDATE_URL);
$age=filter_var($_POST['age']??'',FILTER_VALIDATE_INT);
$name=trim(strip_tags($_POST['name']??''));
var_dump($email,$url,$age,$name);
?>
<form method="post"><input name="name" placeholder="Name"><input name="email" placeholder="Email"><input name="url" placeholder="URL"><input name="age" placeholder="Age"><button>Validate</button></form>
