<?php
require 'conn.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>

<body>

    <div class="datetime">
        <p class="time"></p>
        <p class="date"></p>
    </div>
    <!-- <div class="library-contain"> -->
    <div class="library-container">
        <!-- <div class="top">
            <marquee class="marquee" direction="alternate" scrollamount="12" onmouseover="this.stop()" onmouseout="this.start()"><b>Welcome To Library</b></marquee>
        </div> -->
        <div class="top1">
            <ul>
                <li><a href="all_books.php"><i class="fa fa-book"></i>All Books</a></li>
                <li><a href="all_member.php"><i class="fa fa-users"></i>All Members</a></li>
                <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li>
                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                <!-- <li><a href="#"><i class="fa fa-sign-out-alt"></i>Manage Users</a></li> -->
                <!-- <li><a href="#"><i class="fas fa-shopping-cart"></i>Borrow Books</a></li> -->
            </ul>
        </div>
    </div>
    <!-- </div> -->

    <div class="container1">
        <!-- <div class="library-container2"> -->
        <ul>
            <a style="text-decoration: none;" href="dashboard.php"> <button> DashBoard</button></a>
            <a style="text-decoration: none;" href="book_page.php"> <button> Add Books</button></a>
            <a style="text-decoration: none;" href="Issue.php"><button> Issue Books</button></a>
        <a style="text-decoration: none;" href="return.php">  <button> Return Books</button></a>
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
            <!-- <a style="text-decoration: none;" href="manage.php"> <button> Manage Users</button></a> -->
        </ul>
    </div>
    <!-- </div> -->

    <div class="top">
        <input type="text" placeholder="Search">
    </div> <!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->


    <!-- *****************Issue BOOK********************** -->
    <div id="Issue_Books" class="tabcontent2">
        <p style="display:none; margin-left: 10px;">This Field is required:</p>

        <form id="bookForm" method="POST" action="issue_book_data.php" autocomplete="off">
            <table style="padding: 20px;">
                <tr>
                    <th>Book Name</th>
                    <td><input type="text" name="B_Name" placeholder="Enter Book Name" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td><input type="text" name="U_Name" placeholder="Enter User Name" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Book ID</th>
                    <td><input type="text" name="B_ID" placeholder="Enter Book ID" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Issue Date</th>
                    <td><input type="date" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Due Date</th>
                    <td><input type="date" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="Issue" value="Issue" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;">
                        <input type="Button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;">
                    </td>
                </tr>
            </table>
        </form>


        <table border="2" style="border-collapse: collapse; width: 760px; height: 0px; margin-top: -206px; margin-left: 305px;">
            <tr style="height:35px ; background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(96, 100, 96, 0.6));">
                <th>Book ID</th>
                <th>Book Name</th>
                <!-- <th>ID</th> -->
                <th>User Name</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th style='width:108px' ;>Action</th>

            </tr>
            <?php
            include("issuebook_server.php");
            include('message.php');
            error_reporting(0);
            $query = "SELECT * FROM issue_book";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            $sn=1;
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
                <td style='border: 2px solid black; text-align: center;'>" . $sn. "</td>
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
            ?>
         </table>
        <script>
            const timeElement = document.querySelector(".time");
            const dateElement = document.querySelector(".date");

            function formatTime(date) {
                const hours12 = date.getHours() % 12 || 12;
                const minutes = date.getMinutes();
                const seconds = date.getSeconds();
                const isAm = date.getHours() < 12;

                return `${hours12.toString().padStart(2, "0")}:${minutes
                .toString()
                .padStart(2, "0")}:${seconds.toString().padStart(2, "0")} ${isAm ? "AM" : "PM"}`;
            }

            function formatDate(date) {
                const DAYS = [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ];
                const MONTHS = [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ];

                return `${DAYS[date.getDay()]}, ${MONTHS[date.getMonth()]} ${date.getDate()} ${date.getFullYear()}`;
            }

            // Initial update
            const now = new Date();
            timeElement.textContent = formatTime(now);
            dateElement.textContent = formatDate(now);

            // Update every second
            setInterval(() => {
                const now = new Date();

                timeElement.textContent = formatTime(now);
                dateElement.textContent = formatDate(now);
            }, 1000);
        </script>
</body>

</html>