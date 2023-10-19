<?php
session_start();

if (!isset($_SESSION['login_successful'])) {
    $_SESSION['msg'] = "<span style='color: red;'>Login first to view page</span>";
    header("location: index.php");
}
