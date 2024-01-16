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

    <!-- MENU SECTION START-->
    <?php include 'admin_header.php'; ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold; color: #000000; display: inline;">Manage Issued</h4>
                        <h4 style="font-weight: bold; color: #2c7ad6; display: inline;">Books</h4>
                    </div>
                    <div class="row">
                        <?php if ($_SESSION['error'] != "") { ?>
                            <div class="col-md-6">
                                <div class="alert alert-danger">
                                    <strong>Error:</strong>
                                    <?php echo htmlentities($_SESSION['error']); ?>
                                    <?php echo htmlentities($_SESSION['error'] = ""); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($_SESSION['msg'] != "") { ?>
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    <strong>Success:</strong>
                                    <?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($_SESSION['delmsg'] != "") { ?>
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    <strong>Success:</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?>
                                    <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                            Issued Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Book Name</th>
                                            <th>ISBN</th>
                                            <th>Issued Date</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT students.name, books.book_name, books.isbn, 
                                                                    issue_book.issue_date, issue_book.due_date, issue_book.id as rid 
                                                                    FROM issue_book 
                                                                    JOIN students ON students.student_id = issue_book.student_id 
                                                                    JOIN books ON books.id = issue_book.book_id 
                                                                    WHERE issue_book.return_date = '' 
                                                                    ORDER BY issue_book.id DESC");

                                        if ($sql->num_rows > 0) {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $rid = $row['rid'];
                                                $student_name = $row['name'];
                                                $book_name = $row['book_name'];
                                                $isbn = $row['isbn'];
                                                $issue_date = $row['issue_date'];
                                                $due_date = $row['due_date'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $student_name; ?></td>
                                                    <td><?php echo $book_name; ?></td>
                                                    <td><?php echo $isbn; ?></td>
                                                    <td><?php echo $issue_date; ?></td>
                                                    <td><?php echo $due_date; ?></td>
                                                    <td>
                                                        <a href="return.php?rid=<?php echo $rid; ?>">Return Book</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
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
        </div>
    </div>
</body>

</html>
