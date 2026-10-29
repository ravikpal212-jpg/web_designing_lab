<?php
session_start(); require "db.php";
if(!($_SESSION["is_admin"]??false)) die("Admin access required.");

$orders=(int)$pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$revenue=(float)$pdo->query("SELECT COALESCE(SUM(total),0) FROM orders WHERE status IN ('Shipped','Delivered')")->fetchColumn();
$avg=(float)$pdo->query("SELECT COALESCE(AVG(total),0) FROM orders")->fetchColumn();
?>
<h2>Sales Summary Report</h2>
<p>Total Orders: <?=$orders?></p>
<p>Total Revenue: ₹<?=number_format($revenue,2)?></p>
<p>Average Order Value: ₹<?=number_format($avg,2)?></p>