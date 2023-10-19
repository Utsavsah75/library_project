<?php
session_start();

if (!isset($_SESSION['AdminLogin_successful'])) {
    $_SESSION['AdminLoginError'] = "<span style='color: red;'>Login first to view page</span>";
    header("location: admin_login.php");
}
