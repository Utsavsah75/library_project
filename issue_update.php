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
        }

        input[type="submit"] {
            background-color: #4CAF50;
        }

        a input[type="Back"] {
            background-color: #4CAF50;
            padding: 10px 25px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            margin-left: 25px;
        }

        input[type="button"] {
            background-color: #337ab7;
        }
    </style>
   
   <form id="bookForm" method="POST" action="admin_bookserver.php" autocomplete="off">
 
   <?php
if(isset($_GET['Id'])) {
   echo $book_id = $_GET['Id'];
    $query = "SELECT * FROM issue_book WHERE Book Id='$book_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0) {
        $book = mysqli_fetch_array($query_run);
        // print_r($book);
    } 

?>
  <input type="hidden" name="book_id" value="<?= $book['Book_ID']; ?>">
        <table>
            <tr>
                <td colspan="2">
                    <div id="message" style="display: none; color: green; font-weight: bold; text-align: center; margin-top: 50px;">
                        Update Book Successfully!!..
                    </div>
                </td>
            <tr>
                    <th>Book Name</th>
                    <td><input type="text" name="B_Name"  value="<?= $book['B_Name']; ?>" required></td>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td><input type="text" name="U_Name"  value="<?= $book['U_Name']; ?>" required></td>
                </tr>
                <tr>
                    <th>Book ID</th>
                    <td><input type="text" name="B_ID" value="<?= $book['B_ID']; ?>" required></td>
                </tr>
                <tr>
                    <th>Issue Date</th>
                    <td><input type="date" name="iss_D" value="<?= $book['Iss_D']; ?>" required></td>
                </tr>
                <tr>
                    <th>Due Date</th>
                    <td><input type="date" name="due_D" value="<?= $book['Due_D']; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="Submit" name="submit" value="Update">
                        <a href="Issue.php">
                            <input type="button" name="Back" value="Back">
                        </a>
                    </td>
                </tr>
            </table>
    <?php } else {
        echo '<h4 style="color:red;">No Such Id Found</h4>';
    } ?>
</form>

<!-- 
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
 -->

   
</body>

</html>