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
   
   <form id="bookForm" method="POST" action="admin_bookserver.php" autocomplete="off">
   <?php
if(isset($_GET['Id'])) {
    $book_id = mysqli_real_escape_string($conn, $_GET['Id']);
    $query = "SELECT * FROM add_book WHERE Id='$book_id'";
    
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
                <td colspan="2">
                    <div id="message" style="display: none; color: green; font-weight: bold; text-align: center; margin-top: 50px;">
                        Update Book Successfully!!..
                    </div>
                </td>
            </tr>
            <!-- <tr>
                <th>Book ID*</th>
                <td><input type="text" id="book_id" placeholder="Enter Book ID" name="book_id" value="<?= $book['Id']; ?>" required></td>
            </tr> -->
            <tr>
                <th>Book Name</th>
                <td><input type="text" id="bname" placeholder="Enter Book Name" name="book_name" value="<?= $book['Book Name']; ?>" required></td>
            </tr>
            <tr>
                <th>Author Name</th>
                <td><input type="text" id="Aname" placeholder="Enter Author Name" name="book_author" value="<?= $book['Author Name']; ?>" required></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><input type="text" id="quantity" placeholder="Enter Quantity" name="book_quantity" value="<?= $book['Quantity']; ?>" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Update">
                </td>
            </tr>
           
        </table>
        <tr>
                <td>
                    <a href="book_page.php" style="text-decoration: none;">
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

















<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display User_reg Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20vh;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.885), rgba(96, 100, 96, 0.993));
        }

        table {
            width: 100%;
            margin-top: 0px;
            margin-left: 10px;
            display: none;
            border: 2px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 3px;
            border-bottom: 2px solid;
            text-align: center;

        }

        th {
            background: linear-gradient(180deg, rgba(255, 255, 255, .6), rgba(96, 100, 96, 0.6));

        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .search {
            float: left;
            width: 50%;
            height: 45px;
            margin-top: -70px;
            align-items: center;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #ddd;
            position: relative;
        }

        .search input[type="text"] {
            width: 100%;
            height: 100%;
            padding: 5px 10px;
            border: none;
            border-radius: 6px;
            background-color: transparent;
            color: black;
            font-size: 16px;
            outline: none;
        }

        .search input[type="text"]::placeholder {
            color: red;
            opacity: 0.5;
        }
    </style>
</head>
<!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->

<div class="search">
<input type="text" placeholder="Search">

<body>
    <table border="2">
        <tr>
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Book Author</th>
            <th>Quantity</th>
            <th style='width:108px' ;>Action</th>

        </tr>
        <?php
    session_start();
    require 'conn.php';

    if (isset($_GET['m'])) {
        // $m = mysqli_real_escape_string($conn, $_GET['m']);

        $m = mysqli_real_escape_string($conn, $_GET['m']);

            $query = "SELECT * FROM add_book WHERE `Book Id` LIKE '%$number%' OR `Book Name` LIKE '%$m%' OR `Author Name` LIKE '%$m%'";
        // $query = "SELECT * FROM add_book WHERE `Book Id` LIKE `%number%' OR `Book Name` LIKE '%$c%' OR `Author Name` LIKE '%$s%'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table border="2">';
            echo '<tr>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Quantity</th>
                  </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['Id'] . '</td>
                        <td>' . $row['Book Name'] . '</td>
                        <td>' . $row['Author Name'] . '</td>
                        <td>' . $row['Quantity'] . '</td>
                      </tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No records found</p>';
        }
    }
    ?>
</body>

</html>