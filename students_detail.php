<?php
session_start();
include('conn.php');
// Fetch student code from URL parameter
$studentcode = $_GET['stdid'];
?>

<!DOCTYPE html>
<html>
<head>
    <link href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>
<body>
    <!-- MENU SECTION START-->
    <?php include 'admin_header.php'; ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <?php $studentcode = $_GET['stdid']; ?>
                    <div class="header-line">#<?php echo $studentcode; ?>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">BOOK ISSUED HISTORY</h4>
                    </div>
                </div>
            </div>
            <div class="row" style='margin-left:-6rem; margin-right:-7rem;'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                            Book Issued History
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Issued Book Name</th>
                                    <th>Issued Date</th>
                                    <th>Returned Date</th>
                                    <th>Fine (if any)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $studentcode = $_GET['stdid'];
                                $sql = "SELECT students.studentcode, students.std_name, books.bookname, issue_book.issue_date, issue_book.returndate, issue_book.fine FROM issue_book JOIN students ON students.studentcode = issue_book.studentcode JOIN books ON books.id = issue_book.book_id WHERE students.studentcode = '$studentcode'";
                                // $sql="SELECT tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as  rid,tblissuedbookdetails.fine from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId=:sid order by tblissuedbookdetails.id desc";
                               
                                // $sql = "SELECT students.studentcode, students.std_name, books.bookname, books.id, issue_book.issue_date, issue_book.returndate, issue_book.fine FROM issue_book JOIN students ON students.studentcode=issue_book.studentcode JOIN books ON books.id=issue_book.book_id"; // Corrected the column name issue_book.id to issue_book.book_id
                                $query = mysqli_query($conn, $sql);
                                $count = 1;
                                if ($query === false) {
                                    die("Error executing query: " . mysqli_error($conn));
                                }

                                if (mysqli_num_rows($query) > 0) {
                                    while ($result = mysqli_fetch_assoc($query)) {
                                        echo "<tr>
                                                <td>" . $count . "</td>
                                                <td>" . $result['studentcode'] . "</td>
                                                <td>" . $result['std_name'] . "</td>
                                                <td>" . $result['bookname'] . "</td>
                                                <td>" . $result['issue_date'] . "</td>
                                                <td class='center'>" . ($result['returndate'] == '' ? 'Not returned yet' : htmlentities($result['returndate'])) . "</td>
                                                <td class='center'>" . ($result['returndate'] == '' ? 'Not returned yet' : $result['fine']) . "</td>
                                            </tr>";
                                        $count++;
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
        });
    </script>
</body>
</html>
