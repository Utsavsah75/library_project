<?php
// send mail to members successfully register when admin click on the confirm button n dashboard table.

session_start();
include "connection.php";
include "addnewuser_server.php";
include "message.php";
error_reporting(0);
$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id='$id'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
$email = $result['email'];
$name = $result['name'];
$subject = "Library Management System";
$body = "Dear $name, Your account has been successfully created. You can now login to your account. Thank you."; 
$headers = "From: librarymanagement@gmailcom";
if (mail($email, $subject, $body, $headers)) {
    echo "Email successfully sent to $email...";
} else {
    echo "Email sending failed...";
}
?>
