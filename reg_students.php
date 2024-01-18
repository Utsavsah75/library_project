<?php
session_start();
// error_reporting(0);
include('conn.php');

//code for block student using php and Mysqli
if (isset($_GET['inactive'])) {
    $id = $_GET['inactive'];
    $status = 0;
    $sql = "UPDATE students SET verified='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['msg'] = "Student blocked successfully !!";
        header("Location: reg_students.php");
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: reg_students.php");
    }
}
// code for active students.
if (isset($_GET['active'])) {
    $id = $_GET['active'];
    $status = 1;
    $sql = "UPDATE students SET verified='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['msg'] = "Student activated successfully !!";
        header("Location: reg_students.php");
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: reg_students.php");
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
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">REG Student</h4>
                    </div>
                    <h4><a href="user_form.php" class="btn btn-danger pull-center" style="margin-left: 61rem; margin-top: -8rem;"><i class="fa fa-plus"></i> Add User</a></h4>

                </div>
                <div class="row">




                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default" style="margin-top: -42px; width: 85rem; margin-left: -7rem;">
                            <div class="panel-head">
                                Registered Student
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User CODE</th>
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
                                                        <?php
                                                        if ($row['verified'] == 1) {
                                                            echo "Active";
                                                        } else {
                                                            echo "Blocked";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row['verified'] == 1) { ?>
                                                            <a href="reg_students.php?inactive=<?php echo htmlentities($row['id']); ?>" onclick="return confirm('Are you sure you want to block this student?');">
                                                                <button class="btn btn-danger" style='height:34px; margin-top:-14px;'>Inactive</button>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="reg_students.php?active=<?php echo htmlentities($row['id']); ?>" onclick="return confirm('Are you sure you want to activate this student?');">
                                                                <button class="btn btn-primary" style='height:34px; margin-top:-14px;'>Active</button>
                                                            </a>
                                                        <?php } ?>
                                                        <a href="students_detail.php?stdid=<?php echo htmlentities($row['std_name']); ?>"><button class="btn btn-success" style='height:34px; margin-top:-14px;'>Details</button>

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

        <!-- CONTENT-WRAPPER SECTION END-->
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
</body>

</html>