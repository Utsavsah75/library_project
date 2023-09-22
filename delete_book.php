<?php
if ($_GET['Id'] && $_GET['action'] == 'Delete') {
    $id = base64_decode($_GET['id']);
    $sql = "DELETE FROM add_book WHERE Book Id = '{$Id}'";
    $res = mysqli_query($conn, $sql);
}
header('location: dashboard.php');
