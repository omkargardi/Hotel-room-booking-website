<?php
$conn = new mysqli("localhost", "root", "", "hotel_booking");
$room = $_POST['room_name'];
$price = $_POST['price'];
$conn->query("INSERT INTO rooms (room_name, price) VALUES ('$room', $price)");
header("Location: manage_rooms.php");
?>
