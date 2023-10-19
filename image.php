<?php
if (isset($_POST['submit'])) {
  $fname = basename($_FILES['image']['name']);
  $tmpname = $_FILES['image']['tmp_name'];
  $size = $_FILES['image']['size'];
  $type = $_FILES['image']['type'];

  // Check if the file size is less than 5 MB
  if ($size > 5000000) {
    die("The image size must be less than 5 MB");
  }
  // Check if the file already exists
  if (file_exists("uploads/" . $fname)) {
    die("This photo is already uploaded");
  }
  // Check if the file type is allowed
  if ($type != 'image/jpeg' && $type != 'image/png') {
    die("The image type is not allowed to upload");
  }
  // Move the uploaded file to the "uploads" directory
  move_uploaded_file($tmpname, "uploads/" . $fname);
  echo "<script>
          alert('Image uploaded successfully!');
        </script>";
} else {
?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    Select image to upload:<br><br>
    <input type="file" name="image" id="fileToUpload"><br>
    <input type="submit" value="Upload" name="submit"><br>
  </form>
<?php } ?>