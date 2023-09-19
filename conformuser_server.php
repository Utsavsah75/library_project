<?php
session_start();
require 'conn.php';

if (isset($_POST['register'])) {

    $Id         = mysqli_real_escape_string($conn, $_POST['u_id']);
    $Name       = mysqli_real_escape_string($conn, $_POST['name']);
    $Email      = mysqli_real_escape_string($conn, $_POST['email']);
    $Gender     = mysqli_real_escape_string($conn, $_POST['gender']);
    $Password   = mysqli_real_escape_string($conn, $_POST['password']);
    $Address    = mysqli_real_escape_string($conn, $_POST['address']);
    $Phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $Faculty    = mysqli_real_escape_string($conn, $_POST['faculty']);
    $Photo      = mysqli_real_escape_string($conn, $_POST['photo']);
     
    $sql = "INSERT INTO students(`id`, `name`, `email`, `gender`, `password`, `address`, `phone`, `faculty`, `photo`) 
            VALUES ('$Id', '$Name', '$Email', '$Password','$Address', '$Gender', '$Phone', '$Faculty', '$Photo')";
    
    $AlreadyExist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE email = '{$email}'"));
    if ($AlreadyExist) {
        $_SESSION['msg'] = "Account is already exist for email: <b>$email</b>";
        header("location: user_form.php");
    }


    // $sql = "INSERT INTO students (name, email, gender, password,address, phone, faculty, photo) 
    //         VALUES ('$name', '$email', '$gender', '$password', '$Address', '$phone', '$faculty', '$photo')";

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
        echo "Failed to Conform User.";
    }
}
