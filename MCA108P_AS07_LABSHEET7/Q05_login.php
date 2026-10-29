<?php
session_start();
require "db.php";
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password,$user["password"])) {
    session_regenerate_id(true);
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["is_admin"] = $user["is_admin"];
    echo "Login successful. <a href='Q01.php'>Continue</a>";
} else echo "Invalid login.";
?>