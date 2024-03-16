<?php
session_start();
include('conn.php');
// error_reporting (0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//send email birthday wish of each student.

// date_default_timezone_set('Nepal/india');  //nepal time zone
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");
$sql = "SELECT * FROM students WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT('$today' , '%m-%d')"; // get the students whose birthday is today.
$sql1 = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($sql1)) {
    $std_name = $row['std_name'];
    $email = $row['email'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "publiclibrary48@gmail.com";
    $mail->Password = "gjkx qtup hmph fozg";  // enter your own app password here
    $mail->Port = 587;
    $mail->setFrom("publiclibrary48@gmail.com", "Public Library System");
    $mail->addAddress($email, $std_name);
    $body = "Dear " . $std_name . ",<br>Wishing you a very Happy Birthday. May this year bring you joy, success and happiness.<br>Thank you.";
    $mail->isHTML(true);
    $subject = "Happy Birthday";

    $mail->Subject = $subject;
    $mail->Body = $body;

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}

// Increment student code
$count_my_page = "studentcode.txt";
$hits = (int) file_get_contents($count_my_page);
$hits++;
file_put_contents($count_my_page, $hits);

// Generate the student code with 'SID' prefix
$studentcode = "SID" . str_pad($hits, 3, '0', STR_PAD_LEFT);

// Register the user to the database.
if (isset($_POST['add'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email  = mysqli_real_escape_string($conn, $_POST['email']);
    $dob  = mysqli_real_escape_string($conn, date('y-m-d', strtotime($_POST['dob'])));
    $std_code = bin2hex(random_bytes(4));

    $sql = "INSERT INTO `students`( `studentcode`,`std_name`, `email`, `dob`) value ('$studentcode','$fullname','$email','$dob')";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        // Send email
        if ($fullname && $email) {
            echo "<script>alert('Email of date of birth sent successfully.');</script>";
        } else {
            echo "<script>alert('Failed to send email. Please try again later.');</script>";
        }
        echo "<script>window.location.href = 'sendmail.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href = 'sendmail.php';</script>";
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
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#email-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
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
    <?php
    include 'admin_header.php';
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold;color: #000000; display: inline;">User</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Form</h4>
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel-body">
                                    <form name="signup" method="post" onSubmit="return valid();" style="border-color: aqua;">
                                        <div class="form-group">
                                            <label>Enter Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" required="required" autocomplete="off" />
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email</label>
                                            <span id="email-avability-status" style="font-size:12px;"></span>
                                            <input class="form-control" type="email" name="email" id="email" onBlur="checkemail()" autocomplete="off" required />
                                        </div>
                                        <button type="submit" name="add" id="add" class="btn btn-info" style="margin-left: -16rem; margin-top:-54px;">Submit </button>
                                    </form>
                                </div>
                            </div>
                        </div>

</body>

</html>
