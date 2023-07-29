<div class="container3">

<!---*****************ADD BOOKS**********************-->
<div id="Add_Books" class="tabcontent">
    <fieldset style="width: 0px; height: 473px;">
        <legend>This Field is required:</legend>
        <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off">
            <div class="form-row">
                <label>Book ID*</label>
                <input type="text" id="book_id" placeholder="Enter Book ID" style="padding: 5px;" name="book_id" required>
            </div>
            <div class="form-row">
                <label>Book Name</label>
                <input type="text" id="bname" placeholder="Enter Book Name" style="padding: 5px;" name="book_name" required>
            </div>
            <div class="form-row">
                <label>Author Name</label>
                <input type="text" id="Aname" placeholder="Enter Author Name" style="padding: 5px;" name="book_author" required>
            </div>
            <div class="form-row">
                <label>Quantity</label>
                <input type="text" id="quantity" placeholder="Enter Quantity" style="padding: 5px;" name="book_quantity" required>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                <input type="submit" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            </div>
        </form>
    </fieldset>
    <fieldset style="width: 775px; height: 466px; margin-top: -485px; margin-left: 321px;">
        <legend></legend>


        <table border="2" style="width: 100%; border-collapse: collapse;">
            <tr style="height:35px ; background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(96, 100, 96, 0.6));">
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Quantity</th>
            </tr>



            <?php
            include("admin_bookserver.php");
            error_reporting(0);
            $query = "SELECT * FROM add_book";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: #f5f5f5;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
                    <td style='padding: 10px; border: 2px solid black;'>" . $result['Id'] . "</td>
                    <td style='padding: 10px; border: 2px solid black;'>" . $result['Book Name'] . "</td>
                    <td style='padding: 10px; border: 2px solid black;'>" . $result['Author Name'] . "</td>
                    <td style='padding: 10px; border: 2px solid black;'>" . $result['Quantity'] . "</td>
                  </tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }
            ?>

        </table>
    </fieldset>
</div>
</div>    <!-- <div class="library-contain"> -->
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
        <!-- </div> -->
    </div>

    <div class="container1">
        <!-- <div class="library-container2"> -->
            <ul>
                <button class="tablinks" onclick="openTab(event, 'Add_Books')"> Add Books</button>
                <button class="tablinks" onclick="openTab(event, 'Borrow_Books')"> Borrow Books</button>
                <button class="tablinks" onclick="openTab(event, 'Return_Books')"> Return Books</button>
                <button class="tablinks" onclick="openTab(event, 'Manage_Users')"> Manage Users</button>
                <button class="tablinks" onclick="openTab(event, 'Add_Users')"> Add Users</button>
                <button class="tablinks" onclick="openTab(event, 'Manage_Users')"> Manage Users</button>
                <button class="tablinks" onclick="openTab(event, 'Manage_Users')"> Manage Users</button>
            </ul>
        </div>
    </div>

    <input type="text" placeholder="Search" style=" float: left;margin-left: 975px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-550px); width: 240px; height: 25px;">
    <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-543px);"></i>

    <div class="container3">

        <!---*****************ADD BOOKS**********************-->
        <div id="Add_Books" class="tabcontent">
            <fieldset style="width: 0px; height: 473px;">
                <legend>This Field is required:</legend>
                <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off">
                    <div class="form-row">
                        <label>Book ID*</label>
                        <input type="text" id="book_id" placeholder="Enter Book ID" style="padding: 5px;" name="book_id" required>
                    </div>
                    <div class="form-row">
                        <label>Book Name</label>
                        <input type="text" id="bname" placeholder="Enter Book Name" style="padding: 5px;" name="book_name" required>
                    </div>
                    <div class="form-row">
                        <label>Author Name</label>
                        <input type="text" id="Aname" placeholder="Enter Author Name" style="padding: 5px;" name="book_author" required>
                    </div>
                    <div class="form-row">
                        <label>Quantity</label>
                        <input type="text" id="quantity" placeholder="Enter Quantity" style="padding: 5px;" name="book_quantity" required>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 15px;">
                        <input type="submit" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    </div>
                </form>
            </fieldset>
            <fieldset style="width: 775px; height: 466px; margin-top: -485px; margin-left: 321px;">
                <legend></legend>


                <table border="2" style="width: 100%; border-collapse: collapse;">
                    <tr style="height:35px ; background: linear-gradient(180deg, rgba(255, 255, 255, 0.6), rgba(96, 100, 96, 0.6));">
                        <th>Book Id</th>
                        <th>Book Name</th>
                        <th>Book Author</th>
                        <th>Quantity</th>
                    </tr>



                    <?php
                    include("admin_bookserver.php");
                    error_reporting(0);
                    $query = "SELECT * FROM add_book";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    if ($total != 0) {
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "<tr style='background-color: #f5f5f5;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
                            <td style='padding: 10px; border: 2px solid black;'>" . $result['Id'] . "</td>
                            <td style='padding: 10px; border: 2px solid black;'>" . $result['Book Name'] . "</td>
                            <td style='padding: 10px; border: 2px solid black;'>" . $result['Author Name'] . "</td>
                            <td style='padding: 10px; border: 2px solid black;'>" . $result['Quantity'] . "</td>
                          </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
                    }
                    ?>

                </table>
            </fieldset>
        </div>
    </div>
    <!-- <script src="connect"> </script> -->


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














    
        <!---*****************MANAGE USERS**********************-->

        <div id="Manage_Users" class="tabcontent">

            <fieldset style="width:800px; height: 397px;">
                <legend>This Field is required:</legend>
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
                    <legend></legend>
                    <table style="border-collapse: collapse; width: 101%;">
                        <tr style="background-color: #f2f2f2;">
                            <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                            <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                            <th style="padding: 5px; border: 2px solid black;">Author Name</th>
                            <th style="padding: 5px; border: 2px solid black;">Quantity</th>
                        </tr>
                    </table>
                </fieldset>
                <script src="connect.js"></script>
        </div>
    </div>