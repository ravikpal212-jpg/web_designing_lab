<?php
// Q1: Online bookstore homepage
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Bookstore</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>BookStore</h1>
<form action="Q10.php" method="get">
<input name="q" placeholder="Search books...">
<button>Search</button>
</form>
</header>
<nav>
<a href="Q01.php">Home</a>
<a href="Q03.php">Books</a>
<a href="Q06.php">Cart</a>
<a href="Q17.php">Wishlist</a>
</nav>
<section class="banner"><h2>Featured Books</h2><p>Discover your next favorite book.</p></section>
<section class="grid">
<div class="card"><h3>Programming in PHP</h3><p>₹599</p></div>
<div class="card"><h3>Learning MySQL</h3><p>₹499</p></div>
<div class="card"><h3>Web Development</h3><p>₹699</p></div>
</section>
</body>
</html>