<?php
ini_set('log_errors','1');ini_set('display_errors','0');
ini_set('error_log',__DIR__.'/../logs/php-error.log');
http_response_code(404);require __DIR__.'/../views/404.php';
?>
<!-- views/404.php: <h1>404 - Page not found</h1>
Create a writable logs folder. Create a separate 500.php page for server errors. -->
