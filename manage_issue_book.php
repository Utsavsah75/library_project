<?php
session_start();
// error_reporting(0);
include('conn.php');
// Return book code.
if (isset($_POST['return'])) {
    $retid = intval($_GET['issid']);
    $fine = $_POST['fine'];
    $rstatus = 1; // Assuming 1 is the status for returned
    $bookid = $_POST['book_id']; // Corrected: use 'book_id' instead of 'bookid'

    // Update 'issue_book' table with return date and fine
    $returnbook = mysqli_query($conn, "UPDATE `issue_book` SET `returndate`=NOW(), `fine`='$fine', `retrunstatus`='$rstatus' WHERE `id`='$retid'");

    // Update 'books' table to set the book as available
    $updatebook = mysqli_query($conn, "UPDATE `books` SET `issued`=0 WHERE `id`='$bookid'");

    if ($returnbook && $updatebook) {
        $_SESSION['msg'] = "Book returned successfully";
        header('location: manage_issue_book.php');
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header('location: manage_issue_book.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>


    <link href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
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
                    </div>
                </div>
            </div>
            <div class="row" style='margin-left:-6rem; margin-right:-7rem;'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                            Issued Books
                        </div>
                        <div class="filter" style="margin-top:3.8rem;">
                            <form>
                                <label for="fromDate">From Date:</label>
                                <input type="date" id="fromDate" name="fromDate">
                                <label for="toDate">To Date:</label>
                                <input type="date" id="toDate" name="toDate">&nbsp;
                                <button type="button" id="applyFilter">Apply Filter</button>
                            </form>
                        </div>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                $sql = mysqli_query($conn, "SELECT `std_name`,`BookName`, `isbnno`, `issue_date`,`returndate` from issue_book join students on students.studentcode=issue_book.studentcode inner join books on books.isbnno=issue_book.book_id");
                                $result = mysqli_fetch_object($sql);
                                if ($sql->num_rows > 0) {
                                    $sn = 1;
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                        // $sn = $row['sn'];
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
                                                <a href="edit_issue_book.php?issid=<?= $sn ?>" <button class="btn btn-primary" style='height:34px; margin-top:-1px;'><i class="fa fa-edit"></i>Edit</a>
                                                <button type="submit" name="return" id="submit" class="btn btn-info" style='height:34px; margin-top:-1px;'>Return </button>
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
                                <div id="noDataMessage" style="display: none; color: red;">No data found</div>
                            </tbody>
                        </table>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable({
                columnDefs: [{
                    targets: [0, 0], // Column indexes of "Serial Number" and "Name"
                    orderable: true // Enable ordering for these columns
                }, {
                    targets: '_all', // All other columns
                    orderable: false // Disable ordering for other columns
                }]
            });
            // Add event listeners for date inputs
            $('#fromDate, #toDate').change(function() {
                var fromDate = $('#fromDate').val();
                var toDate = $('#toDate').val();

                table.draw();
            });
        });

        $(document).ready(function() {
            var table = $('#dataTables-example').DataTable();

            // Add event listener for date inputs
            $('#applyFilter').on('click', function() {
                var fromDate = $('#fromDate').val();
                var toDate = $('#toDate').val();

                table.draw();
            });

            // Add custom range filtering function
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var fromDate = $('#fromDate').val();
                    var toDate = $('#toDate').val();
                    var date = data[4]; // Assuming the date is in the fifth column

                    if ((fromDate === "" || toDate === "") ||
                        (fromDate <= date && toDate >= date)) {
                        return true;
                    }
                    return false;
                }
            );
        });
    </script>


</body>

</html>