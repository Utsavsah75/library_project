<?php

session_start();
require 'conn.php';

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $Address = $_POST['address'];
    $faculty = $_POST['faculty'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];

    $AlreadyExist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE email = '{$email}'"));

    if ($AlreadyExist) {
        $_SESSION['msg'] = "Account is already exist for email: <b>$email</b>";
        header("location: user_form.php");
    }

    $sql = "INSERT INTO students (`std_name`, `email`, `gender`, `password`,`address`, `phone`, `faculty`, `photo`, `verified`) 
            VALUES ('$name', '$email', '$gender', '$password', '$Address', '$phone', '$faculty', '$photo', 0)";

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
        header("location: user_form.php");
    }
}
