<?php
session_start();

// Show errors (for development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_booking";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Check DB connection
if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}

// Get form inputs
$email = $_POST['email'];
$password = $_POST['password'];

// Prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);

// Query user
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    
    if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];

        // Redirect based on role
       // Redirect based on role
if ($row['role'] === 'admin') {
    header("Location: admin_dashboard.php");
} else {
    header("Location: index.php");
}

        exit();
    } else {
        echo "❌ Invalid password.";
    }
} else {
    echo "❌ User not found.";
}

mysqli_close($conn);
?>
