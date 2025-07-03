<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_booking";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $rating = intval($_POST["rating"]);

    $sql = "INSERT INTO guest_reviews (name, comment, rating)
            VALUES ('$name', '$comment', $rating)";

    if ($conn->query($sql) === TRUE) {
        // Redirect to thank_you.php
        header("Location: thank_you2.php");
        exit(); // Always call exit after header redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
