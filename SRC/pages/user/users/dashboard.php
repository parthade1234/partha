
<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in by verifying session variables
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: ..\..\login.php");
    exit();
}

// User is logged in, so display the dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS file -->
</head>
<body>

    <!-- Dashboard Content -->
    <div class="dashboard">
        <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>

        <p>You're logged in with the email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>

        <!-- Logout Button -->
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        .dashboard {
            width: 100%;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dashboard h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .dashboard p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .logout-button {
            background-color: #ff4c4c;
            color: white;
            padding: 10px 20px;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #e43e3e;
        }
    </style>

</body>
</html>
