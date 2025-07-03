<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show Booking</title>
    <style>
    /* Center the form */
form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 400px;
    margin: 50px auto;
    text-align: center;
}

/* Label Styling */
label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 8px;
}

/* Input Field Styling */
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 15px;
    outline: none;
    transition: 0.3s;
}

input[type="email"]:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Button Styling */
button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: 0.3s;
    width: 100%;
}

button:hover {
    background: #0056b3;
}
</style>
</head>
<body>
    
</body>
</html>
<form action="show_booking.php" method="GET">
    <label for="email">Enter your Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Check Booking</button>
</form>
