<?php
session_start();

include('./conn.php');

// var_dump($_POST);
// die();

if (isset($_POST['login'])) {
    $AdminName = $_POST['name'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM admin_login WHERE `Email` = '{$AdminName}' AND `Password` = '{$password}'";
    $res = mysqli_query($conn, $sql);

    // if we found data with the given AdminName and password in the database
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['AdminLogin_successful'] = $data['Id'];        // session is set only if we found match
        header("location: book_page.php");
    } else {
        $_SESSION['AdminLoginError'] = "Invalid AdminName / Password";
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