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
            width: 120vh;
            margin-top: 0px;
            margin-left: -50px;
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
    </style>
</head>
<!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->

<div class="search">
    <input type="text" placeholder="Search">

    <body>
        <table border="2">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact_No</th>
                <th>Faculty</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            // session_start();
            require 'conn.php';
            include("addnewuser_server.php");
            include('message.php');
            error_reporting(0);
            $query = "SELECT * FROM addnew_user";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
    <td style='border: 2px solid black; text-align: center;'>" . $result['User ID'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Name'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Email'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Gender'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Phone'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Faculty'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Address'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>
        <a href='newuser_update.php?Id=" . $result['Id'] . "'><button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
     
        <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Id'] . "'>Delete</button></a>
        
    </td>
</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }
           


            ?>
        </table>
</div>
</body>

</html>