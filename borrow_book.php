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
                    <h4 style="   font-weight: bold;color: #000000; display: inline;">Manage Issued</h4>
                    <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">Books</h4>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                            <div class="panel-head">
                                Borrowed Books
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                    $sql = mysqli_query($conn, "SELECT `std_name`,`BookName`, `isbnno`, `issue_date`,`returndate`
                                                from issue_book join students on students.id=issue_book.std_id inner join books on books.id=issue_book.book_id");

                                        if ($sql->num_rows > 0) {
                                            $sn = 1;
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // $rid = $row['id'];
                                                $student_name = $row['std_name'];
                                                $book_name = $row['BookName'];
                                                $isbnno = $row['isbnno'];
                                                $issue_date = $row['issue_date'];
                                                $returndate = $row['returndate'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $sn; ?></td>
                                                    <td><?php echo $student_name; ?></td>
                                                    <td><?php echo $book_name; ?></td>
                                                    <td><?php echo $isbnno; ?></td>
                                                    <td><?php echo $issue_date; ?></td>
                                                    <td <?php echo $returndate == "" ? 'style="color:red;"' : ''; ?>>
                                                        <?php echo $returndate == "" ? "Not Return Yet" : $returndate; ?>
                                                    <td>
                                                        <a href="edit_issue_book.php?issid" <button class="btn btn-primary" style='height:34px; margin-top:-14px;'><i class="fa fa-edit"></i>Edit</a>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php
                                                $sn++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="7">No books issued yet</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                       
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
    </div>
    </section>      <!-- FOOTER SECTION END-->
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
