<?php
session_start();
include('conn.php');

// Return book code.
if (isset($_POST['return'])) {
    $retid = intval($_GET['issid']);
    $fine = $_POST['fine'];
    $rstatus = 1;
    $bookid = $_POST['book_id']; // Corrected: use 'book_id' instead of 'bookid'

    // Update 'issue_book' table with return date and fine
    $returnbook = mysqli_query($conn, "UPDATE `issue_book` SET `returndate`=NOW(), `fine`='$fine', `retrunstatus`='$rstatus' WHERE `id`='$retid'");

    // Update 'books' table to set the book as available
    $updatebook = mysqli_query($conn, "UPDATE `books` SET `issued`=0 WHERE `id`='$bookid'");

    if ($returnbook && $updatebook) {
        $_SESSION['msg'] = "Book returned successfully with fine RS. $fine."; // Corrected: Use 'msg' instead of 'error'
        header('location: manage_issue_book.php');
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header('location: manage_issue_book.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>

<body>
    <!-- <div class="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div> -->
    <!-- MENU SECTION START-->
    <?php
    include 'admin_header.php';
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <?php $studentcode = $_GET['issid']; ?>
                    <div class="header-line">#<?php echo $studentcode; ?>
                        <h4 style="font-weight: bold;color: #000000; display: inline;">Issue Book </h4>
                        <h4 style="font-weight: bold;color: #2c7ad6; display: inline;"> Detail</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel panel-info" style="margin-top: 12px; width: 50rem; margin-left: -8rem;">
                    <div class="panel-heading">
                        Issued Book Details
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <!-- ---------------------------------------------Student Details-------------------------------------- -->


                            <?php
                            if (isset($_GET['issid'])) {
                                $studentcode = $_GET['issid'];
                                $sql = "SELECT students.studentcode, students.std_name, students.email, students.phone, issue_book.returndate, issue_book.fine, issue_book.id, issue_book.book_id FROM students INNER JOIN issue_book ON students.studentcode = issue_book.studentcode WHERE issue_book.id='$studentcode'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $student = mysqli_fetch_array($result);
                                        // Rest of your code...
                                    } else {
                                        echo "No records found.";
                                    }
                                } else {
                                    echo "Error executing query: " . mysqli_error($conn);
                                }
                            }
                            ?>
                            <input type="hidden" name="book_id" value="<?php echo !empty($student) ? htmlentities($student['id']) : ''; ?>">
                            <h4>Student Details</h4>
                            <hr />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student ID :</label>
                                        <?php echo htmlentities($student['studentcode']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name :</label>
                                        <?php echo htmlentities($student['std_name']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Email Id :</label>
                                        <?php echo htmlentities($student['email']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Contact No :</label>
                                        <?php echo htmlentities($student['phone']); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- ---------------------------------------------Book Details-------------------------------------- -->
                            <?php
                            if (isset($_GET['issid'])) {
                                $studentcode = $_GET['issid'];
                                // $sql = "SELECT * FROM `books` WHERE `id`='$studentcode'";
                                $sql = "SELECT * FROM `issue_book` WHERE `id`='$studentcode'";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $books = mysqli_fetch_array($result);
                            ?>
                                    <input type="hidden" name="book_id" value="<?php echo !empty($books) ? htmlentities($books['id']) : ''; ?>">
                                    <h4>Book Details</h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book Image :</label>
                                                <img src="uploads/<?php echo htmlentities($books['bookimg']); ?>" width="120">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book Name :</label>
                                                <?php echo htmlentities($books['BookName']); ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Book Issued Date :</label>
                                                <?php 
                                                echo htmlentities($books['issue_date']);
                                                //  echo htmlentities($books['regdate']); ?>
                                            </div>
                                            <div class="form-group">
                                                <label>ISBN :</label>
                                                <?php 
                                                echo htmlentities($books['book_id']); 
                                                //  echo htmlentities($books['isbnno']); ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Book Returned Date :</label>
                                            <?php if (isset($books['returndate']) && !empty($books['returndate'])) {
                                                echo htmlentities($books['returndate']);
                                            } else {
                                                echo "Not Returned Yet";
                                            }
                                        } else {
                                            echo "No data found";
                                        }
                                            ?>
                                            </div>
                                        </div>
                                        <form class="form-group">
                                            <label>Fine :</label>
                                            <input class="form-control" type="number" name="fine" id="fine" required <?php echo isset($books['fine']) && $books['fine'] !== "" ? 'disabled' : ''; ?> value="<?php echo isset($books['fine']) ? htmlentities($books['fine']) : ''; ?>">

                                            <?php
                                            // Determine the disabled status of the return button
                                            $buttonDisabled = isset($books['fine']) && $books['fine'] === "" ? 'disabled' : '';
                                            ?>

                                            <button type="submit" name="return" id="submit" class="btn btn-info" <?php echo $buttonDisabled; ?>>Return Book</button>



                                        <?php
                                    }
                                        ?>



                                        </form>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>