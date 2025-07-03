<?php
$link = mysqli_connect("localhost", "root", "", "hotel_booking");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}else{
    echo "DataBase Connect successfully.";
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['full_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['email']);
$gender = mysqli_real_escape_string($link, $_REQUEST['room_type']);
$birth_date = mysqli_real_escape_string($link, $_REQUEST['no_of_guest']);
$email = mysqli_real_escape_string($link, $_REQUEST['arrival_date_and_time']);
$mobile_number = mysqli_real_escape_string($link, $_REQUEST['deparature']);
$address = mysqli_real_escape_string($link, $_REQUEST['Special_request']);

// Attempt insert query execution
$sql = "INSERT INTO room_booking (full_name,email,room_type,no_of_guest,arrival_date_and_time,deparature,Special_request)
     VALUES ('$full_name','$email','$room_type','$no_of_guest','$arrival_date_and_time','$Deparature','Special_request')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>