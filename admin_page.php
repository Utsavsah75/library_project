<?php
session_start();

include('./conn.php');

// var_dump($_POST);
// die();

if (isset($_POST['login'])) {
    $Email = $_POST['email'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM admin_login WHERE `Email` = '{$Email}' AND `Password` = '{$password}'";
    $res = mysqli_query($conn, $sql);

    // if we found data with the given AdminName and password in the database
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['AdminLogin_successful'] = $data['Id'];        // session is set only if we found match
        header("location: dashboard.php");
    } else {
        $_SESSION['AdminLoginError'] = "Invalid Email / Password";
        header("location: Admin.php");
    }
}
?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
</body>
</html>