<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_booking";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM guest_reviews ORDER BY date DESC";
$result = $conn->query($sql);

$reviews = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

header('Content-Type: application/json'); // Tell the browser the response is JSON
echo json_encode($reviews);

$conn->close();
?>