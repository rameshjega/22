
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>View Users</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

 <body class="full-width">

<section id="container" >
 <?php include('header.php');?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
 <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                     <ul class="breadcrumb">
                          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                          <!---<li><a href="#">Library</a></li>-->
                          <li class="active">View Users</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
       
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading"> View Users
                        <span class="tools pull-right">
                             
                            <a class="btn btn-mini btn-warning"
							data-toggle="modal" 
data-target="#create_user"
							href="#" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; Create User</a>
                            						 
							   			<div class="modal fade" id="create_user">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  
         <div class="modal-header">
            <h5 class="modal-title"> Create User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body">
		    	 <form method="post">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
									 <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
                                      
										<div class="form-group col-md-4">
										<label class="control-label"> <?php $var_user_type=$_SESSION["software_user_type"];
										if($var_user_type =='Admin'){ echo "Client Name"; 
										}else{ echo ""; }?></label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="username" required>
										</div>
										</div>
										  <?php 
										
										if($var_user_type =='Admin'){
										?>
										<div class="form-group col-md-4">
										<label class="control-label">business name </label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="business_name" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">subscription type</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="subscription_type" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">date of subscription</label>
										<div class="controls controls-row">
										 <input type="date"  class="form-control" name="date_of_subscription" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">expired</label>
										<div class="controls controls-row">
										 <input type="date"  class="form-control" name="expired" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">paid amount</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="paid_amoiunt" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">balanced amount</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="balanced_amount" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">total amount</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="total_amount" required>
										</div>
										</div>
										
										
										 
										
										
										
										
										
										
										
										<?php }?>
										<div class="form-group col-md-4">
										<label class="control-label">Email</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="email" required>
										</div>
										</div>
										<?php 
										
										if($var_user_type =='Admin'){
										?>
										<input type="hidden" name="user_type" value="Super Admin" >
									  	<?php }else if($var_user_type =='Super Admin'){?>
										<input type="hidden" name="user_type" value="User" >
										<?php }?>
										  
										<div class="form-group col-md-4">
										<label class="control-label">Contact No</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="contact_no" required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">Address</label>
										<div class="controls controls-row">
										 <textarea  class="form-control" name="address"  ></textarea>
										</div>
										</div>
                                     <div class="form-group col-md-4">
										<label class="control-label">Password</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="password" required>
										</div>
										</div>
										 <input type="hidden"  value="<?php echo $_SESSION["company_sl_no"];?>"
										 name="user_company_ref_id" required>
                                             
                                        
                                     </div>

                                  </div></div>
                                 <div class="space15"></div>
                             
                            
          
           </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="save_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
      </div>
   </div>
    </div>
			
                         </span>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table">
                    <thead>
                    <tr>
                         <th>Sl.No</th>
						 <?php echo $var_user_type=$_SESSION["software_user_type"];
										 if($var_user_type == 'Admin'){?>
                                         <th>Clent  Name</th>
										 <?php }else{?>
										 <th>Clent  Name</th>
										 <?php }?>
                                         <th>Email</th>
                                         <!--<th>Password</th> -->
										 <th>Contact No</th>
										 <?php  
										 if($var_user_type == 'Admin'){?>
										<th>Business Name</th>
										<th>Subscription Type</th>
										<th>Date Of Subscription</th>
										<th>Expired</th>
										<th>Paid Amount</th>
										<th>Balanced Amount</th>
										<th>Total Amount</th>
										 <?php }?>
										<!-- <th>Status</th>
                                         <th>Created By</th>
                                         <th>Action</th>--->
                    </tr>
                    </thead>
                    <tbody>
										 <?php 
				$i=1;
				if($var_user_type == 'Admin'){
				$sql_query=" SELECT * FROM    tbl_add_user    ";
				}else if($var_user_type == 'Super Admin'){
					$cmpny_sl_no=$_SESSION["company_sl_no"];
					$user_type="User";
				$sql_query=" SELECT * FROM    tbl_add_user   WHERE user_company_ref_id='$cmpny_sl_no' AND user_type='$user_type'   ";	
				}
				$res=mysql_query($sql_query);
				while($row=mysql_fetch_array($res)) 
				{ ?>
                            <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                                         <td><?php echo $row['username'];?></td> 
										 <td><?php echo $row['email'];?></td> 
										 <!--<td><?php echo $row['password'];?></td>  -->
										 <td><?php echo $row['contact_no'];?></td> 
										<?php  
										 if($var_user_type == 'Admin'){?>
										<td><?php echo $row['business_name'];?></td>
										<td><?php echo $row['subscription_type'];?></td>
										<td><?php echo $row['date_of_subscription'];?></td>
										<td><?php echo $row['expired'];?></td>
										<td><?php echo $row['paid_amoiunt'];?></td>
										<td><?php echo $row['balanced_amount'];?></td>
										<td><?php echo $row['total_amount'];?></td>
										 <?php }?>										 
										<!--- <td><?php echo $row['status'];?></td>  
										 <td><?php 
$created_by=$row['created_by'];
$exe="SELECT * FROM   tbl_add_user where  admin_login_no='$created_by' ";
$exe_result=mysql_query($exe);
$rowresultss = mysql_fetch_array($exe_result);
	echo $rowresultss['username'];									 
										 ?></td> 
                                <td class="hidden-phone">
<a href="#"data-toggle="modal" data-target="#update_<?php echo $row['admin_login_no'];?>" 
class="label label-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
<?php $v_status=$row['status'];
if($var_user_type == 'Admin'){ if($v_status == 'Active'){ ?>
								<a href="user_active.php?id=<?php echo $row['admin_login_no'];?>&status=Active" 
								class="label label-danger  btn-danger">In Active
</a>
<?php }else{?>
					<a href="user_active.php?id=<?php echo $row['admin_login_no'];?>&status=In Active" class="label label-danger  btn-danger">Active
</a>
<?php }} ?>
								</td>
                            
							--->
							</tr>
							
		   			<div class="modal fade" id="update_<?php echo $row['admin_login_no'];?>">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
  <?php $admin_login_no=$row['admin_login_no'];
$exe="SELECT * FROM   tbl_add_user where  admin_login_no='$admin_login_no' ";
$exe_result=mysql_query($exe);
$row_results = mysql_fetch_array($exe_result);
?>
         <div class="modal-header">
            <h5 class="modal-title"> Create User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body">
		    	 <form method="post">
                                 <div class="row-fluid">
                                     <div class="col-md-612">
                                       
										<div class="form-group col-md-4">
										<label class="control-label">User Name</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" value="<?php echo $row_results['username'];?>" name="username" required>
										</div>
										</div>
										
										<div class="form-group col-md-4">
										<label class="control-label">Email</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" value="<?php echo $row_results['email'];?>" name="email" required>
										</div>
										</div>
											<!--<div class="form-group col-md-4">
										<label class="control-label">Type</label>
										<div class="controls controls-row">
										<?php $user_type= $row_results['user_type'];
										if($user_type =='Admin'){?>
										 <input type="radio" name="user_type" checked value="Admin" required>&nbsp;&nbsp;Admin
										 <input type="radio" name="user_type" required value="User">&nbsp;&nbsp;User
										<?php }else if($user_type =='User'){?>
										<input type="radio" name="user_type" value="Admin" required>&nbsp;&nbsp;Admin
										 <input type="radio" name="user_type" checked  required value="User">&nbsp;&nbsp;User
										<?php }else{?>
										<input type="radio" name="user_type" value="Admin" required>&nbsp;&nbsp;Admin
										 <input type="radio" name="user_type" required value="User">&nbsp;&nbsp;User
										<?php }?>
										</div>
										</div>--->
									  	 
										<div class="form-group col-md-4">
										<label class="control-label">Contact No</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" name="contact_no" value="<?php echo $row_results['contact_no'];?>"required>
										</div>
										</div>
										<div class="form-group col-md-4">
										<label class="control-label">Address</label>
										<div class="controls controls-row">
										 <textarea  class="form-control" name="address"  ><?php echo $row_results['address'];?></textarea>
										</div>
										</div>
                                     <div class="form-group col-md-4">
										<label class="control-label">Password</label>
										<div class="controls controls-row">
										 <input type="text"  class="form-control" value="<?php echo $row_results['password'];?>" name="password" required>
										</div>
										</div>
										
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
                             
                            
          <input type="hidden" name="saved_sl_no" value="<?php echo $row_results['admin_login_no'];?>">
           </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="update_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
      </div>
   </div>
    </div>
									
							
							<div class="modal fade" id="delete_<?php echo $row['admin_login_no'];?>">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  <form method="post">
         <div class="modal-header">
            <h5 class="modal-title"> Delete A Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 
			<div class="modal-body">
			<input type="hidden" name="admin_login_no" value="<?php echo $row['admin_login_no'];?>">
			  
			<div class="alert alert-danger" style="padding: .75rem 1.25rem">
			<span class="icon-warning"></span> 
			Are you sure you want to delete this Record?
			</div>
			</div>
			 
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="delete_records"  class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save changes</button>
         </div>
		 </form>
      </div>
   </div>
    </div>
			
				<?php }?>
                             
                            </tbody> </table>

                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
 <?php 
	 
 
				
				if (isset($_POST['delete_records']))
				{	    
					$admin_login_no=$_POST['admin_login_no'];
			 $user_status="Deleted";
						$sql_query =  "UPDATE tbl_add_user   
						SET status ='$user_status'       WHERE  admin_login_no='$admin_login_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Deleted");
					window.location.href = "manage_users.php";</script>';
				}
				
			
				if (isset($_POST['save_components']))
				{	 $username=$_POST['username'];
					$password=$_POST['password'];
					$email=$_POST['email'];
					$contact_no=$_POST['contact_no'];
					$address=$_POST['address'];
					$user_type=$_POST['user_type'];
					$user_company_ref_id=$_POST['user_company_ref_id'];
					$business_name=$_POST['business_name'];
$subscription_type=$_POST['subscription_type'];
$date_of_subscription=$_POST['date_of_subscription'];
$expired=$_POST['expired'];
$paid_amoiunt=$_POST['paid_amoiunt'];
$balanced_amount=$_POST['balanced_amount'];
$total_amount=$_POST['total_amount'];
					
					
					
					$status="Active";
			 	$created_by=$_SESSION['admin_login_no']; 
		$created_date=date('Y-m-d'); 
						$sql_query =  "
						INSERT INTO tbl_add_user (username,password,email,contact_no,address,
						status,created_by,created_date,user_type,user_company_ref_id,business_name,
subscription_type,
date_of_subscription,
expired,
paid_amoiunt,
balanced_amount,
total_amount) 
						VALUES ('$username','$password','$email','$contact_no','$address',
						'$status','$created_by','$created_date','$user_type','$user_company_ref_id',
						'$business_name',
'$subscription_type',
'$date_of_subscription',
'$expired',
'$paid_amoiunt',
'$balanced_amount',
'$total_amount')
						 ";
						$query = mysql_query($sql_query); 
					 $last_id=mysql_insert_id();
					 $sql_query =  "
						INSERT INTO tbl_add_company (user_ref_id) 
						VALUES ('$last_id')
						 ";
						$query = mysql_query($sql_query); 
					echo '<script type="text/javascript">alert("Successfully Inserted");
					window.location.href = "manage_users.php";</script>';
				}	
				if (isset($_POST['update_components']))
				{	 $username=$_POST['username'];
					$password=$_POST['password'];
					$email=$_POST['email'];
					$contact_no=$_POST['contact_no'];
					$address=$_POST['address'];
					$saved_sl_no=$_POST['saved_sl_no']; 
					  
						$sql_query =  "
						UPDATE tbl_add_user SET username='$username',password='$password',
						email='$email',contact_no='$contact_no',address='$address'
						
						WHERE admin_login_no='$saved_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Updated");
					window.location.href = "manage_users.php";</script>';
				}	
				?>
<div class="right-sidebar">
<div class="search-row">
    <input type="text" placeholder="Search" class="form-control">
</div>
<div class="right-stat-bar">
<ul class="right-side-accordion">
<li class="widget-collapsible">
    
    <ul class="widget-container">
        <li>
            <div class="prog-row side-mini-stat clearfix">
                <div class="side-graph-info">
                 
                </div>
                <div class="side-mini-graph">
                    <div class="target-sell">
                    </div>
                </div>
            </div>
            
           
            
        </li>
    </ul>
</li>
 
 </ul>
</div>
</div>
<!--right sidebar end-->

</section>
 
<script src="js/jquery.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
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

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>



</body>

 </html>
