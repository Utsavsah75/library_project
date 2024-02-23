<?php
include 'conn.php';

// get the student code.
if (!empty($_POST["select_box"])) {
    $studentid = $_POST["select_box"];
    $result = mysqli_query($conn, "SELECT count(*) FROM students WHERE studentcode='$studentid'");
    $row = mysqli_fetch_row($result);

    // display the name, email, and phone number of the student.
    if ($row[0] > 0) { // Check if the student with the given code exists
        $studentQuery = "SELECT std_name, verified, email, phone FROM students WHERE studentcode = '$studentid'";
        $studentResult = mysqli_query($conn, $studentQuery);

        if ($studentResult) {
            $studentData = mysqli_fetch_assoc($studentResult);

            echo "<table border='1'>";
            echo "<tr>";
            echo "<th style='padding-left:5%; width: 10%;'>";

            if ($studentData['verified'] == 0) {
                echo "<span style='color:red'> Student ID Blocked </span>" . "<br />";
                echo "<b>Student Name:-</b>" . $studentData['std_name'] . "<br />";
                echo "<b>Mobile No.:-</b>" . $studentData['phone'];
                echo "<script>$('#submit').prop('disabled',true);</script>";
            } else {
                echo " Student Name:-" . $studentData['std_name'] . "<br />";
                echo " Student Email:-" . $studentData['email'] . "<br />";
                echo " Mobile number:-" . $studentData['phone'] . "<br />";
                echo "<script>$('#submit').prop('disabled', false);</script>";
            }

            echo "</th>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "Error executing student query: " . mysqli_error($conn);
        }
    } else {
        echo "<span style='color:red'> Student ID not found. Please enter a valid Student ID.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
} else {
    echo "<span style='color:red'> Invalid Student ID. Please enter a valid Student ID.</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
}
?>
