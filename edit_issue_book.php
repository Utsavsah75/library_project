<?php
session_start();
// error_reporting(0);
include('conn.php');

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
    <div class="video-background">
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
                    <?php $studentcode = $_GET['issid']; ?>
                    <div class="header-line">#<?php echo $studentcode; ?>
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Issue Book </h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;"> Detail</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info" style="margin-top: 12px; width: 50rem; margin-left: -8rem;">

                        <div class="panel-heading">
                            Issued Book Details
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <!-- ---------------------------------------------Student Details-------------------------------------- -->
                                <?php
                                $studentcode = $_GET['issid'];
                                $sql = "SELECT * FROM `students`";
                                $result = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_object($result);
                                ?>

                                <input type="hidden" name="book_id" value="<?php echo !empty($result) ? htmlentities($result->id) : ''; ?>">
                                <h4>Student Details</h4>
                                <hr />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student ID :</label>
                                        <?php echo htmlentities($result->studentcode); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name :</label>
                                        <?php echo htmlentities($result->std_name); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Email Id :</label>
                                        <?php echo htmlentities($result->email); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Contact No :</label>
                                        <?php echo htmlentities($result->phone); ?>
                                    </div>
                                </div>

                                <!-- ---------------------------------------------Book Details-------------------------------------- -->

                                <?php
                                $studentcode = $_GET['issid'];
                                $sql = "SELECT * FROM `books`";
                                $result = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_object($result);
                                ?>
                                <h4>Book Details</h4>
                                <hr />

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Image :</label>
                                        <img src="uploads/<?php echo htmlentities($result->bookimg); ?>" width="120">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Name :</label>
                                        <?php echo htmlentities($result->BookName); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ISBN :</label>
                                        <?php echo htmlentities($result->isbnno); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Issued Date :</label>
                                        <?php echo htmlentities($result->regdate); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Returned Date :</label>
                                        <?php if (!empty($result->returndate)) {
                                            echo htmlentities($result->returndate);
                                        } else {
                                            echo "Not Return Yet";
                                        } ?>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fine :</label>
                                        <?php 
                                        $fine ="";
                                        if ($fine == "") { ?>
                                            <input class="form-control" type="text" name="fine" id="fine" required />
                                        <?php } else {
                                            // Remove the unnecessary code block
                                            // echo $fine;
                                        } ?>
                                    </div>
                                </div>

                                <?php if (property_exists($result, 'returnstatus') && $result->returnstatus == null) { ?>

                                    <button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>
                                <?php } ?>

                        </div>

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