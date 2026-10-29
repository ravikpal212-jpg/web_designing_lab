<?php
if(isset($_FILES['photo'])){$f=$_FILES['photo'];$mime=(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);$types=['image/jpeg'=>'jpg','image/png'=>'png'];if($f['size']>2000000||!isset($types[$mime]))exit('Invalid image (JPG/PNG up to 2MB only)');if(!is_dir('uploads'))mkdir('uploads');$name=bin2hex(random_bytes(8)).'.'.$types[$mime];if(move_uploaded_file($f['tmp_name'],'uploads/'.$name))echo 'Uploaded: '.htmlspecialchars($name);else echo 'Upload failed';}
?>
<form method="post" enctype="multipart/form-data"><input type="file" name="photo" required><button>Upload</button></form>
