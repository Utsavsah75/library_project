<?php
require 'conn.php';
// session_start();
// require 'check_admin.php';
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
    <!-- <link rel="stylesheet" type="text/css" href="header.css"> -->
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>

<body>

    <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div>
    <?php
    include 'user_header.php';
    ?>

    <!-- MENU SECTION END-->
    <div class="content-wra
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line1">
                        <h4 style="   font-weight: bold;color: #000000; display: inline;">Manage</h4>
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">author</h4>
                    </div>


                </div>
            </div>

            <!-- ***********************************Book list************************************-- -->
            <section class="booklist">
                <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-primary back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <?php
                            $total_books = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM books"));
                            echo '<h4>' . $total_books . '</h4>';
                            ?>

                            <!-- <h3><?php echo htmlentities($listdbooks); ?></h3> -->
                            Books Listed
                            <div class="footer1">
                                <a href="book_list.php"><button type="button" class="btn btn-primary">View Details</button></a>

                            </div>
                        </div>
                    </div>

                    <!-- ******************************************Books Not Returned Yet************************************ -->

                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                            <?php

                            $sql = mysqli_query($conn, "SELECT `std_name`,`BookName`, `isbnno`, `issue_date`,`returndate`
                          from issue_book join students on students.id=issue_book.studentcode inner join books on books.id=issue_book.book_id");
                            $returnedbooks = mysqli_num_rows($sql);
                            ?>
                            <h3><?php echo htmlentities($returnedbooks); ?></h3>
                            Books Not Returned Yet
                            <div class="footer1">
                                <a href="borrow_book.php"><button type="button" class="btn btn-warning">View Details</button></a>
                            </div>
                        </div>
                    </div>
            </section>

  