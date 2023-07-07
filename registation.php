<?php
session_start();
// Establish database connection
$conn = new mysqli("localhost", "root", "", "library");

if (isset($_POST['register'])) {
    $name       = $_POST['name'];
    $email         = $_POST['email'];
    $gender      = $_POST['gender'];
    $password   = $_POST['password'];
    $phone          = $_POST['phone'];
    $faculty        = $_POST['faculty'];
    $photo          = $_POST['photo']; // Assuming 'photo' is the name of the checkbox field
    $chk = "";
    foreach ($photo as $chk1) {
        $chk .= $chk1 . ",";
    }
    $sql = "INSERT INTO register (name, email, gender, password, phone, faculty, photo) 
            VALUES ('$name', '$email', '$gender', '$password', '$phone', '$faculty', '$chk')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New Record Inserted')</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!--<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
    <script type="text/javascript">
        $(function() {
            Swal.fire({
                'title': 'Register',
                'text': 'Successfully!',
                'type': 'success'
            });
        });
    </script>
</body>
</html> -->
