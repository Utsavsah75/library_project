<?php
include 'conn.php';

//code to check the email and isbn number.
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $result = mysqli_query($conn, "SELECT count(*) FROM users WHERE email='$email'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    if ($user_count > 0) echo "<span class='status-not-available'> Email Not Available.</span>";
    else echo "<span class='status-available'> Email Available.</span>";
}

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
        echo "<span class='status-not-available' style='color:red'>* The book title already exists.</span>";
        // Disable the add button if the book title already exists.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    } else {
        // Check if the input follows the specified regular expression
        if (preg_match('/^[a-zA-Z]?[&]{2}[.]?/', $bookname)) {
            // Valid book name entered
            echo "<span class='status-available' style='color:green'> Book Title is Available.</span>";
            echo "<script>document.getElementById('add').disabled = false;</script>";
            echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";
        } else {
            // Invalid book name entered
            echo "<span class='status-not-available' style='color:red'> * Field should only contain alphabets, two '&' and one '.'</span>";
            // Disable the add button if the condition is not met.
            echo "<script>document.getElementById('add').disabled = true;</script>";
            echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
        }
    }
}
?>
