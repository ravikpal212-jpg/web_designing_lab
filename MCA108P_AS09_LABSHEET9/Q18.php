<?php
session_start();$_SESSION['cart']??=[];
$id=(int)($_GET['id']??1);$action=$_GET['action']??'add';
if($action==='remove')unset($_SESSION['cart'][$id]);elseif($action==='update')$_SESSION['cart'][$id]=max(1,(int)($_GET['qty']??1));else $_SESSION['cart'][$id]=($_SESSION['cart'][$id]??0)+1;
echo '<pre>';print_r($_SESSION['cart']);echo '</pre>';
?>
<p>Try ?id=1, ?id=1&action=update&qty=3, or ?id=1&action=remove</p>
