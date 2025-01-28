
<?php
$host = 'sql311.infinityfree.com';  // Database host
$dbname = 'if0_37852299_blog'; // Database name
$username = 'if0_37852299'; // Database username
$password = "Website2024"; // Database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

