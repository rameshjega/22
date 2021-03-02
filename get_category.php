<?php include('db_config.php');

if (! empty($_POST["country_id"])) {
   $company_sl_no=$_SESSION["company_sl_no"];
  
				  $sql_query=" SELECT * FROM billing_sub_category 
				  WHERE  category_ref_id = '" . $_POST["country_id"] . "'";
				$res=mysql_query($sql_query);?>
				  
<option value="">Select Sub Category </option>

		<?php while($state=mysql_fetch_array($res))
				{
        ?>
<option value="<?php echo $state["sub_category_sl_no"];?>"><?php echo $state["sub_category_name"]; ?></option>
<?php
    }
	
}
	if(isset($_POST['pdt_id']))
{
 $pdt_id=$_POST['pdt_id'];
 
 
	$sql_cat11="SELECT * FROM  billing_product_master
	WHERE 
	billing_product_sl_no='".$pdt_id."'  
	";
	 $qry_cat11=mysql_query($sql_cat11);
	 $fet_cat11=mysql_fetch_array($qry_cat11);
       $billing_description=$fet_cat11['billing_description'];
	   $billing_purchase_rate=$fet_cat11['billing_purchase_rate'];
	   $billing_sales_rate=$fet_cat11['billing_sales_rate'];
	     
	   $var_string="_wo";
	  echo $c = $billing_description.$var_string.$billing_purchase_rate.$var_string.$billing_sales_rate; 
	 
}

 	if(isset($_POST['supp_id']))
{
 $supp_id=$_POST['supp_id'];
 
 
	$sql_cat11="SELECT * FROM  billing_supplier
	WHERE 
	supplier_sl_no='".$supp_id."'  
	";
	 $qry_cat11=mysql_query($sql_cat11);
	 $fet_cat11=mysql_fetch_array($qry_cat11);
       $supplier_code=$fet_cat11['supplier_code'];
	   $supplier_address=$fet_cat11['supplier_address'];
	     
	   $var_string="_wo";
	  echo $c = $supplier_code.$var_string.$supplier_address; 
	 
}
 	if(isset($_POST['get_po']))
{
 $get_po=$_POST['get_po'];
 
 
	$sql_cat11="SELECT * FROM    billing_customer,billing_cost 
	WHERE  customer_sl_no='".$get_po."' AND cost_type_ref_id=cost_sl_no ";
	 $qry_cat11=mysql_query($sql_cat11);
	 $fet_cat11=mysql_fetch_array($qry_cat11);
	 $cost_type_name=$fet_cat11['cost_type_name'];
	 $cost_percentage_of_reduction=$fet_cat11['cost_percentage_of_reduction'];
	 $b="%";
	 $c = $cost_percentage_of_reduction.$b;
	 $var_string="_wo";
	  echo $c = $cost_type_name.$var_string.$c.$var_string.$cost_percentage_of_reduction; 
	  }
	  
	  
	  
if(isset($_POST['get_details']))
{
 $get_details=$_POST['get_details'];
 
 
	$sql_cat11="SELECT * FROM    billing_sale_master 
	WHERE  sale_master_sl_no='".$get_details."'  ";
	 $qry_cat11=mysql_query($sql_cat11);
	 $fet_cat11=mysql_fetch_array($qry_cat11);
	 $sale_payable_amount=$fet_cat11['sale_payable_amount'];
	  
	 $var_string="_wo";
	  echo $c = $sale_payable_amount.$var_string.$sale_payable_amount; 
	  }

