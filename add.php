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
                <!-- <li><a href="#"><i class="fas fa-shopping-cart"></i>Issue Books</a></li> -->
                <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li>
                <!-- <li><a href="#"><i class="fa fa-sign-out-alt"></i>Manage Users</a></li> -->
                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- </div> -->

    <div class="container1">
        <!-- <div class="library-container2"> -->
        <ul>
            <a style="text-decoration: none;" href="book_page.php"> <button> Add Books</button></a>
            <a style="text-decoration: none;" href="Issue.php"><button> Issue Books</button></a>
            <!-- <a style="text-decoration: none;" href="return.php">  <button> Return Books</button></a> -->
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
            <!-- <a style="text-decoration: none;" href="manage.php"> <button> Manage Users</button></a> -->
        </ul>
    </div>
    <!-- </div> -->

    <div class="top">
        <input type="text" placeholder="Search">
    </div> <!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->



    <!---*****************ADD USERS**********************-->
    <div id="Add_Users" class="tabcontent4">
        <!-- <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off"> -->

        <p style="display:none; margin-left: 10px;">This Field is required:</p>
        <form id="userForm" method="POST" action="add_user_data.php" autocomplete="on">
            <table>
                <tr>
                    <th>User ID</th>
                    <td><input type="number" name="u_id" placeholder="Enter User ID" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" placeholder="Enter User Email" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="text" name="password" placeholder="Enter User Password" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <select id="gender" name="gender" style="margin-left: 55px; margin-bottom: 8px;">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Contact_No</th>
                    <td><input type="number" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Faculty</th>
                    <td><input type="text" name="faculty" placeholder="Enter User Faculty/Class" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" placeholder="Enter User Address" style="padding: 5px;"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                        <input type="submit" name="submit" value="Save" style="padding: 10px 25px; margin-left: 90px; font-weight:bold; background-color: #4CAF50; color: #fff; border-radius: 4px; cursor: pointer;">
                    </td>
                    <!-- </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
            <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            <input type="Button" name="submit" value="Clear" style="padding: 10px 21px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </td> -->
                </tr>
            </table>

        </form>

        <table border="2px" style="border-collapse: collapse; width: 790px; height: 0px;margin-top: -445px; margin-left: 280px;">
            <tr style="height:35px ; background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(96, 100, 96, 0.6));">
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>Gender</th>
                <th>Contact_No</th>
                <th>Faculty</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            </tr>
            <?php
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
        <a href='newuser_update.php?Id=" . $result['User_Id'] . "'><button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
     
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