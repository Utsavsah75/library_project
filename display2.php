<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display User_reg Data</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        table {
            width: 70%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: linear-gradient(180deg, rgba(255, 255, 255, .6), rgba(96, 100, 96, 0.6));

        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
<input type="text" placeholder="Search" style=" float: left;margin-left: 975px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-463px); width: 240px; height: 25px;">
    <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i>

    <table border="2">
    <input type="search" placeholder="Search" style=" float: left;margin-left: 975px;  border-radius: 8px;  border: 2px solid;   transform: translateY(-463px); width: 240px; height: 25px;">
    <i class="fas fa-search" style="float: left; margin-left: 5px; transform: translateY(-454px);"></i>

        <tr>
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Quantity</th>
            <!-- <th>Phone</th>
            <th>Faculty</th> -->
        </tr>

        <?php
        include("admin_bookserver.php");
        error_reporting(0);
        $query = "SELECT * FROM add_book";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr> 
                    <td>" . $result['Id'] . "</td>
                    <td>" . $result['Book Name'] . "</td>
                    <td>" . $result['Author Name'] . "</td>
                    <td>" . $result['Quantity'] . "</td>
                    
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
</body>

</html>