<!DOCTYPE html>
<html>
<head>
    <title>Book Registration Form</title>
</head>
<body>
    <h1>Book Registration Form</h1>
    <form method="POST" action="">
        <label for="book_id">Book ID:</label>
        <input type="number" name="book_id" id="book_id" required>
        <input type="submit" value="Register">
    </form>

    <?php
    // Establish database connection (change these parameters accordingly)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $book_id = $_POST["book_id"];

        // Sanitize the input to prevent SQL injection (optional but recommended)
        $book_id = mysqli_real_escape_string($conn, $book_id);

        // Check if the book ID is already registered in the database
        $query = "SELECT * FROM books WHERE book_id = '$book_id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Book ID is already registered, show an alert
            echo '<script>alert("The book ID is already registered. Please enter a valid number.")</script>';
        } else {
            // Book ID is not registered, proceed with the registration logic here
            // For example, you can insert the new book record into the database
            $insertQuery = "INSERT INTO books (book_id) VALUES ('$book_id')";
            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Book registered successfully.")</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>
