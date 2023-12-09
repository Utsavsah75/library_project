<?php
require 'conn.php';
// session_start(); if (isset($_POST['submit'])) { 	header("location:Issue.php"); } $aid=$_SESSION['submit']; $a=mysqli_query($set,"SELECT * FROM admin WHERE Book_Id='$aid'"); $b=mysqli_fetch_array($a); $name=$b['name']; $bn=$_POST['name']; $au=$_POST['auth']; if($bn!=NULL && $au!=NULL) { 	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')"); 	if($sql) 	{ 		$msg="Successfully Added"; 	} 	else 	{ 		$msg="Book Already Exists"; 	} }
?>
<html>

<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <!-- <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li> -->
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
            <a style="text-decoration: none;" href="return.php"> <button> Return Books</button></a>
            <a style="text-decoration: none;" href="add.php"> <button> Add Users</button></a>
            <!-- <a style="text-decoration: none;" href="manage.php"> <button> Manage Users</button></a> -->
        </ul>
    </div>

    <form action="" method="GET" style="padding: 0px;margin-top: -360px; margin-left: 375px;">
        <tr>
            <th>Book ID</th>
            <input type="text" name="Id" placeholder="Enter Book ID" value="<?php if (isset($_GET['Id'])) {
                                                                                echo $_GET['Id'];
                                                                            } ?>" style="width: 120px; " required>
        </tr>
    </form><br>
      <?php

                    if (isset($query_run) && mysqli_num_rows($query_run) <= 0) {
                        echo "<p style='padding: 0px; text-align:center; margin-top: -30px; color:Red;'>No records found</p>";
                    }
            ?>


    <!-- *****************Issue BOOK********************** -->
    <!-- <div id="Issue_Books" class="tabcontent2" style="width:360;"> -->
    <div id="Issue_Books" class="tabcontent2"  style="width: 370px;">

        <p style="display:none; margin-left: 10px;">This Field is required:</p>

        <form id="bookForm" method="POST" action="issuebook_server.php" autocomplete="off">

            <div class="row">
                <table style="margin-top: 40px; margin-left: 20px;">
                    <div class="row">
                        <?php
                        if (isset($_GET['Id'])) {
                            $Id = $_GET['Id'];

                            $query = "SELECT * FROM Books_with_id INNER JOIN Books ON Books_with_id.book=Books.id WHERE book_id='$Id' AND is_issued=0 ";
                            // $query = "SELECT * FROM students INNER JOIN Books ON students.book=id WHERE students='$Id' AND is_issued=0 ";
                            $query_run = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($query_run);
                        }
                        ?>


                        <tr>
                            <th>Book Name</th>
                            <td>
                                <input type="hidden" name="book_id" value="<?php if (isset($_GET['Id'])) {
                                                                                echo $_GET['Id'];
                                                                            } ?>">
                                <input type="hidden" name="b_id" value="<?php if (isset($data)) {
                                                                            echo $data['id'];
                                                                        } ?>">
                                <input type="text" name="B_Name" placeholder="Enter book name" value="<?php if (isset($data)) {
                                                                                                            echo $data['name'];
                                                                                                        } ?>">

                            </td>

                        </tr>

                        <tr>
                            <th>User ID</th>
                            <td>
                                <input type="number" name="U_id" placeholder="Enter User ID" style="padding: 5px;" id="user_id" required>
                            </td>
                        </tr>

                        <tr>
                            <th>User Name</th>
                            <td>
                                <input type="text" name="U_Name" placeholder="Enter User Name" style="padding: 5px;" required>
                                <img style='width:40px;margin-top: -21px;' id="user_photo" src="">

                            </td>
                        </tr>


                        <tr>
                            <th>Quantity</th>
                            <td><input type="number" name="quantity" value="1" style="padding: 5px;" required disabled></td>
                        </tr>

                        <tr>
                            <th for="class">Faculty</th>
                            <th>
                                <select name="faculty" style="padding: 5px; width: 150px; margin-left: -3px;" required>
                                    <option value="DIT">DIT</option>
                                    <option value="DCE">DCE</option>
                                    <option value="DEE">DEE</option>
                                    <option value="DGE">DGE</option>
                                    <option value="DHM">DHM</option>
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th>Issue Date</th>
                            <td><input type="date" id="iss_D" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;" required></td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td><input type="date" id="due_D" name="due_D" placeholder="Enter Due Date" style="padding: 5px;" required></td>
                        </tr>


                        <td colspan="2" style="text-align: center;">
                        <button type="submit" name="Issue" value="Issue" class="btn btn-success">ISSUE</button>
                        <button type="Button" name="clear" value="Clear" class="btn btn-danger">CLEAR</button>
                            <!-- <input type="submit" name="Issue" value="Issue" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;"> -->
                            <!-- <input type="Button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;"> -->
                        </td>
                        </tr>
                    </div>

                    <?php

                    if (isset($query_run) && mysqli_num_rows($query_run) <= 0) {
                        echo "<p style='padding: 0px; text-align:center; margin-top: -30px; color:Red;'>No records found</p>";
                    }
                    ?>
                   

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


            document.getElementById("user_id").addEventListener('input', function() {
                var id = document.getElementById("user_id").value;
                console.log(id);
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var data = JSON.parse(this.responseText);
                        console.log(data);
                        document.getElementsByName("U_Name")[0].value = data.std_name;
                        document.getElementsByName("faculty")[0].value = data.faculty;
                        document.getElementById("user_photo").src = "uploads/" + data.photo;
                    } else {
                        document.getElementsByName("U_Name")[0].value = "";
                        document.getElementsByName("faculty")[0].value = "";
                        document.getElementById("user_photo").src = "";
                    }
                };
                xhttp.open("GET", "getuser.php?id=" + id, true);
                xhttp.send();
            });
            // setting the return date to today's date
            document.getElementById('iss_D').valueAsDate = new Date();
            // setting the due date to 7 days from today's date
            // var today = new Date();
            // var nextWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7);
            // document.getElementById('due_D').valueAsDate = nextWeek;
        </script>
</body>

</html>