<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['submit'])) {
    $Id       = mysqli_real_escape_string($conn, $_POST['book_id']);
    $Name     = mysqli_real_escape_string($conn, $_POST['book_name']);
    $Author   = mysqli_real_escape_string($conn, $_POST['book_author']);
    $Quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);

    $sql = "INSERT INTO add_book (`Book Id`, `Book Name`, `Author Name`, `Quantity`) 
            VALUES ('$Id', '$Name', '$Author', '$Quantity')";


    $sql = "UPDATE `add_book` set `Book Name` = '{$Name}',`Author Name` = '{$Author}',`Quantity` = '{$Quantity}'Where `Id` = $Id";


//    $sql = "DELETE FROM `add_book` WHERE `Book Id` = '$Id' AND `Book Name` = '$Name' AND `Author Name` = '$Author' AND `Quantity` = '$Quantity'";


    $data = mysqli_query($conn, $sql);
    if ($data) {
        // Book added successfully, display alert message
        $_SESSION['msg'];
        header('location: book_page.php');
    } else {
        // Failed to add the book, display alert message
        $_SESSION['msg'] = "Failed to add the book.";
        header('location: book_page.php');
    }
}
?>