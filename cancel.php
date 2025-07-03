<?php
include 'db.php'; // Ensure this file exists

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Check if the booking exists before deleting
    $stmt_check = $conn->prepare("SELECT id FROM bookings WHERE id = ?");
    $stmt_check->bind_param("i", $booking_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Proceed to cancel the booking
        $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
        $stmt->bind_param("i", $booking_id);

        if ($stmt->execute()) {
            // Redirect to booking details page with success message
            header("Location: booking_details.php?email=your-email@example.com&message=cancel_success");
            exit();
        } else {
            // Redirect with error message
            header("Location: booking_details.php?email=your-email@example.com&message=cancel_error");
            exit();
        }

        $stmt->close();
    } else {
        // Booking not found
        header("Location: booking_details.php?email=your-email@example.com&message=not_found");
        exit();
    }

    $stmt_check->close();
}

$conn->close();
?>
