<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['submit'])) {
    $book_id       = mysqli_real_escape_string($conn, $_POST['book_id']);
    $std_id         = mysqli_real_escape_string($conn, $_POST['std_id']);
    $Issue       = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $Due         = mysqli_real_escape_string($conn, $_POST['due_D']);
    $Return      = mysqli_real_escape_string($conn, $_POST['Return_D']);

    $data = mysqli_query($conn, "DELETE FROM `issue_book` WHERE `book_id`='$book_id' AND `std_id`='$std_id' AND `issue_date`='$Issue' AND `due_date`='$Due'");
    $books = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `Books_with_id` INNER JOIN Books ON Books_with_id.book = Books.id WHERE `book_id`='$book_id'"));
    $books_id = $books['book'];
    $available = $books['available'] + 1;
    $issued = $books['issued'] - 1;
    $update_availabe = mysqli_query($conn, "UPDATE `Books` SET `available`= $available, `issued` = $issued WHERE `id`='$books_id'");
    $update_books_with_id = mysqli_query($conn, "UPDATE `Books_with_id` SET `is_issued`=0 WHERE `book_id`='$book_id'");

    if ($data) {
        // User added successfully, display a success message with SweetAlert
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';

        echo '<script type="text/javascript">
                $(function() {
                    Swal.fire({
                        title: "Book Returned",
                        text: "Successfully!",
                        icon: "success"
                    }).then(function() {
                        // Redirect to the add.php page after displaying the message
                        window.location.href = "add.php";
                    });
                });
            </script>';
    } else {
        // Failed to add the user
        echo "Failed To Return Book.";
    }
}
