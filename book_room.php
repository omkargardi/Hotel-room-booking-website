<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_sign_up.html");
    exit();
}

// Continue with booking form
echo "Welcome, " . $_SESSION['user_name'];
?>
<!-- Your booking form goes here -->
<a href="logout.php">Logout</a>
