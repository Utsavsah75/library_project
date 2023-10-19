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
 
    $sql = "INSERT INTO `addnew_user`(`User ID`, `Name`, `Email`, `Gender`, `Phone`, `Address`, `Faculty`, `Password`) 
            VALUES ('$Id', '$Name', '$Email', '$Password','$Address', '$Gender', '$Phone', '$Faculty')";
            
    $sql= "UPDATE `students` SET `id`='{$Id}',`name`='{$Name}',`email`='{$Email}',`gender`='{$Gender}',`password`='{$password}',`address`='{$Address}',`phone`='{$Phone}',`faculty`='{$Faculty}',`photo`='{$Photo}' , WHERE `Id` = $Id";

    // UPDATE `students` SET `id`='[value-1]',`name`='[value-2]',`email`='[value-3]',`gender`='[value-4]',`password`='[value-5]',`address`='[value-6]',`phone`='[value-7]',`faculty`='[value-8]',`photo`='[value-9]',`verified`='[value-10]' WHERE 1

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
