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
   
} else {
    echo "Can't Add";
    header("location: book_page.php");
    
}


// Check if the form is Update
if (isset($_POST['Update'])) {
    $Id       = $_POST['book_id'];
    $Name     = $_POST['book_name'];
    $Author   = $_POST['book_author'];
    $Quantity = $_POST['book_quantity'];

    // Escape variables to prevent SQL injection
    $Id       = mysqli_real_escape_string($conn, $Id);
    $Name     = mysqli_real_escape_string($conn, $Name);
    $Author   = mysqli_real_escape_string($conn, $Author);
    $Quantity = mysqli_real_escape_string($conn, $Quantity);

    // Update the book in the database
    $sql = "UPDATE add_book SET `Id`='$Id', `Book Name`='$Name', `Author Name`='$Author', `Quantity`='$Quantity' 
            WHERE `Book Id`='$Id'";

    $data = mysqli_query($conn, $sql);

    if ($data) {
        // Book updated successfully, display alert message
        $_SESSION['message'] = "Book updated successfully";
        header("location: book_page.php");
        exit(0);
        
    } else {
        // Failed to update the book, display alert message
        $_SESSION['message'] = "Failed to update";
        header("location: book_page.php");
        exit(0);
        
    }

    // header("location: book_page.php");
    // exit(0);
    
} 
?>
<!----------------------------------Delete BOOKS--------------------- -->
<?php
if (isset($_POST['Delete'])) {
    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);

    // Delete the book from the database
    $sql = "DELETE FROM add_book WHERE `Id`='$book_id'";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        // Book deleted successfully, display alert message
        $_SESSION['message'] = "Book deleted successfully";
        header("location: book_page.php");
        exit(0);
    } else {
        // Failed to delete the book, display alert message
        $_SESSION['message'] = "Failed to delete the book";
        header("location: book_page.php");
        exit(0);
    }
}
?>


