<?php
ini_set('session.cookie_httponly','1');
ini_set('session.cookie_samesite','Lax');
ini_set('session.cookie_secure','1'); // Use HTTPS for this setting.
session_start();session_regenerate_id(true);
echo 'Secure session started';
?>
