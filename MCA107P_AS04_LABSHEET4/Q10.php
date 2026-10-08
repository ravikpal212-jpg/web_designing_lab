<?php
// Q10: PHP-side example for a virtual-host project.
// Apache configuration belongs in httpd-vhosts.conf.
//
// Example:
// <VirtualHost *:80>
//     ServerName collegeweb.local
//     DocumentRoot "C:/xampp/htdocs/collegeweb"
//     <Directory "C:/xampp/htdocs/collegeweb">
//         AllowOverride All
//         Require all granted
//     </Directory>
// </VirtualHost>
//
// Add to Windows hosts file:
// 127.0.0.1 collegeweb.local

echo "<h2>College Web Project</h2>";
echo "<p>Virtual host collegeweb.local is configured separately in Apache.</p>";
?>