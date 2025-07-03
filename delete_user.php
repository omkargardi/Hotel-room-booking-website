<?php
$conn = new mysqli("localhost", "root", "", "hotel_booking");
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id = $id");
header("Location: manage_users.php");
?>
