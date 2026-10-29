<?php
// Install first: composer require phpmailer/phpmailer
require __DIR__.'/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$mail=new PHPMailer(true);$mail->isSMTP();$mail->Host='smtp.example.com';
$mail->SMTPAuth=true;$mail->Username='user@example.com';$mail->Password='APP_PASSWORD';
$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;$mail->Port=587;
$mail->setFrom('user@example.com','Website');$mail->addAddress('recipient@example.com');
$mail->Subject='Confirm your account';$mail->Body='Please confirm your registration.';
$mail->send();echo 'Email sent';
?>
