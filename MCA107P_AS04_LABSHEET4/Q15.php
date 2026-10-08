<?php
// Q15: Session management
session_start();

if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: Q15.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["username"] = $_POST["username"];
}

?>
<!DOCTYPE html>
<html><body>
<h2>Session Management</h2>
<form method="post">
<input name="username" placeholder="Username" required>
<button>Login</button>
</form>
<?php if(isset($_SESSION["username"])): ?>
<p>Logged in as: <?=htmlspecialchars($_SESSION["username"])?></p>
<a href="?logout=1">Logout</a>
<?php endif; ?>
</body></html>