<?php
error_reporting(0);
include('conn.php');

// Edit the Book.
if (isset($_POST['submit'])) {
    $bookid = $_GET['bookid'];
    $bookname = $_POST['bookname'];
    $catid = $_POST['catid'];
    $authorid = $_POST['authorid'];
    $bookprice = $_POST['bookprice'];
    
    $sql = "UPDATE books 
            SET 
                BookName='$bookname', 
                catid='$catid', 
                author='$authorid', 
                bookprice='$bookprice' 
            WHERE 
                id='$bookid'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['updatemsg'] = "Book Updated Successfully";
        header('location: manage_book.php');
        exit(); // Exit after redirect
    } else {
        $_SESSION['unupdatemsg'] = "Book Not Updated";
        header('location: manage_book.php');
        exit(); // Exit after redirect
    }
}

// Fetch book information for editing
$bookid = $_GET['bookid'];
$sql = "SELECT books.BookName, books.isbnno, books.catid, books.author, books.bookprice, books.bookimg, 
        bookcategory.CategoryName, bookauthor.AuthorName 
        FROM books 
        JOIN bookcategory ON bookcategory.id = books.catid 
        JOIN bookauthor ON bookauthor.id = books.author 
        WHERE books.id='$bookid'";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("Error: No book found");
}

$bookrow = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>
<body>
    <!-- <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div> -->

    <?php
    include 'admin_header.php';
    ?>

    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <div class="header-line">
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Edit</h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;">Book</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="panel panel-info"style=" width: 69rem;">
                        <div class="panel-heading">Book Info</div>
                        <div class="panel-body">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Book Image</label>
                                            <img src="uploads/<?php echo htmlentities($bookrow['bookimg']); ?>" width="120">
                                            <a href="change_image.php?bookid=<?php echo htmlentities($bookid); ?>">Change Image</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Book Name:</label>
                                            <input type="text" class="form-control" name="bookname" value="<?php echo htmlentities($bookrow['BookName']); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Category<span style="color:red;">*</span></label>
                                    <select class="form-control" name="catid" required>
                                        <option value="<?php echo htmlentities($bookrow['catid']); ?>"><?php echo htmlentities($bookrow['CategoryName']); ?></option>
                                        <?php
                                        $sql1 = "SELECT * FROM bookcategory";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if ($result1) {
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                                if ($row['id'] == $bookrow['catid']) {
                                                    continue;
                                                } else { ?>
                                                    <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['CategoryName']); ?></option>
                                                <?php } 
                                            } 
                                        } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Author<span style="color:red;">*</span></label>
                                    <select class="form-control" name="authorid" required>
                                        <option value="<?php echo htmlentities($bookrow['author']); ?>"><?php echo htmlentities($bookrow['AuthorName']); ?></option>
                                        <?php
                                        $sql1 = "SELECT * FROM bookauthor";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if ($result1) {
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                                if ($row['id'] == $bookrow['author']) {
                                                    continue;
                                                } else { ?>
                                                    <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['AuthorName']); ?></option>
                                                <?php } 
                                            } 
                                        } 
                                        ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ISBN Number</label>
                                            <input type="text" class="form-control" name="isbnno" value="<?php echo htmlentities($bookrow['isbnno']); ?>" readonly>
                                            <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price in USD</label>
                                            <input type="text" class="form-control" name="bookprice" value="<?php echo htmlentities($bookrow['bookprice']); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
</body>
</html>
