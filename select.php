
<?php
$conn = mysqli_connect("localhost", "root", "", "library_project");
if (!$conn) {
    die("can not connect to database --> " . mysqli_connect_error());
    exit;
}
?>
<!DOCTYPE html>
<html>
 <head>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>


 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">PHP Mysqli Multiple Select option using Bootstrap Select Plugin and Jquery Ajax</h2>
   <br />
   <div class="col-md-4" style="margin-left:200px;">
    <form method="post" id="multiple_select_form">
     <select name="skills" id="skills" class="form-control selectpicker" data-live-search="true" multiple>
     <option value="" style='margin-top:20px;'>Select student code</option>
                                        <?php
                                        $sql = "SELECT studentcode FROM students ORDER BY studentcode ASC";
                                        $result = $conn->query($sql);
                                        foreach ($result as $row) {
                                            echo '<option value="' . $row["studentcode"] . '">' . $row["studentcode"] . '</option>';
                                        }
                                        ?>
     </select>
     <br /><br />
     <input type="hidden" name="hidden_skills" id="hidden_skills" />
     <input type="submit" name="submit" class="btn btn-info" value="Submit" />
    </form>
    <br />
   </div>
  </div>




  <script type="text/javascript">
    function getstudent() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_student.php",
            data: 'select_box=' + $("#select_box").val(),
            type: "POST",
            success: function(data) {
                $("#get_student_name").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }

    function getbook() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_book.php",
            data: 'bookid=' + $("#bookid").val(),
            type: "POST",
            success: function(data) {
                $("#get_book_name").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>

 </body>
</html>