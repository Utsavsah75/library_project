<?php
session_start();
include('conn.php');
// error_reporting (0);

// Increment student code
$count_my_page = "studentcode.txt";
$hits = (int)file_get_contents($count_my_page);
$hits++;
file_put_contents($count_my_page, $hits);

// Generate the student code with 'SID' prefix
$studentcode = "SID" . str_pad($hits, 3, '0', STR_PAD_LEFT);

// Register the user to the database.
if (isset($_POST['add'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email  = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT)); // Hash the password
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);

    $alreadyExist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE email = '{$email}'"));

    if ($alreadyExist) {
        $_SESSION['msg'] = "Account is already exist for email: <b>$email</b>";
        header("location: user_form.php");
        exit(); // Stop further execution
    }

    $sql = "INSERT INTO `students`( `studentcode`,`std_name`, `address`, `phone`, `gender`, `photo`, `email`, `password`, `verified`) 
    VALUES ('$studentcode','$fullname','$address','$phone','$gender','$photo','$email','$password', 1)";

    $data = mysqli_query($conn, $sql);
    if ($data) {
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>';

        echo '<script type="text/javascript">
                $(function() {
                    Swal.fire({
                        title: "Register",
                        text: "Successfully!",
                        icon: "success"
                    });
                });
            </script>';
    } else {
        echo "Failed";
        // header("location: user_form.php");
        exit(); // Stop further execution
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
    <!-- <link rel="stylesheet" type="text/css" href="book_pag1.css"> -->
    <script type="text/javascript">
        function valid() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
  <script type="text/javascript">
    function checkemail() {
     $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_avability.php", 
        data:'email='+$("#email").val(),
        type: "POST",
        success:function(data){
            $("#email-avability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
        });
}
  </script>
   <script type="text/javascript">
        function mobilenumber() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_avability.php",
                data: 'mobile=' + $("#mobile").val(),
                type: "POST",
                success: function(data) {
                    $("#mobile-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

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
                        <h4 style="   font-weight: bold;color: #000000; display: inline;">User</h4>
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">Form</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                            SINGUP FORM
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel-body">

                                        <form name="signup" method="post" onSubmit="return valid();" style="border-color: aqua;">
                                            <div class="form-group">
                                                <label>Enter Full Name</label>
                                                <input class="form-control" type="text" name="fullname" required="required" autocomplete="off" />
                                            </div>

                                            <div class="form-group">
                                                <label>Enter Address</label>
                                                <input class="form-control" type="text" name="address" required="required" autocomplete="off" />
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <span id="mobile-avability-status" style="font-size:12px;"></span>
                                                <input class="form-control" type="text" name="phone"id="mobile"  maxlength="10" autocomplete="off" onblur="mobilenumber()" required="required" />
                                            </div>

                                            <div class="form-group">
                                                <label>Gender </label>
                                                <div>
                                                    <input type="radio" id="male" name="gender" value="male" required>
                                                    <label for="male">Male</label>
                                                    <input type="radio" id="female" name="gender" value="Female" required>
                                                    <label for="female">Female</label>
                                                </div>
                                            </div>

                                            <!-- </form> -->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="panel-body">
                                        <form name="signup" method="post" onSubmit="return valid();" style="border-color: aqua;">

                                            <div class="form-group">
                                                <label>Enter Email</label>
                                                <span id="email-avability-status" style="font-size:12px;"></span>
                                                <input class="form-control" type="email" name="email" id="email" onBlur="checkemail()" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Enter Password</label>
                                                <input class="form-control" type="password" name="password" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password </label>
                                                <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>User Picture</label>
                                                <input class="form-control" type="file" name="photo" autocomplete="off" required="required" />
                                            </div>
                                            <button type="submit" name="add" id="add" class="btn btn-info" style="margin-left: -16rem; margin-top:-54px;">Submit </button>

                                        </form>
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

