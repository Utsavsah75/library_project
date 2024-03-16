<?php
require 'conn.php';
// include('includes/config.php');

require 'check_admin.php';
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

    <!-- <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div> -->
    <?php
    include 'admin_header.php';
    ?>
     <div class="header-line"><div="logo" >
        <img src="logo1.png" alt="logo" style="width: 60px; height: 40px; margin-left: 35px;">
    
                        <h4 style="font-weight: bold; color: #000000; display: inline; margin-left: -8px;">Admin</h4>
                        <h4 style="font-weight: bold; color: #2c7ad6; display: inline;">Dashboard</h4>
                    </div>
 </div>
    <!---*****************Total Book --1--**********************-->
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
                        <a href="manage_book.php"><button type="button" class="btn btn-primary">View Details</button></a>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!---*****************Total User --2--**********************-->
    <section class="detail">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6"">
        <div class=" alert alert-info back-widget-set text-center">
                <i class="fa fa-users fa-5x"></i>
                <?php
                $total_users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));
                echo '<h4>' . $total_users . '</h4>';
                ?>
                Users Listed
                <div class="footer1">
                    <a href="reg_students.php"><button type="button" class="btn btn-info">View Details</button></a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!---*****************Total Return --4--**********************-->


    <!---*****************Total issue --3--**********************-->
    <section class="issue">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-success back-widget-set text-center">
                    <i class="fa fa-book fa-5x"></i>
                    <?php
                    $sql = "SELECT * FROM issue_book";
                    $res = mysqli_query($conn, $sql);

                    if ($total_issue = mysqli_num_rows($res)) {
                        echo '<h4>' . $total_issue . '</h4>';
                    } else {
                        echo '<h4>0</h4>';
                    }
                    ?>
                    Books Issued
                    <div class="footer1">
                        <a href="manage_issue_book.php"><button type="button" class="btn btn-success">View Details</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---*****************Total Author --4--**********************-->
    <section class=author>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-danger back-widget-set text-center">
                    <i class="fa fa-book fa-5x"></i>
                    <?php
                    $total_author = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookauthor"));
                    echo '<h4>' . $total_author . '</h4>';
                    ?>
                    <!-- <h3><?php echo htmlentities($listdbooks); ?></h3> -->
                    Authors Listed
                    <div class="footer1">
                        <a href="manage_author.php"><button type="button" class="btn btn-danger">View Details</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---*****************Total Category --5--**********************-->
    <section class="category">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-warning back-widget-set text-center">
                    <i class="fa fa-book fa-5x"></i>
                    <?php
                    $total_category = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookcategory"));
                    echo '<h4>' . $total_category . '</h4>';
                    ?>
                    <!-- <h3><?php echo htmlentities($listdbooks); ?></h3> -->
                    Categories Listed
                    <div class="footer1">
                        <a href="manage_category.php"><button type="button" class="btn btn-warning">View Details</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---*****************Total fine collection sum --6--**********************-->
    <section class="fine">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-secondary back-widget-set text-center">
                    <i class="fa fa-book fa-5x"></i>
                    <?php
                    $total_fine = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(fine) as fine FROM issue_book"));
                    echo '<h4>' . $total_fine['fine'] . '</h4>';
                    ?>
                    <!-- <h3><?php echo htmlentities($listdbooks); ?></h3> -->
                    Total Fine Collection

                </div>
            </div>
        </div>  
     