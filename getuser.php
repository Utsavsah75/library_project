<?php
include("conn.php");
$sql = "SELECT * FROM `students` WHERE `id` = {$_GET['id']}";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);
echo json_encode($data);
?>