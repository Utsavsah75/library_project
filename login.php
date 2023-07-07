<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['pwd'];

    // Database connection variables
    $conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare('SELECT * FROM register WHERE name = ?');
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            echo "Login successfully!";
        } else {
            echo "<h2>Invalid username and password</h2>";
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
<!-- <html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){
			var valid = this.form.checkValidity();
			if(valid){
			var name 	= $('#name').val();
			var email	= $('#email').val();
			var password 		= $('#password').val();
			var phone = $('#phone').val();
			var faculty 	= $('#faculty').val();
            
				e.preventDefault();	
				$.ajax({
					type: 'POST',
					......
					data: {name: name,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
                            },
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});
			}else{	
			}
		});		
	});
</script>
</body>
</html> -->