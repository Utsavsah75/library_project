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
    <div class="content-wra
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
                           Authors Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Author</th>
                                         
                                            <th>Creation Date</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM bookauthor";
                                        $result = mysqli_query($conn, $sql);
                                        $total = mysqli_num_rows($result);
                                        if($total>0){
                                            $serial = 1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>".$serial."</td>";
                                                echo "<td>".$row['AuthorName']."</td>";
                                                echo "<td>".$row['creationDate']."</td>";
                                                echo "<td>".$row['UpdationDate']."</td>";
                                                echo "<td><a href='edit_author.php?id=".$row['author_id']."'><i class='fa fa-edit'></i></a> | <a href='delete_author.php?id=".$row['author_id']."'><i class='fa fa-trash'></i></a></td>";
                                                echo "</tr>";
                                                $serial++;
                                            }
                                        
                                        }
//edit category
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM bookauthor WHERE author_id='$id'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $author = $row['AuthorName'];
                                        }   
                                        // delete category
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            $sql = "DELETE FROM bookauthor WHERE author_id='$id'";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                echo "<script>alert('Author deleted successfully');</script>";
                                                echo "<script>window.location.href='manage_author.php';</script>";
                                            }else{
                                                echo "<script>alert('Author deletion failed');</script>";
                                                echo "<script>window.location.href='manage_author.php';</script>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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







