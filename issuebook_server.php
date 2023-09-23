<?php
require 'conn.php';

// Check if the Book is Issue
if (isset($_POST['Issue'])) {
    
    // Escape variables to prevent SQL injection
    // $U_Name  = mysqli_real_escape_string($conn, $_POST['$U_Name']);
    // $B_ID          = mysqli_real_escape_string($conn, $_POST['Id']);
    $B_Name        = mysqli_real_escape_string($conn, $_POST['B_Name']);
    $U_Name        = mysqli_real_escape_string($conn, $_POST['U_Name']);
    $Faculty        = mysqli_real_escape_string($conn, $_POST['faculty']);
    $quantity        = mysqli_real_escape_string($conn, $_POST['quantity']);
    $iss_D         = mysqli_real_escape_string($conn, $_POST['iss_D']);
    $due_D         = mysqli_real_escape_string($conn, $_POST['due_D']);
 
    $sql = "INSERT INTO issue_book (`Book_Id`, `Book_Name`, `User_Name`, `Issue_Date`, `Due_Date`, `Faculty`) 
    VALUES ('$B_Name', '$U_Name', '$Faculty','$quantity', '$iss_D', '$due_D')";
                             
    $data = mysqli_query($conn, $sql);

    if ($data) {
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
                        // Redirect to the add.php page after displaying the message
                        window.location.href = "issue.php";
                    });
                });
            </script>';
    } else {
        // Failed to add the user
        echo "Entire Book ID No Found !!!.";
    }
}
?>

