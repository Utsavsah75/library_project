<?php 
// session_start();
// error_reporting(0);
// include('conn.php');
// include 'ckeck_admin.php';
// ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="header.css" rel="stylesheet" type="text/css">
    <link href="text.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="book_pag.css">


    


</head>

<!-- <div class="line" style=" background-color: #f7f7f7; border-bottom: 15px solid red; margin-top: 20rem;"></div> -->


    <section class="menu-section">
        
<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" >  <img src="logo.png" /> </a>

</div>
<div class="right-div">
    <a href="index.php" class="btn btn-danger pull-center" style="color: black;">
        <i class="fa fa-sign-out"></i> LOG ME OUT
    </a>
</div>
</div>  
</div>  
    </section>



<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 3.5rem;  border-bottom: 2px solid #000000;">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="user_dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="issued_book.php">Issued Book</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
              </a>
              <div class="dropdown-menu"style="left: -30px;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="My_Profile.php">My Profile</a>              
                <a class="dropdown-item" href="change_password.php">Change Password</a>
              </div>
          </li>
         
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu"style="left: -30px;" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add_category.php">Add Category</a>
                    <a class="dropdown-item" href="manage_category.php">Manage Category</a>
              
                </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Author
              </a>
              <div class="dropdown-menu"style="left: -30px;" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="add_author.php">Add Author</a>
                <a class="dropdown-item" href="manage_author.php">Manage Author</a>
              </div>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Books
            </a>
            <div class="dropdown-menu"style="left: -30px;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="add_book.php">Add Books</a>
              <a class="dropdown-item" href="manage_book.php">Manage Books</a>
            </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Issue Books
          </a>
          <div class="dropdown-menu"style="left: -35px;" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="issue_book.php">Issue Books</a>
            <a class="dropdown-item" href="manage_issue_book.php">Manage Issue Books</a>
          </div>
      </li> 
      <li class="nav-item">
                <a class="nav-link" href="reg_students.php">Reg Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="change_pwd.php">Change Password</a>
            </li>-->
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
