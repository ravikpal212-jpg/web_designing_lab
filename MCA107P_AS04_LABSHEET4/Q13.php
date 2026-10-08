<?php
// Q13: Secure image upload
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    $maxSize = 2 * 1024 * 1024;
    $allowed = ["jpg","jpeg","png","gif"];

    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if ($file["error"] !== UPLOAD_ERR_OK)
        $message = "Upload error.";
    elseif ($file["size"] > $maxSize)
        $message = "File is larger than 2 MB.";
    elseif (!in_array($ext, $allowed))
        $message = "Only JPG, JPEG, PNG and GIF are allowed.";
    else {
        $dir = __DIR__ . "/uploads";
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $name = bin2hex(random_bytes(8)) . "." . $ext;
        move_uploaded_file($file["tmp_name"], $dir . "/" . $name);
        $message = "Image uploaded successfully: uploads/" . $name;
    }
}
?>
<!DOCTYPE html>
<html><body>
<h2>Image Upload</h2>
<form method="post" enctype="multipart/form-data">
<input type="file" name="image" accept="image/*" required>
<button>Upload</button>
</form>
<p><?=htmlspecialchars($message)?></p>
</body></html>