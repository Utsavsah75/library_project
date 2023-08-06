<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is submitted
if (isset($_POST['Delete'])) {
    $Id       = mysqli_real_escape_string($conn, $_POST['book_id']);
    $Name     = mysqli_real_escape_string($conn, $_POST['book_name']);
    $Author   = mysqli_real_escape_string($conn, $_POST['book_author']);
    $Quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);

    $sql = "DELETE FROM `add_book` WHERE `Book Id` = '$Id' AND `Book Name` = '$Name' AND `Author Name` = '$Author' AND `Quantity` = '$Quantity'";

    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';
        
        echo '<script type="text/javascript">
                $(function() {
                    Swal.fire({
                        title: "Register",
                        text: "Successfully!",
                        icon: "success"
                    });
                });
            </script>';
    } else {
        echo "Failed";
    }