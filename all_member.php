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

        input[type="button"] {
            width: 76px;
            height: 34px;
            margin-top: 2px;
            margin-left: 720px;
            background-color: red;
            font-weight: bold;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<div class="search">
    <input type="text" id="input" name="input" placeholder="Search By User ID" onkeyup="searchfun()">

    <body>
        <table id="table" border="2px" style="border-collapse: collapse; width: 1000px; height: 0px;margin-top: 0px; margin-left: -180px;">
            <tr>
            <tr>
                <th>S.N</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact_No</th>
                <th>Faculty</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Action</th>
                <script src="search.js"></script>
            </tr>
            <?php
            // session_start();
            require 'conn.php';
            include("addnewuser_server.php");
            include('message.php');
            error_reporting(0);
            $query = "SELECT * FROM students WHERE verified = 1";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            $sn = 1;
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='    background-color: rgba(255, 255, 255, 0.5);' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='rgba(255, 255, 255, 0.568)';\">
                    <td style='border: 2px solid black; text-align: center;'>" . $sn . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['id'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['std_name'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['email'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['gender'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['phone'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['faculty'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>" . $result['address'] . "</td>
                    <td style='border: 2px solid black; text-align: center;'>  <img style='width:40px;' src='uploads/" . $result['photo'] . "'>" . "</td>
                    <td style='border: 2px solid black; text-align: center;'>
        <a href='newuser_update.php?Id=" . $result['Id'] . "'>
        <button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
       
        <a href='confirm_member.php?id=" . base64_encode($result['id']) . "&&action=delete'>
        <button id='del_user' style='height: 25px; width: 55px; padding: 0px; border: 2px solid black; border-radius: 4px; font-size: 15px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['id'] . "'>Delete</button></a>
        
    </td>
</tr>";
                    $sn++;
                }
            } else {
                echo "<tr><td colspan='13' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }
            ?>
        </table>
        <p id="notFoundMessage" style="display: none;">Data not found</p> <!-- Ensure this element is present -->
        <a style="text-decoration: none;" href="dashboard.php"><input type="button" name="Back" value="Back"></a>
</div>

<script>
    document.querySelector("#del_user").addEventListener('click', function(e) {
        console.log("Delete clicked");
        let choice = confirm("Are you sure you want to delete?");
        if (!choice) {
            e.preventDefault();
        }
    });

    </script>

</body>

</html>