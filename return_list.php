<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap.css">
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
            width: 55rem;
            margin-top: 0px;
            margin-left: -100px;
            /* display: none; */
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

        input[type="button"] {
            width: 76px;
            height: 34px;
            margin-top: 2px;
            margin-left: 690px;
            background-color: red;
            font-weight: bold;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            color: red;
            font-size: 30px;
            margin-top: 20px;
        }
    </style>
</head>
<!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> paper size 13*10cm, divide3.5 cm-->
<div class="search">
    <input type="text" id="input" name="input" placeholder="Search" onkeyup="searchfun()">

    <body>
        <table id="table" border="2">
            <tr>
                <th>Book Id</th>
                <th>User Name</th>
                <th>Book Name</th>
                <th>Quantity</th>
                <th>Faculty</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th style='width:108px' ;>
                    Action</th>
                <script src="search.js"></script>

            </tr>

            <?php
            // session_start();
            require 'conn.php';

            include("returnbooK_server.php");
            include('message.php');
            error_reporting(0);
            $query = "SELECT * FROM issue_book";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            $sn = 1;

            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
            <td style='border: 2px solid black; text-align: center;'>" . $sn . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['book_id'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['name'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['std_name'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . 1 . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['faculty'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['issue_date'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['due_date'] . "</td>
            <td>
        <a href='update_book.php?Id=" . $result['Id'] . "'><button style='height: 25px; align-items: center; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
            <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black;align-items: center;  border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Id'] . "'>Delete</button>
        
    </td>
</tr>";
                    $sn++;
                }
            } else {
                echo "<tr><td colspan='8' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }


            ?>
        </table>
        <p id="notFoundMessage" style="display: none;">Data not found</p> <!-- Ensure this element is present -->
        <a style="text-decoration: none;" href="issuebook_list.php"><input type="button" name="Back" value="Back"></a>

</div>
<script src="search.js"></script>
</body>

</html>