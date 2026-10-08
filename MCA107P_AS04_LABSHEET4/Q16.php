<?php
// Q16: Cookie management for theme preference
if (isset($_GET["theme"])) {
    $theme = $_GET["theme"] === "dark" ? "dark" : "light";
    setcookie("theme", $theme, time()+86400*30, "/");
    header("Location: Q16.php");
    exit;
}

$theme = $_COOKIE["theme"] ?? "light";
$bg = $theme === "dark" ? "#222" : "#fff";
$fg = $theme === "dark" ? "#fff" : "#000";
?>
<!DOCTYPE html>
<html>
<body style="background:<?=$bg?>;color:<?=$fg?>;font-family:Arial">
<h2>Cookie Theme Preference</h2>
<p>Current theme: <?=$theme?></p>
<a href="?theme=light">Light Theme</a> |
<a href="?theme=dark">Dark Theme</a>
</body></html>