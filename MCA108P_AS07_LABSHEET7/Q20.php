<?php
// Q20: End-to-end journey checklist/test page.
$steps=[
"Browse available books",
"Search/filter a book",
"Register or login",
"View book details",
"Add book to cart",
"Update/remove cart items",
"Checkout and place order",
"View invoice/order confirmation"
];
?>
<h2>Bookstore E-Commerce Journey</h2>
<ol><?php foreach($steps as $s): ?><li><?=htmlspecialchars($s)?></li><?php endforeach; ?></ol>
<p>Run the listed steps manually through Q01.php to Q16.php to verify the complete flow.</p>