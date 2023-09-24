<?php
require 'conn.php';

// Check if the Book is Issue
if (isset($_POST['Issue'])) {
    $B_id        = mysqli_real_escape_string($conn, $_POST['b_id']);
    $Book_id        = mysqli_real_escape_string($conn, $_POST['book_id']);
    $U_id        = mysqli_real_escape_string($conn, $_POST['U_id']);
    $iss_D         = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $due_D         = mysqli_real_escape_string($conn, $_POST['due_D']);

    // Insert the issue record
    $insertSQL = "INSERT INTO issue_book (`std_id`, `book_id`, `issue_date`, `due_date`) 
    VALUES ('$U_id', '$Book_id', '$iss_D', '$due_D')";

    // Update the book quantity
    $available = mysqli_fetch_assoc(mysqli_query($conn, "select * from Books where id = $B_id"))['available'] - 1;
    $updateSQL = "UPDATE `Books` SET `available` = '$available' WHERE `id`='$B_id'";

    $issued = mysqli_fetch_assoc(mysqli_query($conn, "select * from Books where id = $B_id"))['quantity'] - $available;
    $updateIssuedSQL = "UPDATE `Books` SET `issued` = '$issued' WHERE `id`='$B_id'";

    // Execute the queries
    $insert = mysqli_query($conn, $insertSQL);
    $update = mysqli_query($conn, $updateSQL);
    $updateIssued = mysqli_query($conn, $updateIssuedSQL);

    // update is issued book flag
    $updateIsIssued = mysqli_query($conn, "UPDATE `Books_with_id` SET `is_issued` = '1' WHERE `book_id`='$Book_id'");

    if ($insert && $update) {
        // User added successfully, display a success message with SweetAlert
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
