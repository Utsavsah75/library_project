<?php
session_start();
error_reporting(0);
include('conn.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Manage a</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Issued Books</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($_SESSION['error'] != "") { ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Error :</strong>
                            <?php echo htmlentities($_SESSION['error']); ?>
                            <?php echo htmlentities($_SESSION['error'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['msg'] != "") { ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['delmsg'] != "") { ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['delmsg']); ?>
                            <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Issued Books
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Book Name</th>
                                        <th>ISBN </th>
                                        <th>Issued Date</th>
                                        <th>Return Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //write a code to issue a book and store the issue data in book_issue table in mysqli take std_name, studentcode from students table and BookName,isbnno from books table and regdate, updationdate,id from issue_bookand desc id if bopk is issue display msg not return book yet.
                                    $sql = "SELECT students.StudentName, books.BookName, books.isbhno, issue_book.issue_date, issue_book.returndate, issue_book.id as rid FROM issue_book 
        JOIN students ON students.StudentCode = issue_book.StudentCode 
        JOIN books ON books.id = issue_book.id 
        ORDER BY issue_book.id DESC";

                                    $query = mysqli_query($conn, $sql);
                                    $total = mysqli_num_rows($query);
                                    $cnt = 1;

                                    if ($total != 0) {
                                        while ($result = mysqli_fetch_assoc($query)) {
                                            echo "<tr>
                <td>" . $cnt . "</td>
                <td>" . $result['StudentName'] . "</td>
                <td>" . $result['BookName'] . "</td>
                <td>" . $result['isbhno'] . "</td>
                <td>" . $result['issue_date'] . "</td>
                <td>";

                                            if ($result['returndate'] == NULL) {
                                                echo "<span style='color:red'>Not Return Yet</span>";
                                            } else {
                                                echo $result['returndate'];
                                            }

                                            echo "</td>
                <td>
                    <a href='update_issue_book.php?id=" . $result['rid'] . "'><button class='btn btn-primary'><i class='fa fa-edit'></i> Edit</button></a>
                    <a href='delete_issue_book.php?id=" . $result['rid'] . "'><button class='btn btn-danger'><i class='fa fa-pencil'></i> Delete</button></a>
                </td>
            </tr>";
                                            $cnt++;
                                        }
                                    } else {
                                        echo "<tr>
            <td colspan='7' style='text-align:center; color:red;'>No Record Found</td>
          </tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</body>

</html>