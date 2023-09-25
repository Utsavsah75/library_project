<?php
session_start();
// Establish database connection
$conn = new mysqli("localhost", "root", "", "library_project");

if (isset($_POST['register'])) {
    $Name        = $_POST['name'];
    $Email       = $_POST['email'];
    $Gender      = $_POST['gender'];
    $Contact_no  = $_POST['phone'];
    $Address     = $_POST['address'];
    $Password    = $_POST['password']; 
    
    $sql = "INSERT INTO `admin_login`(`name`, `address`, `contact`, `gender`, `email`, `password`) 
            VALUES ('$Name', '$Address', '$Contact_no', '$Gender', '$Email', '$Password')";

  
$data = mysqli_query($conn, $sql);

if ($data) {
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';
    
    echo '<script type="text/javascript">
            $(function() {
                Swal.fire({
                    title: "Register",
                    text: "Successfully!",
                    icon: "success"
                });
            });
        </script>';
} else {
    echo "Failed";
}
}
?>

