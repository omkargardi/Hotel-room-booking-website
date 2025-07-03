<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_sign_up.html");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Welcome Admin!</h1>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li><br>
            <li><a href="manage_rooms.php">Manage Hotel Rooms</a></li>
        </ul>
    </div>
</body>
</html>


