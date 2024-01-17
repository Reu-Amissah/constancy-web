<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $specialty = $_POST["specialty"];
    $to = "reujoyamissah@gmail.com"; // Change this to your email address
    $subject = "Job Application Submission";

    // File handling
    $file_name = $_FILES["file"]["name"];
    $file_tmp_name = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $file_error = $_FILES["file"]["error"];

    $allowed_extensions = ["pdf", "doc", "docx"];
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($file_extension, $allowed_extensions)) {
        if ($file_error === 0) {
            // Prepare email headers
            $headers = "From: " . $_POST["email"] . "\r\n";
            $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=boundary\r\n";

            // Prepare email body
            $message = "Specialty and aspirations:\n" . $specialty;
            $message .= "\r\n\r\n--boundary\r\n";
            $message .= "Content-Type: application/octet-stream; name=\"$file_name\"\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "Content-Disposition: attachment\r\n\r\n";
            $message .= chunk_split(base64_encode(file_get_contents($file_tmp_name)));
            $message .= "\r\n--boundary--";

            // Send the email
            mail($to, $subject, $message, $headers);

            echo '<script type="text/javascript">';
    echo 'alert("Your message was sent!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
            exit;
        } else {
            // Handle file upload error
            echo '<script type="text/javascript">';
    echo 'alert("ERROr!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
        }
    } else {
        // Handle invalid file type
        echo '<script type="text/javascript">';
    echo 'alert("file invalid!");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
    }
}

?>
