<?php
session_start();
// error_reporting(0);
include('conn.php');

// Delete the Author.
if (isset($_GET['delaut'])) {
    $delaut = $_GET['delaut'];
    $delautsql = "DELETE FROM `bookauthor` WHERE id = $delaut";
    $delautres = mysqli_query($conn, $delautsql);
    if ($delautres) {
        $_SESSION['delaut'] = "Author deleted successfully at Number $delaut";
    } else {
        $_SESSION['delaut'] = "Author not deleted";
    }
    header('location: manage_author.php');
    exit(); // Add exit to prevent further execution
}
?>
<!-- ---------------------------------------------------------------------------------------------------------- -->
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

    <!------MENU SECTION START-->
    <?php
    include 'admin_header.php';
    ?>

    <!-- MENU SECTION END-->
    <div class="content-wra
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="   font-weight: bold;color: #000000; display: inline;">Manage</h4>
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">author</h4>
                    </div>


                </div>
            </div>
            <div class="row">

                <!-- --------------------------------------------------------------------------------------- -->
                <?php
                if (isset($_SESSION['error']) && $_SESSION['error'] !== "") {
                ?> <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Error :</strong>
                            <?php echo htmlentities($_SESSION['error']); ?>
                            <?php echo htmlentities($_SESSION['error'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>


                <?php
                if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
                ?>
                <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if (isset($_SESSION['updatemsg']) && $_SESSION['updatemsg'] != "") {
                ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['updatemsg']); ?>
                            <?php echo htmlentities($_SESSION['updatemsg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>

                <?php
                if (isset($_SESSION['unupdatemsg']) && $_SESSION['unupdatemsg'] != "") {
                ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['unupdatemsg']); ?>
                            <?php echo htmlentities($_SESSION['unupdatemsg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>





                <?php if (isset($_SESSION['delaut']) && $_SESSION['delaut'] != "") { ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['delaut']); ?>
                            <?php echo htmlentities($_SESSION['delaut'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- ---------------------------------------------------------------------------------------------------------- -->
            </div>

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
                                    $serial = 1;

                                    if ($total > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                                <td>" . $serial . "</td>
                                                <td>" . $row['AuthorName'] . "</td> 
                                                <td>" . $row['creationDate'] . "</td>
                                                <td>" . $row['UpdationDate'] . "</td>
                                                <td>
                                                
                                                <a href = 'edit_author.php?autid=" . htmlentities($row['id']) . "'><button class='btn btn-primary'   style='height: 2.3rem; margin-top:0rem;' ><i class='fa fa-edit' ></i> Edit</button> </a>
                                                <a href =' manage_author.php?delaut=" . htmlentities($row['id']) . "' onclick='return confirm(\"Are you sure you want to delete?\");' class='btn btn-danger' style='height: 2.3rem; margin-top:0rem;'><i class='fa fa-pencil'></i> Delete</a>

                                                </td>
                                                </tr>";
                                            $serial++;
                                        }
                                    } else {
                                        echo "<tr>
                                            <td colspan='5'>No record found</td>
                                            </tr>";
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
</script>

</body>

</html>