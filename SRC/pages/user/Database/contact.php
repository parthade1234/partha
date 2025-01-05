<?php
// Database connection
include('config.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $attachment = null;

  
    // Handle file upload
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $attachment = $upload_dir . uniqid() . '-' . basename($_FILES['attachment']['name']);
        if (!move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment)) {
            die("Failed to upload the file.");
        }
    }

    // Insert data into database
    try {
        $stmt = $pdo->prepare("INSERT INTO contact_form (name, email, message, attachment) VALUES (:name, :email, :message, :attachment)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':attachment', $attachment);
        $stmt->execute();

        echo "<script>
            alert('Your message has been sent successfully!');
            window.location.href = '../../../../index.html';
        </script>";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
