<?php session_start(); 
require_once("../inc/config.php");
if(!isset($_POST['username']) && !isset($_POST['password'])){
    session_destroy();
}
?>
<link href="../assets/style.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    require ("mobilityconnectDatabase.php");
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
    header('Location: '.'mobility.php');
} 
?>
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?php echo URL; ?>assets/images/bhtlogot.png" alt=""/>
            <h3>Welcome</h3>
            <p>To the BHT Therapies Dashboard</p> 
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
                                        <div class="col-md-12"> 
                                            <input type="submit" class="btnRegister"  value="Login"/>
                                        </div>
                                </div>
                            </form>
                    </div> 
                </div>
            </div>
            

    </div>
</div>