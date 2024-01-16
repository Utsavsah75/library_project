<?php
session_start();
error_reporting(0);
include('conn.php');
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

    <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div>

    <!------MENU SECTION START-->
    <?php
    include 'admin_header.php';
    ?>

    </div>
    </div>
    </section><!-- MENU SECTION END-->
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">


                    <div class="header-line">
                        <h4 style="   font-weight: bold;color: #000000; display: inline;">Add</h4>
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">Category</h4>
                    </div>


                </div>

        </div>
          
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                           Categories Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        //<?php $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId";
//
                                        $sql = "SELECT * from books.BookName,bookcategory.CategoryName,bookauthor.AuthorName,books.isbnno,books.BookPrice,books.bookid,books.bookimg from  books join bookcategory on bookcategory.id=books.catid join bookauthor on bookauthor.id=books.author ";
                                        $result = mysqli_query($conn, $sql);
                                        $total = mysqli_num_rows($result);
                                        $sn = 1;
                                        if ($total > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>
                                                <td>" . $sn . "</td>
                                                <td>" . $row['BookName'] . "</td>
                                                <td>" . $row['isbnno'] . "</td>
                                                <td>" . $row['CategoryName'] . "</td>
                                                <td>" . $row['AuthorName'] . "</td>
                                                <td>" . $row['BookPrice'] . "</td>
                                                <td>
                                                <a href='edit_book.php?bookid=" . $row['bookid'] . "'><i class='fa fa-edit'></i></a>
                                                <a href='delete_book.php?bookid=" . $row['bookid'] . "'><i class='fa fa-trash'></i></a>
                                                </td>
                                                </tr>";
                                                $sn++;
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                        ?>

                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
