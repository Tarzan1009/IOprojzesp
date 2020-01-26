<?php 
require_once('PHPMailer\language\phpmailer.lang-pl.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host='smtp.gmail.com';
$mail->Port='465';
$mail->isHTML();
$mail->Username='1nzyn1er1a0program0wan1a24@gmail.com';
$mail->Password='iop@assw0rd';
$mail->SetForm('alza408@gmail.com');
$mail->Subject='Hello World';
$mail->Body='A test email';
$mail->AddAdress('mistrzjonda@gmail.com');

$mail->Send();
?>

C:\xampp\htdocs\PHPMailer\language