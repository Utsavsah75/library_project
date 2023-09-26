<?php
include("conn.php");
// Escape variables to prevent SQL injection
// $User_id      = mysqli_real_escape_string($conn, $_POST['u_id']);
$uname        = mysqli_real_escape_string($conn, $_POST['uname']);
$email        = mysqli_real_escape_string($conn, $_POST['email']);
$password     = mysqli_real_escape_string($conn, $_POST['password']);
$gender       = mysqli_real_escape_string($conn, $_POST['gender']);
$phone   = mysqli_real_escape_string($conn, $_POST['phone']);
$faculty      = mysqli_real_escape_string($conn, $_POST['faculty']);
$address      = mysqli_real_escape_string($conn, $_POST['address']);
$photo      = $_FILES['photo']['name'];;
$temp_name = $_FILES['photo']['tmp_name'];
move_uploaded_file($temp_name, "uploads/$photo");
$sql = "INSERT INTO `students` (`std_name`, `email`, `gender`, `password`, `address`, `phone`, `faculty`, `photo`, `verified`) 
            VALUES ('$uname', '$email', '$gender', '$password', '$address', '$phone', '$faculty','$photo', 1)";

$data = mysqli_query($conn, $sql);

if ($data) {
    // User added successfully, display a success message with SweetAlert
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';

    echo '<script type="text/javascript">
            $(function() {
                Swal.fire({
                    title: "New Student Added",
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
    echo "Failed To Add Student.";
}
?>


         <!--  <div id="down">
            <h3>Stay Connected</h3>
             <a href="#" class="fa fa-facebook" style="text-decoration: none; padding: 10px 12px;color: white; "></a>
             <a href="#" class="fa fa-twitter" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
             <a href="#" class="fa fa-google" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
             <a href="#" class="fa fa-linkedin" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
             <a href="#" class="fa fa-youtube" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
             <a href="#" class="fa fa-instagram" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
         </div> -->

    