<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['submit'])) {
    $Id       = mysqli_real_escape_string($conn, $_POST['book_id']);
    $Name     = mysqli_real_escape_string($conn, $_POST['book_name']);
    $Author   = mysqli_real_escape_string($conn, $_POST['book_author']);
    // $Quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);

    // $sql = "INSERT INTO add_book (`Book Id`, `Book Name`, `Author Name`, `Quantity`)  VALUES ('$Id', '$Name', '$Author', '$Quantity')";
    // $issued_quantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `issued` FROM `Books` WHERE `id` = $Id"))['issued'];
    // $availabe = $Quantity - $issued_quantity;
    $sql = "UPDATE `Books` set `name` = '{$Name}',`author` = '{$Author}' Where `id` = $Id";



    // $sql = "update add_book set  Quantity=Quantity-1 where Book Name=$_POST[booksname]";

    //    $sql = "DELETE FROM `add_book` WHERE `Id` = '$Id' AND `Book Name` = '$Name' AND `Author Name` = '$Author' AND `Quantity` = '$Quantity'";

    $data = mysqli_query($conn, $sql);

    if ($data) {
        //Book update successfully, display a success message with SweetAlert
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';

        echo '<script type="text/javascript">
            $(function() {
                Swal.fire({
                    title: "Book Update",
                    text: "Successfully!",
                    icon: "success"
                }).then(function() {
                    //  Redirect to the book_page.php page after displaying the message
                    window.location.href = "all_books.php";
                });
            });
        </script>';
    } else {
        // Failed to add the user
        echo "Failed to Update the Book.";
    }
}
