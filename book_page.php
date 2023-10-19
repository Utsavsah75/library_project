<?php
require 'conn.php';
require 'check_admin.php';
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
    <div class="library-container">

        <div class="top1">
            <ul>
                <li><a href="all_books.php"><i class="fa fa-book"></i>All Books</a></li>
                <li><a href="all_member.php"><i class="fa fa-users"></i>All Members</a></li>
                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>

            </ul>
        </div>
    </div>
    <!-- </div> -->

    <div class="container1">
        <ul>
            <a style="text-decoration: none;" href="dashboard.php"> <button> DashBoard</button></a>
            <a style="text-decoration: none;" href="book_page.php"> <button> Add Books</button></a>
            <a style="text-decoration: none;" href="Issue.php"><button> Issue Books</button></a>
            <a style="text-decoration: none;" href="return.php"> <button> Return Books</button></a>
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
        </ul>
    </div>
    <div class="container3">

        <!---*****************ADD BOOKS**********************-->
        <div id="Add_Books" class="tabcontent1">

            <p style="display:none; margin-left: 10px;">This Field is required:</p>
            <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off">
                <table id="table" style="margin-top: 10px;" ;>
                    <!-- <tr>
                        <th><label for="book_id">Book ID*</label></th>
                        <td><input type="number" id="book_id" placeholder="Enter Book ID" style="padding: 5px;" name="book_id" required></td>
                    </tr> -->
                    <tr>
                        <th><label for="bname">Book Name</label></th>
                        <td><input type="text" id="bname" placeholder="Enter Book Name" style="padding: 5px;" name="book_name" required></td>
                    </tr>
                    <tr>
                        <th><label for="Aname">Author Name</label></th>
                        <td><input type="text" id="Aname" placeholder="Enter Author Name" style="padding: 5px;" name="book_author" required></td>
                    </tr>
                    <tr>
                        <th><label for="quantity">Quantity</label></th>
                        <td><input type="number" id="quantity" placeholder="Enter Quantity" style="padding: 5px;" name="book_quantity" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                            <input type="submit" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        </td>
                    </tr>
                </table>
                <script src="search.js"></script>
            </form>
        </div>
        <!-- <table border="2" style="width: 57.5%; border-collapse: collapse; margin-left: 500px;margin-top: -520px;">
            <tr style="height:35px ; background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(96, 100, 96, 0.6));">
                <th style='width:70px' ;>Book Id</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th style='width:70px' ;>Quantity</th>
                <th style='width:108px' ;>Action</th> -->

        <!-- </tr> -->
        <?php
        //             include("admin_bookserver.php");
        //             include('message.php');
        //             error_reporting(0);
        //             $query = "SELECT * FROM add_book";
        //             $data = mysqli_query($conn, $query);
        //             $total = mysqli_num_rows($data);

        //             if ($total != 0) {
        //                 while ($result = mysqli_fetch_assoc($data)) {
        //                     echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
        //     <td style='border: 2px solid black; text-align: center;'>" . $result['Id'] . "</td>
        //     <td style='border: 2px solid black; text-align: center;'>" . $result['Book Name'] . "</td>
        //     <td style='border: 2px solid black; text-align: center;'>" . $result['Author Name'] . "</td>
        //     <td style='border: 2px solid black; text-align: center;'>" . $result['Quantity'] . "</td>
        //     <td style='border: 2px solid black; text-align: center;'>
        //         <a href='update_book.php?Id=" . $result['Id'] . "'>
        //          <button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
        //         <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Id'] . "'>Delete</button></a>

        //     </td>
        // </tr>";
        //                 }
        //             } else {
        //                 echo "<tr><td colspan='5' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
        //             }
        //             
        ?>
        <!-- </table>
    </div> -->
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
<!-- <a href='delete_book.php?Id=" . $result['Id'] . "'> <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Id'] . "'>Delete</button></a> -->

</html>