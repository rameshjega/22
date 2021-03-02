
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>View PO</title>

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
                          <li class="active">View PO</li>
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
                    <header class="panel-heading"> View PO
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
 
<?php 
$company_sl_no=$_SESSION["company_sl_no"]; 
$sql_qry=" SELECT * FROM     billing_po_master 
WHERE po_company_ref_id='$company_sl_no' ORDER BY po_master_sl_no DESC LIMIT 0,1";
$res_qry=mysql_query($sql_qry);
$row_eee = mysql_fetch_array($res_qry);
$last_id =  $row_eee['po_master_sl_no'];
$rest = substr("$last_id", -5);  
$insert_id = "$rest" + 1;
$var_auto_no = sprintf("%04d", $insert_id);
 
?>
 <div class="form-group col-md-4">
<label for="userName">Po Number <span class="text-danger"> </span></label>
 <input type="text" name="po_no" readonly value="<?php echo $var_auto_no;?>"     class="form-control">
</div>
 
 
<div class="form-group col-md-4">
<label for="userName">Po date<span class="text-danger"></span></label>
<input type="date" name="po_date"  class="form-control">
</div>
<div class="form-group col-md-4">
<label for="userName">Supplier   <span class="text-danger"></span></label>
 
<select name="po_supplier_ref_id" class="fstdropdown-select form-control" required onchange="getsupplier(this)">
<option value="">Select Supplier</option>
<?php 	 $company_sl_no=$_SESSION["company_sl_no"]; 
			echo	  $sql_query=" SELECT * FROM    billing_supplier 
				  WHERE supplier_company_ref_id='$company_sl_no' ";
				$res=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($res)) 
				{ ?>
			
	<option value="<?php echo $row['supplier_sl_no'];?>"><?php echo $row['supplier_name'];?></option>		
				<?php }?>
</select>
</div>

<script>
function getsupplier(sel) {
		
    var employee_id = sel.value;
	  
$.ajax({
						  type: 'post',
						  url: 'get_category.php',
						  data: {
						   supp_id:employee_id,
						  },
						  success: function (data) {
						  var result = data; 
					var str_array = result.split('_wo');
					 
					var supp_code=str_array[0];
					var supplier_address=str_array[1];	
					 
						  document.getElementById("supp_code").value = supp_code;
						  document.getElementById("supp_addr").value = supplier_address;
						    
						  }
						
						  
						  });
	
}</script>

<div class="form-group col-md-4">
<label for="userName">Supplier Code<span class="text-danger"> </span></label>
 <input type="text"  readonly  id="supp_code" class="form-control">
</div>

  
<div class="form-group col-md-4">
<label for="userName">Address<span class="text-danger"> </span></label>
 <input type="text" readonly id="supp_addr"  class="form-control">
</div>
 
	                          <table class="table" id="maintable">  
                <thead>  
                    <tr>  
					<th>Product</th>
<th>Description</th>
<th>Unit Price</th>
<th>Quantity</th>
<th>Total</th>
						 <th>Action</th> 
                    </tr>  
                </thead>  
                <tbody>  
                    <tr class="data-contact-person" id="0">  
					
<td>   
<select  name="po_product_ref_id[]" class="form-control edit_data" id="" required onchange="getComboA(this)">
<option value="">Select Po</option>
<?php 
$company_sl_no=$_SESSION["company_sl_no"]; 

$sql_cat="  SELECT * FROM     billing_product_master 
WHERE product_company_ref_id='$company_sl_no'";
$res_cate=mysql_query($sql_cat);
while($row_cate=mysql_fetch_array($res_cate)) 
{?>
<option value="<?php echo $row_cate['billing_product_sl_no'];?>"><?php echo $row_cate['billing_product_name'];?></option>
<?php }?>
</select>
</td>  
<td>  <input type="text"  id="des_0" name="descr[]" class="form-control f-name01" required=""></td>  
<td>  <input type="text" name="po_price[]" id="product_price_0" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>  
<td>  <input type="text" name="po_quantity[]" id="product_quantity_0" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>  
<td>  <input type="text" name="po_sub_total[]" id="product_total_0"  readonly  class="amount form-control f-name01" required=""></td>  
				 
 				 
                        <td>
                            <button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button>  
                        </td>  
                    </tr>  
                </tbody>
<tfoot>
<tr>
 
<td colspan="4" style="text-align:right;">Grant Total</td>
<td><input type="text" name="po_grand_total" readonly  id="sum_total_amount" class="form-control f-name01" required=""></td>
</tr>
<tr>
 <?php 
    $inline_query1="
 
SELECT * FROM   billing_tax WHERE  tax_company_ref_id='$company_sl_no'	 ";
$inline_result=mysql_query($inline_query1); 	

$row_result = mysql_fetch_array($inline_result);
 ?>
<td colspan="4" style="text-align:right;">Tax(%)</td>
<td><input type="text" name="po_tax_percentage" onkeyup="calc_tax(this)" 
 id="purchase_order_Tax" class="form-control f-name01"  value="<?php echo $row_result['tax_name'];?>" required=""></td>
</tr>

<tr>
 
<td colspan="4" style="text-align:right;">Taxable Value</td>
<td><input type="text" name="po_tax_percentage_value" id="tax_percetage_value" readonly  class="form-control f-name01" required=""></td>
</tr>
<tr>
 
<td colspan="4" style="text-align:right;">Grant Total</td>
<td><input type="text" name="po_net_amount" id="net_amount" readonly  class="form-control f-name01" required=""></td>
</tr>
</tfoot>			
            </table>

<script type="text/javascript">  
    $(document).ready(function () {  
	var rowCount= 1; 
        $(document).on("click", ".classAdd", function () { //
            // var rowCount = $('.data-contact-person').length + 1;  
            var contactdiv = '<tr class="data-contact-person" id="'+rowCount+'">' +  
			'<td><select  name="po_product_ref_id[]" class="form-control edit_data"  id="getdepart_R'+rowCount+'"  required onchange="getComboA(this)"><option value="">Select Po</option><?php $company_sl_no=$_SESSION["company_sl_no"]; $sql_cat="  SELECT * FROM     billing_product_master WHERE product_company_ref_id='$company_sl_no'";$res_cate=mysql_query($sql_cat);while($row_cate=mysql_fetch_array($res_cate)) {?><option value="<?php echo $row_cate['billing_product_sl_no'];?>"><?php echo $row_cate['billing_product_name'];?></option><?php }?></select></td>' + 
			 '<td><input type="text"  name="descr[]" id="des_'+rowCount+'"  class="form-control f-name01" required=""></td>' + 
			 '<td><input type="text" name="po_price[]" id="product_price_'+rowCount+'" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>' + 
			 '<td><input type="text" name="po_quantity[]" id="product_quantity_'+rowCount+'" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>' + 
			 '<td><input type="text" name="po_sub_total[]" id="product_total_'+rowCount+'"  readonly  class="amount form-control f-name01" required=""></td>' + 
 
                '<td><button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button>&nbsp;' +  
                '<button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-xs">Remove</button></td>' +  
                '</tr>';  
            $('#maintable').append(contactdiv); // Adding these controls to Main table class  
			 $('#getdepart_R'+rowCount+'').select2( {
	allowClear: true
	});
		
			rowCount++;
        });  
    });  
	$(document).on("click", ".deleteContact", function () {  
            $(this).closest("tr").remove(); // closest used to remove the respective 'tr' in which I have my controls   
});

function getComboA(sel) {
		
    var employee_id = sel.value;
	 var row_count = $(sel).closest('tr').attr('id');
	 
$.ajax({
						  type: 'post',
						  url: 'get_category.php',
						  data: {
						   pdt_id:employee_id,
						  },
						  success: function (data) {
						  var result = data; 
					var str_array = result.split('_wo');
					 
					var pdt_dec=str_array[0];
					var pdt_price=str_array[1];	
					 
						  // document.getElementById("des_0").value = supplier_sl_no;
						  // document.getElementById("pdt_price_0").value = supplier_name;
						   $('#des_'+row_count).val(pdt_dec);
						   $('#product_price_'+row_count).val(pdt_price);
						  }
						
						  
						  });
	
}

function calc_quantity(seling) {
var employee_id = seling.value;  
var rowCount = $(seling).closest('tr').attr('id');

var quantity=document.getElementById('product_quantity_'+rowCount).value;
var price=document.getElementById('product_price_'+rowCount).value;
var sub_Total = parseFloat(quantity) * parseFloat(price);
var subTotal=sub_Total.toFixed(2);	
 document.getElementById('product_total_'+rowCount).value =subTotal;
var sub_total_amount = 0;
var amounts_var = document.getElementsByClassName('amount');

for(var j=0; j<amounts_var .length; j++) {
var a = +amounts_var[j].value;
sub_total_amount += parseFloat(a) || 0;
}	
 
 var all_subTotal=sub_total_amount.toFixed(2);	
 document.getElementById('sum_total_amount').value =all_subTotal;
 
 
var Tax_percemntage = document.getElementById("purchase_order_Tax").value; 
var total_amount_val = document.getElementById("sum_total_amount").value; 

	
	// document.getElementById("vat_amnt").innerHTML =Tax_percemntage;
	
var var_percetage_value = (parseFloat(Tax_percemntage) / 100) * parseFloat(total_amount_val);	
	var round_percetage_value=var_percetage_value.toFixed(2);		
	document.getElementById("tax_percetage_value").value = round_percetage_value;	

 var var_tot_sum_total_amount = document.getElementById("sum_total_amount").value; 
	var var_taxable_amount = document.getElementById("tax_percetage_value").value; 
	var var_total_taxable_amount = (parseFloat(var_tot_sum_total_amount) +  parseFloat(var_taxable_amount));	
	var round_total_taxable_amount=var_total_taxable_amount.toFixed(2);	
 
	document.getElementById("net_amount").value = round_total_taxable_amount;
	
	 
 $('#getdepart_R'+rowCount+'').select2( {
	allowClear: true
	});
}


function calc_tax(seling) {
var employee_id = seling.value;  
var rowCount = $(seling).closest('tr').attr('id');
 
var sub_total_amount = 0;
var amounts_var = document.getElementsByClassName('amount');

for(var j=0; j<amounts_var .length; j++) {
var a = +amounts_var[j].value;
sub_total_amount += parseFloat(a) || 0;
}	
 
 var all_subTotal=sub_total_amount.toFixed(2);	
 document.getElementById('sum_total_amount').value =all_subTotal;
 
 
var Tax_percemntage = document.getElementById("purchase_order_Tax").value; 
var total_amount_val = document.getElementById("sum_total_amount").value; 

	
	// document.getElementById("vat_amnt").innerHTML =Tax_percemntage;
	
var var_percetage_value = (parseFloat(Tax_percemntage) / 100) * parseFloat(total_amount_val);	
	var round_percetage_value=var_percetage_value.toFixed(2);		
	document.getElementById("tax_percetage_value").value = round_percetage_value;	

 var var_tot_sum_total_amount = document.getElementById("sum_total_amount").value; 
	var var_taxable_amount = document.getElementById("tax_percetage_value").value; 
	var var_total_taxable_amount = (parseFloat(var_tot_sum_total_amount) +  parseFloat(var_taxable_amount));	
	var round_total_taxable_amount=var_total_taxable_amount.toFixed(2);	
 
	document.getElementById("net_amount").value = round_total_taxable_amount;
	
	 
 
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
$po_no=$_POST['po_no'];
$po_date=$_POST['po_date'];

$po_supplier_ref_id=$_POST['po_supplier_ref_id'];
$po_status="Open";

$po_grand_total=$_POST['po_grand_total'];
$po_tax_percentage=$_POST['po_tax_percentage'];

$po_tax_percentage_value=$_POST['po_tax_percentage_value'];
$po_net_amount=$_POST['po_net_amount'];

			 $po_company_ref_id= $_SESSION["company_sl_no"];
			 $po_created_by=$_SESSION["admin_login_no"];
			 $po_created=date('Y-m-d');
			 
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
		$billing_product_sl_no=$_POST['po_product_ref_id'][$y];
		$bill_qty=$_POST['po_quantity'][$y];
	 
		$sql_query =  "insert into billing_po_child(po_master_ref_id,po_product_ref_id,
		po_price,po_quantity,po_sub_total)
		values('$last_id','$po_product_ref_id[$y]','$po_price[$y]',
		'$po_quantity[$y]',
		'$po_sub_total[$y]')";
		$query = mysql_query($sql_query); 	
		
		
$exe=" SELECT * FROM    billing_product_master WHERE billing_product_sl_no='$billing_product_sl_no' ";
$exe_result=mysql_query($exe);
$row_results = mysql_fetch_array($exe_result);
$billing_opening_stoct=$row_results['billing_opening_stoct'];	
$current_stock=$billing_opening_stoct + $bill_qty;

//update 
$sql_up="UPDATE billing_product_master SET billing_opening_stoct ='$current_stock'
 WHERE billing_product_sl_no='$billing_product_sl_no' ";
 $res_up=mysql_query($sql_up);

	  
	
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