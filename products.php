
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>View Products</title>

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
		  <?php 
 
 
include('save_products.php'); 
$obj = New Upload();
if(isset($_POST['save_components'])){
    $msg = $obj->upload_img();
}	
 
?> 	
        <!-- page start-->
 <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                     <ul class="breadcrumb">
                          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                          <!---<li><a href="#">Library</a></li>-->
                          <li class="active">View Products</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
  <script src="jquery-2.1.1.min.js"></script>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading"> View Products
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                            <a class="btn btn-mini btn-warning"
							data-toggle="modal" 
data-target="#create_user"
							href="#" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; Create Products</a>
                            						 
							   			<div class="modal fade" id="create_user">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  
         <div class="modal-header">
            <h5 class="modal-title"> Create Products</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body" style="padding: 0px;">
 
		    	 <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
									 
									 <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
 

 <link rel="stylesheet" href="fstdropdown.css">
 
	 
	<script src="fstdropdown.js"></script>
	<script>
		// function setDrop(){
		// if(!document.getElementById('third').classList.contains("fstdropdown-select"))
			// document.getElementById('third').className='fstdropdown-select';
			// setFstDropdown();
		// }
		// function removeDrop(){
		// if(document.getElementById('third').classList.contains("fstdropdown-select")){
				// document.getElementById('third').classList.remove('fstdropdown-select');
				// document.getElementById("third").fstdropdown.dd.remove();
			// }
		// }
 		 
		 
	</script>
 

<?php 
$company_sl_no=$_SESSION["company_sl_no"]; 
$sql_qry=" SELECT * FROM    billing_product_master 
WHERE product_company_ref_id='$company_sl_no' ";
$res_qry=mysql_query($sql_qry);
$row_eee = mysql_fetch_array($res_qry);
$last_id =  $row_eee['billing_product_sl_no'];
$rest = substr("$last_id", -5);  
$insert_id = "$rest" + 1;
$var_auto_no = sprintf("%04d", $insert_id);
 
?>
<div class="form-group col-md-4">
<label for="userName">Product Code<span class="text-danger"></span></label>
<input type="text" name="billing_product_code"  readonly value="<?php echo $var_auto_no;?>"   class="form-control">
</div>
<div class="form-group col-md-4">
<label for="userName">Product Name<span class="text-danger"></span></label>
<input type="text" name="billing_product_name"  class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Caregory<span class="text-danger"> </span></label>
 <select  name="billing_category_ref_id" class="fstdropdown-select form-control" 
 onchange="get_subcategory()"  id="categoryee" required>
										 <option value="">Select Category </option>
										 <?php 
										echo $sql_cat=" SELECT * FROM    billing_category 
				  WHERE category_company_ref_id='$company_sl_no' ";
				$res_cate=mysql_query($sql_cat);
				while($row_cate=mysql_fetch_array($res_cate)) 
				{?>
			<option value="<?php echo $row_cate['category_sl_no'];?>"><?php echo $row_cate['category_name'];?></option>
				<?php }?>
										 </select>
</div>

 <script>
function get_subcategory() {
	var supplier_name=document.getElementById("categoryee").value;
	// alert(supplier_name);
$.ajax({
type: "POST",
url: "get_category.php",
data:'country_id='+supplier_name,
success: function(data){
	// alert(data);
$("#state-list").html(data);
 
}
});
}



</script>


<div class="form-group col-md-4">
<label for="userName">Sub Category<span class="text-danger"> </span></label>
<select  name="billing_category_ref_id" class="  form-control" id="state-list" required>
<option value="">Select Sub Category </option>
</select>
</div>
 

<div class="form-group col-md-4">
<label for="userName">Barcode<span class="text-danger"> </span></label>
 <input type="text" name="billing_hsn_code" value="<?php echo substr(str_shuffle("0123456789"), 0, 5);?>" 
 readonly class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">Image<span class="text-danger"> </span></label>
 <input type="file" name="img_files[]" class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">Purchase Rate<span class="text-danger"> </span></label>
 <input type="text" name="billing_purchase_rate" class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">Sales Rate<span class="text-danger"> </span></label>
 <input type="text" name="billing_sales_rate" class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Reorder Level<span class="text-danger"> </span></label>
 <input type="text" name="billing_reorder_point" class="form-control">
</div>
 

<div class="form-group col-md-4">
<label for="userName">Open Stock<span class="text-danger"> </span></label>
 <input type="text" name="billing_opening_stoct" class="form-control">
</div>
 
<div class="form-group col-md-4">
<label for="userName">Units<span class="text-danger"> </span></label>
 <select  name="billing_purchase_unit" class="form-control"  required>
										 <option value="">Select Units </option>
										 <?php 
										echo $sql_cat=" SELECT * FROM    billing_category 
				  WHERE category_company_ref_id='$company_sl_no' ";
				$res_cate=mysql_query($sql_cat);
				while($row_cate=mysql_fetch_array($res_cate)) 
				{?>
			<option value="<?php echo $row_cate['category_sl_no'];?>"><?php echo $row_cate['category_name'];?></option>
				<?php }?>
										 </select>
</div>
 
 
 <div class="form-group col-md-4">
<label for="userName">Description<span class="text-danger"> </span></label>
 <textarea name="billing_description"   class="form-control"></textarea>
</div>
  
 	
			 
                                        </div>
									 
 
  						
										 
									 
										
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
          <input type="hidden" name="action_type" value="Add">               
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
					 <th> Product Name  </th> 
					 <th>  Product Code  </th> 
					 <th> Categeory  </th> 
					 <th>Sub Categeory</th>  
					 <th> Stock  </th>
					 <th>Created By</th>
					 <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
										 <?php 
										 $i=1;
					 $company_sl_no=$_SESSION["company_sl_no"]; 
				  $sql_query=" SELECT * FROM    billing_product_master ,billing_category,billing_sub_category
				  WHERE product_company_ref_id='$company_sl_no' AND category_ref_id=category_sl_no
				  AND billing_category_ref_id =category_sl_no  AND billing_sub_category_ref_id=sub_category_sl_no";
				$res=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($res)) 
				{ ?> 
                            <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                                         <td><?php echo $row['billing_product_name'];?></td> 
										 <td><?php echo $row['billing_product_code'];?></td> 
										 <td><?php echo $row['category_name'];?></td> 
										 <td><?php echo $row['sub_category_name'];?></td> 
										 <td><?php echo $row['billing_opening_stoct'];?></td> 
										 <td><?php 
$product_created_by=$row['product_created_by'];
$exe="SELECT * FROM   tbl_add_user where  admin_login_no='$product_created_by' ";
$exe_result=mysql_query($exe);
$rowresultss = mysql_fetch_array($exe_result);
	echo $rowresultss['username'];									 
										 ?></td> 
                                <td class="hidden-phone">
								<a href="#" data-toggle="modal" 
data-target="#update_<?php echo $row['billing_product_sl_no'];?>"
class="label label-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
								<a href="#" data-toggle="modal" 
data-target="#delete_<?php echo $row['billing_product_sl_no'];?>" class="label label-danger  btn-danger">Delete</a>
								</td>
                            </tr>
					<div class="modal fade" id="update_<?php echo $row['billing_product_sl_no'];?>">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
  <?php 
   $billing_product_sl_no=$row['billing_product_sl_no'];
   $exe=" SELECT * FROM    billing_product_master 
				  WHERE billing_product_sl_no='$billing_product_sl_no' ";
$exe_result=mysql_query($exe);
$row_results = mysql_fetch_array($exe_result);
?>
         <div class="modal-header">
            <h5 class="modal-title"> Update Supplier</h5>
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
<label for="userName">Product Name<span class="text-danger"></span></label>
<input type="text" name="billing_product_name" value="<?php echo $row_results['billing_product_name'];?>"  class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Caregory<span class="text-danger"> </span></label>
 <select  name="billing_category_ref_id" class="fstdropdown-select form-control" 
 onchange="get_subcategory_<?php echo $row_results['billing_product_sl_no'];?>()"  
 id="category_<?php echo $row_results['billing_product_sl_no'];?>" required>
										  <?php 
									 $billing_category_ref_id=$row_results['billing_category_ref_id'];
										  $sa_sql=" SELECT * FROM     billing_category 
				  WHERE category_sl_no='$billing_category_ref_id' ";
				$sq_qr=mysql_query($sa_sql);
				$rs_q = mysql_fetch_array($sq_qr);						 
										 ?>
					  <option value="<?php echo $rs_q['category_sl_no'];?>"><?php echo $rs_q['category_name'];?></option>
										 
										 <?php 
										  $sql_cat=" SELECT * FROM    billing_category 
				  WHERE category_company_ref_id='$company_sl_no' AND category_sl_no!='$billing_category_ref_id'";
				$res_cate=mysql_query($sql_cat);
				while($row_cate=mysql_fetch_array($res_cate)) 
				{?>
			<option value="<?php echo $row_cate['category_sl_no'];?>"><?php echo $row_cate['category_name'];?></option>
				<?php }?>
										 </select>
</div>

 <script>
function get_subcategory_<?php echo $row_results['billing_product_sl_no'];?>() {
	var supplier_name=document.getElementById("category_<?php echo $row_results['billing_product_sl_no'];?>").value;
	alert(supplier_name);
$.ajax({
type: "POST",
url: "get_category.php",
data:'country_id='+supplier_name,
success: function(data){
	// alert(data);
$("#state-list_<?php echo $row_results['billing_product_sl_no'];?>").html(data);
 
}
});
}



</script>


<div class="form-group col-md-4">
<label for="userName">Sub Category<span class="text-danger"> </span></label>
<select  name="billing_sub_category_ref_id" class="  form-control" id="state-list_<?php echo $row_results['billing_product_sl_no'];?>" required>
 <?php 
									 $billing_sub_category_ref_id=$row_results['billing_sub_category_ref_id'];
										  $sa_sql=" SELECT * FROM     billing_sub_category 
				  WHERE sub_category_sl_no='$billing_sub_category_ref_id' ";
				$sq_qr=mysql_query($sa_sql);
				$rs_q = mysql_fetch_array($sq_qr);						 
										 ?>
					  <option value="<?php echo $rs_q['sub_category_sl_no'];?>"><?php echo $rs_q['sub_category_name'];?></option>
										 
</select>
</div>
 

<div class="form-group col-md-4">
<label for="userName">Barcode<span class="text-danger"> </span></label>
 <input type="text" name="billing_hsn_code" readonly value="<?php echo $row_results['billing_hsn_code'];?>" class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Purchase Rate<span class="text-danger"> </span></label>
 <input type="text" name="billing_purchase_rate" value="<?php echo $row_results['billing_purchase_rate'];?>" class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">Sales Rate<span class="text-danger"> </span></label>
 <input type="text" name="billing_sales_rate" value="<?php echo $row_results['billing_sales_rate'];?>"class="form-control">
</div>



<div class="form-group col-md-4">
<label for="userName">Reorder Level<span class="text-danger"> </span></label>
 <input type="text" name="billing_reorder_point" value="<?php echo $row_results['billing_reorder_point'];?>" class="form-control">
</div>
 

<div class="form-group col-md-4">
<label for="userName">Open Stock<span class="text-danger"> </span></label>
 <input type="text" name="billing_opening_stoct" value="<?php echo $row_results['billing_opening_stoct'];?>"class="form-control">
</div>
 
<div class="form-group col-md-4">
<label for="userName">Units<span class="text-danger"> </span></label>
 <select  name="billing_purchase_unit" class="form-control"  required>
										  
										 <?php 
									 $billing_purchase_unit=$row_results['billing_purchase_unit'];
										  $sa_sql=" SELECT * FROM     billing_units 
				  WHERE units_sl_no='$billing_purchase_unit' ";
				$sq_qr=mysql_query($sa_sql);
				$rs_q = mysql_fetch_array($sq_qr);						 
										 ?>
					  <option value="<?php echo $rs_q['units_sl_no'];?>"><?php echo $rs_q['unit_name'];?></option>
										 <?php 
										  $sql_cat=" SELECT * FROM     billing_units 
				  WHERE unit_company_ref_id='$company_sl_no' AND units_sl_no !='$billing_purchase_unit'";
				$res_cate=mysql_query($sql_cat);
				while($row_cate=mysql_fetch_array($res_cate)) 
				{?>
			<option value="<?php echo $row_cate['units_sl_no'];?>"><?php echo $row_cate['unit_name'];?></option>
				<?php }?>
										 </select>
</div>
 
 
 <div class="form-group col-md-4">
<label for="userName">Description<span class="text-danger"> </span></label>
 <textarea name="billing_description"   class="form-control"><?php echo $row_results['billing_description'];?></textarea>
</div>
  <div class="form-group col-md-4">
<label for="userName">Image<span class="text-danger"> </span></label>
 <input type="file" name="img_files[]" class="form-control">
</div>

<div class="form-group col-md-4">
<label for="userName">&nbsp;<span class="text-danger"> </span></label>
 <img src="image/main/<?php echo $row_results['product_image'];?>" style="height:72px">
</div>
 	
			 
                                        </div>
									 
 
  						
										 
									 	
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
                             <input type="hidden" name="action_type" value="Update">   
                             
          	
			<input type="hidden" name="billing_product_sl_no" value="<?php echo $row_results['billing_product_sl_no'];?>"> 
			
			<input type="hidden" name="product_image" value="<?php echo $row_results['product_image'];?>"> 
			  
           </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="save_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
      </div>
   </div>
    </div>
									
							
							<div class="modal fade" id="delete_<?php echo $row['billing_product_sl_no'];?>">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  <form method="post">
         <div class="modal-header">
            <h5 class="modal-title"> Delete A Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <?php 
 
 	  $sa_sql=" SELECT * FROM     billing_product_master 
				  WHERE billing_product_sl_no='$billing_product_sl_no' ";
				$sq_qr=mysql_query($sa_sql);
				$rs_q = mysql_fetch_array($sq_qr);?>
				
			<div class="modal-body">
			<input type="hidden" name="billing_product_sl_no" value="<?php echo $rs_q['billing_product_sl_no'];?>">
			<input type="hidden" name="product_image" value="<?php echo $rs_q['product_image'];?>">
			  
			  
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
					$billing_product_sl_no=$_POST['billing_product_sl_no'];
					$product_image=$_POST['product_image'];
			 unlink("image/main/".$product_image);
						$sql_query =  "DELETE FROM  billing_product_master
    WHERE  billing_product_sl_no='$billing_product_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Deleted");
					window.location.href = "products.php";</script>';
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
