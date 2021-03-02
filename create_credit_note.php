
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>Create Credit Note</title>

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
                          <li class="active">View Credit Note</li>
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
                    <header class="panel-heading"> View Credit Note
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                            <a class="btn btn-mini btn-warning"
							 href="credit_note.php" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; View Credit Note</a>
                            						 
							 
                         </span>
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <form id="wizard-validation-form"    method="post" action="" enctype="multipart/form-data">
                                 <div class="row-fluid">
                                     <div class="col-md-12">
									 
									 <div class="d-flex " style="flex-flow: wrap;    margin-top: 29px;">
 
<?php 
$company_sl_no=$_SESSION["company_sl_no"]; 
  $sql_qry=" SELECT * FROM     billing_credit_note 
WHERE credit_note_company_ref_id='$company_sl_no' ORDER BY credit_note_sl_no DESC LIMIT 0,1 ";
$res_qry=mysql_query($sql_qry);
$row_eee = mysql_fetch_array($res_qry);
$last_id =  $row_eee['credit_note_sl_no'];
$rest = substr("$last_id", -5);  
$insert_id = "$rest" + 1;
$var_auto_no = sprintf("%04d", $insert_id);
 
?>
 <div class="form-group col-md-3">
<label for="userName">Credit Note  No <span class="text-danger"> </span></label>
 <input type="text" name="credit_note_no" readonly value="<?php echo $var_auto_no;?>"     class="form-control">
</div>

<div class="form-group col-md-3">
<label for="userName">Date<span class="text-danger"></span></label>
<input type="date" name="credit_note_date"  class="form-control">
</div>
<div class="form-group col-md-3">
<label for="userName">Sale Id   <span class="text-danger"></span></label>

<select name="credit_note_sale_ref_id" class="fstdropdown-select form-control" required 
onchange="get_details(this)">
<option value="">Select Sale Id</option>
<?php 	 $company_sl_no=$_SESSION["company_sl_no"]; 
$sale_status="Paid";
			 	echo  $sql_query=" SELECT * FROM    billing_sale_master 
				  WHERE sale_company_ref_id='$company_sl_no' AND sale_payment_method='Credit'
				  AND sale_status!='$sale_status'";
				$res=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($res)) 
				{ ?>
			
	<option value="<?php echo $row['sale_master_sl_no'];?>"><?php echo $row['sale_id'];?></option>		
				<?php }?>
</select>
</div>


 



 

<div class="form-group col-md-3">
<label for="userName">Payable Amount<span class="text-danger"></span></label>
<input type="text"  readonly  name="credit_note_total_amount"  id="payable_amount" class="form-control"  value="" required >
</div>
 
<div class="form-group col-md-3">
<label for="userName">Paid Amount<span class="text-danger"></span></label>
<input type="text"  name="credit_note_paid_amount" onkeyup="calc_tax(this)" id="paid_amount" class="form-control"  value="" required >
</div>
 
 <div class="form-group col-md-3">
<label for="userName">Balance Amount<span class="text-danger"></span></label>
<input type="text"  name="credit_note_balance_amount" readonly id="balance_amount" class="form-control"  value="" required >
</div>
 

 <script>
function get_details(sel) {
		
    var employee_id = sel.value;
	  
$.ajax({
						  type: 'post',
						  url: 'get_category.php',
						  data: {
						   get_details:employee_id,
						  },
						  success: function (data) {
						  var result = data; 
					var str_array = result.split('_wo');
					 
					var payable_amount=str_array[0]; 
					 
						  document.getElementById("payable_amount").value = payable_amount;
						   
						  }
						
						  
						  });
	
}
function calc_tax() {
 
 
 
	var var_paid_amount = document.getElementById("paid_amount").value; 
	var pay_amnt = document.getElementById("payable_amount").value; 
	
	var balz_amount = (parseFloat(pay_amnt) -  parseFloat(var_paid_amount));	
	var round_balz_amount=balz_amount.toFixed(2);	
 
	document.getElementById("balance_amount").value = round_balz_amount;
	 
	 
 
 
	
 
 
}



</script>

 
  
  
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
$credit_note_no=$_POST['credit_note_no'];
$credit_note_date=$_POST['credit_note_date'];
$credit_note_sale_ref_id=$_POST['credit_note_sale_ref_id'];
$credit_note_total_amount=$_POST['credit_note_total_amount'];
$credit_note_paid_amount=$_POST['credit_note_paid_amount'];
$credit_note_balance_amount=$_POST['credit_note_balance_amount'];
			 $credit_note_company_ref_id= $_SESSION["company_sl_no"];
			 $credit_note_created_by=$_SESSION["admin_login_no"];
			 $credit_note_created=date('Y-m-d');
			 
$sql_query =  "insert into  billing_credit_note(
credit_note_no,credit_note_date,credit_note_sale_ref_id,credit_note_total_amount,credit_note_paid_amount,
credit_note_balance_amount,credit_note_company_ref_id,credit_note_created_by,
credit_note_created
)
		values('$credit_note_no','$credit_note_date','$credit_note_sale_ref_id','$credit_note_total_amount',
'$credit_note_paid_amount','$credit_note_balance_amount','$credit_note_company_ref_id',
'$credit_note_created_by','$credit_note_created')";
		$query = mysql_query($sql_query); 	
			$last_id=mysql_insert_id(); 			  
		
		if($credit_note_balance_amount == 0){
		
$sale_status="Paid";
$sql_query =  "UPDATE billing_sale_master SET sale_status='$sale_status' ,sale_payable_amount='$credit_note_balance_amount'
WHERE sale_master_sl_no ='$credit_note_sale_ref_id'";
$query = mysql_query($sql_query); 	
 
		}
		else
		{
		$sale_status="Partially Paid";
$sql_query =  "UPDATE billing_sale_master SET sale_status='$sale_status' ,sale_payable_amount='$credit_note_balance_amount'
WHERE sale_master_sl_no ='$credit_note_sale_ref_id'";
$query = mysql_query($sql_query); 	
		}
		 
					echo '<script type="text/javascript">alert("Successfully Inserted");
					window.location.href = "credit_note.php";</script>';
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