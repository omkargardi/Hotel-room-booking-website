<?php
$servername = "localhost";
$username = "root";  // Default in XAMPP
$password = "";  // Default is empty in XAMPP
$database = "hotel_booking"; // Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
