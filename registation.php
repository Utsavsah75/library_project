<?php
session_start();
// Establish database connection
$conn = new mysqli("localhost", "root", "", "library");

if (isset($_POST['register'])) {
    $name       = $_POST['name'];
    $email         = $_POST['email'];
    $gender      = $_POST['gender'];
    $password   = $_POST['password'];
    $phone          = $_POST['phone'];
    $faculty        = $_POST['faculty'];
    $photo          = $_POST['photo']; 
    
    $sql = "INSERT INTO register (name, email, gender, password, phone, faculty, photo) 
            VALUES ('$name', '$email', '$gender', '$password', '$phone', '$faculty', '$chk')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New Record Inserted')</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

