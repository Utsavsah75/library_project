<?php
session_start();

if(!isset($_SESSION['login_successful'])){
    $_SESSION['msg'] = "Login first to view page";
    header("location: index.php");
}
?>