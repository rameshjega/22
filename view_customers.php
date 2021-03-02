
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>View Customers</title>

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
                          <li class="active">View Customers</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
  <script src="jquery-2.1.1.min.js"></script>
   <link rel="stylesheet" href="fstdropdown.css">
 
	 
	<script src="fstdropdown.js"></script>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading"> View Customers
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                            <a class="btn btn-mini btn-warning"
							data-toggle="modal" 
data-target="#create_user"
							href="#" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; Create Customers</a>
                            						 
							   			<div class="modal fade" id="create_user">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  
         <div class="modal-header">
            <h5 class="modal-title"> Create Customers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body" style="padding: 0px;">
 
		    	 <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
									 
									 <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
 

 <div class="form-group col-md-4">
<label for="userName">Customer Name<span class="text-danger"> </span></label>
 <input type="text" name="customer_name" required=""  class="form-control">
</div>
<?php 
$company_sl_no=$_SESSION["company_sl_no"]; 
$sql_qry=" SELECT * FROM    billing_customer 
WHERE customer_company_ref_id='$company_sl_no' ";
$res_qry=mysql_query($sql_qry);
$row_eee = mysql_fetch_array($res_qry);
$last_id =  $row_eee['customer_sl_no'];
$rest = substr("$last_id", -5);  
$insert_id = "$rest" + 1;
$var_auto_no = sprintf("%04d", $insert_id);
 
?>
<div class="form-group col-md-4">
<label for="userName">Customer Code<span class="text-danger"></span></label>
<input type="text" name="customer_code"  readonly value="<?php echo $var_auto_no;?>"   class="form-control">
</div>
<div class="form-group col-md-4">
<label for="userName">Customer Email <span class="text-danger"></span></label>
<input type="email" name="customer_email"  class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Contact Number<span class="text-danger"> </span></label>
 <input type="text" name="customer_contact_no"   class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">Type<span class="text-danger"> </span></label>
	<select  name="cost_type_ref_id" class="fstdropdown-select form-control"  >
	<option value="">Select Type </option>
	<?php 
	echo $sql_cat=" SELECT * FROM    billing_cost 
	WHERE cost_company_ref_id='$company_sl_no' ";
	$res_cate=mysql_query($sql_cat);
	while($row_cate=mysql_fetch_array($res_cate)) 
	{?>
	<option value="<?php echo $row_cate['cost_sl_no'];?>"><?php echo $row_cate['cost_type_name'];?></option>
	<?php }?>
	</select>
</div>


 
 <div class="form-group col-md-4">
<label for="userName"> Address<span class="text-danger"> </span></label>
 <textarea name="customer_address"   class="form-control"></textarea>
</div>
  
 	
			 
                                        </div>
									 
 
  						
										 
									 
										
                                             
                                        
                                     </div>

                                  </div>
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
					 <th> Name  </th> 
					 <th> Code  </th> 
					 <th> Email  </th> 
					 <th> Contact No  </th> 
					 <th> Address  </th> 
					 
					 <th>Created By</th>
					 <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
										 <?php 
										 $i=1;
					 $company_sl_no=$_SESSION["company_sl_no"]; 
				  $sql_query=" SELECT * FROM    billing_customer 
				  WHERE customer_company_ref_id='$company_sl_no' ";
				$res=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($res)) 
				{ ?>;
                            <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                                         <td><?php echo $row['customer_name'];?></td> 
										 <td><?php echo $row['customer_code'];?></td> 
										 <td><?php echo $row['customer_email'];?></td> 
										 <td><?php echo $row['customer_contact_no'];?></td> 
										 <td><?php echo $row['customer_address'];?></td> 
										 <td><?php 
$customer_created_by=$row['customer_created_by'];
$exe="SELECT * FROM   tbl_add_user where  admin_login_no='$customer_created_by' ";
$exe_result=mysql_query($exe);
$rowresultss = mysql_fetch_array($exe_result);
	echo $rowresultss['username'];									 
										 ?></td> 
                                <td class="hidden-phone">
								<a href="#" data-toggle="modal" 
data-target="#update_<?php echo $row['customer_sl_no'];?>"
class="label label-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
								<a href="#" data-toggle="modal" 
data-target="#delete_<?php echo $row['customer_sl_no'];?>" class="label label-danger  btn-danger">Delete</a>
								</td>
                            </tr>
					<div class="modal fade" id="update_<?php echo $row['customer_sl_no'];?>">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
  <?php 
   $customer_sl_no=$row['customer_sl_no'];
   $exe=" SELECT * FROM    billing_customer 
				  WHERE customer_sl_no='$customer_sl_no' ";
$exe_result=mysql_query($exe);
$row_results = mysql_fetch_array($exe_result);
?>
         <div class="modal-header">
            <h5 class="modal-title"> Update Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body">
		    	  <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
                                       
										 
									 
									  	
                                      <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
 

 <div class="form-group col-md-4">
<label for="userName">Customer Name<span class="text-danger"> </span></label>
 <input type="text" name="customer_name" value="<?php echo $row_results['customer_name'];?>" required=""  class="form-control">
</div>
 
<div class="form-group col-md-4">
<label for="userName">Customer Email <span class="text-danger"></span></label>
<input type="email" name="customer_email"  value="<?php echo $row_results['customer_email'];?>" class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Contact Number<span class="text-danger"> </span></label>
 <input type="text" name="customer_contact_no"   value="<?php echo $row_results['customer_contact_no'];?>"  class="form-control">
</div>
<?php 
$cost_type_ref_id=$row_results['cost_type_ref_id'];
 $exe_type=" SELECT * FROM    billing_cost 	WHERE cost_sl_no='$cost_type_ref_id' ";
$exe_result_ty=mysql_query($exe_type);
$row_results_ty = mysql_fetch_array($exe_result_ty);
?>
 <div class="form-group col-md-4">
<label for="userName">Type<span class="text-danger"> </span></label>
	<select  name="cost_type_ref_id" class="fstdropdown-select form-control"  >
	
	<option value="<?php echo $row_results_ty['cost_sl_no'];?>"><?php echo $row_results_ty['cost_type_name'];?></option>
	<?php 
	echo $sql_cat=" SELECT * FROM    billing_cost 
	WHERE cost_company_ref_id='$company_sl_no' AND  cost_sl_no !='$cost_type_ref_id'";
	$res_cate=mysql_query($sql_cat);
	while($row_cate=mysql_fetch_array($res_cate)) 
	{?>
	<option value="<?php echo $row_cate['cost_sl_no'];?>"><?php echo $row_cate['cost_type_name'];?></option>
	<?php }?>
	</select>
</div>

 
 <div class="form-group col-md-4">
<label for="userName">  Address<span class="text-danger"> </span></label>
 <textarea name="customer_address"   class="form-control"><?php echo $row_results['customer_address'];?></textarea>
</div>
  
 	
			 
                                        </div>
									 
 
										
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
                             
                             
          	<input type="hidden" name="customer_sl_no" value="<?php echo $row_results['customer_sl_no'];?>"> 
			
			  
           </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="update_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
      </div>
   </div>
    </div>
									
							
							<div class="modal fade" id="delete_<?php echo $row['customer_sl_no'];?>">
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
			<input type="hidden" name="customer_sl_no" value="<?php echo $row['customer_sl_no'];?>">
			 
			  
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
 
 if (isset($_POST['save_components']))
				{	    
					 
		  $customer_name=$_POST['customer_name'];
		 $customer_code=$_POST['customer_code'];
		 $customer_email=$_POST['customer_email'];
		 $customer_contact_no=$_POST['customer_contact_no'];
		 $cost_type_ref_id=$_POST['cost_type_ref_id'];
		 $customer_address=$_POST['customer_address'];
			 $customer_company_ref_id= $_SESSION["company_sl_no"];
			 $customer_created_by=$_SESSION["admin_login_no"];
			 $customer_created=date('Y-m-d');
						 
	 
			
		$sql_query =  "insert into billing_customer(
		customer_name,
		customer_code,
		customer_email,
		customer_contact_no,
		customer_address,
		 cost_type_ref_id,
		customer_company_ref_id,customer_created_by,customer_created)
		values(
		'$customer_name',
		'$customer_code',
		'$customer_email',
		'$customer_contact_no',
		'$customer_address','$cost_type_ref_id',
		
		'$customer_company_ref_id',
		'$customer_created_by',
		'$customer_created')";
		$query = mysql_query($sql_query); 	
		  
	 			
					echo '<script type="text/javascript">alert("Successfully Inserted");
					window.location.href = "view_customers.php";</script>';
				}
	  
 		
					
				
				if (isset($_POST['update_components']))
				{	    
					$customer_sl_no=$_POST['customer_sl_no'];
		   $customer_name=$_POST['customer_name'];
		 $customer_code=$_POST['customer_code'];
		 $customer_email=$_POST['customer_email'];
		 $customer_contact_no=$_POST['customer_contact_no'];
		 $customer_address=$_POST['customer_address']; 
		 $cost_type_ref_id=$_POST['cost_type_ref_id']; 
						$sql_query =  "UPDATE billing_customer
   
						SET   customer_name='$customer_name',
		 customer_code='$customer_code',
		 customer_email='$customer_email',
		 customer_contact_no='$customer_contact_no',cost_type_ref_id='$cost_type_ref_id',
		 customer_address='$customer_address'         WHERE  customer_sl_no='$customer_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Updated");
					window.location.href = "view_customers.php";</script>';
				}
					if (isset($_POST['delete_records']))
				{	    
					$customer_sl_no=$_POST['customer_sl_no'];
			 
						$sql_query =  "DELETE FROM  billing_customer
    WHERE  customer_sl_no='$customer_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Deleted");
					window.location.href = "view_customers.php";</script>';
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
