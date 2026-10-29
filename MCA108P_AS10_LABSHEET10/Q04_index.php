<?php
$path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$routes=['/'=>'home','/products'=>'products'];
if(isset($routes[$path])){echo 'Route: '.htmlspecialchars($routes[$path]);}
else{http_response_code(404);echo '404 Not Found';}
?>
