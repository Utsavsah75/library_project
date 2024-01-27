<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['submit'])) {
    $Id         = mysqli_real_escape_string($conn, $_POST['u_id']);
    $Name       = mysqli_real_escape_string($conn, $_POST['uname']);
    $Email      = mysqli_real_escape_string($conn, $_POST['email']);
    $Password   = mysqli_real_escape_string($conn, $_POST['password']);
    $Address    = mysqli_real_escape_string($conn, $_POST['address']);
    $Gender     = mysqli_real_escape_string($conn, $_POST['gender']);
    $Phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $Faculty    = mysqli_real_escape_string($conn, $_POST['faculty']);
    
    $std_code = bin2hex(random_bytes(4));
    $sql = "INSERT INTO `addnew_user`(`User ID`, `Name`, `Email`, `Gender`, `Phone`, `Address`, `Faculty`, `Password`,`verification_code`,`verified`) 
            VALUES ('$Id', '$Name', '$Email', '$Password','$Address', '$Gender', '$Phone', '$Faculty', '$std_code', 1)";
            
    $sql= "UPDATE `students` SET `id`='{$Id}',`name`='{$Name}',`email`='{$Email}',`gender`='{$Gender}',`password`='{$password}',`address`='{$Address}',`phone`='{$Phone}',`faculty`='{$Faculty}',`photo`='{$Photo}' , WHERE `Id` = $Id";


    $data = mysqli_query($conn, $sql);

    if ($data) {
        // User added successfully, display a success message with SweetAlert
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';
        
        echo '<script type="text/javascript">
                $(function() {
                    Swal.fire({
                        title: "Add",
                        text: "Successfully!",
                        icon: "success"
                    }).then(function() {
                        // Redirect to the add.php page after displaying the message
                        window.location.href = "add.php";
                    });
                });
            </script>';
    } else {
        // Failed to add the user
        echo "Failed to add the New User.";
    }
}
