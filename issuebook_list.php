<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display User_reg Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20vh;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.885), rgba(96, 100, 96, 0.993));
        }

        table {
            width: 60rem;
            margin-top: 0px;
            margin-left: -130px;
            /* display: none; */
            border: 2px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 3px;
            border-bottom: 2px solid;
            text-align: center;

        }

        th {
            background: linear-gradient(180deg, rgba(255, 255, 255, .6), rgba(96, 100, 96, 0.6));

        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .search {
            float: left;
            width: 50%;
            height: 45px;
            margin-top: -70px;
            align-items: center;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #ddd;
            position: relative;
        }

        .search input[type="text"] {
            width: 100%;
            height: 100%;
            padding: 5px 10px;
            border: none;
            border-radius: 6px;
            background-color: transparent;
            color: black;
            font-size: 16px;
            outline: none;
        }

        .search input[type="text"]::placeholder {
            color: red;
            opacity: 0.5;
        }

        input[type="button"] {
            width: 76px;
            height: 34px;
            margin-top: 2px;
            margin-left: 720px;
            background-color: red;
            font-weight: bold;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            color: red;
            font-size: 30px;
            margin-top: 20px;
        }
    </style>
</head>
<!-- <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i> paper size 13*10cm, divide3.5 cm-->


<div class="search">
    <input type="text" id="input" name="input" placeholder="Search" onkeyup="searchfun()">

    <body>
        <table id="table" border="2">
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <!-- <th>ID</th> -->
                <th>User Name</th>
                <th>Quantity</th>
                <th>Faculty</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Action</th>

                <script src="search.js"></script>

            </tr>
            <?php
            include("issuebook_server.php");
            include('message.php');
            error_reporting(0);
            $query = "SELECT * FROM issue_book INNER JOIN students ON issue_book.std_id = students.id INNER JOIN Books_with_id ON issue_book.book_id = Books_with_id.book_id INNER JOIN Books on Books_with_id.book = Books.id";

            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);
            $sn = 1;
            if ($total != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr style='background-color: transparent;' onmouseover=\"this.style.backgroundColor='#ffffcc';\" onmouseout=\"this.style.backgroundColor='transparent';\">
                            <td style='border: 2px solid black; text-align: center;'>" . $result['book_id'] . "</td>
                            <td style='border: 2px solid black; text-align: center;'>" . $result['name'] . "</td>
                            <td style='border: 2px solid black; text-align: center;'>" . $result['std_name'] . "</td>
                            <td style='border: 2px solid black; text-align: center;'>" . 1 . "</td>
                            <td style='border: 2px solid black; text-align: center;'>" . $result['faculty'] . "</td>
                            <td style='border: 2px solid black; text-align: center;'>" . $result['issue_date'] . "</td>
                            <td style='border: 2px solid black; text-align: center;'>" . $result['due_date'] . "</td>
                            <td style='border: 2px solid black; text-align: center;'>
                                <a href='issue_update.php?Id=" . $result['book_id'] . "'><button style='height: 25px; width: 40px; padding: 0px; border: 2px solid black; border-radius: 4px; background-color: #347ab7' type='button' onClick='onEdit(this)'>Edit</button></a>
                                <a id='return_btn' href='returnbook_server.php?book_id=" . $result['book_id'] . "&std_id=" . $result['std_id'] . "&iss_D=" . $result['issue_date'] . "&due_D=" . $result['due_date'] . "'>
                                Return
                                </a>
                            </td>
                            </tr>";
                    $sn++;
                }
            } else {
                echo "<tr><td colspan='8' style='padding: 10px; border: 2px solid black;'>No records found</td></tr>";
            }
            //---- 

            if (isset($_GET['m'])) {
                // $m = mysqli_real_escape_string($conn, $_GET['m']);

                $m = mysqli_real_escape_string($conn, $_GET['m']);

                // $query = "SELECT * FROM add_book WHERE `Book Id` LIKE '%$number%' OR `Book Name` LIKE '%$m%' OR `Author Name` LIKE '%$m%'";
                // $query = "SELECT * FROM add_book WHERE `Book Id` LIKE `%number%' OR `Book Name` LIKE '%$c%' OR `Author Name` LIKE '%$s%'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<table  id="table" border="2">';
                    echo '<tr>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>User Name</th>
                <th>Quantity</th>
                <th>Faculty</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <script src="search.js"></script>
              </tr>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                    <th>' . $row['Id'] . '</th>
                    <th>' . $row['Book Name'] . '</th>
                    <th>' . $row['User Name'] . '</th>
                    <th>' . $row['Quantity'] . '</th>
                    <th>' . $row['faculty'] . '</th>
                    <th>' . $row['Issue Date'] . '</th>
                    <th>' . $row['Due date'] . '</th>
                  </tr>';
                    }

                    echo '</table>';
                } else {
                    echo '<p >No records found</p>';
                }
            }

            ?>
        </table>
        <p id="notFoundMessage" style="display: none;">Data not found</p> <!-- Ensure this element is present -->
        <a style="text-decoration: none;" href="dashboard.php"><input type="button" name="Back" value="Back"></a>

</div>
<script src="search.js"></script>
<script>
    document.querySelector("#return_btn").addEventListener('click', function(e) {
        console.log("clicked");
        let choice = confirm("Are you sure?");
        if (!choice) {
            e.preventDefault();
        } 
    });
</script>
</body>

</html>


<!-- <form action='returnbook_server.php' action='post'>
    <input type='hidden' name='std_id' value='" . $result[' std_id'] . "'>
                                    <input type='hidden' name='iss_D'  value='" . $result['issue_date'] . "'>
                                    <input type='hidden' name='due_D'  value='" . $result['due_date'] . "'>
                                    <input type='hidden' name='book_id'  value='" . $result['book_id'] . "'>
                                    <input type='button' name='sumbit' value='Delete'>
                                </form> -->