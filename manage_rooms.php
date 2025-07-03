<?php
session_start();

// Redirect if not admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_sign_up.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "hotel_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rooms</title>
    <link rel="stylesheet" href="manage_rooms.css">
</head>
<body>
    <div class="container">
        <h2>Hotel Rooms</h2>
        <a href="add_room.php" class="button">Add New Room</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Room Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php while ($room = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $room['id']; ?></td>
                    <td><?php echo $room['room_name']; ?></td>
                    <td><?php echo $room['price']; ?></td>
                    <td class="action-links">
                        
                        <a class="delete" href="delete_room.php?id=<?php echo $room['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
</body>
</html>
