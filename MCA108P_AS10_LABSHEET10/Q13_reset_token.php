<?php
// Generate a reset token. Store only the hash and expiry in the database.
$token=bin2hex(random_bytes(32));$tokenHash=hash('sha256',$token);
$expires=date('Y-m-d H:i:s',time()+1800);
// Save $tokenHash and $expires for the user in a reset_tokens table.
echo 'Token generated. Send this token through a private reset link: '.htmlspecialchars($token);
?>
