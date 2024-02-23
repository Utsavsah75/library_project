<?php
session_start();
// error_reporting(0);
include('conn.php');

// Code for blocking a student using PHP and MySQLi
if (isset($_GET['inactive'])) {
    $id = $_GET['inactive'];
    $status = 0;
    $sql = "UPDATE students SET verified='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['msg'] = "Student status blocked successfully at the id $id !!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }
    header("Location: reg_students.php");
    exit(); // Terminate script execution after redirecting
}

// Code for activating a student.
if (isset($_GET['active'])) {
    $id = $_GET['active'];
    $status = 1;
    $sql = "UPDATE students SET verified='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['msg'] = "Student status activated successfully at  id $id !!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }
    header("Location: reg_students.php");
    exit(); // Terminate script execution after redirecting
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css" rel="stylesheet">
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
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Manage</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">REG Student</h4>
                    </div>
                    <h4><a href="user_form.php" class="btn btn-danger pull-center" style="margin-left: 61rem; margin-top: -8rem;"><i class="fa fa-plus"></i> Add User</a></h4>
                </div>
                <div class="row">
                    <?php 
                    // Display success message for blocking or activating student
                    if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
                    ?>
                    <div class="col-md-6">
                        <div class="alert alert-success" style="margin-top: -94px;">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    // Display error message if any
                    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
                    ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger" style="margin-top: -94px;">>
                            <strong>Error :</strong>
                            <?php echo htmlentities($_SESSION['error']); ?>
                            <?php echo htmlentities($_SESSION['error'] = ""); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default" style="margin-top: -42px; width: 85rem; margin-left: -7rem;">
                            <div class="panel-head">
                                Registered Student
                            </div>
                            <div class="filter" style="margin-left: 18rem; position:absolute;">
                                <label for="fromDate">From Date:</label>
                                <input type="date" id="fromDate" name="fromDate">&nbsp;
                                <label for="toDate">To Date:</label>
                                <input type="date" id="toDate" name="toDate">&nbsp;
                                <button type="button" id="applyFilter">Apply Filter</button>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Std CODE</th>
                                                <th>Student Name</th>
                                                <th>Email id </th>
                                                <th>Mobile Number</th>
                                                <th>Reg Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM students";
                                            $result = mysqli_query($conn, $sql);
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['studentcode']; ?></td>
                                                <td><?php echo $row['std_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['regdate']; ?></td>
                                                <td>
                                                    <?php echo $row['verified'] == 1 ? "Active" : "Blocked"; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['verified'] == 1) { ?>
                                                    <a href="reg_students.php?inactive=<?php echo htmlentities($row['id']); ?>" onclick="return confirm('Are you sure you want to block this student?');">
                                                        <button class="btn btn-danger" style='height:34px; margin-top:4px;'>Block</button>
                                                    </a>
                                                    <?php } else { ?>
                                                    <a href="reg_students.php?active=<?php echo htmlentities($row['id']); ?>" onclick="return confirm('Are you sure you want to activate this student?');">
                                                        <button class="btn btn-primary" style='height:34px; margin-top:4px;'>Activate</button>
                                                    </a>
                                                    <?php } ?>
                                                    <a href="students_detail.php?stdid=<?php echo htmlentities($row['std_name']); ?>">
                                                        <button class="btn btn-success" style='height:34px; margin-top:4px;'>Details</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $cnt++;
                                            } ?>
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
        <?php // include 'footer.html'; ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>

        <!-- Script for DataTables initialization and custom filtering -->
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
                // Initialize DataTables
                var table = $('#dataTables-example').DataTable();

                // Add event listener for apply filter button
                $('#applyFilter').on('click', function() {
                    // Get the selected dates
                    var fromDate = $('#fromDate').val();
                    var toDate = $('#toDate').val();
                    table.draw();
                });

                // Add custom range filtering function
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        // Get the selected dates
                        var fromDate = $('#fromDate').val();
                        var toDate = $('#toDate').val();
                        // Convert dates to timestamp for comparison
                        var fromTimestamp = new Date(fromDate).getTime();
                        var toTimestamp = new Date(toDate).getTime();
                        var date = new Date(data[5]); // Assuming the date is in the sixth column

                        // Check if the date falls within the selected range
                        if ((fromDate === "" || toDate === "") || (date >= fromTimestamp && date <= toTimestamp)) {
                            return true;
                        }
                        return false;
                    }
                );

                // Add event listener for date inputs
                $('#fromDate, #toDate').change(function() {
                    // Redraw the DataTable when date inputs change
                    table.draw();
                });
            });
        </script>
</body>
</html>
