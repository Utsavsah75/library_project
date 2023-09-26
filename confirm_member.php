<?php
require 'conn.php';
if ($_GET['id'] && $_GET['action'] == 'delete') {
    $id = base64_decode($_GET['id']);
    $sql = "DELETE FROM students WHERE id='{$id}'";
    $res = mysqli_query($conn, $sql);
}
// header('location: dashboard.php');
header('location: all_member.php');
?>