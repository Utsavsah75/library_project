<?php
// session_start(); // Add this line to start the session

include('conn.php');
require('check_admin.php');

// update the category status.
if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $status = $_POST['status'];

    if (isset($_POST['catid'])) {
        $catid = $_POST['catid'];

        $cateupdate = "UPDATE `bookcategory` SET `CategoryName`='$category', `Status`='$status' WHERE id = $catid";
        $updatecategory = mysqli_query($conn, $cateupdate);

        if ($updatecategory) {
            //display the message active when click on active at header manage_category.php
            if ($status == 0) {
                $_SESSION['inactiveemsg'] = "Category inactive successfully at Number $catid";
                header('location: manage_category.php');
            }
            //display the message inactive msg when click on inactive status at header manage_category.php

            else {
                $_SESSION['activeemsg'] = "Category active successfully at Number $catid";
                header('location: manage_category.php');
            }
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
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Category</h4>
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
                                if (isset($_GET['catid'])) {
                                    $catid = $_GET['catid'];
                                    $sql = "SELECT * FROM `bookcategory` WHERE id = $catid";
                                    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                }
                                ?>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" type="text" name="category" value="<?php echo isset($result['CategoryName']) ? htmlentities($result['CategoryName']) : ''; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label>Status</label> <?php if (isset($result['Status'])) { ?>
                                        <div class="radio">
                                            <label> <input type="radio" name="status" id="status" value="1" <?php echo ($result['Status'] == 1) ? 'checked' : ''; ?>>Active </label>
                                        </div>
                                        <div class="radio">
                                            <label> <input type="radio" name="status" id="status" value="0" <?php echo ($result['Status'] == 0) ? 'checked' : ''; ?>>Inactive </label>
                                        </div> <?php } else { ?>
                                        <div class="radio">
                                            <label> <input type="radio" name="status" id="status" value="0" checked="checked">Inactive </label>
                                        </div>
                                        <div class="radio">
                                            <label> <input type="radio" name="status" id="status" value="1">Active </label>
                                        </div> <?php } ?>
                                </div>
                                <input type="hidden" name="catid" value="<?php echo $catid; ?>">
                                <button type="submit" name="update" class="btn btn-info">Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>