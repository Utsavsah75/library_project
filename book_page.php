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

    <input type="text" placeholder="Search" style=" float: left;margin-left: 975px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-503px); width: 240px; height: 25px;">
    <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-495px);"></i>

    <div class="container3">

        <!---*****************ADD BOOKS**********************-->
        <div id="Add_Books" class="tabcontent">
            <fieldset style="width: 0px; height: 397px;">
                <legend>This Field is required:</legend>
                <form id="bookForm" autocomplete="off">
                    <div class="form-row">
                        <label>Book ID*</label>
                        <input type="text" id="book_id" placeholder="Enter Book ID" style="padding: 5px;">jjjj
                    </div>
                    <div class="form-row">
                        <label>Book Name</label>
                        <input type="text" id="bname" placeholder="Enter Book Name" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>Author Name</label>
                        <input type="text" id="Aname" placeholder="Enter Author Name" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>Quantity</label>
                        <input type="text" id="quantity" placeholder="Enter Quantity" style="padding: 5px;">
                    </div>

                    <div colspan="2" style="text-align: right;">
                        <div style="display: flex; justify-content: flex-end; gap: 15px;">
                            <input type="submit" value="Save" onclick="onFormSubmit(event)" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            <input type="button" value="Update" onclick="updateRecord(event)" style="padding: 10px 20px; font-weight:bold; background-color: #ffa200; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        </div>
                        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                            <input type="button" value="Delete" onclick="onDelete(event)" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            <input type="button" value="Clear" onclick="resetForm(event)" style="padding: 10px 21px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        </div>
                    </div>
                </form>
            </fieldset>
            <fieldset style="width: 700px; height: 388px; margin-top: -408px; margin-left: 321px;">
                <legend></legend>
                <table id="booklist" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                            <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                            <th style="padding: 5px; border: 2px solid black;">Book Author</th>
                            <th style="padding: 5px; border: 2px solid black;">Quantity</th>
                        </tr>
                    </thead>
                    <tbody id="ListBody" onclick="selectRow(event)" style="background-color: #4CAF50; color: #fff; padding: 5px; border: 1px solid black;">
                        <table>
                            <th>gffvnvm</th>
                            <th>gdfgh</th>
                            <th>ggdgdf</th>
                            <th>zdfxdgxb</th>
                        </table>
                    </tbody>
                </table>
            </fieldset>
            <script src="connect.js"></script>
        </div>

        <!---*****************BORROW BOOK**********************-->
        <div id="Borrow_Books" class="tabcontent">
            <fieldset style="width:0px; height: 397px;">
                <legend>This Field is required:</legend>
                <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">

                    <div class="form-row">
                        <label>Borrow ID*</label>
                        <input type="text" name="Borrow_id" placeholder="Enter Borrow ID" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>Book ID</label>
                        <input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>Book Name</label>
                        <input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>User ID</label>
                        <input type="text" name="u_id" placeholder="Enter User ID" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>Issue Date</label>
                        <input type="text" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label>Due Date</label>
                        <input type="date" name="due_D" placeholder="Enter Due Date" style="padding: 5px;">
                    </div>
                    <div style="display: flex; justify-content: flex-end; gap: 15px;">
                        <input type="button" name="submit" value="Borrow" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    </div>
                </form>
            </fieldset>
            <fieldset style=" width:-395px; height: 388px;   margin-top:-408px;margin-left: 321px;">
                <legend></legend>
                <table id="booklist3" style="border-collapse: collapse; width:705px; height: 0px;   margin: top 0px; margin-left: -11px;">
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
            </fieldset>
            <script src="connect.js"></script>

        </div>

        <!---*****************RETURN BOOKS**********************-->
        <div id="Return_Books" class="tabcontent">
            <fieldset style="width: 0px; height: 397px;">
                <legend>This Field is required:</legend>
                <form onsubmit="event.preventDefault();onReturnFormSubmit();" autocomplete="off">
                    <div class="form-row">
                        <label style="text-align: left;">Return ID</label>
                        <input type="text" name="Return_id" placeholder="Enter Return ID" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Book ID</label>
                        <input type="text" Name="bID" placeholder="Enter Book ID" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Book Name</label>
                        <input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">User ID</label>
                        <input type="text" name="u_id" placeholder="Enter User Name" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Issue Date</label>
                        <input type="text" name="iss_D" placeholder="Issue Date" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Due Date</label>
                        <input type="text" name="due_D" placeholder="Enter Due Date" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Return Date</label>
                        <input type="text" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <div style="display: flex; justify-content: flex-end; gap: 15px;">
                            <input type="Button" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        </div>
                    </div>
                </form>
                </form>
            </fieldset>
            <fieldset style="width: 695px; height: 388px; margin-top: -408px; margin-left: 321px;">
                <legend></legend>
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
            </fieldset>
            <script src="connect.js"></script>
        </div>

        <!---*****************ADD USERS**********************-->
        <div id="Add_Users" class="tabcontent">
            <fieldset style="width: 0px; height: 397px;">
                <legend>This Field is required:</legend>
                <form id="userForm" onsubmit="event.preventDefault(); onFormSubmit();" autocomplete="off">
                    <div class="form-row">
                        <label style="text-align: left;">User ID</label>
                        <input type="text" name="u_id" placeholder="Enter User Id" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Name</label>
                        <input type="text" name="uname" placeholder="Enter User Name" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;"> Email</label>
                        <input type="text" name="Aname" placeholder="Enter User Email" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Password</label>
                        <input type="text" name="password" placeholder="Enter User IPassword" style="padding: 5px;">
                    </div>
                    <label>Gender</label>
                    <label> <select id="gender" name="gender" style="margin-left: 55px;margin-bottom: 8px">
                            <option value="Enter User Iale">Male</option>
                            <option value="Enter User Iemale">Female</option>
                        </select>
                    </label>
                    </tr>
                    <div class="form-row">
                        <label style="text-align: left;">Contact_No</label>
                        <input type="text" name="phone" placeholder="Enter User Phone Number" style="padding: 5px;">
                    </div>

                    <div class="form-row">
                        <label style="text-align: left;">Faculty</label>
                        <input type="text" name="faculty" placeholder="Enter User Faculty/Class" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <label style="text-align: left;">Address</label>
                        <input type="textarea" name="faculty" placeholder="Enter User Address" style="padding: 5px;">
                    </div>
                    <div class="form-row">
                        <td colspan="2" style="text-align: right;">
                            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                                <input type="Button" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                                <input type="Button" name="submit" value="Update" style="padding: 10px 20px; font-weight:bold; background-color: #ffa200; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            </div>
                        </td>
                    </div>
                    <div class="form-row">
                        <td colspan="2" style="text-align: right;">
                            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                                <input type="Button" name="submit" value="Delete" style="padding: 10px 22px; font-weight:bold; background-color: #d9534f; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                                <input type="Button" name="submit" value=" Clear " style="padding: 10px 21px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                            </div>
                        </td>
                    </div>
                </form>
            </fieldset>
            <fieldset style="width: 695px; height: 388px; margin-top: -408px; margin-left: 321px;">
                <legend></legend>
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
            </fieldset>
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