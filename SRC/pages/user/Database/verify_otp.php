<?php
// Include the database connection file
include('config.php');
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
	$otp = $_POST['otp'];
	$email = $_SESSION['email']; // Retrieve the stored email
    try {
        // Check if the OTP already exists in the database
        $sql = "SELECT * FROM users WHERE otp = :otp LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':otp', $otp);
        $stmt->execute();
        // If the email exists, 
        if ($stmt->rowCount() > 0) {
            echo "<script type='text/javascript'>
                    window.location.href = '../../reset_password.php'; // Adjust path as needed
                  </script>";
            exit();
          
        } else { echo "<script type='text/javascript'>
			 alert('You Entered Wrong OTP');
			window.location.href = '../../verify_otp.php'; // Adjust path as needed
		  </script>";

		}





    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
