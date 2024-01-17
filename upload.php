<?php
 
if(isset($_POST['button']) && isset($_FILES['attachment']))
{
    $from_email         = 'reujoyamissah@gmail.com'; //from mail, sender email address
    $recipient_email = 'reujoyamissah@gmail.com'; //recipient email address
     
    //Load POST data from HTML form
    $sender_name = "Krypton"; //sender name
    $reply_to_email = "ekow@gmail.com"; //sender email, it will be used in "reply-to" header
    $subject     = "Application"; //subject for the email
    $message     = "Say something"; //body of the email
 
    /*Always remember to validate the form fields like this
    if(strlen($sender_name)<1)
    {
        die('Name is too short or empty!');
    }
    */   
    //Get uploaded file data using $_FILES array
    $tmp_name = $_FILES['attachment']['tmp_name']; // get the temporary file name of the file on the server
    $name     = $_FILES['attachment']['name']; // get the name of the file
    $size     = $_FILES['attachment']['size']; // get size of the file for size validation
    $type     = $_FILES['attachment']['type']; // get type of the file
    $error     = $_FILES['attachment']['error']; // get the error (if any)
 
    //validate form field for attaching the file
    if($error > 0)
    {
        die('Upload error or No files uploaded');
    }
 
    //read from the uploaded file & base64_encode content
    $handle = fopen($tmp_name, "r"); // set the file handle only for reading the file
    $content = fread($handle, $size); // reading the file
    fclose($handle);                 // close upon completion
 
    $encoded_content = chunk_split(base64_encode($content));
    $boundary = md5("random"); // define boundary with a md5 hashed value
 
    //header
    $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
    $headers .= "From:".$from_email."\r\n"; // Sender Email
    $headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email address to reach back
    $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
    $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
         
    //plain text
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($message));
         
    //attachment
    $body .= "--$boundary\r\n";
    $body .="Content-Type: $type; name=".$name."\r\n";
    $body .="Content-Disposition: attachment; filename=".$name."\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
    $body .= $encoded_content; // Attaching the encoded file with email
     
    $sentMailResult = mail($recipient_email, $subject, $body, $headers);
 
    if($sentMailResult )
    {
    echo '<script type="text/javascript">';
    echo 'alert("Your message was sent!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
    // unlink($name); // delete the file after attachment sent.
    }
    else
    {
    echo '<script type="text/javascript">';
    echo 'alert("Your message was failed!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
    }
}
?>