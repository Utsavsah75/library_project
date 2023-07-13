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
    <div class="library-contain">
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
                    <li><a href="#"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container1">
        <div class="library-container2">
            <ul>
                <button class="tablinks" onclick="openTab(event, 'Add_Books')"> Add Books</button>
                <button class="tablinks" onclick="openTab(event, 'Borrow_Books')"> Borrow Books</button>
                <button class="tablinks" onclick="openTab(event, 'Return_Books')"> Return Books</button>
                <button class="tablinks" onclick="openTab(event, 'Add_Users')"> Add Users</button>
                <button class="tablinks" onclick="openTab(event, 'Manage_Users')"> Manage Users</button>
            </ul>
        </div>
    </div>

    <input type="text" placeholder="Search" style=" float: left;margin-left: 930px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-503px); width: 240px; height: 25px;">
    <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-495px);"></i>

    <div class="container3">
    <div id="Add_Books" class="tabcontent">
        <table>
            <tr>
                <th style="text-align: left;">Book ID</th>
                <td><input type="text" name="book_id" placeholder="Enter Book ID" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Book Name</th>
                <td><input type="text" name="bname" placeholder="Enter Author Name" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Author Name</th>
                <td><input type="text" name="Aname" placeholder="Enter Author Name" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Quantity</th>
                <td><input type="text" name="num" placeholder="Total Books" style="padding: 5px;"></td>
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
    </div>

    <div id="Borrow_Books" class="tabcontent">
        <table>
            <tr>
                <th style="text-align: left;">Borrow ID</th>
                <td><input type="text" name="Borrow_id" placeholder="Enter Borrow ID" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Book ID</th>
                <td><input type="text" Name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Book Name</th>
                <td><input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">User ID</th>
                <td><input type="text" name="u_id" placeholder="Enter User ID" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Issue Date</th>
                <td><input type="text" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;"></td>
            </tr>
            <th style="text-align: left;">Due Date</th>
            <td><input type="date" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
            </tr>
            <tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <div style="display: flex; justify-content: flex-end; gap: 15px;">
                        <input type="Button" name="submit" value="Borrow" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    </div>
                </td>
            </tr>

        </table>
    </div>

    <div id="Return_Books" class="tabcontent">
        <table>
            <tr>
                <th style="text-align: left;">Return ID</th>
                <td><input type="text" name="Return_id" placeholder="Enter Return ID" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Book ID</th>
                <td><input type="text" Name="bID" placeholder="Enter Book ID" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Book Name</th>
                <td><input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">User ID</th>
                <td><input type="text" name="u_id" placeholder="Enter User Name" style="padding: 5px;"></td>
            </tr>
            <tr>
                <th style="text-align: left;">Issue Date</th>
                <td><input type="text" name="iss_D" placeholder="Issue Date" style="padding: 5px;"></td>
            </tr>
            <th style="text-align: left;">Due Date</th>
            <td><input type="text" name="due_D" placeholder="Enter Due Date" style="padding: 5px;"></td>
            </tr>
            </tr>
            <th style="text-align: left;">Return Date</th>
            <td><input type="text" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <div style="display: flex; justify-content: flex-end; gap: 15px;">
                        <input type="Button" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div id="Add_Users" class="tabcontent">

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
    </div>

    <div id="Manage_Users" class="tabcontent">
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