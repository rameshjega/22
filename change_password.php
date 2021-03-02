
<!DOCTYPE html>
<html lang="en">

 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Change Password</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

   
</head>

  <body class="full-width">

  <section id="container" class="hr-menu">
    <?php include('header.php');?>
      <!--header end-->
      <!--sidebar start-->

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->




              <!------>
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                     <ul class="breadcrumb">
                          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                          <!---<li><a href="#">Library</a></li>-->
                          <li class="active">Change Password</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
			  
  <?php 
					if(isset($_POST['Submit_password']))
{
$admin_login_no=$_SESSION["admin_login_no"];
$oldpass=$_POST['opwd'];
$newpassword=$_POST['npwd'];
   $sql_qry="SELECT password FROM tbl_add_user where password='$oldpass' AND  admin_login_no='$admin_login_no'";
 $resu=mysql_query($sql_qry);
  $num=mysql_num_rows($resu); 							 

if($num>0)
{
 $con=mysql_query("update tbl_add_user set password='$newpassword' where admin_login_no='$admin_login_no'");
 
$_SESSION['msg1']="Password Changed Successfully !!";
if($con)
{
	echo '<script type="text/javascript">alert("Password Changed Successfully");
	 window.location.href = "logout.php"; </script>';
}
}
else
{
echo '<script type="text/javascript">alert("Old Password not match !!");
	 window.location.href = "change_password.php"; </script>';
}
}?>  
                         <script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script> 
              
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Change Password
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                             <form name="chngpwd" action="" method="post" onSubmit="return valid();"> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Old Password </label>
                                    <input type="password" class="form-control" id="opwd" name="opwd"  placeholder="Enter Old Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">New Password</label>
                                 <input type="password" class="form-control" name="npwd" placeholder="Enter New Password">
                                </div>
								 <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                     <input type="password" class="form-control" name="cpwd" id="cpwd" placeholder="Password">
                                </div>
                                 
                                <button type="submit" 
																							name="Submit_password"  
																							class="btn btn-primary btn-large hidden-print">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

               
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
    <?php //include('footer.php');?>
      <!--footer end-->
  </section>

  <!-- Placed js at the end of the document so the pages load faster -->

  <!--Core js-->
  <script src="js/jquery.js"></script>
  <script src="bs3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/hover-dropdown.js"></script>
  <script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
  <!--Easy Pie Chart-->
  <script src="js/easypiechart/jquery.easypiechart.js"></script>
  <!--Sparkline Chart-->
  <script src="js/sparkline/jquery.sparkline.js"></script>
  <!--jQuery Flot Chart-->
  <script src="js/flot-chart/jquery.flot.js"></script>
  <script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
  <script src="js/flot-chart/jquery.flot.resize.js"></script>
  <script src="js/flot-chart/jquery.flot.pie.resize.js"></script>


  <!--common script init for all pages-->
  <script src="js/scripts.js"></script>

  </body>

<!-- Mirrored from bucketadmin.lab.themebucket.net/horizontal_menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Oct 2020 07:39:06 GMT -->
</html>
 
       