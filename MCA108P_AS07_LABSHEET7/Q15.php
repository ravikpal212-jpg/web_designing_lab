<?php
session_start(); require "db.php";
if(!isset($_SESSION["user_id"])) die("Please login to review.");
$bookId=filter_input(INPUT_GET,"book_id",FILTER_VALIDATE_INT);
if(!$bookId) die("Invalid book.");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $rating=max(1,min(5,(int)$_POST["rating"])); $comment=trim($_POST["comment"]);
    $stmt=$pdo->prepare("INSERT INTO reviews(user_id,book_id,rating,comment) VALUES(?,?,?,?)
        ON DUPLICATE KEY UPDATE rating=VALUES(rating),comment=VALUES(comment)");
    $stmt->execute([$_SESSION["user_id"],$bookId,$rating,$comment]);
}
$stmt=$pdo->prepare("SELECT r.*,u.name FROM reviews r JOIN users u ON u.id=r.user_id WHERE book_id=? ORDER BY created_at DESC");
$stmt->execute([$bookId]); $reviews=$stmt->fetchAll();
?>
<h2>Book Reviews</h2>
<form method="post"><select name="rating"><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select>
<textarea name="comment" placeholder="Comment"></textarea><button>Submit Review</button></form>
<?php foreach($reviews as $r): ?><div><b><?=htmlspecialchars($r["name"])?></b> - <?=$r["rating"]?>/5<p><?=htmlspecialchars($r["comment"])?></p></div><?php endforeach; ?>