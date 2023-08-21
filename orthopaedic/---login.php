<?php session_start(); 
require_once("../inc/config.php");
if(!isset($_POST['username']) && !isset($_POST['password'])){
    session_destroy();
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    require ("orthopaedicconnectDatabase.php");
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users  WHERE username = '$username' and password = '$password' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['statsuser'] = true; 
        }
    }

    $con->close();
    header('Location: '.'ortho.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="unique login form,leamug login form,boostrap login form,responsive login form,free css html login form,download login form">
    <meta name="author" content="leamug">
    <title>BedFord Hospital</title>
    <link href="../assets/style.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center" style="margin-top: 72px;">
            <h1 class='text-white'>Welcome to the BHT Therapies Dashboard</h1>
			
				<form action="" method="post">
				  <div class="form-login"></br>
						<h4>Secure Login</h4>
						</br>
						<input type="text" id="username" name= "username" class="form-control input-sm chat-input" placeholder="username"/>
						</br></br>
						<input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password"/>
						</br></br>
						<div class="wrapper">
							<span class="group-btn">
								<button type="submit" class="btn btn-danger btn-md"  value="Login"> login <i class="fa fa-sign-in"></i></button>
							</span>
						</div>
					</div>
				</form>
        </div>
    </div>
    </br></br></br>
    <!--footer-->
    <div class="footer text-white text-center">
        <p>© 2021 Bedfordshire Hospitals. All rights reserved </p>
    </div>
    <!--//footer-->
</div>
</body>
</html>
