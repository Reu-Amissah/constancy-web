<?php
// recipient email address
$to = 'reujoyamissah@gmail.com';

// subject of the email
$subject = "Job Application Submission";

// message body
$messageBody = "some message";

// from
$from = "reujoyamissah@gmail.com";

// boundary
$boundary = uniqid();

// header information
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=" . $boundary . "\r\n";

// attachment
$file = $_FILES["attachment"]["tmp_name"];
$filename = $_FILES["attachment"]["name"];
$attachment = chunk_split(base64_encode(file_get_contents($file)));

// message with attachment
$message = "--" . $boundary . "\r\n";
$message .= "Content-Type: text/plain; charset=UTF-8\r\n";
$message .= "Content-Transfer-Encoding: base64\r\n\r\n";
$message .= chunk_split(base64_encode($messageBody)) . "\r\n";
$message .= "--" . $boundary . "\r\n";
$message .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
$message .= "Content-Transfer-Encoding: base64\r\n";
$message .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
$message .= $attachment . "\r\n";
$message .= "--" . $boundary . "--";

// send email
if (mail($to, $subject, $message, $headers)) {
    echo '<script type="text/javascript">';
    echo 'alert("Your message was sent!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Your message was failed!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
}
?>
