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
        <div class="top">
            <marquee class="marquee" direction="alternate" scrollamount="12" onmouseover="this.stop()" onmouseout="this.start()"><b>Welcome To Library</b></marquee>
        </div>
        <div class="top1">
            <ul>
                <li><a href="#"><i class="fa fa-book"></i>All Books</a></li>
                <li><a href="#"><i class="fa fa-users"></i>All Members</a></li>
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
        <a style="text-decoration: none;" href="return.php">  <button> Return Books</button></a>
        <a style="text-decoration: none;" href="add.php">  <button> Add Users</button></a>
        <a style="text-decoration: none;" href="manage.php"> <button> Manage Users</button></a>
        </ul>
    </div>
    <!-- </div> -->

    <input type="text" placeholder="Search" style=" float: left;margin-left: 975px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-463px); width: 240px; height: 25px;">
    <!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->

  

    <!---*****************ADD USERS**********************-->
    <div id="Add_Users" class="tabcontent4">
        
    <p style="display:none; margin-left: 10px;">This Field is required:</p>
            <form id="userForm" onsubmit="event.preventDefault(); onFormSubmit();" autocomplete="off">
            <table>
    <tr>
        <th><label for="u_id" style="text-align: left;">User ID</label></th>
        <td><input type="text" name="u_id" placeholder="Enter User ID" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="uname" style="text-align: left;">Name</label></th>
        <td><input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="Aname" style="text-align: left;">Email</label></th>
        <td><input type="text" name="Aname" placeholder="Enter User Email" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="password" style="text-align: left;">Password</label></th>
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
        <th><label for="phone" style="text-align: left;">Contact_No</label></th>
        <td><input type="text" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="faculty" style="text-align: left;">Faculty</label></th>
        <td><input type="text" name="faculty" placeholder="Enter User Faculty/Class" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="address" style="text-align: left;">Address</label></th>
        <td><textarea name="address" placeholder="Enter User Address" style="padding: 5px;"></textarea></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
            <input type="Button" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border-radius: 4px; cursor: pointer;">
            <!-- <input type="Button" name="submit" value="Update" style="padding: 10px 20px; font-weight:bold; background-color: #ffa200; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
            <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            <input type="Button" name="submit" value="Clear" style="padding: 10px 21px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </td> -->
    </tr>
</table>

            </form>
            <table id="booklist3" style="border-collapse: collapse; width: 760px; height: 0px;margin-top: -315px; margin-left: 305px;">
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 5px; border: 2px solid black;">User ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Name</th>
                    <th style="padding: 5px; border: 2px solid black;">Email</th>
                    <th style="padding: 5px; border: 2px solid black;">Password</th>
                    <th style="padding: 5px; border: 2px solid black;">Gender</th>
                    <th style="padding: 5px; border: 2px solid black;">Contact_No</th>
                    <th style="padding: 5px; border: 2px solid black;">Faculty</th>
                    <th style="padding: 5px; border: 2px solid black;">Address</th>
                </tr>
            </table>
        <script src="connect.js"></script>
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