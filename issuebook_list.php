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
            margin-top: auto;
            margin-left: 550px;
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
                <th>Book ID</th>
                <th>Book Name</th>
                <!-- <th>ID</th> -->
                <th>User Name</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Action</th>

                <script src="search.js"></script>

            </tr>
            <?php
            include("issuebook_server.php");
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
                <td style='border: 2px solid black; text-align: center;'>" . $result['Book_Name'] . "</td>
                <td style='border: 2px solid black; text-align: center;'>" . $result['User_Name'] . "</td>
                <td style='border: 2px solid black; text-align: center;'>" . $result['Issue_Date'] . "</td>
                <td style='border: 2px solid black; text-align: center;'>" . $result['Due_Date'] . "</td>
                <td style='border: 2px solid black; text-align: center;'>
                    <a href='issue_update.php?Id=" . $result['Book ID'] . "'><button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
                    <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Book ID'] . "'>Delete</button>
        
    </td>
</tr>";
                    $sn++;
                }
            } else {
                echo "<tr><td colspan='5' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }
            //---- 
            if (isset($_GET['m'])) {
                // $m = mysqli_real_escape_string($conn, $_GET['m']);

                $m = mysqli_real_escape_string($conn, $_GET['m']);

                // $query = "SELECT * FROM add_book WHERE `Book Id` LIKE '%$number%' OR `Book Name` LIKE '%$m%' OR `Author Name` LIKE '%$m%'";
                // $query = "SELECT * FROM add_book WHERE `Book Id` LIKE `%number%' OR `Book Name` LIKE '%$c%' OR `Author Name` LIKE '%$s%'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<table  id="table" border="2">';
                    echo '<tr>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <script src="search.js"></script>
              </tr>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                    <th>' . $row['Id'] . '</th>
                    <th>' . $row['Book Name'] . '</th>
                    <th>' . $row['User Name'] . '</th>
                    <th>' . $row['Issue Date'] . '</th>
                    <th>' . $row['Due date'] . '</th>
                  </tr>';
                    }

                    echo '</table>';
                } else {
                    echo '<p>No records found</p>';
                }
            }

            ?>
        </table>
        <p id="notFoundMessage" style="display: none;">Data not found</p> <!-- Ensure this element is present -->
        <a style="text-decoration: none;" href="dashboard.php"><input type="button" name="Back" value="Back"></a>

</div>
<script src="search.js"></script>
</body>

</html>