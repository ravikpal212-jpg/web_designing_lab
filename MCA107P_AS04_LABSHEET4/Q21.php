<?php
// Q21: password_hash() and password_verify()
$password = "MySecurePassword123!";
$hash = password_hash($password, PASSWORD_DEFAULT);

$verified = password_verify($password, $hash);

echo "<h2>Password Hashing</h2>";
echo "Original password: ".htmlspecialchars($password)."<br>";
echo "Hashed password: ".htmlspecialchars($hash)."<br>";
echo "Verification: ".($verified ? "Password is valid" : "Invalid password");
?>