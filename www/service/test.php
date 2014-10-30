<?

session_start();

///SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'MailService/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtpout.secureserver.net";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 80;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "no-reply@mingshengxu.com";
//Password to use for SMTP authentication
$mail->Password = "x921017Z";
//Set who the message is to be sent from
$mail->setFrom('no-reply@mingshengxu.com', 'myPurdue-assistance');

//Set who the message is to be sent to
$mail->addAddress('peterxumsh@gmail.com');
//Set the subject line
$mail->Subject = "Your confirmation link here";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$subject="Your confirmation link here";
// From
// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.mingshengxu.com/promos/comfirmation.php?passkey=123";
$mail->Body    = $message;
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
if (!$mail->send()) {
   // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
}



?>