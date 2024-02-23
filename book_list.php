<?php
session_start();
include 'conn.php';
include 'user_header.php';
?>

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <div class="header-line1">
                    <h4 style="   font-weight: bold;color: #000000; display: inline;">Books</h4>
                    <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">List</h4>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                            <div class="panel-head">
                                Issued Books
                            </div>
                            <div class="panel-body">

                            <?php
                                        $sql = "SELECT `BookName`,`isbnno`, `CategoryName`, `AuthorName`,`bookprice`,`bookimg`from books join bookcategory on bookcategory.id=books.catid inner join bookauthor on bookauthor.id=books.author";
                                        $result = mysqli_query($conn, $sql);
                                        $sn = 1;
                                        while ($row = mysqli_fetch_array($result)) 

                                                                    {?>
                                                                <div class="col-md-3" style="float:left; height:300px;">   

                                                                <img src="uploads/<?php echo isset($row['bookimg']) ? htmlentities($row['bookimg']) : ''; ?>" width="120"><br />
                                                                    <b>Book Name. :</b><?php echo isset($row['BookName']) ? htmlentities($row['BookName']) : ''; ?></b><br />
                                                                    <b>ISBN No. :</b> <?php echo isset($row['isbnno']) ? htmlentities($row['isbnno']) : ''; ?><br />
                                                                    <b>Category :</b> <?php echo isset($row['CategoryName']) ? htmlentities($row['CategoryName']) : ''; ?><br />




                                                                    <?php if(is_object($row) && $row->issued==1){?>
                                                                        <p style="color:red;">Book Already issued</p>
                                                                    <?php } ?>
                                                            </div>
                                                            <?php } ?>















                                                            


