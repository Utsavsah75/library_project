<?php
require 'conn.php';
require 'check_admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>

<body>

<div id="video-background">
    <video autoplay muted loop id="video-background">
        <source src="LB.mp4" type="video/mp4">
      </video>

    <div class="datetime">
        <p class="time"></p>
        <p class="date"></p>
    </div>
    <div class="library-container">

        <div class="top1">
            <ul>
                <li><a href="all_books.php"><i class="fa fa-book"></i>All Books</a></li>
                <li><a href="all_member.php"><i class="fa fa-users"></i>All Members</a></li>

                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="container1">
        <ul>
            <a style="text-decoration: none;" href="dashboard.php"> <button> DashBoard</button></a>
            <a style="text-decoration: none;" href="book_page.php"> <button> Add Books</button></a>
            <a style="text-decoration: none;" href="Issue.php"><button> Issue Books</button></a>
            <!-- <a style="text-decoration: none;" href="return.php"> <button> Return Books</button></a> -->
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
        </ul>
    </div>


    <!---*****************ADD USERS**********************-->
    <div id="Add_Users" class="tabcontent4 d-inline-block w-auto h-auto">
    

        <form id="userForm" method="POST" action="add_user_data.php" autocomplete="off" enctype="multipart/form-data">
            <table  style="margin-left: 20px;"> 
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;" required></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" placeholder="Enter User Email" style="padding: 5px;" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" placeholder="Enter User Password" style="padding: 5px;" required></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <select id="gender" name="gender" style="margin-left: 55px; margin-bottom: 8px;" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Contact_No</th>
                    <td><input type="number" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;" required></td>
                </tr>
                <tr>
                    <th>Faculty</th>
                    <td>
                        <select name="faculty" style="padding: 5px; width: 150px;" required>
                            <option value="DIT">DIT</option>
                            <option value="DCE">DCE</option>
                            <option value="DEE">DEE</option>
                            <option value="DGE">DGE</option>
                            <option value="DHM">DHM</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" placeholder="Enter User Address" style="padding: 5px;" required></textarea></td>
                </tr>

                <tr>
                    <th>Photo</th>
                    <td><input type="file" name="photo" accept="image/png, image/jpeg, image/jpg" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left;">
                    <button type="submit" name="submit" value="Save" class="btn btn-success" style="padding: 5px 25px; margin-left: 90px; font-weight:bold; background-color: #4CAF50; color: #fff; border-radius: 4px; cursor: pointer;">Save</button>
                    </td>
                </tr>
            </table>
        </form>
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