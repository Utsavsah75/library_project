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
                <!-- <li><a href="#"><i class="fas fa-shopping-cart"></i>Borrow Books</a></li> -->
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
            <button class="tablinks" onclick="openTab(event, 'Add_Books')"> Add Books</button>
            <button class="tablinks" onclick="openTab(event, 'Borrow_Books')"> Borrow Books</button>
            <button class="tablinks" onclick="openTab(event, 'Return_Books')"> Return Books</button>
            <button class="tablinks" onclick="openTab(event, 'Add_Users')"> Add Users</button>
            <button class="tablinks" onclick="openTab(event, 'Manage_Users')"> Manage Users</button>
        </ul>
    </div>
    <!-- </div> -->

    <input type="text" placeholder="Search" style=" float: left;margin-left: 975px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-463px); width: 240px; height: 25px;">
    <!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> -->

    <div class="container3">

        <!---*****************ADD BOOKS**********************-->
        <div id="Add_Books" class="tabcontent">
          
                <p style="display:none;">This Field is required:</p>
                <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off">
                <table>
    <tr>
        <th><label for="book_id">Book ID*</label></th>
        <td><input type="number" id="book_id" placeholder="Enter Book ID" style="padding: 5px;" name="book_id" required></td>
    </tr>
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

                </form>
        </div>

        <table border="2" style="width: 57.5%; border-collapse: collapse; margin-left: 525px;margin-top: -408px;">
            <tr style="height:35px ; background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(96, 100, 96, 0.6));">
                <th style='width:70px' ;>Book Id</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th style='width:70px' ;>Quantity</th>
                <th style='width:108px' ;>Action</th>

            </tr>
            <?php
            include("admin_bookserver.php");
            include('message.php');
            error_reporting(0);
            $query = "SELECT * FROM add_book";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);

            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
    <td style='border: 2px solid black; text-align: center;'>" . $result['Id'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Book Name'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Author Name'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>" . $result['Quantity'] . "</td>
    <td style='border: 2px solid black; text-align: center;'>
        <a href='update_book.php?Id=" . $result['Id'] . "'><button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
     
        <button style='height: 25px; width: 45px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: red' type='submit' name='Delete' onClick='onDelete(this)' value='" . $result['Id'] . "'>Delete</button>
        
    </td>
</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>


    <!-- *****************BORROW BOOK********************** -->
  <div id="Borrow_Books" class="tabcontent">
        <form onsubmit="event.preventDefault(); onFormSubmit();" autocomplete="off">
            <table  style="margin-left: 20px; margin-top: 5px;">
            <tr>
                    <th>Book ID</th>
                    <td><input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Borrow ID</th>
                    <td><input type="text" name="Borrow_id" placeholder="Enter Borrow ID" style="padding: 5px;"></td>
                </tr>
              
                <tr>
                    <th>Book Name</th>
                    <td><input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;"></td>
                </tr>
              
                <tr>
                    <th>Issue Date</th>
                    <td><input type="text" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th>Due Date</th>
                    <td><input type="date" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="button" name="submit" value="Borrow" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;">
                        <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;">
                    </td>
                </tr>
            </table>
        </form>
        <table id="booklist3" style="border-collapse: collapse; width: 760px; height: 0px; margin-top: -206px; margin-left: 305px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 5px; border: 2px solid black;">Borrow ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                    <th style="padding: 5px; border: 2px solid black;">User ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Issue Date</th>
                    <th style="padding: 5px; border: 2px solid black;">Due Date</th>
                </tr>
            </thead>
            <tbody id="ListBody" onclick="selectRow(event)" style="background-color: #4CAF50; color: #fff; padding: 5px; border: 1px solid black;">
            </tbody>
        </table>
    </div>

    <!---*****************RETURN BOOKS**********************-->
    <div id="Return_Books" class="tabcontent">
        
            <p>This Field is required:</p>
            <form onsubmit="event.preventDefault();onReturnFormSubmit();" autocomplete="off">
            <table>
    <tr>
        <th><label for="Return_id" style="text-align: left;">Return ID</label></th>
        <td><input type="text" name="Return_id" placeholder="Enter Return ID" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="bID" style="text-align: left;">Book ID</label></th>
        <td><input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="Bname" style="text-align: left;">Book Name</label></th>
        <td><input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="u_id" style="text-align: left;">User ID</label></th>
        <td><input type="text" name="u_id" placeholder="Enter User Name" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="iss_D" style="text-align: left;">Issue Date</label></th>
        <td><input type="text" name="iss_D" placeholder="Issue Date" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="due_D" style="text-align: left;">Due Date</label></th>
        <td><input type="text" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th><label for="Return_D" style="text-align: left;">Return Date</label></th>
        <td><input type="text" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
            <input type="Button" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        </td>
    </tr>
</table>

            </form>
            <table id="returnBookList" style="border-collapse: collapse; width: 101%;">
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 5px; border: 2px solid black;">Return ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                    <th style="padding: 5px; border: 2px solid black;">book Name</th>
                    <th style="padding: 5px; border: 2px solid black;">User ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Issue Date</th>
                    <th style="padding: 5px; border: 2px solid black;">Due Date</th>
                    <th style="padding: 5px; border: 2px solid black;">Return Date</th>

                </tr>
            </table>
        <script src="connect.js"></script>
    </div>

    <!---*****************ADD USERS**********************-->
    <div id="Add_Users" class="tabcontent">
        
            <p>This Field is required:</p>
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
            <input type="Button" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
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
            <table style="border-collapse: collapse; width: 101%;">
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

    <!---*****************MANAGE USERS**********************-->

    <div id="Manage_Users" class="tabcontent">

        <fieldset style="width:800px; height: 397px;">
            <p>This Field is required:</p>
            <table>
                <tr>
                    <th style="text-align: left;">ID</th>
                    <td><input type="text" name="u_id" placeholder="Enter User Id" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th style="text-align: left;">Name</th>
                    <td><input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th style="text-align: left;"> Email</th>
                    <td><input type="text" name="Aname" placeholder="Enter User Email" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th style="text-align: left;">Password</th>
                    <td><input type="text" name="password" placeholder="Enter User IPassword" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td> <select id="gender" name="gender">
                            <option value="Enter User Iale">Male</option>
                            <option value="Enter User Iemale">Female</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th style="text-align: left;">Contact_No</th>
                    <td><input type="text" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <th style="text-align: left;">Faculty</th>
                    <td><input type="text" name="faculty" placeholder="Enter User Faculty/Class" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <th style="text-align: left;">Address</th>
                    <td><input type="textarea" name="faculty" placeholder="Enter User Address" style="padding: 5px;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <div style="display: flex; justify-content: flex-end; gap: 15px;">
                            <input type="Button" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            <input type="Button" name="submit" value="Update" style="padding: 10px 20px; font-weight:bold; background-color: #ffa200; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <div style="display: flex; justify-content: flex-end; gap: 15px;">
                            <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            <input type="Button" name="submit" value=" Clear " style="padding: 10px 21px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        </div>
                    </td>
                </tr>
            </table>
            <fieldset style="width:695px; height: 388px;   margin-top:-349px;margin-left: 290px;">
                <p></p>
                <table style="border-collapse: collapse; width: 101%;">
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                        <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                        <th style="padding: 5px; border: 2px solid black;">Author Name</th>
                        <th style="padding: 5px; border: 2px solid black;">Quantity</th>
                    </tr>
                </table>
            <script src="connect.js"></script>
    </div>
    </div>
    <script>
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
            document.getElementById("Add_Books").style.display = "block";
            document.getElementById("Borrow_Books").style.display = "none";
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