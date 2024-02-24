<?php
if ($_GET['Id'] && $_GET['action'] == 'Delete') {
    $id = base64_decode($_GET['id']);
    $sql = "DELETE FROM books WHERE Book Id = '{$Id}'";
    $res = mysqli_query($conn, $sql);
}
header('location: dashboard.php');
?>
<?php
session_start();
// error_reporting(0);
include('conn.php');

// Delete the Book.
if (isset($_GET['delbook'])) {
    $delbook = $_GET['delbook'];
    $delbooksql = "DELETE FROM `books` WHERE id = $delbook";
    $delbook = mysqli_query($conn, $delbooksql);
    if ($delbook) {
        $_SESSION['delbook'] = "Book deleted successfully at Number $delbook";
    } else {
        $_SESSION['delbook'] = "Book not deleted";
    }
    header('location: manage_book.php');
    exit(); // Add exit to prevent further execution
}
?>