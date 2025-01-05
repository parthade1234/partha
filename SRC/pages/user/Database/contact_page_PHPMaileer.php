<?php

// Define the email recipient
$to = "mr.parthade7986@gmail.com"; // Replace with the email address you want to send the form data to
$subject = "New Contact Form Submission";

// Define form fields
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Check if all required fields are filled
if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill out all the fields.";
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email address is not valid.";
    exit;
}

// Handle file upload (if there is an attachment)
$attachment = null;
if (isset($_FILES['filename']) && $_FILES['filename']['error'] == 0) {
    $file_tmp = $_FILES['filename']['tmp_name'];
    $file_name = $_FILES['filename']['name'];
    $file_type = $_FILES['filename']['type'];
    $file_size = $_FILES['filename']['size'];

    // Set the destination folder for uploads
    $upload_dir = "uploads/"; // Make sure the uploads folder is writable

    // Generate a unique file name to avoid conflicts
    $file_path = $upload_dir . uniqid() . '-' . basename($file_name);

    // Move the uploaded file to the server
    if (move_uploaded_file($file_tmp, $file_path)) {
        $attachment = $file_path;
    } else {
        echo "Failed to upload attachment.";
        exit;
    }
}

// Compose the email message
$email_content = "You have received a new message from the contact form.\n\n";
$email_content .= "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message:\n$message\n";

// Add the attachment if it exists
if ($attachment) {
    // Read the file contents
    $file_content = file_get_contents($attachment);
    $file_content_encoded = base64_encode($file_content);

    // Create a boundary string
    $boundary = md5(time());

    // Set the email headers for an attachment
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
    $headers .= "From: $email\r\n";

    // Prepare the body with attachment
    $email_body = "--$boundary\r\n";
    $email_body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $email_body .= "Content-Transfer-Encoding: 7bit\r\n\n";
    $email_body .= $email_content . "\r\n\n";
    $email_body .= "--$boundary\r\n";
    $email_body .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
    $email_body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n";
    $email_body .= "Content-Transfer-Encoding: base64\r\n\n";
    $email_body .= $file_content_encoded . "\r\n";
    $email_body .= "--$boundary--";

} else {
    // If no attachment, simply send the message body
    $headers = "From: $email\r\n";
    $email_body = $email_content;
}

// Send the email
if (mail($to, $subject, $email_body, $headers)) {
    echo "Thank you for contacting us. Your message has been sent.";
} else {
    echo "There was an error sending your message. Please try again later.";
}

?>
