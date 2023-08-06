<?php
    session_start();
    require 'conn.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f2f2f2; */
            margin: 0;
            padding: 0;
            background: linear-gradient(270deg, rgba(255, 255, 255, 0.799), rgba(96, 100, 96, 0.6));


        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            filter: drop-shadow(0 10px 20px black);
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); */
        }

        .form-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 10px 25px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            margin-left: 15px;
            margin-top: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
        }

        a input[type="Back"] {
            background-color: #4CAF50;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            margin-left: 0px;
        }

        input[type="button"] {
            background-color: #337ab7; 
        }
    </style>
   
   <form id="bookForm" method="POST" action="addnewuser_server.php" autocomplete="off">
   <?php
if(isset($_GET['Id'])) {
    $book_id = mysqli_real_escape_string($conn, $_GET['Id']);
    $query = "SELECT * FROM addnew_user WHERE Id='$book_id'";
    $query_run = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($query_run) > 0) {
        $book = mysqli_fetch_array($query_run);
        //print_r($book);
    } 
}
?>
    <?php if (isset($book)) { ?>
        <input type="hidden" name="book_id" value="<?= $book['Id']; ?>">
        <table>
    <tr>
        <th>User ID</th>
        <td><input type="number" name="u_id" value="<?= $book['User ID']; ?>" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><input type="text" name="uname" value="<?= $book['Name']; ?>"style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><input type="text" name="Aname" value="<?= $book['Email']; ?>"style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Password</th>
        <td><input type="text" name="password" value="<?= $book['Password']; ?>"style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>
            <select id="gender" name="gender" value="<?= $book[' Gender']; ?>"  style="margin-left: 55px; margin-bottom: 8px;">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Contact_No</th>
        <td><input type="number" name="phone" value="<?= $book['Contavt_No']; ?>"style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Faculty</th>
        <td><input type="text" name="faculty" value="<?= $book['Faculty']; ?>" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><textarea name="address" value="<?= $book['Address']; ?>"style="padding: 5px;"></textarea></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
        <input type="submit" name="submit" value="Update">
        </td>
    </tr>
    <!-- <tr>
        <td colspan="2" style="text-align: right;">
            <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            <input type="Button" name="submit" value="Clear" style="padding: 10px 21px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </td>
    </tr> -->
</table>
        <tr>
                <td>
                    <a href="add.php" style="text-decoration: none;">
                        <input type="button" name="Back" value="Back" style="color: white; font-weight: bold; margin-left: 120px; margin-top: -40px;">
                    </a>
                </td>
            </tr>
    <?php } else {
        echo '<h4 style="color:red;">No Such Id Found</h4>';
    } ?>
</form>



    <script>
        // Get the form element
        const bookForm = document.getElementById('bookForm');

        // Add an event listener to the form submission
        bookForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Your code to handle form submission to the server
            // For this example, we'll just show the success message
            // Show the success message
            const message = document.getElementById('message');
            message.style.display = 'block';

            // Hide the message after a few seconds (optional)
            setTimeout(function() {
                message.style.display = 'none';
            }, 3000); // 3 seconds (adjust this as needed)
        });
    </script>
</body>

</html>









<?php
require 'conn.php';
require 'check_admin.php';

// Check if the form is saved
if (isset($_POST['Save'])) {
    $Id         = mysqli_real_escape_string($conn, $_POST['u_id']);
    $Name       = mysqli_real_escape_string($conn, $_POST['uname']);
    $Email      = mysqli_real_escape_string($conn, $_POST['email']);
    $Password   = mysqli_real_escape_string($conn, $_POST['password']);
    $Address    = mysqli_real_escape_string($conn, $_POST['address']);
    $Gender     = mysqli_real_escape_string($conn, $_POST['gender']);
    $Phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $Faculty    = mysqli_real_escape_string($conn, $_POST['faculty']);
    // 'u_id'    
    // 'uname'   
    // 'Faculty'   
    // 'password'
    // 'Faculty'  
    // 'Faculty'   
    // 'faculty' 
    // 'Faculty' 
    $sql = "INSERT INTO add_book (`User Id`, `Name`, `Email`, `Password`, `Address`, `Gender`, `Phone`, `Faculty`) 
            VALUES ('$Id', '$Name', '$Email', '$Password', '$Address', '$Gender', '$Phone', '$Faculty')";

    $data = mysqli_query($conn, $sql);
    if ($data) {
        // Book added successfully, display alert message
        $_SESSION['msg'];
        header('location: add.php');
    } else {
        // Failed to add the book, display alert message
        $_SESSION['msg'] = "Failed to add the book.";
        header('location: add.php');
    }
}
?>