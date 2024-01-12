<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = $_POST["full_name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $to = "reujoyamissah@gmail.com";
  $subject = "Contact Form Submission from $full_name";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";

  $mail_body = "Name: $full_name\n";
  $mail_body .= "Email: $email\n";
  $mail_body .= "Message:\n$message";

  //template

  // Send the email
  
  if (mail($to, $subject, $mail_body, $headers)) {
    echo '<script type="text/javascript">';
    echo 'alert("Your message was sent!");';
    echo 'window.location.href = "Contact.html";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("Failed to send your message!");';
    echo 'window.location.href = "Contact.html";'; 
    echo '</script>';
  }
}
?>
