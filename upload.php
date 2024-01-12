<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if(isset($_POST['submit'])) {
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    if($fileError === 0) {
        $mail = new PHPMailer(true); 
        try {
       
            // THANK YOU CHAT-GPT //
            $mail->isSMTP(); 
            $mail->Host = 'mail.thebrainpharmgroup.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = '	info@thebrainpharmgroup.com'; // SMTP username
            $mail->Password = 'j7#L&Nzr2cPE'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to
            
            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('reujoyamissah@gmail.com', 'Ekow Amissah'); // Add a recipient

            //Attachments
            $mail->addAttachment($fileTmpName, $fileName); // Add attachments

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            
            $mail->send();
            echo 'Message has been sent';
            echo 'window.location.href = "index.html";';
           
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            echo 'window.location.href = "index.html";';
        }
    } else {
        echo "There was an error uploading your file!";
        echo 'window.location.href = "index.html";';
    }
}
?>
