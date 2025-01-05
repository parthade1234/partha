<?php
session_start(); // Start the session to store user data after login

// Include the database configuration file
include('config.php');

// Check if the user is already logged in (i.e., session exists)
if (isset($_SESSION['user_id'])) {
    // If the session is already set, redirect the user directly to the dashboard
    header("Location: ../users/dashboard.php");
    exit();
}

// Check if the user is already logged in (via cookie)
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_email'])) {
    $user_id = $_COOKIE['user_id'];
    $user_email = $_COOKIE['user_email'];

    // Retrieve the user data from the database based on cookie
    $sql = "SELECT * FROM users WHERE id = :user_id AND email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':email', $user_email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        // Redirect to dashboard
        header("Location: ../users/dashboard.php");
        exit();
    }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); // Check if "Remember Me" is checked

    // Basic validation: check if email or password is empty
    if (empty($email) || empty($password)) {
        // If email or password is empty, show an alert and redirect back to login page
        echo "<script type='text/javascript'>
                alert('Please fill in both fields.');
                window.location.href = '../../login.php'; // Redirect to login page in the parent folder
              </script>";
        exit(); // Stop further processing after the alert
    }

    try {
        // Query the database for the user by email
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if user exists
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password using password_verify()
            if (password_verify($password, $user['password'])) {
                // Password is correct, login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                // If "Remember Me" is checked, set cookies for 30 days
                if ($remember) {
                    setcookie('user_id', $user['id'], time() + (30 * 24 * 60 * 60), '/'); // 30 days
                    setcookie('user_email', $user['email'], time() + (30 * 24 * 60 * 60), '/'); // 30 days
                }

                // Redirect to the dashboard or homepage
                header("Location: ../users/dashboard.php");
                exit();
            } else {
                // Invalid password, show alert and redirect back to login page
                echo "<script type='text/javascript'>
                        alert('Invalid password.');
                        window.location.href = '../../login.php'; // Redirect to login page in the parent folder
                      </script>";
            }
        } else {
            // User not found, show alert and redirect back to login page
            echo "<script type='text/javascript'>
                    alert('No account found with that email address.');
                    window.location.href = '../../login.php'; // Redirect to login page in the parent folder
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
