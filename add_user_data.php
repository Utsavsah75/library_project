<?php
include("conn.php");
// var_dump($_POST);
// Escape variables to prevent SQL injection
// $User_id      = mysqli_real_escape_string($conn, $_POST['u_id']);
$uname        = mysqli_real_escape_string($conn, $_POST['uname']);
$email        = mysqli_real_escape_string($conn, $_POST['email']);
$password     = mysqli_real_escape_string($conn, $_POST['password']);
$gender       = mysqli_real_escape_string($conn, $_POST['gender']);
$phone   = mysqli_real_escape_string($conn, $_POST['phone']);
$faculty      = mysqli_real_escape_string($conn, $_POST['faculty']);
$address      = mysqli_real_escape_string($conn, $_POST['address']);
$photo      = mysqli_real_escape_string($conn, $_POST['photo']);

// $sql = "INSERT INTO addnew_user ('User Id', 'Name', 'Email', 'Password', 'Address', 'Gender', 'Phone', 'Faculty') 
//             VALUES ('$u_id', '$uname', '$email', '$password', '$address', '$gender', '$phone', '$faculty')";
$sql = "INSERT INTO `students` (`name`, `email`, `gender`, `password`, `address`, `phone`, `faculty`, `photo`, `verified`) 
            VALUES ('$uname', '$email', '$gender', '$password', '$address', '$phone', '$faculty','$photo', 1)";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "Added Successfully";
    header("location: add.php");
   
} else {
    echo "Can't Add";
    header("location: add.php");
    
}
?>