
<?php

include 'conn.php';
session_start();

if(isset($_GET['code']))
{
    $code = $_GET['code'];
    $verification_code = $_GET['code'];
    $verify_query = "SELECT * FROM students WHERE verification_code = '$verification_code' limit 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if($verify_query_run)
    {
        if(mysqli_num_rows($verify_query_run) > 0)
        {
            $row = mysqli_fetch_array($verify_query_run);
            // echo $row['verification_code'];
            if($row['verified'] ==0){
                 $clicked_code = $row['verification_code'];
                    $update_query = "UPDATE students SET verified = 1 WHERE verification_code = '$clicked_code'";
                    $update_query_run = mysqli_query($conn, $update_query);

                    if($update_query_run){
                        $_SESSION['status'] = "Your email is verified successfully";
                        header('Location: index.php');
                    }
                    else{
                        $_SESSION['status'] = "Your email is not verified";
                        header('Location: index.php');
                    }
            }
            else{
                $_SESSION['status'] = "Your email is already verified. Please login";
                header('Location: index.php');
            }
        } 
        
        else{
            $_SESSION['status'] = "This code is invalid exit";
            header('Location: index.php');
        }
    }
        else{
            $_SESSION['status'] = "Not Allowed";
            header('Location: index.php');
        }
}