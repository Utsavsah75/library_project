
<?php 
include('./header.php');
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="datetime">
        <p class="time"></p>
        <p class="date"></p>
    </div>
    <div class="library-container">
        <div class="top">
            <marquee class="marquee" direction="alternate" scrollamount="12" onmouseover="this.stop()" onmouseout="this.start()"><b>Welcome To Library</b></marquee>
        </div>
        <div class="top1">
            <ul>
                <li><a href="#"><i class="fa fa-book"></i>All Books</a></li>
                <!-- <li><a href="#"><i class="fa fa-users"></i>All Members</a></li> -->
                <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending Books</a></li>
                <li><a href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="container1">
        <ul>
            <button class="tablinks" onclick="openTab(event, 'Borrow_Books')">Borrow Books</button>
            <button class="tablinks" onclick="openTab(event, 'Return_Books')">Return Books</button>
            <button class="tablinks" onclick="openTab(event, 'overdue_return')">Overdue Return</button>
            <!-- <button class="tablinks" onclick="openTab(event, 'Add_Users')">Add Users</button> -->
            <!-- <button class="tablinks" onclick="openTab(event, 'Manage_Users')">Manage Users</button> -->
        </ul>
    </div> 

    <input type="text" placeholder="Search" style="float: left; margin-left: 975px; border-radius: 8px; border: 2px solid; transform: translateY(-455px); width: 240px; height: 25px;">
    <!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-495px);"></i> -->

    
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

   <!-- *****************OVER DUE RETURN********************** -->
   <div id="overdue_return" class="tabcontent">
        <form onsubmit="event.preventDefault(); onReturnFormSubmit();" autocomplete="off">
        <table  style="margin-left: 20px; margin-top: 5px;">
    <tr>
        <th>Return ID</th>
        <td><input type="text" name="Return_id" placeholder="Enter Return ID" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Book ID</th>
        <td><input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Book Name</th>
        <td><input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>User ID</th>
        <td><input type="text" name="u_id" placeholder="Enter User Name" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Issue Date</th>
        <td><input type="text" name="iss_D" placeholder="Issue Date" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Due Date</th>
        <td><input type="text" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Return Date</th>
        <td><input type="text" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Fine</th>
        <td><input type="text" name="Fine" value="Rs:.10" style="padding: 5px; background :red;"></td>
    </tr>
</table>

            <div class="form-row">
                <div style="display: center; margin-left: 50px; justify-content: flex-end; gap: 15px;">
                    <input type="Button" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;">
                    <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;">
                </div>
            </div>
        </form>
        <table id="dueBookList" style="border-collapse: collapse; width: 71%; margin-top: -310px; margin-left: 305px; margin-right: auto;">
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 5px; border: 2px solid black;">Return ID</th>
                <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                <th style="padding: 5px; border: 2px solid black;">User ID</th>
                <th style="padding: 5px; border: 2px solid black;">Issue Date</th>
                <th style="padding: 5px; border: 2px solid black;">Due Date</th>
                <th style="padding: 5px; border: 2px solid black;">Return Date</th>
                <th style="padding: 5px; border: 2px solid black;">Fine</th>
            </tr>
        </table>
        <script src="connect.js"></script>
    </div>

        <!---*****************RETURN BOOKS**********************-->
        <div id="Return_Books" class="tabcontent">
                <form onsubmit="event.preventDefault();onReturnFormSubmit();" autocomplete="off">
                <table  style="margin-left: 20px; margin-top: 5px;">
  <tr>
    <th>Return ID</th><td><input type="text" name="Return_id" placeholder="Enter Return ID" style="padding: 5px;"></td></tr>
  <tr>
    <th>Book ID</th><td><input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td></tr>
  <tr>
    <th>Book Name</th><td><input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;"></td></tr>
  <tr>
    <th>User ID</th><td><input type="text" name="u_id" placeholder="Enter User Name" style="padding: 5px;"></td></tr>
  <tr>
    <th>Issue Date</th><td><input type="text" name="iss_D" placeholder="Issue Date" style="padding: 5px;"></td></tr>
  <tr>
    <th>Due Date</th><td><input type="text" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td></tr>
  <tr>
    <th>Return Date</th><td><input type="text" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;"></td></tr>
</table>

                    <div class="form-row">
                        <div style="display: flex; justify-content: flex-end; gap: 15px;">
                            <input type="Button" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;">
                            <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;">
                        </div>
                    </div>
                </form>
                </form>
                <table id="returnBookList" style="border-collapse: collapse;width: 71%; margin-top: -276px; margin-left: 300px;">
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
                <form id="userForm" onsubmit="event.preventDefault(); onFormSubmit();" autocomplete="off">
                <table style="margin-left: 20px; margin-top: 5px;">
    <tr>
        <th>User ID</th>
        <td><input type="text" name="u_id" placeholder="Enter User Id" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><input type="text" name="Aname" placeholder="Enter User Email" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Password</th>
        <td><input type="text" name="password" placeholder="Enter User Password" style="padding: 5px;"></td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>
            <select id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Contact_No</th>
        <td><input type="text" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;"></td>
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
        <td colspan="2" style="text-align: right;">
            <div style="display: flex; justify-content: flex-center;">
                <input type="Button" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;margin-left: 85px; border-radius: 4px; cursor: pointer;">
                <!-- <input type="Button" name="submit" value="Update" style="padding: 10px 20px; font-weight:bold; background-color: #ffa200; color: #fff;border-radius: 4px; cursor: pointer;"> -->
            </div>
        </td>
    <!-- </tr>
    <tr>
        <td colspan="2" style="text-align: right;">
            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff;border-radius: 4px; cursor: pointer;">
                <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;">
            </div>
        </td>
    </tr> -->
</table>

                </form>
                <table id="addBookList" style="border-collapse: collapse;width: 71%; margin-top: -310px; margin-left: 300px;">
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 5px; border: 2px solid black;">User ID</th>
                        <th style="padding: 5px; border: 2px solid black;">Name</th>
                        <th style="padding: 5px; border: 2px solid black;">Email</th>
                        <!-- <th style="padding: 5px; border: 2px solid black;">Password</th> -->
                        <th style="padding: 5px; border: 2px solid black;">Gender</th>
                        <th style="padding: 5px; border: 2px solid black;">Contact_No</th>
                        <th style="padding: 5px; border: 2px solid black;">Address</th>
                        <th style="padding: 5px; border: 2px solid black;">Faculty</th>
                    </tr>
                </table>
            <!-- </fieldset> -->
            <script src="connect.js"></script>
        </div>

        <!---*****************MANAGE USERS**********************-->

        <div id="Manage_Users" class="tabcontent">

        <table  style="margin-left: 20px; margin-top: 5px;">
  <tr>
    <th>ID</th> <td><input type="text" name="u_id" placeholder="Enter User Id" style="padding: 5px;"></td>
  </tr>
  <tr>
    <th>Name</th> <td><input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;"></td>
  </tr>
  <tr>
    <th>Email</th> <td><input type="text" name="Aname" placeholder="Enter User Email" style="padding: 5px;"></td>
  </tr>
  <tr>
    <th>Password</th> <td><input type="text" name="password" placeholder="Enter User Password" style="padding: 5px;"></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><select id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </td>
  </tr>
  <tr>
    <th>Contact_No</th> <td><input type="text" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;"></td>
  </tr>
  <tr>
    <th>Faculty</th> <td><input type="text" name="faculty" placeholder="Enter User Faculty/Class" style="padding: 5px;"></td>
  </tr>
  <tr>
    <th>Address</th> <td><textarea name="address" placeholder="Enter User Address" style="padding: 5px;"></textarea></td>
  </tr>

                    <tr>
                        <td colspan="2" style="text-align: right;">
                            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                                <input type="Button" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff;border-radius: 4px; cursor: pointer;">
                                <input type="Button" name="submit" value="Update" style="padding: 10px 20px; font-weight:bold; background-color: #ffa200; color: #fff;border-radius: 4px; cursor: pointer;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                                <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff;border-radius: 4px; cursor: pointer;">
            <td style="text-align: right;">
            <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff;border-radius: 4px; cursor: pointer;">
        </td>                        </td>
                    </tr>
                </table>
                <!-- <fieldset style="width:695px; height: 388px;   margin-top:-349px;margin-left: 290px;"> -->
                    <!-- <legend></legend> -->
                    <table style="border-collapse: collapse; width: 101%;">
                        <tr style="background-color: #f2f2f2;">
                            <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                            <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                            <th style="padding: 5px; border: 2px solid black;">Author Name</th>
                            <th style="padding: 5px; border: 2px solid black;">Quantity</th>
                        </tr>
                    </table>
                <!-- </fieldset> -->
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