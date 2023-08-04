
<?php
include("conn.php");
var_dump($_POST);

// Escape variables to prevent SQL injection
$B_ID          = mysqli_real_escape_string($conn, $_POST['B_ID']);
$B_Name        = mysqli_real_escape_string($conn, $_POST['B_Name']);
$U_Name        = mysqli_real_escape_string($conn, $_POST['U_Name']);
$iss_D         = mysqli_real_escape_string($conn, $_POST['iss_D']);
$due_D         = mysqli_real_escape_string($conn, $_POST['due_D']);

$sql = "INSERT INTO issue_book (`Book Id`, `Book Name`, `User Name`, `Issue Date`, `Due Date`) 
        VALUES ('$B_ID', '$B_Name', '$U_Name', '$iss_D', '$due_D')";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "Added Successfully";
    header("location: Issue.php");
    exit; // Always add an exit/die after a header redirect to prevent further execution of the script
} else {
    echo "Can't Add";
    header("location: Issue.php");
    exit; // Always add an exit/die after a header redirect to prevent further execution of the script
}
?>















<?php
// include("conn.php");
// var_dump($_POST);

// // Escape variables to prevent SQL injection
// $book_id       = mysqli_real_escape_string($conn, $_POST['book_id']);
// $book_name     = mysqli_real_escape_string($conn, $_POST['book_name']);
// $book_author   = mysqli_real_escape_string($conn, $_POST['book_author']);
// $book_quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);

// $sql = "INSERT INTO add_book (`Id`, `Book Name`, `Author Name`, `Quantity`) 
//             VALUES ('$book_id', '$book_name', '$book_author', '$book_quantity')";

// $data = mysqli_query($conn, $sql);

// if ($data) {
//     echo "Added Successfully";
//     header("location: book_page.php");
   
// } else {
//     echo "Can't Add";
//     header("location: book_page.php");
    
// }
// ?>
