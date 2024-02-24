<?php
include 'conn.php';

// get the book id.
if (!empty($_POST["bookid"])) {
    $bookid = $_POST["bookid"];
    $result = mysqli_query($conn, "SELECT count(*) FROM books WHERE isbnno='$bookid'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];

    if ($user_count > 0) {
        // Book exists.
        echo "<span class='status-available' style='color:green'> Book exists.</span>";
        // Enable the add button.
        echo "<script>document.getElementById('add').disabled = false;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = ''; </script>";

        // Fetch book details.
        $sql = "SELECT distinct books.bookname, books.id, bookauthor.AuthorName, books.bookimg, books.issued
            FROM books JOIN bookauthor ON bookauthor.id = books.id WHERE books.isbnno='$bookid' OR books.bookname='$bookid'";
        $result = mysqli_query($conn, $sql);
        
           // Check if the book is already issued by the same student dont allow to issue the book.
        // $studentId = $_POST["studentId"];
        // $bookId = $_POST["bookId"];

        // $checkQuery = "SELECT * FROM issue_book WHERE std_id = '$studentId' AND book_id = '$bookId'";
        // $checkResult = mysqli_query($conn, $checkQuery);
        // $checkData = mysqli_fetch_assoc($checkResult);

        // if ($checkData) {
        //     echo "<script>alert('Book already issued by the same student');</script>";
        //     exit();
        // }

        if ($result) {
            $row = mysqli_fetch_assoc($result);
?>
            <table border="1">
                <tr>
                    <th style="padding-left:5%; width: 10%;">
                       <br> <img src="uploads/<?php echo $row['bookimg']; ?>" height="150px" width="150px" alt="Book Image"><br>
                        <?php echo isset($row['bookname']) ? $row['bookname'] : ''; ?><br>
                        <?php echo isset($row['AuthorName']) ? $row['AuthorName'] : ''; ?>
                        <?php if (isset($row['issued']) && $row['issued'] == 0) : ?>
                            <!-- <p style="color:red;">Book Already issued</p> -->
                            <!-- <input type="radio" name="selectedBookId" value="<?php //echo htmlentities($row['id']); ?>" required> -->
                        <?php endif; ?>
                    </th>
                </tr>
            </table>
<?php
            echo "<script>$('#submit').prop('disabled', false);</script>";
        } else {
            echo "Error executing book query: " . mysqli_error($conn);
        }
    } else {
        // Book does not exist.
        echo "<span class='status-not-available' style='color:red'> * Book does not exist.</span>";
        // Disable the add button.
        echo "<script>document.getElementById('add').disabled = true;</script>";
        echo "<script>document.getElementById('add').style.backgroundColor = 'grey';</script>";
    }
} else {
    echo "<p>Record not found. Please try again.</p>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
}