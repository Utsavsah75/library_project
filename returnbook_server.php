<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['submit'])) {
    $Book_Name   = mysqli_real_escape_string($conn, $_POST['B_name']);
    $User_Name    = mysqli_real_escape_string($conn, $_POST['Name']);
    $Faculty     = mysqli_real_escape_string($conn, $_POST['Faculty']);
    $Issue       = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $Due         = mysqli_real_escape_string($conn, $_POST['due_D']);
    $Return      = mysqli_real_escape_string($conn, $_POST['Returb_D']);
 
    $sql = "INSERT INTO `request_book`(`id`, `Book Name`, `User Name`, `Faculty`, `Issue Date`, `Due Date`, `Return Date`) 
            VALUES ('$Book_Name','$User_Name', '$Faculty', '$Issue','$Due','$Return')";
   
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
        echo "Failed To Return Book.";
    }
}
?>
