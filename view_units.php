
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>View Units</title>

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
                          <li class="active">View Units</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
  <script src="jquery-2.1.1.min.js"></script>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading"> View Units
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                            <a class="btn btn-mini btn-warning"
							data-toggle="modal" 
data-target="#create_user"
							href="#" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; Create Units</a>
                            						 
							   			<div class="modal fade" id="create_user">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  
         <div class="modal-header">
            <h5 class="modal-title"> Create Units</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body">
		    	 <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-612">
                                       <table class="table" id="maintable">  
                <thead>  
                    <tr>  
					<th>Units</th>
				 
					<th>Action</th> 
                    </tr>  
                </thead>  
                <tbody>  
                    <tr class="data-contact-person">  
					<td>  <input type="text" name="unit_name[]" class="form-control f-name01" required=""></td>  
 
 				 
                        <td>
                            <button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button>  
                        </td>  
                    </tr>  
                </tbody>  
            </table>
 <script type="text/javascript">  
    $(document).ready(function () {  
        $(document).on("click", ".classAdd", function () { //
            var rowCount = $('.data-contact-person').length + 1;  
            var contactdiv = '<tr class="data-contact-person">' +  
			'<td><input  type="text"  name="unit_name[]" class="form-control f-name01"   required /></td>' + 
			 
                '<td><button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button>&nbsp;' +  
                '<button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-xs">Remove</button></td>' +  
                '</tr>';  
            $('#maintable').append(contactdiv); // Adding these controls to Main table class  
        });  
    });  
	$(document).on("click", ".deleteContact", function () {  
            $(this).closest("tr").remove(); // closest used to remove the respective 'tr' in which I have my controls   
});
</script>
										 
										
										 
									 
										
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
                          <input type="hidden"  name="action_type" value="Add"> 
                            
          
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
                                         <th> Unit  </th> 
                                         <th>Created By</th>
                                         <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
										 <?php 
								$company_sl_no=$_SESSION["company_sl_no"];
				$i=1;
				  $sql_query=" SELECT * FROM    billing_units 
				  WHERE unit_company_ref_id='$company_sl_no' ";
				$res=mysql_query($sql_query);
				while($row=mysql_fetch_array($res)) 
				{ ?>;
                            <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                                         <td><?php echo $row['unit_name'];?></td> 
										 
										 <td><?php 
$unit_created_by=$row['unit_created_by'];
$exe="SELECT * FROM   tbl_add_user where  admin_login_no='$unit_created_by' ";
$exe_result=mysql_query($exe);
$rowresultss = mysql_fetch_array($exe_result);
	echo $rowresultss['username'];									 
										 ?></td> 
                                <td class="hidden-phone">
								<a href="#" data-toggle="modal" 
data-target="#update_<?php echo $row['units_sl_no'];?>"
class="label label-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
								<a href="#" data-toggle="modal" 
data-target="#delete_<?php echo $row['units_sl_no'];?>" class="label label-danger  btn-danger">Delete</a>
								</td>
                            </tr>
					<div class="modal fade" id="update_<?php echo $row['units_sl_no'];?>">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
  <?php 
   $units_sl_no=$row['units_sl_no'];
  $exe="SELECT * FROM   billing_units where  units_sl_no='$units_sl_no' ";
$exe_result=mysql_query($exe);
$row_results = mysql_fetch_array($exe_result);
?>
         <div class="modal-header">
            <h5 class="modal-title"> Update Units</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
 <div class="modal-body">
		    	  <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-612">
                                       
										<div class="form-group">
										<label class="control-label">Units </label>
										<div class="controls controls-row">
										 <input type="text"  name="unit_name" class="form-control"
										 value="<?php echo $row_results['unit_name'];?>"  required>
										</div>
										</div>
										
									 
									  	
                                     
										
                                             
                                        
                                     </div>

                                  </div>
                                 <div class="space15"></div>
                             
                            
                          <input type="hidden"  name="action_type" value="Update"> 
          	<input type="hidden" name="units_sl_no" value="<?php echo $row_results['units_sl_no'];?>"> 
			
			  
           </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" name="update_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
      </div>
   </div>
    </div>
									
							
							<div class="modal fade" id="delete_<?php echo $row['units_sl_no'];?>">
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
			<input type="hidden" name="units_sl_no" value="<?php echo $row['units_sl_no'];?>">
			 
			  
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
					$unit_name=$_POST['unit_name'];
		 $unit_name=$_POST['unit_name'];
			 $unit_company_ref_id= $_SESSION["company_sl_no"];
			 $unit_created_by=$_SESSION["admin_login_no"];
			 $unit_created=date('Y-m-d');
						 
		for ($y = 0; $y < count($unit_name); $y++) 
	{
			
		$sql_query =  "insert into billing_units(unit_name,
		unit_company_ref_id,unit_created_by,unit_created)
		values('$unit_name[$y]','$unit_company_ref_id',
		'$unit_created_by',
		'$unit_created')";
		$query = mysql_query($sql_query); 	
		  
	
	}
					
					echo '<script type="text/javascript">alert("Successfully Inserted");
					window.location.href = "view_units.php";</script>';
				}
	  
 		
					
				
				if (isset($_POST['update_components']))
				{	    
					$units_sl_no=$_POST['units_sl_no'];
		 $unit_name=$_POST['unit_name'];
			 
						$sql_query =  "UPDATE billing_units
   
						SET unit_name ='$unit_name'       WHERE  units_sl_no='$units_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Updated");
					window.location.href = "view_units.php";</script>';
				}
					if (isset($_POST['delete_records']))
				{	    
					$units_sl_no=$_POST['units_sl_no'];
			 
						$sql_query =  "DELETE FROM  billing_units
    WHERE  units_sl_no='$units_sl_no'";
						$query = mysql_query($sql_query); 
					 
					 
					echo '<script type="text/javascript">alert("Successfully Deleted");
					window.location.href = "view_units.php";</script>';
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
