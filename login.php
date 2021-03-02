<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 <?php
 
include('db_config.php');
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Login</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
 
</head>

  <body class="login-body">

    <div class="container">
	<?php 
							

							if (isset($_POST['login']))
							{									 
							$loginId = $_POST['loginId'];
							$password = $_POST['loginPass'];
							$user_status="Active";
							  $sqlQuery = "SELECT * FROM  tbl_add_user  ,tbl_add_company
							WHERE (username='".$loginId."'  OR email='".$loginId."' )
							AND password='".$password."'  AND user_ref_id=admin_login_no
							";
							$resultSet = mysql_query($sqlQuery);
							$isValidLogin = mysql_num_rows($resultSet);	
							if($isValidLogin){
							if(!empty($_POST["remember"])) {
							setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60));  
							setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
							} else {
							setcookie ("loginId",""); 
							setcookie ("loginPass","");
							}
							$userDetails = mysql_fetch_assoc($resultSet);
							$_SESSION["admin_login_no"] = $userDetails['admin_login_no'];
 $_SESSION["company_sl_no"]=$userDetails['company_sl_no'];
  $_SESSION["software_user_type"]=$userDetails['user_type'];
  $se_user_type=$_SESSION["software_user_type"];
  if($se_user_type == 'Admin'){
	  
							echo '<script type="text/javascript"> 
							window.location.href = "admin_dashboard.php";</script>';
	  
  }else{
	
							echo '<script type="text/javascript"> 
							window.location.href = "index.php";</script>';  
	  
  }										
							} else 
							{	 
							echo '<script type="text/javascript"> alert("Invalid login!");
							window.location.href = "login.php";</script>';										
							}
							}  	
							?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" class="form-control" placeholder="User ID" name="loginId"  required >
                <input type="password" class="form-control" name="loginPass"  placeholder="Password" required>
            </div>
            <!---<label class="checkbox">
                <input type="hidden" name="remember"  >  
                
            </label>--->
            <button class="btn btn-lg btn-login btn-block" name="login"  type="submit">Sign in</button>

             

        </div>

          

      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="js/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

  </body>

<!-- Mirrored from bucketadmin.lab.themebucket.net/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Oct 2020 07:39:04 GMT -->
</html>
