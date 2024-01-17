<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"];

        // Check for errors during file upload
        if ($file["error"] === 0) {
            $to = "reujoyamissah@gmail.com"; // Change this to your email address
            $subject = "New Job Application";
            $message = "Specialty and aspirations:\n" . $_POST["specialty"];

            // Headers for the email
            $headers = "From: " . $_POST["email"] . "\r\n";
            $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            // Attach the file to the email
            $fileContent = file_get_contents($file["tmp_name"]);
            $fileAttachment = chunk_split(base64_encode($fileContent));

            $headers .= "Content-Disposition: attachment; filename=\"" . $file["name"] . "\"\r\n";
            $headers .= "Content-Type: application/octet-stream\r\n";
            $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
            $headers .= $fileAttachment . "\r\n";

            // Send the email
            mail($to, $subject, $message, $headers);

            // Redirect after successful submission
            header("Location: success.html");
            echo 'window.location.href = "index.html";';
            exit;
        } else {
            // Handle file upload error
            echo "File upload failed. Error code: " . $file["error"];
            echo 'window.location.href = "index.html";';
        }
    } else {
        // Handle if no file was uploaded
        echo "No file uploaded.";
        echo 'window.location.href = "index.html";';
    }
} else {
    // Handle if the form was not submitted
    echo "Form not submitted.";
    echo 'window.location.href = "index.html";';
}
?>
