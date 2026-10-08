<?php
// Q19: PDO transaction management
require "Q04.php";

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare(
        "INSERT INTO students (name,email,enrollment_date)
         VALUES (:name,:email,:date)"
    );
    $stmt->execute([
        ":name"=>"Transaction Student",
        ":email"=>"transaction@example.com",
        ":date"=>date("Y-m-d")
    ]);

    // Other related table operations could be performed here.

    $pdo->commit();
    echo "Transaction committed successfully.";
} catch (Exception $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    echo "Transaction rolled back: ".htmlspecialchars($e->getMessage());
}
?>