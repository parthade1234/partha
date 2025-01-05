<?php
// Include the database connection file
include('config.php');
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    

    try {
        // Check if the email already exists in the database
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // If the email exists, generate and update OTP
        if ($stmt->rowCount() > 0) {
            $otp = rand(100000, 999999); // Generate a 6-digit random OTP

            // Update the OTP in the users table
            $updateSql = "UPDATE users SET otp = :otp WHERE email = :email";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':otp', $otp);
            $updateStmt->bindParam(':email', $email);
            $updateStmt->execute();
            $_SESSION['email'] = $email;
            // Optionally, send the OTP to the user's email
           // mail($email, "Your OTP Code", "Your OTP is: $otp");

            // Redirect to OTP verification page with a success message
            echo "<script type='text/javascript'>
                    alert('An OTP has been sent to your email address.');
                    window.location.href = '../../verify_otp.php'; // Adjust path as needed
                  </script>";
            exit();
        } else {
            // Email not found in the database
            echo "<script type='text/javascript'>
                    alert('Email not found. Please register first.');
                    window.location.href = '../../register.html'; // Adjust path as needed
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
