<?php
include 'conn.php';
require 'check_admin.php';

// Adding the book to the database.

if (isset($_POST['add'])) {
    $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $isbnno = mysqli_real_escape_string($conn, $_POST['isbnno']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // File upload handling
    $bookpic = $_FILES['bookpic']['name'];
    $tmp_name = $_FILES['bookpic']['tmp_name'];
    $path = "uploads/$bookpic";

    if (move_uploaded_file($tmp_name, $path)) {
        // Insert into the database
        $sql = "INSERT INTO `books` (`BookName`, `catid`, `author`, `isbnno`, `bookprice`, `quantity`, `bookimg`) 
                VALUES ('$bookname', '$category', '$author', '$isbnno', '$price', '$quantity', '$bookpic')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Book added successfully')</script>";
            echo "<script>window.location.href='add_book.php'</script>";
        } else {
            echo "<script>alert('Book not added')</script>";
            echo "<script>window.location.href='add_book.php'</script>";
        }
    }
    // else 
    // {
    //     echo "<script>alert('Error uploading file')</script>";
    //     echo "<script>window.location.href='add_book.php'</script>";
    // }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Book_Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <!-- <link href="assets/css/font-awesome.css" rel="stylesheet" /> -->
    <!-- CUSTOM STYLE  -->
    <!-- <link href="assets/css/style.css" rel="stylesheet" /> -->
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="header.css">

    <link rel="stylesheet" type="text/css" href="book_pag.css">


    <script type="text/javascript">
        function checkisbnnoAvability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_avability.php",
                data: 'isbnno=' + $("#isbnno").val(),
                type: "POST",
                success: function(data) {
                    $("#isbnno-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>



    <script type="text/javascript">
        function checkbook() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_avability.php",
                data: 'bookname=' + $("#bookname").val(),
                type: "POST",
                success: function(data) {
                    $("#bookname-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

    <script type="text/javascript">
        function bookprice() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_avability.php",
                data: 'price=' + $("#price").val(),
                type: "POST",
                success: function(data) {
                    $("#price-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

</head>

<body>
    <!------MENU SECTION START-->
    <!-- <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div> -->
    <?php
    include 'admin_header.php';
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Add Book</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Book Info
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" enctype="multipart/form-data">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Name</label>
                                        <span id="bookname-avability-status" style="font-size:12px;"></span>
                                        <input class="form-control" type="text" name="bookname" id="bookname" autocomplete="off" onblur="checkbook()" required />
                                        <!-- <span id="bookname-avability-status" style="font-size:12px;"></span> -->

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Category</label>
                                        <select class="form-control" name="category" required="required">
                                            <option value=""> Select Category</option>
                                            <?php
                                            $Status = 1;
                                            $sql = "SELECT id, CategoryName FROM bookcategory";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['CategoryName'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No categories found</option>';
                                            }
                                            ?>
                                            <option value=""></option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Author</label>
                                        <select class="form-control" name="author" required="required">
                                            <option value=""> Select Author</option>
                                            <?php
                                            $Status = 1;
                                            $sql = "SELECT id, AuthorName FROM bookauthor";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['AuthorName'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No categories found</option>';
                                            }
                                            ?>

                                            <option value=""></option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ISBN Number</label>
                                        <span id="isbnno-avability-status" style="font-size:12px;"></span>
                                        <input class="form-control" type="text" name="isbnno" id="isbnno" required="required" autocomplete="off" onBlur="checkisbnnoAvability()" />
                                        <p class="help-block" style="font-size: 17px;">An ISBN Book Number Must be unique</p>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <span id="price-avability-status" style="font-size:12px;"></span>
                                        <input class="form-control" type="text" name="price" id="price" autocomplete="off" onblur="checkprice()" required="required" />

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input class="form-control" type="number" name="quantity" autocomplete="off" required="required" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Picture</label>
                                        <input class="form-control" type="file" name="bookpic" autocomplete="off" onblur="bookprice()" required="required" />
                                    </div>
                                </div>
                                <button type="submit" name="add" id="add" class="btn btn-info">Submit </button>
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

    <!-- --------------------------------------------------------------------------- -->




</body>

</html>