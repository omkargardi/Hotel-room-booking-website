<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to External CSS -->
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    h1 {
        font-size: 24px;
        color: #222;
        margin-bottom: 10px;
    }

    h2 {
        font-size: 20px;
        color: #333;
    }

    h3 {
        font-size: 18px;
        color: #555;
    }

    .booking-card {
        background: #f9f9f9;
        padding: 15px;
        margin-top: 15px;
        border-radius: 5px;
        text-align: left;
        border-left: 5px solid #007bff;
    }

    p {
        font-size: 14px;
        margin: 5px 0;
    }

    strong {
        color: #333;
    }

    .status {
        font-weight: bold;
        color: green;
    }

    .error {
        color: red;
        font-size: 14px;
        margin-top: 10px;
    }

    .home-button {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    .home-button:hover {
        background-color: #0056b3;
    }

    .cancel-button {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 12px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 14px;
        text-decoration: none;
    }

    .cancel-button:hover {
        background-color: darkred;
    }
</style>
<body>

    <div class="container">
        <h1>Check Your Booking Details</h1>

        <?php
        include 'db.php';

        if (isset($_GET['email'])) {
            $email = $_GET['email'];

            // Fetch booking details for the given email
            $query = "SELECT * FROM bookings WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<h2>Your Booking Details</h2>";

                while ($row = $result->fetch_assoc()) {
                    echo "<div class='booking-card'>";
                    echo "<h3>Booking ID: " . $row['id'] . "</h3>";
                    echo "<p><strong>Full Name:</strong> " . $row['name'] . "</p>";
                    echo "<p><strong>Room Type:</strong> " . $row['room'] . "</p>";
                    echo "<p><strong>Arrival Date:</strong> " . $row['arrival'] . "</p>";
                    echo "<p><strong>Departure Date:</strong> " . $row['departure'] . "</p>";
                    echo "<p><strong>Status:</strong> <span class='status'>" . $row['booking_status'] . "</span></p>";

                    // Cancel Booking Button
                    echo "<a href='cancel.php?booking_id=" . $row['id'] . "' class='cancel-button'>Cancel Booking</a>";

                    echo "</div>";
                }
            } else {
                echo "<p class='error'>No booking found for this email.</p>";
            }
        } else {
            echo "<p class='error'>Please provide an email to search for your booking.</p>";
        }
        ?>

        <!-- Back to Home Button -->
        <a href="index.html" class="home-button">Back to Home</a>

    </div>

</body>
</html>
