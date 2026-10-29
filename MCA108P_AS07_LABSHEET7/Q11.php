<?php
require "db.php";
$perPage=6; $page=max(1,(int)($_GET["page"]??1)); $offset=($page-1)*$perPage;
$total=(int)$pdo->query("SELECT COUNT(*) FROM books")->fetchColumn();
$stmt=$pdo->prepare("SELECT * FROM books LIMIT ? OFFSET ?");
$stmt->bindValue(1,$perPage,PDO::PARAM_INT); $stmt->bindValue(2,$offset,PDO::PARAM_INT); $stmt->execute();
$books=$stmt->fetchAll(); $pages=ceil($total/$perPage);
?>
<h2>Books - Page <?=$page?></h2><div class="grid">
<?php foreach($books as $b): ?><div class="card"><h3><?=htmlspecialchars($b["title"])?></h3><p>₹<?=$b["price"]?></p></div><?php endforeach; ?>
</div>
<p><?php for($i=1;$i<=$pages;$i++): ?><a href="?page=<?=$i?>"><?=$i?></a> <?php endfor; ?></p>