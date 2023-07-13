<?php
session_start();
// Establish database connection
$conn = new mysqli("localhost", "root", "", "library");

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $faculty = $_POST['faculty'];
    $photo = $_POST['photo'];

    $sql = "INSERT INTO register (name, email, gender, password, phone, faculty, photo) 
            VALUES ('$name', '$email', '$gender', '$password', '$phone', '$faculty', '$photo')";

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
