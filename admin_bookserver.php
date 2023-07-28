<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "library");

// Check if the form is saved
if (isset($_POST['Save'])) {
    $Id       = $_POST['book_id'];
    $Name     = $_POST['bname'];
    $Author   = $_POST['Aname'];
    $Quantity = $_POST['quantity'];
    
    // // Escape variables to prevent SQL injection
    // $Id       = mysqli_real_escape_string($conn, $Id);
    // $Name     = mysqli_real_escape_string($conn, $Name);
    // $Author   = mysqli_real_escape_string($conn, $Author);
    // $Quantity = mysqli_real_escape_string($conn, $Quantity);

    $sql = "INSERT INTO add_book (`Book Id`, `Book Name`, `Author Name`, `Quantity`) 
            VALUES ('$Id', '$Name', '$Author', '$Quantity')";

    $data = mysqli_query($conn, $sql);

    if ($data) {
        // Book added successfully, display alert message
        echo '<script type="text/javascript">
                alert("Book added successfully!");
              </script>';
    } else {
        // Failed to add the book, display alert message
        echo '<script type="text/javascript">
                alert("Failed to add the book.");
              </script>';
    }
}
?>

