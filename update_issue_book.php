<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['submit'])) {
    $Id       = mysqli_real_escape_string($conn, $_POST['book_id']);
    $issue   = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $due     = mysqli_real_escape_string($conn, $_POST['due_D']);

    $update_issue_book = "UPDATE `issue_book` SET `issue_date` = '$issue', `due_date` = '$due' WHERE `book_id` = '$Id'";
    $update_issue_book_run = mysqli_query($conn, $update_issue_book);

    if ($update_issue_book_run) {
        //Book update successfully, display a success message with SweetAlert
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';

        echo '<script type="text/javascript">
            $(function() {
                Swal.fire({
                    title: "Issue/Due Date Update",
                    text: "Successfully!",
                    icon: "success"
                }).then(function() {
                    //  Redirect to the book_page.php page after displaying the message
                    window.location.href = "issuebook_list.php";
                });
            });
        </script>';
    } else {
        // Failed to add the user
        echo "Failed to Update the Book.";
    }
}
