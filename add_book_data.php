<?php
include("conn.php");
var_dump($_POST);

// Escape variables to prevent SQL injection
$book_id       = mysqli_real_escape_string($conn, $_POST['book_id']);
$book_name     = mysqli_real_escape_string($conn, $_POST['book_name']);
$book_author   = mysqli_real_escape_string($conn, $_POST['book_author']);
$book_quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);

$sql = "INSERT INTO add_book (`Id`, `Book Name`, `Author Name`, `Quantity`) 
            VALUES ('$book_id', '$book_name', '$book_author', '$book_quantity')";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "Added Successfully";
    header("location: book_page.php");
    // Book added successfully, display alert message
    // echo '<script type="text/javascript">
    //             alert("Book added successfully!");
    //           </script>';
} else {
    echo "Can't Add";
    header("location: book_page.php");
    // Failed to add the book, display alert message
    // echo '<script type="text/javascript">
    //             alert("Failed to add the book.");
    //           </script>';
}
