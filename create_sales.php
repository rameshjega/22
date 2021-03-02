
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
   

    <title>Create Sales</title>

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
                          <li class="active">View Sales</li>
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
                    <header class="panel-heading"> View Sales
                        <span class="tools pull-right">
                             <script src="jquery-2.1.1.min.js"></script>
                            <a class="btn btn-mini btn-warning"
							 href="view_sales.php" style="color:#fff">
						   <i class="fa fa-plus"></i>&nbsp; View Sales</a>
                            						 
							 
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
$sql_qry=" SELECT * FROM     billing_sale_master 
WHERE sale_company_ref_id='$company_sl_no' ORDER BY sale_id DESC LIMIT 0,1";
$res_qry=mysql_query($sql_qry);
$row_eee = mysql_fetch_array($res_qry);
$last_id =  $row_eee['sale_id'];
$rest = substr("$last_id", -5);  
$insert_id = "$rest" + 1;
$var_auto_no = sprintf("%04d", $insert_id);
 
?>
 <div class="form-group col-md-3">
<label for="userName">Sale Id <span class="text-danger"> </span></label>
 <input type="text" name="sale_id" readonly value="<?php echo $var_auto_no;?>"     class="form-control">
</div>

<div class="form-group col-md-3">
<label for="userName">Sale date<span class="text-danger"></span></label>
<input type="date" name="sale_date"  class="form-control">
</div>
<div class="form-group col-md-3">
<label for="userName">Customer   <span class="text-danger"></span></label>

<select name="sale_customer_ref_id" class="fstdropdown-select form-control" required onchange="getsupplier(this)">
<option value="">Select Customer</option>
<?php 	 $company_sl_no=$_SESSION["company_sl_no"]; 
			echo	  $sql_query=" SELECT * FROM    billing_customer 
				  WHERE customer_company_ref_id='$company_sl_no' ";
				$res=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($res)) 
				{ ?>
			
	<option value="<?php echo $row['customer_sl_no'];?>"><?php echo $row['customer_name'];?></option>		
				<?php }?>
</select>
</div>


<div class="form-group col-md-3">
<label for="userName">Membership   <span class="text-danger"></span></label>

<input type="text" id="cost_type_name" class="form-control" required >
<input type="hidden" id="val_discount" name="sale_cost_percentage" class="form-control" required >

</select>
</div>



<div class="form-group col-md-3">
<label for="userName">Payment Method<span class="text-danger"></span></label>
<select name="sale_payment_method" class="fstdropdown-select form-control"  required >
<option value="">Select Payment Method</option>
<option value="Cash">Cash</option>
<option value="Credit">Credit</option>
</select>
</div>


<div class="form-group col-md-3">
<label for="userName">Payable Amount<span class="text-danger"></span></label>
<input type="text"  readonly  name="sale_history_total_amnt"  id="payable_amount" class="form-control"  value="" required >
</div>
 
<div class="form-group col-md-3">
<label for="userName">Paid Amount<span class="text-danger"></span></label>
<input type="text"  name="sale_paid_amount" onkeyup="calc_tax(this)" id="paid_amount" class="form-control"  value="" required >
</div>
 
 <div class="form-group col-md-3">
<label for="userName">Balance Amount<span class="text-danger"></span></label>
<input type="text"  name="sale_payable_amount" readonly id="balance_amount" class="form-control"  value="" required >
</div>
 

 <script>
function getsupplier(sel) {
		
    var employee_id = sel.value;
	  
$.ajax({
						  type: 'post',
						  url: 'get_category.php',
						  data: {
						   get_po:employee_id,
						  },
						  success: function (data) {
						  var result = data; 
					var str_array = result.split('_wo');
					 
					var cost_type_name=str_array[0];
					var cost_percentage_of_reduction=str_array[1];	
					var val_discoun=str_array[2];	
					 
						  document.getElementById("cost_type_name").value = cost_type_name;
						  document.getElementById("val_discount").value = val_discoun;
						  $("#cost_percentage_of_reduction").html(cost_percentage_of_reduction);
						  }
						
						  
						  });
	
}</script>

 
  
 <div id="po_details">
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
<select  name="sale_product_ref_id[]" class="form-control edit_data" id="" required onchange="getComboA(this)">
<option value="">Select Product</option>
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
<td>  <input type="text" name="sale_price[]" id="product_price_0" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>  
<td>  <input type="text" name="sale_quantity[]" id="product_quantity_0" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>  
<td>  <input type="text" name="sale_sub_total[]" id="product_total_0"  readonly  class="amount form-control f-name01" required=""></td>  
				 
 				 
                        <td>
                            <button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button>  
                        </td>  
                    </tr>  
                </tbody>
<tfoot>
<tr>
 
<td colspan="4" style="text-align:right;">Grant Total</td>
<td><input type="text" name="sale_grand_total" readonly  id="grand_total_valu" class="form-control f-name01" required=""></td>
</tr>

<tr>
 
<td colspan="4" style="text-align:right;">Membership Discount(<span id="cost_percentage_of_reduction">%</span>)</td>
<td><input type="text" name="sale_membership_discount_percentage" readonly  id="membership_discount_val" class="form-control f-name01" required=""></td>
</tr>

<tr>
 
<td colspan="4" style="text-align:right;">Membership Value</td>
<td><input type="text" name="sale_membership_total" readonly  id="sum_total_amount" class="form-control f-name01" required=""></td>
</tr>
<tr>
 <?php 
    $inline_query1="
 
SELECT * FROM   billing_tax WHERE  tax_company_ref_id='$company_sl_no'	 ";
$inline_result=mysql_query($inline_query1); 	

$row_result = mysql_fetch_array($inline_result);
 ?>
<td colspan="4" style="text-align:right;">Tax(%)</td>
<td><input type="text" name="sale_tax_percentage" onkeyup="calc_tax(this)" 
 id="purchase_order_Tax" class="form-control f-name01"  value="<?php echo $row_result['tax_name'];?>" required=""></td>
</tr>

<tr>
 
<td colspan="4" style="text-align:right;">Taxable Value</td>
<td><input type="text" name="sale_tax_percentage_value" id="tax_percetage_value" readonly  class="form-control f-name01" required=""></td>
</tr>
<tr>
 
<td colspan="4" style="text-align:right;">Net Amount</td>
<td><input type="text" name="sale_net_amount" id="net_amount" readonly  class="form-control f-name01" required=""></td>
</tr>
</tfoot>			
            </table>
                
<script type="text/javascript">  
    $(document).ready(function () {  
	var rowCount= 1; 
        $(document).on("click", ".classAdd", function () { //
            // var rowCount = $('.data-contact-person').length + 1;  
            var contactdiv = '<tr class="data-contact-person" id="'+rowCount+'">' +  
			'<td><select  name="sale_product_ref_id[]" class="form-control edit_data"  id="getdepart_R'+rowCount+'"  required onchange="getComboA(this)"><option value="">Select Product</option><?php $company_sl_no=$_SESSION["company_sl_no"]; $sql_cat="  SELECT * FROM     billing_product_master WHERE product_company_ref_id='$company_sl_no'";$res_cate=mysql_query($sql_cat);while($row_cate=mysql_fetch_array($res_cate)) {?><option value="<?php echo $row_cate['billing_product_sl_no'];?>"><?php echo $row_cate['billing_product_name'];?></option><?php }?></select></td>' + 
			 '<td><input type="text"  name="descr[]" id="des_'+rowCount+'"  class="form-control f-name01" required=""></td>' + 
			 '<td><input type="text" name="sale_price[]" id="product_price_'+rowCount+'" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>' + 
			 '<td><input type="text" name="sale_quantity[]" id="product_quantity_'+rowCount+'" onkeyup="calc_quantity(this)" class="form-control f-name01" required=""></td>' + 
			 '<td><input type="text" name="sale_sub_total[]" id="product_total_'+rowCount+'"  readonly  class="amount form-control f-name01" required=""></td>' + 
 
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
			calc_tax();
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
					var pdt_price=str_array[2];	
					 
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
 document.getElementById('grand_total_valu').value =all_subTotal;
 
 //reduction
 
 var val_discount = document.getElementById("val_discount").value; 
var grand_total_valu = document.getElementById("grand_total_valu").value; 

	
	// document.getElementById("vat_amnt").innerHTML =Tax_percemntage;
	
var memb_perce = (parseFloat(val_discount) / 100) * parseFloat(grand_total_valu);	
	var round_mem_val=memb_perce.toFixed(2);		
	document.getElementById("membership_discount_val").value = round_mem_val;	
 
  var tot_v = document.getElementById("grand_total_valu").value; 
	var dis_valuess = document.getElementById("membership_discount_val").value; 
	var total_sum_value = (parseFloat(tot_v) -  parseFloat(dis_valuess));	
	var round_total_sum_value=total_sum_value.toFixed(2);	
 
	document.getElementById("sum_total_amount").value = round_total_sum_value;
 
 //Taxx 
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
	
	 var tot_net_amount = document.getElementById("net_amount").value; 
 
  document.getElementById("payable_amount").value = tot_net_amount;
  
  
	var var_paid_amount = document.getElementById("paid_amount").value; 
	var pay_amnt = document.getElementById("payable_amount").value; 
	
	var balz_amount = (parseFloat(pay_amnt) -  parseFloat(var_paid_amount));	
	var round_balz_amount=balz_amount.toFixed(2);	
 
	document.getElementById("balance_amount").value = round_balz_amount;
	 
	 
	 
	 
 $('#getdepart_R'+rowCount+'').select2( {
	allowClear: true
	});
}


function calc_tax(seling) {
 
 var sub_total_amount = 0;
var amounts_var = document.getElementsByClassName('amount');

for(var j=0; j<amounts_var .length; j++) {
var a = +amounts_var[j].value;
sub_total_amount += parseFloat(a) || 0;
}	
 
 var all_subTotal=sub_total_amount.toFixed(2);	
 document.getElementById('grand_total_valu').value =all_subTotal;
 
 //reduction
 
 var val_discount = document.getElementById("val_discount").value; 
var grand_total_valu = document.getElementById("grand_total_valu").value; 

	
	// document.getElementById("vat_amnt").innerHTML =Tax_percemntage;
	
var memb_perce = (parseFloat(val_discount) / 100) * parseFloat(grand_total_valu);	
	var round_mem_val=memb_perce.toFixed(2);		
	document.getElementById("membership_discount_val").value = round_mem_val;	
 
  var tot_v = document.getElementById("grand_total_valu").value; 
	var dis_valuess = document.getElementById("membership_discount_val").value; 
	var total_sum_value = (parseFloat(tot_v) -  parseFloat(dis_valuess));	
	var round_total_sum_value=total_sum_value.toFixed(2);	
 
	document.getElementById("sum_total_amount").value = round_total_sum_value;
 
 //Taxx 
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
	
	 var tot_net_amount = document.getElementById("net_amount").value; 
 
  document.getElementById("payable_amount").value = tot_net_amount;
  
  
	var var_paid_amount = document.getElementById("paid_amount").value; 
	var pay_amnt = document.getElementById("payable_amount").value; 
	
	var balz_amount = (parseFloat(pay_amnt) -  parseFloat(var_paid_amount));	
	var round_balz_amount=balz_amount.toFixed(2);	
 
	document.getElementById("balance_amount").value = round_balz_amount;
	 
	 
 
 
	
 
 
}








</script>
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
$sale_id=$_POST['sale_id'];
$sale_date=$_POST['sale_date'];
$sale_customer_ref_id=$_POST['sale_customer_ref_id'];
$po_status="Open";
$sale_cost_percentage=$_POST['sale_cost_percentage'];
$sale_payment_method=$_POST['sale_payment_method'];
$sale_grand_total=$_POST['sale_grand_total'];
$sale_membership_discount_percentage=$_POST['sale_membership_discount_percentage'];
$sale_membership_total=$_POST['sale_membership_total'];
$sale_tax_percentage=$_POST['sale_tax_percentage'];
$sale_tax_percentage_value=$_POST['sale_tax_percentage_value'];
$sale_net_amount=$_POST['sale_net_amount'];
$sale_paid_amount=$_POST['sale_paid_amount'];
$sale_payable_amount=$_POST['sale_payable_amount'];

			 $sale_company_ref_id= $_SESSION["company_sl_no"];
			 $sale_created_by=$_SESSION["admin_login_no"];
			 $sale_created=date('Y-m-d');
			 
$sql_query =  "insert into  billing_sale_master(
sale_id,sale_date,sale_customer_ref_id,sale_cost_percentage,sale_payment_method,
sale_grand_total,sale_membership_discount_percentage,sale_membership_total,
sale_tax_percentage,sale_tax_percentage_value,sale_net_amount,sale_paid_amount,
sale_payable_amount,sale_company_ref_id,sale_created_by,sale_created
)
		values('$sale_id','$sale_date','$sale_customer_ref_id','$sale_cost_percentage',
'$sale_payment_method','$sale_grand_total','$sale_membership_discount_percentage',
'$sale_membership_total','$sale_tax_percentage','$sale_tax_percentage_value',
'$sale_net_amount','$sale_paid_amount','$sale_payable_amount','$sale_company_ref_id',
'$sale_created_by','$sale_created')";
		$query = mysql_query($sql_query); 	
						$last_id=mysql_insert_id(); 
						$descr=$_POST['descr'];
						$sale_product_ref_id=$_POST['sale_product_ref_id'];
						$sale_price=$_POST['sale_price'];
						$sale_quantity=$_POST['sale_quantity'];
						$sale_sub_total=$_POST['sale_sub_total'];  
		for ($y = 0; $y < count($descr); $y++) 
	{
			
		$sql_query =  "insert into billing_sale_child(sale_master_ref_id,sale_product_ref_id,
		sale_price,sale_quantity,sale_sub_total)
		values('$last_id','$sale_product_ref_id[$y]','$sale_price[$y]',
		'$sale_quantity[$y]',
		'$sale_sub_total[$y]')";
		$query = mysql_query($sql_query); 	
		  
	
	}
	
	 $sql_query =  "insert into  billing_sale_history(
sale_master_reff_id,sale_history_total_amnt,sale_history_paid_amount,sale_history_balance_amount,
sale_history_created
)
		values('$last_id','$sale_payable_amount','$sale_paid_amount','$sale_balance_amount','$sale_created')";
		$query = mysql_query($sql_query); 	
		if($sale_payment_method =='Cash'){
		if($sale_payable_amount == 0){
		
$sale_status="Paid";
$sql_query =  "UPDATE billing_sale_master SET sale_status='$sale_status' 
WHERE sale_master_sl_no ='$last_id'";
$query = mysql_query($sql_query); 		
		}
		else
		{
		$sale_status="Partially Paid";
$sql_query =  "UPDATE billing_sale_master SET sale_status='$sale_status' 
WHERE sale_master_sl_no ='$last_id'";
$query = mysql_query($sql_query); 	
		}
		}
		else{
			
			$sale_status="Un Paid";
$sql_query =  "UPDATE billing_sale_master SET sale_status='$sale_status' 
WHERE sale_master_sl_no ='$last_id'";
$query = mysql_query($sql_query); 
			
		}
					echo '<script type="text/javascript">alert("Successfully Inserted");
					window.location.href = "create_sales.php";</script>';
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