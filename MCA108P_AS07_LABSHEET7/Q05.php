<?php
session_start();
require "db.php";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($name && filter_var($email,FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
            $stmt->execute([$name,$email,$hash]);
            $message = "Registration successful.";
        } catch (PDOException $e) {
            $message = "Email may already be registered.";
        }
    } else $message = "Enter valid details. Password must be at least 6 characters.";
}
?>
<h2>Register</h2>
<form method="post">
<input name="name" placeholder="Name" required><br>
<input name="email" type="email" placeholder="Email" required><br>
<input name="password" type="password" placeholder="Password" required minlength="6"><br>
<button>Register</button>
</form>
<p><?=htmlspecialchars($message)?></p>
<hr>
<h2>Login</h2>
<form method="post" action="Q05_login.php">
<input name="email" type="email" placeholder="Email" required><br>
<input name="password" type="password" placeholder="Password" required><br>
<button>Login</button>
</form>