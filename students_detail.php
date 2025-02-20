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
                                    <th>Student Code</th>
                                    <th>Student Name</th>
                                    <th>Issued Book Name</th>
                                    <th>Issued Date</th>
                                    <th>Returned Date</th>
                                    <th>Fine (if Any)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $studentcode = $_GET['stdid'];
                                $sql = "SELECT students.studentcode, students.std_name, books.BookName, issue_book.issue_date, 
                                issue_book.returndate,issue_book.fine FROM issue_book JOIN students ON 
                                issue_book.studentcode = issue_book.studentcode JOIN books ON books.id =issue_book.book_id;";
                                // $sql = "SELECT `id`, `studentcode`, `book_id`, `issue_date`, `returndate`, `retrunstatus`, `fine` FROM `issue_book` WHERE 1";
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
                                                <td>" . $result['book_id'] . "</td>
                                                <td>" . $result['id'] . "</td>
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
