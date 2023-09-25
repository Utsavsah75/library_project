<?php
include("conn.php");

// Escape variables to prevent SQL injection
$book_name     = mysqli_real_escape_string($conn, $_POST['book_name']);
$book_author   = mysqli_real_escape_string($conn, $_POST['book_author']);
$book_quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);

// $sql = "INSERT INTO add_book (`Id`, `Book Name`, `Author Name`, `Quantity`) VALUES ('$book_id', '$book_name', '$book_author', '$book_quantity')";
$sql = "INSERT INTO Books (`name`, `author`, `quantity`, `available`, `issued`) VALUES ('$book_name', '$book_author', '$book_quantity', '$book_quantity', '0')";

$res = mysqli_query($conn, $sql);
$last_added_book = mysqli_fetch_assoc(mysqli_query($conn, "select * from Books order by id desc limit 1"))['id'];
if ($res) {
    // echo "Added Successfully";
    $last_added_book = mysqli_fetch_assoc(mysqli_query($conn, "select * from Books order by id desc limit 1"))['id'];
    $id = intval($last_added_book);
    for ($i = 0; $i < $book_quantity; $i++) {
        $sql = "INSERT INTO Books_with_id (`book`) VALUES ($id)";
        $res = mysqli_query($conn, $sql);


        if ($res) {
            echo "Success";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        // Book added successfully, display a success message with SweetAlert
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';
    
        echo '<script type="text/javascript">
                $(function() {
                    Swal.fire({
                        title: "Add Book",
                        text: "Successfully!",
                        icon: "success"
                    }).then(function() {
                        // Redirect to the book_page.php page after displaying the message
                        window.location.href = "book_page.php";
                    });
                });
            </script>';
    }




    } else {
        // Failed to insert the record
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    

    
    ?>
    