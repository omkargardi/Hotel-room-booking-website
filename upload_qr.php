<?php
$targetDir = "uploads/"; // Folder to store the QR code

if (isset($_POST['upload'])) {
    $fileName = basename($_FILES["qr_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["qr_image"]["tmp_name"], $targetFilePath)) {
            // Save the file path in the database
            $conn = new mysqli("localhost", "root", "", "hotel_booking");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO payment_qr (image_path) VALUES ('$targetFilePath')";
            if ($conn->query($sql) === TRUE) {
                echo "QR Code uploaded successfully!";
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Only JPG, JPEG, and PNG files are allowed.";
    }
}
?>

<!-- Upload Form -->
<form action="upload_qr.php" method="POST" enctype="multipart/form-data">
    <label for="qr_image">Upload GPay QR Code:</label>
    <input type="file" name="qr_image" accept="image/*" required>
    <button type="submit" name="upload">Upload</button>
</form>
