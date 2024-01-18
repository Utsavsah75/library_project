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
                    <?php $studentcode = $_GET['stdid']; ?>
                    <div class="header-line">#<?php echo $studentcode; ?>
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Edit </h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Category</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info" style="margin-top: 12px; width: 50rem; margin-left: -8rem;">

                        <div class="panel-heading">
                            Student Info
                        </div>

                        <div class="panel-body">
                            <form role="form" method="post">
                                <?php
                                $sql = "SELECT * FROM students";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_object($result);
                                ?>

                                    
<!--    //create a form to display the student information from the database.-->

<form action="edit_student.php" method="post">
    
                                    <table>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Student ID :</label>
                                                    <?php echo htmlentities($row->studentcode); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Verified :</label>
                                                    <?php echo htmlentities($row->verified); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Student Name :</label>
                                                    <?php echo htmlentities($row->std_name); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Address :</label>
                                                    <?php echo htmlentities($row->address); ?>
                                                </div>
                                            </div>


                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Phone :</label>
                                                    <?php echo htmlentities($row->phone); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Gender :</label>
                                                    <?php echo htmlentities($row->gender); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Email :</label>
                                                    <?php echo htmlentities($row->email); ?>
                                                </div>
                                            </div>

                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="update" value="Update"></td>
                                                
                                    </table>
                                </form>
                                <?php
                                if (isset($_POST['update'])) {
                                    $studentcode = $_POST['studentcode'];
                                    $verified = $_POST['verified'];
                                    $std_name = $_POST['std_name'];
                                    $address = $_POST['address'];
                                    $phone = $_POST['phone'];
                                }
                                    ?>
                                   
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="uploads/<?php echo htmlentities($row->photo); ?>" style="width:10rem; height:10rem; margin-left:35rem; border-radius: 8px;box-shadow: 2px 2px 4px #000000; margin-top:-35rem">
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <?php
        //    include 'footer.php';
        ?>
        <!-- FOOTER SECTION END-->
        <!-- CORE JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
</body>

</html>