l<?php
session_start();

include('./conn.php');

if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['pwd'];

    $slq = "SELECT * FROM register WHERE `name` = '{$username}' AND `password` = '{$password}'";
    $res = mysqli_query($conn, $slq);

    // if we found data with the given username and password in the database
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['login_successful'] = $data['id'];        // session is set only if we found match
        header("location: userbook_page.php");
    } else {
        $_SESSION['msg'] = "Invalid Username / Password";
        header("location: index.php");
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