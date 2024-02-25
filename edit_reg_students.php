<?php
include 'conn.php';

//cpde to edit the registered students.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $status = $_POST['status'];
    $sql = "UPDATE `students` SET `StudentName`='$name',`StudentEmail`='$email',`StudentContact`='$contactno',`Status`='$status' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student details updated successfully');</script>";
        echo "<script>window.location.href='manage_reg_students.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='manage_reg_students.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Book_Management</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" type="text/css" href="header.css">
            <link rel="stylesheet" type="text/css" href="book_pag.css">
    </head>
    <body>
        <!-- <div class="video-background">
            <video autoplay muted loop id="video-background">
                <source src="LB.mp4" type="video/mp4">
            </video>
        </div> -->
        <!-- MENU SECTION START-->
        <?php
        include 'admin_header.php';
        ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
        <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">#<?php echo $sid;?> Book Issued History</h4>

                    <h4 style="font-weight: bold;color: #000000; display: inline;">Edit Regi</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Category</h4>
                    </div>
                </div>   
        </div>
    </body>