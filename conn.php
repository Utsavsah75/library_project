<?php
//connection to database
$conn = mysqli_connect("localhost", "root", "", "library_project");
if (!$conn) {
    die("can not connect to database --> " . mysqli_connect_error());
}
 ?>