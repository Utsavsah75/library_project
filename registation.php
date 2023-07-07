<?php
session_start();
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $faculty = $_POST['faculty'];

    // Database connection variables
    $conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare('SELECT * FROM register WHERE name = ? AND email = ?AND gender = ? AND password = ? AND phone = ? AND faculty = ?');
        $stmt->bind_param("ssssss", $name, $email, $gender, $password, $phone, $faculty);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            echo "Login successfully!";
        } else {
            echo "<h2>Created successfully</h2>";
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
                'title': 'Register',
                'text': 'Successfully!',
                'type': 'success'
            });
        });
    </script>
</body>
</html>
