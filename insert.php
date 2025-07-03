<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $room = $_POST["room"];
    $guests = $_POST["guests"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    $requests = $_POST["requests"];
    $paymentScreenshot = $_FILES["paymentScreenshot"];

    // Check if the file is uploaded
    if (isset($_FILES["paymentScreenshot"]) && $_FILES["paymentScreenshot"]["error"] == 0) {
        $target_dir = "uploads/"; // Folder where images will be saved
        $file_name = basename($_FILES["paymentScreenshot"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types
        $allowTypes = array("jpg", "jpeg", "png");

        if (in_array($imageFileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["paymentScreenshot"]["tmp_name"], $target_file)) {
                // Database connection
                $conn = new mysqli("localhost", "root", "", "hotel_booking");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert booking details into the database
                $sql = "INSERT INTO bookings (name, email, room, guests, arrival, departure, requests, payment_screenshot) 
                        VALUES ('$name', '$email', '$room', '$guests', '$arrival', '$departure', '$requests', '$file_name')";

                if ($conn->query($sql) === TRUE) {
                    // ✅ Booking successful! Now redirect user to Thank You page
                    header("Location: thank_you.php");
                    exit(); // Stops further execution after redirection
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        echo "No file uploaded. Please upload a payment screenshot.";
    }
}
?>
