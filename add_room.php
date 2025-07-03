<!DOCTYPE html>
<html>
<head>
    <title>Add Room</title>
    <link rel="stylesheet" href="room_form.css">
</head>
<body>
    <div class="form-container">
        <h2>Add New Room</h2>
        

<form action="add_room_process.php" method="POST">
    Room Name: <input type="text" name="room_name" required><br>
    Price: <input type="number" name="price" required><br>
    <input type="submit" value="Add Room">
</form>
        