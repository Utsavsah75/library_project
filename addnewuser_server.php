<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['Save'])) {
    $Id         = mysqli_real_escape_string($conn, $_POST['u_id']);
    $Name       = mysqli_real_escape_string($conn, $_POST['uname']);
    $Email      = mysqli_real_escape_string($conn, $_POST['email']);
    $Password   = mysqli_real_escape_string($conn, $_POST['password']);
    $Address    = mysqli_real_escape_string($conn, $_POST['address']);
    $Gender     = mysqli_real_escape_string($conn, $_POST['gender']);
    $Phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $Faculty    = mysqli_real_escape_string($conn, $_POST['faculty']);
 
    $sql = "INSERT INTO addnew_user (User Id, Name, Email, Password, Address, Gender, Phone, Faculty) 
            VALUES ('$Id', '$Name', '$Email', '$Password', '$Address', '$Gender', '$Phone', '$Faculty')";

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
    
    