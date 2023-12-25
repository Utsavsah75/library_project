<?php
require 'conn.php';
?>
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
                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                <!-- <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li> -->
                <!-- <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li> -->
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
            <!-- <a style="text-decoration: none;" href="return.php"> <button> Return Books</button></a> -->
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
            <!-- <a style="text-decoration: none;" href="manage.php"> <button> Manage Users</button></a> -->
        </ul>
    </div>
    <!-- </div> 

    <div class="top">
        <input type="text" placeholder="Search">
    </div> <!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->


    <form action="" method="GET" style="padding: 5px;margin-top: -325px; margin-left: 375px;">
        <tr>
            <th>Book ID</th>
            <input type="text" name="Id" placeholder="Enter Book ID" value="<?php if (isset($_GET['Id'])) {
                                                                                echo $_GET['Id'];
                                                                            } ?>" style="width: 120px; " required>
        </tr>


    </form>


    <!-- *****************return BOOK********************** -->
    <div id="return_Books" class="tabcontent2" style=" background-color: rgba(255, 258, 258, 0.57); border: 2px solid black ">
        <p style="display:none; margin-left: 10px;">This Field is required:</p>

        <form id="bookForm" method="POST" action="returnbook_server.php" autocomplete="off">

            <div class="row">
                <table style="padding: 20px;margin-top: 50px;">
                    <div class="row">
                        <?php
                        if (isset($_GET['Id'])) {
                            $Id = $_GET['Id'];

                            // $query = "SELECT * FROM issue_book WHERE Book_Id='$Id' ";
                            // $query_run = mysqli_query($conn, $query);

                            // $data = mysqli_fetch_assoc($query_run);

                            $query = "SELECT * FROM issue_book INNER JOIN Books_with_id ON issue_book.book_id=Books_with_id.book_id INNER JOIN Books ON Books_with_id.book = Books.id INNER JOIN students ON issue_book.std_id=students.id WHERE issue_book.book_id='$Id' AND is_issued=1 ";
                            // $query = "SELECT * FROM Books_with_id INNER JOIN Books ON Books_with_id.book=Books.id WHERE book_id='$Id' AND is_issued=1 ";
                            $query_run = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($query_run);
                            // var_dump($data);
                        }
                        ?>
                        <tr>
                            <input type="hidden" name="book_id" value="<?php if (isset($data)) echo $data['book_id'] ?>" required>
                            <input type="hidden" name="std_id" value="<?php if (isset($data)) echo $data['std_id'] ?>" required>
                            <th>User Name</th>
                            <td><input type="text" name="U_Name" value="<?php if (isset($data)) {
                                                                            echo $data['std_name'];
                                                                        } ?>" placeholder="Enter User Name" style="padding: 5px;" required></td>
                        </tr>

                        <th>Book Name</th>
                        <td><input type="text" name="B_Name" value="<?php if (isset($data)) {
                                                                        echo $data['name'];
                                                                    } ?>" placeholder="Enter Book Name" style="padding: 5px;" required></td>
                        </tr>

                        <tr>
                            <th>Quantity</th>
                            <td><input type="number" name="quantity" value="1" style="padding: 5px;" required></td>
                        </tr>

                        <tr>
                            <th for="class">Faculty</th>
                            <th><select name="faculty" style="padding: 5px; width: 150px; margin-left: -30px;" required>
                                    <option value="DIT" <?php if (isset($data) && $data['faculty'] == 'DIT') echo "selected" ?>>DIT</option>
                                    <option value="DCE" <?php if (isset($data) && $data['faculty'] == 'DCE') echo "selected" ?>>DCE</option>
                                    <option value="DEE" <?php if (isset($data) && $data['faculty'] == 'DEE') echo "selected" ?>>DEE</option>
                                    <option value="DGE" <?php if (isset($data) && $data['faculty'] == 'DGE') echo "selected" ?>>DGE</option>
                                    <option value="DHM" <?php if (isset($data) && $data['faculty'] == 'DHM') echo "selected" ?>>DHM</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>Issue Date</th>
                            <td><input type="date" name="iss_D" value="<?php if (isset($data)) {
                                                                            echo $data['issue_date'];
                                                                        } ?>" placeholder="Enter Issue Date" style="padding: 5px;" required></td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td><input type="date" name="due_D" value="<?php if (isset($data)) {
                                                                            echo $data['due_date'];
                                                                        } ?>" placeholder="Enter Due Date" style="padding: 5px;" required></td>
                        </tr>
                        <tr>
                            <th>Return Date</th>
                            <td><input type="date" id="return_date" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;">
                                <input type="Submit" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border-radius: 4px; cursor: pointer;">
                                <input type="Reset" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border-radius: 4px; cursor: pointer;">
                            </td>
                        </tr>
                    </div>
                </table>
            </div>
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

            // setting the return date to today's date
            document.getElementById('return_date').valueAsDate = new Date();
        </script>
</body>

</html>