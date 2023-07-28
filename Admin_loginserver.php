<?php
session_start();
// Establish database connection
$conn = new mysqli("localhost", "root", "", "library");

if (isset($_POST['register'])) {
    $Name       = $_POST['name'];
    $Email         = $_POST['email'];
    $Gender      = $_POST['gender'];
    $Contact_no   = $_POST['phone'];
    $Address        = $_POST['address'];
    $Password          = $_POST['password']; 
    
    $sql = "INSERT INTO admin_login (Name, Email, Gender, Contact_no, Address, Password) 
            VALUES ('$Name', '$Email', '$Gender', '$Contact_no', '$Address', '$Password')";

    if (mysqli_query($conn, $sql)) {
        echo "register sucessfully";
        echo "<script>alert('New Record Inserted')</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

