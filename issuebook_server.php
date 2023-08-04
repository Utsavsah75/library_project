<?php
require 'conn.php';

// Establish database connection
$conn = new mysqli("localhost", "root", "", "library");
// Check if the Book is Issue
if (isset($_POST['Issue'])) {
    // $ID       = $_POST['$ID'];
    // $B_ID     = $_POST['B_ID'];
    // $B_Name   = $_POST['$B_Name'];
    // $U_Name   = $_POST['U_Name'];
    // $Issue    = $_POST['iss_D'];
    // $Due      = $_POST['due_D'];
    // Escape variables to prevent SQL injection
    $B_ID   = mysqli_real_escape_string($conn, $_POST['B_ID']);
    $B_Name = mysqli_real_escape_string($conn, $_POST['$B_Name']);
    $U_Name   = mysqli_real_escape_string($conn, $_POST['U_Name']);
    $Issue  = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $Due = mysqli_real_escape_string($conn, $_POST['due_D']);

    $sql = "INSERT INTO issue_book (`Book ID`,`Book Name`, `User Name`, `Issue Date`, `Due Date`) 
            VALUES ('$B_ID','$B_Name', '$U_Name', '$Issue', '$Due')";
    $data = mysqli_query($conn, $sql);
    if ($data) {
        // Book added successfully, display alert message
        echo "Book added successfully!";
    } else {
        // Failed to add the book, display alert message
        echo "Failed to add the book.";
    }
}
