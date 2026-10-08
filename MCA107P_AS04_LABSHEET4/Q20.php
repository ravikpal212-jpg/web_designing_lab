<?php
// Q20: Verify PHP extensions
$extensions = ["mysqli","pdo_mysql","mbstring","curl"];
echo "<h2>PHP Extensions</h2>";
foreach($extensions as $ext) {
    echo htmlspecialchars($ext).": ".
         (extension_loaded($ext) ? "Active" : "Not Active")."<br>";
}

// To enable an extension, edit php.ini and restart Apache.
?>