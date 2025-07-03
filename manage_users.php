<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login_sign_up.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "hotel_booking");

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #e74c3c;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<h2>All Users</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td><a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
        </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
