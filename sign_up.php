<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_booking";
$port = 3306;  // Specify MySQL Port

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error . ". <a href='login_sign_up.html'>Try again</a>";
    }
    $stmt->close();
}

$conn->close();
?>