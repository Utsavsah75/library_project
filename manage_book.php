<?php
session_start();
error_reporting(0);
include('conn.php');
require('check_admin.php');

if (isset($_GET['action']) && isset($_GET['catid'])) {
    $action = $_GET['action'];
    $catid = $_GET['catid'];

    if ($action == 'activate') {
        // Perform activation logic here
        $activateQuery = "UPDATE bookcategory SET Status = 1 WHERE id = $catid";
        mysqli_query($conn, $activateQuery);
    } elseif ($action == 'deactivate') {
        // Perform deactivation logic here
        $deactivateQuery = "UPDATE bookcategory SET Status = 0 WHERE id = $catid";
        mysqli_query($conn, $deactivateQuery);
    }

    // Redirect to the manage_category.php page after performing the action
    header("Location: manage_category.php");
    exit;
}
// Delete the category
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $sql = "DELETE FROM bookcategory WHERE id = $delid";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['delmsg'] = "Category deleted successfully at Number $delid";
        header('location: manage_category.php');
    } else {
        $_SESSION['delmsg'] = "Something went wrong. Please try again";
        header('location: manage_category.php');
    }
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
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">Book</h4>
                    </div>
                    <h4><a href="add_book.php" class="btn btn-danger pull-center" style="margin-left: 61rem; margin-top: -8rem;"><i class="fa fa-plus"></i> Add Book</a></h4>

                </div>
            </div>


            <div class="row">
                <?php
                //display category update successfully msg.

                if (isset($_SESSION['error']) && $_SESSION['error'] !== "") {
                ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Success!</strong>
                            <?php echo htmlentities($_SESSION['error']); ?>
                            <?php $_SESSION['error'] = ""; // Clear the session variable 
                            ?>
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
                //display the active msg sucessfully.
                if (isset($_SESSION['activemsg']) && $_SESSION['activemsg'] != "") {
                ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['activemsg']); ?>
                            <?php echo htmlentities($_SESSION['activemsg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                //display inactive msg successfully.
                if (isset($_SESSION['inactivemsg']) && $_SESSION['inactivemsg'] != "") {
                ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['inactivemsg']); ?>
                            <?php echo htmlentities($_SESSION['inactivemsg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>




                <!-- // delete the category successfully msg. -->
                <?php if (isset($_SESSION['delmsg']) && $_SESSION['delmsg'] != "") { ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['delmsg']); ?>
                            <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>


                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin-top: -42px; width: 75rem; margin-left: -2rem;">
                        <div class="panel-head">
                            Categories Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <!-- Update the table headers to match the number of columns -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN No</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Update the table rows to match the number of columns -->
                                        <?php
                                        $sql = "SELECT `BookName`,`isbnno`, `CategoryName`, `AuthorName`,`bookprice`,`bookimg`from books join bookcategory on bookcategory.id=books.catid inner join bookauthor on bookauthor.id=books.author";
                                        $result = mysqli_query($conn, $sql);
                                        $sn = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td>
                                                    <img src="uploads/<?php echo $row['bookimg']; ?>" alt="<?php echo $row['BookName']; ?>" width="50">
                                                    <?php echo $row['BookName']; ?>
                                                </td>
                                                <td><?php echo $row['isbnno']; ?></td>
                                                <td><?php echo $row['CategoryName']; ?></td>
                                                <td><?php echo $row['AuthorName']; ?></td>
                                                <td><?php echo $row['bookprice']; ?></td>
                                                <td>
                                                    <a href="edit_book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="manage_book.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $sn++;
                                        } ?>
                                        <!-- <tr> <td> <a href="add_book.php" class="btn btn-primary">Add New Book</a> </td> </tr>-->
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