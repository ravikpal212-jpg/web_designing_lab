<?php
// Q18: Apache performance/error logging test
// Open this page several times, then inspect Apache logs:
//
// XAMPP: apache/logs/access.log
// XAMPP: apache/logs/error.log
//
// This request is intentionally simple so it can be seen in access.log.
echo "<h2>Apache Logging Test</h2>";
echo "Request received at: ".date("Y-m-d H:i:s")."<br>";
echo "Check Apache access.log and error.log after simulated requests.";
?>