<!-- header.php -->
<header><h1><?= htmlspecialchars($title ?? 'Website') ?></h1><nav><a href="/">Home</a></nav></header>
<!-- footer.php -->
<footer>© 2026</footer>
<!-- Example view page -->
<?php $title='Products'; require 'header.php'; ?>
<main><h2>Products</h2><p>Page content here.</p></main>
<?php require 'footer.php'; ?>
