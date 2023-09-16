<?php
include("conn.php");
var_dump($_POST);
// Escape variables to prevent SQL injection
$User_id      = mysqli_real_escape_string($conn, $_POST['u_id']);
$Uname        = mysqli_real_escape_string($conn, $_POST['uname']);
$Email        = mysqli_real_escape_string($conn, $_POST['email']);
$Password     = mysqli_real_escape_string($conn, $_POST['password']);
$Gender       = mysqli_real_escape_string($conn, $_POST['gender']);
$Contact_no   = mysqli_real_escape_string($conn, $_POST['phone']);
$Faculty      = mysqli_real_escape_string($conn, $_POST['faculty']);
$Address      = mysqli_real_escape_string($conn, $_POST['address']);

$sql = "INSERT INTO addnew_user ('User Id', 'Name', 'Email', 'Password', 'Address', 'Gender', 'Phone', 'Faculty') 
            VALUES ('$u_id', '$uname', '$email', '$password', '$address', '$gender', '$phone', '$faculty')";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "Added Successfully";
    header("location: add.php");
   
} else {
    echo "Can't Add";
    header("location: add.php");
    
}
?>