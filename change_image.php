<?php 
session_start();
include 'conn.php';

if(isset($_POST['update'])) {
    $bookid = intval($_GET['bookid']);

    // Check if a file is selected
    if(isset($_FILES['bookpic']) && $_FILES['bookpic']['error'] === UPLOAD_ERR_OK) {
        $bookimg = $_FILES['bookpic']['name'];
        $extension = strtolower(pathinfo($bookimg, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Check if the file extension is allowed
        if(in_array($extension, $allowed_extensions)) {
            $bookimg = md5($bookimg . time()) . '.' . $extension;
            $newpath = "uploads/" . $bookimg;

            // Move the uploaded file to the destination directory
            if(move_uploaded_file($_FILES["bookpic"]["tmp_name"], $newpath)) {
                $sql = "UPDATE books SET bookimg = '$bookimg' WHERE id = '$bookid'";
                $query = mysqli_query($conn, $sql);

                if($query) {
                    echo "<script>alert('Book image has been updated successfully');</script>";
                    echo "<script>window.location.href = 'edit_book.php';</script>";
                    exit;
                } else {
                    echo "Error executing query: " . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Error uploading file');</script>";
            }
        } else {
            echo "<script>alert('Invalid format. Only .jpg, .jpeg, .png, .gif formats allowed');</script>";
        }
    } else {
        echo "<script>alert('Please select a file');</script>";
    }
}
?>  

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
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

    <?php include 'admin_header.php'; ?>

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Edit</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Book</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="panel panel-info" style="width: 69rem;">
                        <div class="panel-heading">Book Change info</div>
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?bookid=' . (isset($_GET['bookid']) ? $_GET['bookid'] : ''); ?>" enctype="multipart/form-data">
                                <?php
                                if(isset($_GET['bookid'])) {
                                    $bookid = $_GET['bookid'];
                                    $sql = "SELECT BookName, bookimg FROM books WHERE id = '$bookid'";
                                    $query = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($query);

                                    if($query && mysqli_num_rows($query) > 0) {
                                ?>
                                <input type="hidden" name="newimage" value="<?php echo $bookid; ?>">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Book Image</label>
                                        <img src="uploads/<?php echo htmlentities($row['bookimg']); ?>" width="130" height="150">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" value="<?php echo htmlentities($row['BookName']); ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Picture<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="bookpic" autocomplete="off" required="required" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" name="update" class="btn btn-info">Update</button>
                                </div>
                                <?php
                                } }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
