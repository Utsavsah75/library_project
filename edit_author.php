<?php
session_start(); // Uncomment this line to start the session

include('conn.php');
// require('check_admin.php');

// Update the Author name.
if (isset($_POST['update'])) {
    $author = $_POST['author'];
    
    if (isset($_POST['autid'])) {
    $autid = $_POST['autid'];
    $authorsql = "UPDATE `bookauthor` SET `AuthorName`='$author' WHERE id = $autid";
    $updateauthor = mysqli_query($conn, $authorsql);

    if ($updateauthor) {
        $_SESSION['updatemsg'] = "Author updated successfully at Number $autid";
        header('location: manage_author.php');
    } else {
        $_SESSION['unupdatemsg'] = "Author not updated";
        header('location: manage_author.php');
    }
}
}
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
    <?php
    include 'admin_header.php';
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Edit</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Author</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Category Info
                        </div>


                        <div class="panel-body">
                            <form role="form" method="post">
                                <?php
                                if (isset($_GET['autid'])) {
                                    $autid = $_GET['autid'];
                                    $sql = "SELECT * FROM `bookauthor` WHERE id = $autid";
                                    $result = mysqli_query($conn, $sql);
                                    $result = mysqli_fetch_object($result);
                                }
                                ?>
                                <div class="form-group">
                                    <label>Author Name</label>

                                    <input class="form-control" type="text" name="author" 
                                    value="<?php echo htmlentities($result->AuthorName); ?>" required />

                                </div>

                                <input type="hidden" name="autid" value="<?php echo $autid; ?>">
                                <button type="submit" name="update" class="btn btn-info">Update </button>

                            </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php
    // include('footer.php'); 
    ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>