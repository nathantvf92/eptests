<?php session_start(); 
require_once("inc/config.php");
if(!isset($_POST['username']) && !isset($_POST['password'])){
    session_destroy();
}
?>


<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    require ("inc/connectDatabase.php");
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users  WHERE username = '$username' and password = '$password' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['statsuser'] = true; 
            $_SESSION['isadmin'] = $row['isadmin']; 
        }
    }

    $con->close();
    if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == '1'){
       header('Location: '.'index.php');         
		
	}else{
	   header('Location: '.'allstats.php?stats=add'); 
	}
    
} 
?>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>NEW | CLINIC</title>
<link rel="icon" href="<?php echo URL; ?>assets/icon/favicon.ico">
<!-- Bootstrap core CSS -->
<!-- <link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" type='text/css' />
<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type='text/css' /> -->
<link href="assets/style.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/style.css" type="text/css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="<?php echo URL; ?>assets/js/html5shiv.min.js"></script>
          <script src="<?php echo URL; ?>assets/js/respond.min.js"></script>
        <![endif]-->
</head>
<body style="padding-top: 0">
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <!-- <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/> -->
            <img class="logo-login" src="<?php echo URL; ?>assets/images/bhtlogot.png" alt=""/>
            <h3>Welcome</h3>
            <p style="color: white">To the BHT Therapies Dashboard</p> 
        </div>
        <div class="col-md-9 register-right"> 
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Please Enter Your Credentials</h3>
                        <form action="" method="post">
                            <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" placeholder="User Name" value="" required />
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password *" value="" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12 btn-submit-login"> 
                                        <input type="submit" class="btnRegister"  value="Login"/>
                                    </div>
                            </div>
                        </form>
                </div> 
            </div>
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>