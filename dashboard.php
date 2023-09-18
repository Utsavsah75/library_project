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
    <link rel="stylesheet" type="text/css" href="book_pag1.css">
</head>

<body>

    <div class="datetime">
        <p class="time"></p>
        <p class="date"></p>
    </div>
    <!-- <div class="library-contain"> -->
    <div class="library-container">
        <!-- <div class="top">  <marquee class="marquee" direction="alternate" scrollamount="12" onmouseover="this.stop()" onmouseout="this.start()"><b>Welcome To Library</b></marquee>  </div> -->
        <div class="top1">
            <ul>
                <li><a href="all_books.php"><i class="fa fa-book"></i>All Books</a></li>
                <li><a href="all_member.php"><i class="fa fa-users"></i>All Members</a></li>
                <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li>
                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                <!-- <li><a href="#"><i class="fas fa-shopping-cart"></i>Issue Books</a></li> --> <!-- <li><a href="#"><i class="fa fa-sign-out-alt"></i>Manage Users</a></li> -->
            </ul>
        </div>
    </div>
    <!-- </div> -->

    <div class="container1">
        <ul>
            <a style="text-decoration: none;" href="dashboard.php"> <button> DashBoard</button></a>
            <a style="text-decoration: none;" href="book_page.php"> <button> Add Books</button></a>
            <a style="text-decoration: none;" href="Issue.php"><button> Issue Books</button></a>
            <a style="text-decoration: none;" href="return.php">  <button> Return Books</button></a>
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
            <!-- <a style="text-decoration: none;" href="manage.php"> <button> Manage Users</button></a> -->
        </ul>
    </div>
    <!---*****************Total Book**********************-->
    <div id="Add_book" class="totalbook">
        <div class="row">
            <div class="col-xl-3 col-md-6"> <!-- Corrected "col-x1-3" to "col-xl-3" and removed extra square bracket "]" -->
                <div class="card bg-book text-white mb-4">
                    <div class="card-body">Total Books<br>
                        <?php
                        $quentity = "SELECT * FROM add_book";
                        $quentity_book = mysqli_query($conn, $quentity);

                        if ($category_total = mysqli_num_rows($quentity_book)) {
                            echo '<h4">' . $category_total . '</h4>';
                        } else {
                            echo '<h4>No Data</h4>';
                        }
                        ?>

                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="all_books.php">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---*****************Total User**********************-->
    <div id="Add_User" class="totaluser">
        <div class="row">
            <div class="col-xl-3 col-md-6"> <!-- Corrected "col-x1-3" to "col-xl-3" and removed extra square bracket "]" -->
                <div class="card bg-user text-white mb-4">
                    <div class="card-body">Total User<br>
                        <?php
                        $quentity = "SELECT * FROM addnew_user";
                        $user_quantity = mysqli_query($conn, $quentity);

                        if ($category_total = mysqli_num_rows($user_quantity)) {
                            echo '<h4">' . $category_total . '</h4>';
                        } else {
                            echo '<h4>No Data</h4>';
                        }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="all_member.php">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---*****************Total issue**********************-->
    <div id="Add_issue" class="totalissue">
        <div class="row">
            <div class="col-xl-3 col-md-6"> <!-- Corrected "col-x1-3" to "col-xl-3" and removed extra square bracket "]" -->
                <div class="card bg-issue text-white mb-4">
                    <div class="card-body">issue Books<br>
                        <?php
                        $quentity = "SELECT * FROM issue_book";
                        $issue_quantity = mysqli_query($conn, $quentity);

                        if ($category_total = mysqli_num_rows($issue_quantity)) {
                            echo '<h4">' . $category_total . '</h4>';
                        } else {
                            echo '<h4>No Data</h4>';
                        }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!---*****************Total return**********************-->
    <div id="Add_return" class="totalreturn">
        <div class="row">
            <div class="col-xl-3 col-md-6"> <!-- Corrected "col-x1-3" to "col-xl-3" and removed extra square bracket "]" -->
                <div class="card bg-return text-white mb-4">
                    <div class="card-body">Return Books<br>
                        <?php
                        $quentity = "SELECT * FROM request_book";
                        $return_quentity = mysqli_query($conn, $quentity);

                        if ($category_total = mysqli_num_rows($return_quentity)) {
                            echo '<h4">' . $category_total . '</h4>';
                        } else {
                            echo '<h4>No Data</h4>';
                        }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---*****************Total Borrow Books**********************-->
    <div id="Add_borrow" class="borrowbook">
        <div class="row">
            <div class="col-xl-3 col-md-6"> <!-- Corrected "col-x1-3" to "col-xl-3" and removed extra square bracket "]" -->
                <div class="card bg-borrow text-white mb-4">
                    <div class="card-body">Total Borrow Books</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<!-- <a href='delete_book.php?Id=" . $result['Id'] . "'> <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Id'] . "'>Delete</button></a> -->

</html>