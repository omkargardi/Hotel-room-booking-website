<?php
$conn = new mysqli("localhost", "root", "", "hotel_booking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM rooms WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: manage_rooms.php");
        exit();
    } else {
        echo "Delete failed: " . $stmt->error;
    }
} else {
    echo "Room ID not provided.";
}
?>
