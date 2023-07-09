<?php
session_start();

if (isset($_POST['login'])) {
    $AdminName = $_POST['name'];
    $password = $_POST['pwd'];

    // Database connection variables
    $conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare('SELECT * FROM admin_login WHERE Name = ?');
        $stmt->bind_param("s", $AdminName);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            // echo "Login successfully!";
            echo "<script>window.open('book_page.php','_self')</script>";
        } else {
            echo "<h2>Invalid Admin Name and password</h2>";
        }
    }
}
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
    <script type="text/javascript">
        $(function() {
            Swal.fire({
                'title': 'Login',
                'text': 'Successfully!',
                'type': 'success'
            });
        });
    </script>
</body>
</html>
