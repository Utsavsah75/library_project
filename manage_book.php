<?php
session_start();
// error_reporting(0);
include('conn.php');

// Delete the Book.
if (isset($_GET['delbook'])) {
    $delbook = $_GET['delbook'];

    // Sanitize the input to prevent SQL injection
    $delbook = mysqli_real_escape_string($conn, $delbook);

    // Prepare the delete query
    $delbooksql = "DELETE FROM books WHERE `id` = '$delbook'";

    // Execute the delete query
    if (mysqli_query($conn, $delbooksql)) {
        $_SESSION['delbook'] = "Book deleted successfully at Number $delbook"; // Correct variable name
    } else {
        $_SESSION['delbook'] = "Error deleting book: " . mysqli_error($conn);
    }

    // Redirect back to the page after deletion
    header('location: manage_book.php');
    exit();
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
    <!-- <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div> -->

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
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Manage</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Book</h4>
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
            </div>
                <?php } ?>

                <!-- // delete the book successfully msg. -->
                <?php if (isset($_SESSION['delbook']) && $_SESSION['delbook'] != "") { ?>
                    <div class="col-md-6">
                        <div class="alert alert-success" style="margin-top: -6rem;">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['delbook']); ?>
                            <?php echo htmlentities($_SESSION['delbook'] = ""); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin-top: -42px; width: 75rem; margin-left: -2rem;">
                        <div class="panel-head">
                            Categories Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <?php
                                $sql = "SELECT books.`id`, books.`BookName`, books.`isbnno`, bookcategory.`CategoryName`, bookauthor.`AuthorName`, books.`bookprice`, books.`bookimg` FROM books JOIN bookcategory ON bookcategory.id = books.catid INNER JOIN bookauthor ON bookauthor.id = books.author";
                            $result = mysqli_query($conn, $sql);
                                        if ($result) {
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
                                                        <a href='edit_book.php?bookid=<?php echo htmlentities($row['id']); ?>'>
                                                            <button class='btn btn-primary' style='height: 2.3rem; margin-top:0rem;'><i class='fa fa-edit'></i> Edit</button>
                                                        </a>
                                                        <a href='manage_book.php?delbook=<?php echo htmlentities($row['id']); ?>' onclick='return confirm("Are you sure you want to delete?");' class='btn btn-danger' style='height: 2.3rem; margin-top:0rem;'><i class='fa fa-pencil'></i> Delete</a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $sn++;
                                            }
                                        } else {
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
