<?php
session_start();
if(!isset($_SESSION['uid'])){header('Location: Q04.php');exit;}
echo 'Welcome to dashboard';
?>
