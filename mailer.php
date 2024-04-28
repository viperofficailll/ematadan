<?php
require 'smtp/PHPMailerAutoload.php';

function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
 
    $mail->Username = "subedi1680@gmail.com";
    $mail->Password = "etta lkyv jwfo jbdi";
    $mail->SetFrom("subedi1680@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}

$email = "recipient@example.com";
$subject = "Test Email";
$message = "This is a test email.";
$result = smtp_mailer($email, $subject, $message);

if ($result === 'Sent') {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email. Error: " . $result;
}
?>
