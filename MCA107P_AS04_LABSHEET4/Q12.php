<?php
// Q12: User authentication against MySQL records
require "Q04.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Assumes a users table with username and password columns.
    $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->execute([":username"=>$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"]))
        $message = "Login successful.";
    else
        $message = "Invalid username or password.";
}
?>
<!DOCTYPE html>
<html><body>
<h2>Login</h2>
<form method="post">
<input name="username" placeholder="Username" required><br><br>
<input name="password" type="password" placeholder="Password" required><br><br>
<button>Login</button>
</form>
<p><?=htmlspecialchars($message)?></p>
</body></html>