<?php
include 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$roll_number = $_POST['roll_number'];
$timestamp = $_POST['timestamp'];

//database connection 
$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
	die('Connection Failed : ' .$conn->connect_error);
}
// Check if the roll number already exists in the database
elseif (mysqli_num_rows($result) > 0) {
    // Roll number exists, update the existing record
    $updateQuery = "UPDATE students SET name='$name', email='$email', timestamp='$timestamp' WHERE roll_number='$roll_number'";
    mysqli_query($conn, $updateQuery);
} else {
    // Roll number doesn't exist, insert a new record
    $insertQuery = "INSERT INTO students (roll_number, name, email, timestamp) VALUES ('$roll_number', '$name', '$email', '$timestamp')";
    mysqli_query($conn, $insertQuery);
}
?>