
<?php
include("conn.php");
var_dump($_POST);

// Escape variables to prevent SQL injection
$B_ID          = mysqli_real_escape_string($conn, $_POST['B_ID']);
$B_Name        = mysqli_real_escape_string($conn, $_POST['B_Name']);
$U_Name        = mysqli_real_escape_string($conn, $_POST['U_Name']);
$iss_D         = mysqli_real_escape_string($conn, $_POST['iss_D']);
$due_D         = mysqli_real_escape_string($conn, $_POST['due_D']);

$sql = "INSERT INTO issue_book (`Book_Id`, `Book_Name`, `User_Name`, `Issue_Date`, `Due_Date`) 
        VALUES ('$B_ID', '$B_Name', '$U_Name', '$iss_D', '$due_D')";
//  $sql = "update add_book set quantity=quantity-1 where Book_Name '$B_Name' ";


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
include("conn.php");
var_dump($_POST);

// Escape variables to prevent SQL injection
$B_ID          = mysqli_real_escape_string($conn, $_POST['B_ID']);
$B_Name        = mysqli_real_escape_string($conn, $_POST['B_Name']);
$U_Name        = mysqli_real_escape_string($conn, $_POST['U_Name']);
$iss_D         = mysqli_real_escape_string($conn, $_POST['iss_D']);
$due_D         = mysqli_real_escape_string($conn, $_POST['due_D']);

$sql = "INSERT INTO issue_book (`Book_Id`, `Book_Name`, `User_Name`, `Issue_Date`, `Due_Date`) 
        VALUES ('$B_ID', '$B_Name', '$U_Name', '$iss_D', '$due_D')";
// $sql = "update add_book set quantity=quantity-1 where Book_Name '$B_Name' ";

$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];

// Decrease the book quantity by 1
$sql = "UPDATE books SET quantity = quantity - 1 WHERE book_id = $book_id";
if ($conn->query($sql) === TRUE) {
    // Update the user's issued_books count
    $sql = "UPDATE add_book SET quantity=quantity-1 where Book_id '$B_id' ";
    if ($conn->query($sql) === TRUE) {
        echo "Book issued successfully!";
    } else {
        echo "Error updating user data: " . $conn->error;
    }
} 

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



