<?php
// Include the database connection file
include('config.php');
session_start(); // Start the session to store user data after login

if (isset($_SESSION['user_id'])) {
    // If the session is already set, redirect the user directly to the dashboard
    header("Location: ../users/dashboard.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if the email already exists in the database
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // If the email already exists, show an alert and redirect to login page
        if ($stmt->rowCount() > 0) {
            echo "<script type='text/javascript'>
                    alert('Email is already registered.');
                    window.location.href = '../../login.php'; // Redirect to login page
                  </script>";
            exit(); // Stop further processing
        }

        // Prepare the SQL query to insert the data into the 'users' table
        $sql = "INSERT INTO users (name, email, contact_number, gender, password) VALUES (:name, :email, :contact_number, :gender, :password)";
        $stmt = $pdo->prepare($sql);
        
        // Bind the parameters to the query
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute the query to insert the user
        $stmt->execute();

        // Redirect to dashboard or login page after successful registration
        header("Location: ../../login.php");
        exit();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
