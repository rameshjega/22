
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>View Credit Report</title>

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
                          <li class="active">View Credit Report </li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
  <script src="jquery-2.1.1.min.js"></script>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading"> View Credit Report<?php if (isset($_POST['save_components']))
				{	 
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];?>
			(<?php echo $from_date;?> - <?php echo $to_date;?>)
				<?php }?>
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                             				 
							 
                         </span>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
					<form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
									 
									 <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
 
 
<div class="form-group col-md-6">
<label for="userName">From<span class="text-danger"></span></label>
<input type="date"  name="from_date"   class="form-control"  value="" required >
</div>
 
 <div class="form-group col-md-6">
<label for="userName">To<span class="text-danger"></span></label>
<input type="date"  name="to_date"   class="form-control"  value="" required >
</div>
 
 
  
  
                                        </div>
									 
 
  						
										 
									 
					 				
                                             
                                        
                                     </div>

                                  </div>
                                
                         
           </div>
         <div class="modal-footer">
             
            <button type="submit" name="save_components" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
         </div>
		 </form>
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="dynamic-table">
                    <thead>
                     <tr>
                         <th>Sl.No</th>
					 <th> Credit Note No  </th> 
					 <th> Date  </th> 
					 <th>Sale Id</th> 
					 <th>Amount  </th> 
					 <th>Status</th>
					 <th>Created By</th>
					 <!---<th>Action</th>--->
                    </tr>
                    </thead>
                    <tbody>
										 <?php 
										 $i=1;
					 $company_sl_no=$_SESSION["company_sl_no"]; 
					 
					  if (isset($_POST['save_components']))
				{	 
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];
				    $sql_query="  SELECT * FROM    billing_credit_note ,billing_sale_master
				  WHERE credit_note_company_ref_id='$company_sl_no' AND credit_note_sale_ref_id=sale_master_sl_no
				  AND (credit_note_created BETWEEN  '$from_date' AND '$to_date')
				  ";
				}else{
				  $sql_query=" SELECT * FROM    billing_credit_note ,billing_sale_master
				  WHERE credit_note_company_ref_id='$company_sl_no' AND credit_note_sale_ref_id=sale_master_sl_no";
				}
				$res=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($res)) 
				{ ?>
                                  <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                                         <td><?php echo $row['credit_note_no'];?></td> 
										 <td><?php echo $row['credit_note_date'];?></td> 
										 <td><?php echo $row['sale_id'];?></td> 
										 <td><?php echo $row['credit_note_total_amount'];?></td> 
										 <td><?php echo $sale_status= $row['sale_status'];?></td> 
										 <td><?php 
$credit_note_created_by=$row['credit_note_created_by'];
$exe="SELECT * FROM   tbl_add_user where  admin_login_no='$credit_note_created_by' ";
$exe_result=mysql_query($exe);
$rowresultss = mysql_fetch_array($exe_result);
	echo $rowresultss['username'];									 
										 ?></td> 
                                <!---<td class="hidden-phone">
								<?php if($po_status == 'Open'){?>
								<a href="#" data-toggle="modal" 
data-target="#update_<?php echo $row['po_master_sl_no'];?>"
class="label label-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
								
								<a href="#" data-toggle="modal" 
data-target="#delete_<?php echo $row['po_master_sl_no'];?>" class="label label-danger  btn-danger">Delete</a>
								
								<?php }?>
									<a href="view_po.php?id<?php echo $row['po_master_sl_no'];?>"
class="label label-success">&nbsp;&nbsp;View&nbsp;&nbsp;</a>
								</td>--->
                            </tr>
		 			
							<div class="modal fade" id="delete_<?php echo $row['po_master_sl_no'];?>">
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
			<input type="hidden" name="po_master_sl_no" value="<?php echo $row['po_master_sl_no'];?>">
			 
			  
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
