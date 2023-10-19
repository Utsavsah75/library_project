<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap.css">
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
    <table border="2">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Faculty</th>
        </tr>

        <?php
        include("registation.php");
        error_reporting(0);
        $query = "SELECT * FROM register";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr> 
                    <td>" . $result['id'] . "</td>
                    <td>" . $result['name'] . "</td>
                    <td>" . $result['email'] . "</td>
                    <td>" . $result['gender'] . "</td>
                    <td>" . $result['phone'] . "</td>
                    <td>" . $result['faculty'] . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
</body>

</html>