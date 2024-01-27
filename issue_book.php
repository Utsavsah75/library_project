<?php
include('conn.php');
require('check_admin.php');

// Start a session if not already started
// session_start();

// Issue a book to a student
if (isset($_POST['issue'])) {
    $issued = 1;
    $studentcode = $_POST['studentid'];
    $book_isbn_no = $_POST['bookid'];


    // Fetch student information from the database
    $studentId = $_POST['studentid'];
    // $studentcode = $_POST['studentcode'];
    $studentQuery = "SELECT * FROM students WHERE studentcode = '$studentId'";
    $studentResult = mysqli_query($conn, $studentQuery);
    $studentData = mysqli_fetch_assoc($studentResult);

    // Fetch book information from the database
    $bookId = $_POST['bookid'];
    $bookQuery = "SELECT * FROM books WHERE isbnno = '$bookId'";
    $bookResult = mysqli_query($conn, $bookQuery);
    $bookData = mysqli_fetch_assoc($bookResult);

    // Check if student and book exist in the database
    if ($studentData && $bookData) {

        // Check if the book is already issued by the same student dont allow to issue the book.
        $checkQuery = "SELECT * FROM issue_book WHERE studentcode = '$studentId' AND book_id = '$bookId'";
        $checkResult = mysqli_query($conn, $checkQuery);
        $checkData = mysqli_fetch_assoc($checkResult);

        if ($checkData) {
            echo "<script>alert('Book already issued by the same student');</script>";
            exit();
        }

        // Insert the issued book into the issue_book table
        $issueQuery = "INSERT INTO issue_book (studentcode, book_id) VALUES ('$studentId', '$bookId')";
        $issueResult = mysqli_query($conn, $issueQuery);

        if ($issueResult) {
            echo "<script>alert('Book issued successfully');</script>";
        } else {
            echo "<script>alert('Book not issued');</script>";
        }

    }
}
// Redirect to the previous page or a specific page after processing
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
<script type="text/javascript">
function getstudent() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_student.php",
        data: 'studentid=' + $("#studentid").val(),
        type: "POST",
        success: function(data) {
            $("#get_student_name").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {}
    });
}

function getbook() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_book.php",
        data: 'bookid=' + $("#bookid").val(),
        type: "POST",
        success: function(data) {
            $("#get_book_name").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {}
    });
}
</script>

<body>

    <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div>

    <!------MENU SECTION START-->
    <?php include 'admin_header.php'; ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Issue a</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">new book</h4>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                            Issue a New book
                        </div>

                        <div class="panel-body">
                            <form role="form" method="post">

                                <div class="form-group">
                                    <label>Student id</label>
                                    <input class="form-control" type="text" name="studentid" id="studentid"  onBlur="getstudent()" autocomplete="off" required />
                                    <span id="get_student_name" style="font-size:16px;"></span>
                                </div>
                                    
                                    <div class="form-group">
                                        <label>ISBN Number or Book Title</label>
                                        <input class="form-control" type="text" name="bookid" id="bookid" onBlur="getbook()" required="required" />
                                        <span id="get_book_name" style="font-size:16px;"></span>
                                </div>

                                <button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>

</html>

