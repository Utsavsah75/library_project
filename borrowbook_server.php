<?php
require 'conn.php';
//if the user borrow one booke then it will be stored in the database and the book will be removed from the book table and display the alert message Book Already Exists.

if (isset($_POST['submit'])) {
    $B_id         = mysqli_real_escape_string($conn, $_POST['B_id']);
    $U_id     = mysqli_real_escape_string($conn, $_POST['U_id']);
    $name      = mysqli_real_escape_string($conn, $_POST['name']);
    $iss_D       = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $due_D       = mysqli_real_escape_string($conn, $_POST['due_D']);


    $sql = "INSERT INTO `issue_book` (`book_id`, `std_id`, `name`, `issue_date`, `due_date`) 
        VALUES ('$B_id', '$U_id', '$name', '$iss_D', '$due_D')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';

        echo '<script type="text/javascript">
                $(function() {
                    Swal.fire({
                        title: "Issue Book",
                        text: "Successfully!",
                        icon: "success"
                    }).then(function() {
                        // Redirect to the issue.php page after displaying the message
                        window.location.href = "issue.php";
                    });
                });
            </script>';
    } else {
        // Failed to insert or update the records
        echo "Error: " . mysqli_error($conn);
    }
}
