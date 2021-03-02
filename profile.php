
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>Profile</title>

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
                          <li class="active">Profile</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
  <script src="jquery-2.1.1.min.js"></script>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading"> Profile
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                            <a class="btn btn-mini btn-warning"
							 href="create_po.php" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; Create PO</a>
                            						 
							 
                         </span>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
									 
									 <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
 
 
 <div class="form-group col-md-4">
<label for="userName">Company Name<span class="text-danger"> </span></label>
 <input type="text" name="company_name"       class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">company Address<span class="text-danger"></span></label>
<input type="text" name="company_address" required class="form-control">
</div>
 
 
<div class="form-group col-md-4">
<label for="userName">State<span class="text-danger"> </span></label>
 <input type="text"   required   name="company_state" class="form-control">
</div>

  
<div class="form-group col-md-4">
<label for="userName">Contact No<span class="text-danger"> </span></label>
 <input type="text" required name="company_contact_no"  class="form-control">
</div>


<div class="form-group col-md-4">
<label for="userName">Email Id<span class="text-danger"> </span></label>
 <input type="text" required name="company_email_id"  class="form-control">
</div>


<div class="form-group col-md-4">
<label for="userName">GST <span class="text-danger"> </span></label>
 <input type="text" required name="company_gst_in"  class="form-control">
</div>


<div class="form-group col-md-4">
<label for="userName">CIN <span class="text-danger"> </span></label>
 <input type="text" required name="company_cin"  class="form-control">
</div>
 
	                                    </div>
									 
 
  						
										 
									 
								<style>
.select2-container {
    box-sizing: border-box;
    display: inline-block;
    margin: 0;
    position: relative;
    vertical-align: middle;
    width: 200px !important;
	
}</style>								
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
                         
           </div>
         <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="save_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
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
$company_name=$_POST['company_name'];
$company_address=$_POST['company_address'];

$company_state=$_POST['company_state'];
 
$company_contact_no=$_POST['company_contact_no'];
$company_email_id=$_POST['company_email_id'];

$company_gst_in=$_POST['company_gst_in'];
$company_cin=$_POST['company_cin'];

			 $company_sl_no= $_SESSION["company_sl_no"];
			 $company_created_by=$_SESSION["admin_login_no"];
			 $company_created=date('Y-m-d');
			 
			 $sql_query =  "insert into  billing_po_master(po_no,
		po_date,po_supplier_ref_id,po_status,po_grand_total
		,po_tax_percentage,po_tax_percentage_value,po_net_amount,po_company_ref_id,
		po_created_by,po_created)
		values('$po_no','$po_date','$po_supplier_ref_id','$po_status','$po_grand_total',
		'$po_tax_percentage','$po_tax_percentage_value','$po_net_amount','$po_company_ref_id',
		'$po_created_by',
		'$po_created')";
		$query = mysql_query($sql_query); 	
						$last_id=mysql_insert_id(); 
						$descr=$_POST['descr'];
						$po_product_ref_id=$_POST['po_product_ref_id'];
						$po_price=$_POST['po_price'];
						$po_quantity=$_POST['po_quantity'];
						$po_sub_total=$_POST['po_sub_total'];  
		for ($y = 0; $y < count($descr); $y++) 
	{
			
		$sql_query =  "insert into billing_po_child(po_master_ref_id,po_product_ref_id,
		po_price,po_quantity,po_sub_total)
		values('$last_id','$po_product_ref_id[$y]','$po_price[$y]',
		'$po_quantity[$y]',
		'$po_sub_total[$y]')";
		$query = mysql_query($sql_query); 	
		  
	
	}
					
					echo '<script type="text/javascript">alert("Successfully Deleted");
					window.location.href = "create_po.php";</script>';
				}
	  
					
				
				 if (isset($_POST['delete_records']))
				{	    
					$po_master_sl_no=$_POST['po_master_sl_no'];
			 
						$sql_query =  "DELETE FROM  billing_po_master
    WHERE  po_master_sl_no='$po_master_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Deleted");
					window.location.href = "purchase.php";</script>';
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
<link rel="stylesheet" href="select2.min.css" />
<style>.select2-dropdown {top: 0px !important; left: 0px !important;}</style>
<script src="select2.min.js"></script>
<script>
 
	$(".edit_data").select2( {
	allowClear: true
	});
</script>
<style>
.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    -webkit-user-select: none;
    width: 100% !important;
    height: 34px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}</style>