<?php
include 'conn.php';

//code to check the isbn number.

if (!empty($_POST["isbnno"])) {
    $isbnno = $_POST["isbnno"];
    $result = mysqli_query($conn, "SELECT count(*) FROM books WHERE isbnno='$isbnno'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    if ($user_count > 0) {
        echo "<span class='status-not-available' span style='color:red'> * ISBN already exists with another book.</span>";
        //disabled the add button if the isbnno number already exists.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    } else echo "<span class='status-available' span style='color:green'> ISBN Number Available.</span>";
}





if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    // Check if the input is a valid number with at most one dot
    if (preg_match('/^[0-9]+(\.[0-9]+)?$/', $price)) {
        // Valid price entered
        echo "<script>document.getElementById('add').disabled = false;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";
    } else {
        // Invalid price entered
        echo "<span class='status-not-available' style='color:red'> * Price field should contain only numbers and at most one dot .</span>";
        // Disable the add button if the condition is not met.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    }
}

if (!empty($_POST["bookname"])) {
    $bookname = $_POST["bookname"];

    // Check if the book title already exists in the database
    $result = mysqli_query($conn, "SELECT count(*) FROM books WHERE BookName='$bookname'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    
    if ($user_count > 0) {
        echo "<span style='color:red'>* The book title already exists.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>"; 
    // } else {
    //     // Check if the input follows the specified regular expression
    //     if (preg_match('/^[a-zA-Z]?[&]{2}[.]?/', $bookname)) {
    //         // Valid book name entered
    //         echo "<span class='status-available' style='color:green'> Book Title is Available.</span>";
    //         echo "<script>document.getElementById('add').disabled = false;</script>";
    //         echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";
    //     } else {
    //         // Invalid book name entered
    //         echo "<span class='status-not-available' style='color:red'> * Field should only contain alphabets, two '&' and one '.'</span>";
    //         // Disable the add button if the condition is not met.
    //         echo "<script>document.getElementById('add').disabled = true;</script>";
    //         echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    //     }
    }
}

// Check for user email registration.
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $result = mysqli_query($conn, "SELECT count(*) FROM students WHERE email='$email'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    
    if ($user_count > 0) {
        echo "<span class='status-not-available' style='color:red'> * Email already exists. Please use another.</span>";
        // Disable the add button if the email already exists.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    } else {
        // Enable the add button if the email is valid and does not exist.
        echo "<script>document.getElementById('add').disabled = false;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";
    }
}

// Check for user mobile registration.
if (!empty($_POST["mobile"])) {
    $mobile = $_POST["mobile"];
    $result = mysqli_query($conn, "SELECT count(*) FROM students WHERE phone='$mobile'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    
    if ($user_count > 0 || !preg_match('/^[0-9]*$/', $mobile)) {
        // Email or mobile is already used or invalid.
        echo "<span class='status-not-available' style='color:red'> * Mobile already used or invalid.</span>";
        // Disable the add button.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    } else {
        // Enable the add button if the mobile is valid and does not exist.
        echo "<script>document.getElementById('add').disabled = false;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";
    }
}



//get the studentcode.
if (!empty($_POST["studentid"])) {
    $studentid = $_POST["studentid"];
    $result = mysqli_query($conn, "SELECT count(*) FROM students WHERE studentcode='$studentid'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    
    if ($user_count > 0) {
        // Student exists.
        echo "<span class='status-available' style='color:green'> Student exists.</span>";
        // Enable the add button.
        echo "<script>document.getElementById('add').disabled = false;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";
    } else {
        // Student does not exist.
        echo "<span class='status-not-available' style='color:red'> * Student does not exist.</span>";
        // Disable the add button.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    }
}