session_unset();
<?php
session_start();

// Destroy the session
session_destroy();
session_unset();

// Clear the "Remember Me" cookies
setcookie('user_id', '', time() - 3600, '/');  // Expire the cookie
setcookie('user_email', '', time() - 3600, '/'); // Expire the cookie

// Redirect to the login page
header("Location: ../../login.php");
exit();
?>
