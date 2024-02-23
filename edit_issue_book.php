<?php
session_start();
include('conn.php');

// return book code.
if (isset($_POST['return'])) {
    $retid = intval($_GET['issid']);
    $fine = $_POST['fine'];
    $rstatus = 1;
    $bookid = $_POST['book_id']; // Corrected: use 'book_id' instead of 'bookid'

    // Update 'issue_book' table with return date and fine
    $returnbook = mysqli_query($conn, "UPDATE `issue_book` SET `returndate`=NOW(), `fine`='$fine', `retrunstatus`='$rstatus' WHERE `id`='$retid'");

    // Update 'books' table to set the book as available
    $updatebook = mysqli_query($conn, "UPDATE `books` SET `issued`=1 WHERE `id`='$bookid'");

    if ($returnbook && $updatebook) {
        $_SESSION['msg'] = "Book Returned successfully";
        header('location: manage_issue_book.php');
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header('location: manage_issue_book.php');
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>

<body>
    <div class="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div>
    <!-- MENU SECTION START-->
    <?php
    include 'admin_header.php';
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <?php $studentcode = $_GET['issid']; ?>
                    <div class="header-line">#<?php echo $studentcode; ?>
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Issue Book </h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;"> Detail</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info" style="margin-top: 12px; width: 50rem; margin-left: -8rem;">

                        <div class="panel-heading">
                            Issued Book Details
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <!-- ---------------------------------------------Student Details-------------------------------------- -->
                                <?php
                                if (isset($_GET['issid'])) {
                                    $studentcode = $_GET['issid'];
                                    $sql = "SELECT * FROM `students` WHERE `id`='$studentcode'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $student = mysqli_fetch_array($result);
                                ?>
                                        <input type="hidden" name="book_id" value="<?php echo !empty($student) ? htmlentities($student['id']) : ''; ?>">
                                        <h4>Student Details</h4>
                                        <hr />




                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student ID :</label>
                                                    <?php echo htmlentities($student['studentcode']); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Name :</label>
                                                    <?php echo htmlentities($student['std_name']); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Email Id :</label>
                                                    <?php echo htmlentities($student['email']); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Contact No :</label>
                                                    <?php echo htmlentities($student['phone']); ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php

                                    } else {
                                        echo "No data found";
                                    }
                                }
                                ?>

                                <!-- ---------------------------------------------Book Details-------------------------------------- -->

                                <?php
                                if (isset($_GET['issid'])) {
                                    $studentcode = $_GET['issid'];
                                    $sql = "SELECT * FROM `books` WHERE `id`='$studentcode'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $books = mysqli_fetch_array($result);
                                ?>
                                        <input type="hidden" name="book_id" value="<?php echo !empty($books) ? htmlentities($books['id']) : ''; ?>">
                                        <h4>book Details</h4>
                                        <hr />

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Book Image :</label>
                                            <img src="uploads/<?php echo htmlentities($books['bookimg']); ?>" width="120">

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Book Name :</label>
                                            <?php echo htmlentities($books['BookName']); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Book Issued Date :</label>
                                            <?php echo htmlentities($books['regdate']); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>ISBN :</label>
                                            <?php echo htmlentities($books['isbnno']); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Book Returned Date :</label>
                                            <?php if (isset($books['returndate']) && !empty($books['returndate'])) {
                                                echo htmlentities($books['returndate']);
                                            } else {
                                                echo "Not Return Yet";
                                            } 
                                        } else {
                                            echo "No data found";
                                        }
                                        }
                                        ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Fine :</label>
                                        <input class="form-control" type="text" name="fine" id="fine" required />
                                        <?php if (isset($books['fine']) && $booksfine == "") {
                                        } else {
                                            echo isset($books['fine']) ? htmlentities($books['fine']) : '';
                                        } ?>
                                    </div>
                                </div>
                                <button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>

</html>