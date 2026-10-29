<?php
$f=$_FILES['file']??null;if(!$f)exit('Choose a file.');
$mime=(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);$allowed=['image/jpeg'=>'jpg','image/png'=>'png'];
if($f['size']>2000000||!isset($allowed[$mime]))exit('Invalid file.');
$dir=dirname(__DIR__).'/private_uploads';if(!is_dir($dir))mkdir($dir,0700,true);
$name=bin2hex(random_bytes(16)).'.'.$allowed[$mime];
if(move_uploaded_file($f['tmp_name'],$dir.'/'.$name))echo 'Upload successful';else echo 'Upload failed';
?>
<form method="post" enctype="multipart/form-data"><input type="file" name="file" required><button>Upload</button></form>
