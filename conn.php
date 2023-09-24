<?php
$conn = mysqli_connect("localhost", "root", "", "library");
if (!$conn) {
    die("can not connect to database --> " . mysqli_connect_error());
    exit;
}
