<?php
include('./header.php');
?>
<!DOCTYPE html>
<html>

<head>
<link rel = "stylesheet" href = "bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="datetime">
        <p class="time"></p>
        <p class="date"></p>
    </div>
    <!-- <div class="library-container"> -->
    <!-- <div class="top">
            <marquee class="marquee" direction="alternate" scrollamount="12" onmouseover="this.stop()" onmouseout="this.start()"><b>Welcome To Library</b></marquee>
        </div> -->
    <div class="top1">
        <ul>
            <!--<li><a href="#"><i class="fa fa-book"></i>All Books</a></li>
                <li><a href="#"><i class="fa fa-users"></i>All Members</a></li> 
                <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li>-->
            <li><a href="index.php" style="margin-left: 25rem; margin-top: 3.8rem;"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>

    <!-- *****************BORROW BOOK********************** -->
    <div id="Borrow_Books" class="tabcontent">
        <form id="bookForm" method="POST" action="borrowbook_server.php" autocomplete="off">
            <!-- <form id="bookForm" method="POST" action="issuebook_server.php" autocomplete="off"> -->

            <table style="margin-left: 20px; margin-top: 5px;">
                <tr>
                    <th>Book ID</th>
                    <td><input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td><input type="text" name="user_id" placeholder="Enter User ID" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Book Name</th>
                    <td><input type="text" name="B_name" placeholder="Enter Book Name" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <th>Issue Date</th>
                    <td><input type="date" id="iss_D" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Due Date</th>
                    <td><input type="date" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="button" name="submit" value="Borrow" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;">
                        <!-- <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;"> -->
                    </td>
                </tr>
            </table>
        </form>
         <table id="booklist3" style="border-collapse: collapse; width: 900px; height: 0px; margin-top: 25px; margin-left: -245px;">
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 5px; border: 2px solid black;">Book Id</th>
                <th style="padding: 5px; border: 2px solid black;">User Name</th>
                <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                <th style="padding: 5px; border: 2px solid black;">Faculty</th>
                <th style="padding: 5px; border: 2px solid black;">Quantity</th>
                <th style="padding: 5px; border: 2px solid black;">Issue Date</th>
                <th style="padding: 5px; border: 2px solid black;">Due Date</th>
                 <!-- <th style="padding: 5px; border: 2px solid black;">Return Date</th>  -->
                <th style="padding: 5px; border: 2px solid black;" style='width:108px' ;>
                    Action</th>
                <script src="search.js"></script>
            </tr>



            <?php
            include("returnbooK_server.php");
            include('message.php');
            error_reporting(0);

            $query = "SELECT * FROM issue_book INNER JOIN students ON issue_book.std_id = students.id INNER JOIN Books_with_id ON issue_book.book_id = Books_with_id.book_id INNER JOIN Books on Books_with_id.book = Books.id";

            
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            $sn = 1;

            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
            <td style='border: 2px solid black; text-align: center;'>" . $sn . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['std_name'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['name'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['faculty'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . 1 . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['issue_date'] . "</td>
            <td style='border: 2px solid black; text-align: center;'>" . $result['due_date'] . "</td>
            <td>
        <a href='update_book.php?Id=" . $result['Id'] . "'><button style='height: 25px; align-items: center; width: 80px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onReturn(this)'> Return </button></a>
        
    </td>
</tr>";
                    $sn++;
                }
            } else {
                echo "<tr><td colspan='12' style='padding: 10px; border: 2px solid black; color:red;'>Not Borrow Book Yet</td></td></tr>";
            }

            ?>

        </table>
        <script src="search.js"></script>
        <script>
            // confirm delete operation
            //    document.querySelector("#return_btn").addEventListener('click', function(e) {
            //         console.log("clicked");
            //         let choice = confirm("Are you sure?");
            //         if (!choice) {
            //             e.preventDefault();
            //         } 
            //     });

            //setting the date to current borrow date
            document.getElementById('iss_D').valueAsDate = new Date();

            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            window.onload = function() {
                // Display Add Books content by default and hide other tabs
                document.getElementById("Borrow_Books").style.display = "block";
                document.getElementById("overdue_return").style.display = "none";
                document.getElementById("Return_Books").style.display = "none";
                document.getElementById("Add_Users").style.display = "none";
                document.getElementById("Manage_Users").style.display = "none";
            };

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
                const DAYS = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                const MONTHS = [
                    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
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