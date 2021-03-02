 <?php
include('db_config.php');
 
require_once('resize_image/resize_image.php');

class Upload {
  
    function __construct() {

    }
	function upload_img(){
		if(isset($_POST['save_components'])){
	 
			$msg = '';	
			$max_upload_size = (int)(ini_get('upload_max_filesize'));
			
			
$action_type=$_POST['action_type'];
$certificate_created=date('Y-m-d');
$billing_product_code=$_SESSION['billing_product_code'];
$billing_product_name=$_POST['billing_product_name'];
$billing_category_ref_id=$_POST['billing_category_ref_id'];
$billing_sub_category_ref_id=$_POST['billing_sub_category_ref_id'];

$billing_hsn_code=$_POST['billing_hsn_code'];
$billing_description=$_POST['billing_description'];
$billing_purchase_rate=$_POST['billing_purchase_rate'];
$billing_sales_rate=$_POST['billing_sales_rate'];
$billing_reorder_point=$_POST['billing_reorder_point'];
$billing_opening_stoct=$_POST['billing_opening_stoct'];
$billing_purchase_unit=$_POST['billing_purchase_unit'];

$product_company_ref_id= $_SESSION["company_sl_no"];
 $product_created_by=$_SESSION["admin_login_no"];
 $product_created=date('Y-m-d');
		  
		 
		 
		 
		
		 
			if($action_type == 'Update')
			{ 
		
$billing_product_sl_no=$_POST['billing_product_sl_no'];
$product_image=$_POST['product_image'];

		
 $sql_up_run  = " UPDATE billing_product_master SET 
 
billing_product_name='$billing_product_name',
billing_category_ref_id='$billing_category_ref_id',
billing_sub_category_ref_id='$billing_sub_category_ref_id',
billing_hsn_code='$billing_hsn_code',
billing_description='$billing_description',
billing_purchase_rate='$billing_purchase_rate',
billing_sales_rate='$billing_sales_rate',
billing_reorder_point='$billing_reorder_point',
billing_opening_stoct='$billing_opening_stoct',
billing_purchase_unit='$billing_purchase_unit'  WHERE billing_product_sl_no='$billing_product_sl_no'

";
$resul_run=mysql_query($sql_up_run);
			if (count($_FILES["img_files"]) > 0) {
				 $folderName = "image/main/"; 
				for ($i = 0; $i < count($_FILES["img_files"]["name"]); $i++) {
					$file_name = $_FILES["img_files"]["name"][$i];
					$file_type = $_FILES["img_files"]["type"][$i];
					$file_size = $_FILES["img_files"]["size"][$i];
				  
					if( isset($file_name) && $file_name != "") {
						//if($this->file_size($file_size, $max_upload_size)){
							if($this->file_extension($file_type)){
								$filename = time() . '_' . $file_name;
								$filepath = $folderName . $filename;
								if (!move_uploaded_file($_FILES["img_files"]["tmp_name"][$i], $filepath)) {
									$msg .= "<p class='msg_error'>Failed to upload <strong>" . $filename . "</strong>.</p>";
								}  else {
		 
	unlink("image/main/".$product_image);  
  $sql_up = " update   billing_product_master SET
 
product_image='$filename'  WHERE billing_product_sl_no='$billing_product_sl_no'

   
  
 ";
$result =  mysql_query($sql_up);
 

	 						 
								}
							} 
						 
					}
				}
				
 		
			}
  	
			 
			
		echo '<script type="text/javascript"> alert("Updated successfully!");
		window.location.href = "products.php";</script>';		
			}
			else if($action_type == 'Add'){
				 
				
 $sql_up_run  = "
 INSERT INTO  billing_product_master 
 (billing_product_code,billing_product_name,billing_category_ref_id,billing_sub_category_ref_id,
 billing_hsn_code,billing_description,billing_purchase_rate,billing_sales_rate,billing_reorder_point,
 billing_opening_stoct,billing_purchase_unit,product_company_ref_id,product_created_by,product_created)
 VALUES('$billing_product_code','$billing_product_name','$billing_category_ref_id',
 '$billing_sub_category_ref_id',
 '$billing_hsn_code','$billing_description','$billing_purchase_rate','$billing_sales_rate',
 '$billing_reorder_point',
 '$billing_opening_stoct','$billing_purchase_unit','$product_company_ref_id',
 '$product_created_by','$product_created')

";
$resul_run=mysql_query($sql_up_run);
$last_id=mysql_insert_id();
			if (count($_FILES["img_files"]) > 0) {
				 $folderName = "image/main/"; 
				for ($i = 0; $i < count($_FILES["img_files"]["name"]); $i++) {
					$file_name = $_FILES["img_files"]["name"][$i];
					$file_type = $_FILES["img_files"]["type"][$i];
					$file_size = $_FILES["img_files"]["size"][$i];
				 	 
					if( isset($file_name) && $file_name != "") {
						//if($this->file_size($file_size, $max_upload_size)){
							if($this->file_extension($file_type)){
								$filename = time() . '_' . $file_name;
								$filepath = $folderName . $filename;
								if (!move_uploaded_file($_FILES["img_files"]["tmp_name"][$i], $filepath)) {
									$msg .= "<p class='msg_error'>Failed to upload <strong>" . $filename . "</strong>.</p>";
								} else {
		 
	  $sql_up = " update   billing_product_master SET
 
product_image='$filename'  WHERE billing_product_sl_no='$last_id'

  
 ";
$result =  mysql_query($sql_up);
  
	 						 
								}
							} 
						 
					}
				}
				
 		
			}	
				
				
			echo '<script type="text/javascript"> alert("Added successfully");
		window.location.href = "products.php";</script>';		
				
			}
			
		}
		
		//submit_update
		 
	 
		
		
		
	
 




	
		  return $msg;
	}

	function file_extension($filetype,$type=array()){
$ext_arr = array( 'jpg' => 'image/jpeg',
'png' => 'image/png',
'gif' => 'image/gif',
'pdf' => 'application/pdf',
'.dwf' => 'drawing/x-dwf (old)',
'.dwf' => 'model/vnd.dwf',
'.dwg' => 'application/acad',
'.dwg' => 'image/vnd.dwg',
'.dwg' => 'image/x-dwg',
'.dxf' => 'application/dxf',
'.dxf' => 'image/vnd.dwg',
'.dxf' => 'image/x-dwg',
'.svf' => 'image/vnd.dwg',
'.svf' => 'image/x-dwg',
'.doc' => 'application/msword',
	'.dot' => 'application/msword',
	'.w6w' => 'application/msword',
	'.wiz' => 'application/msword',
	'.word' => 'application/msword',
	'.wp' => 'application/wordperfect',
	'.wp5' => 'application/wordperfect',
	'.wp5' => 'application/wordperfect6.0',
	'.wp6' => 'application/wordperfect',
	'.wpd' => 'application/wordperfect',
	'.xl' => 'application/excel',
	'.xla' => 'application/excel',
	'.xla' => 'application/x-excel',
	'.xla' => 'application/x-msexcel',
	'.xlb' => 'application/excel',
	'.xlb' => 'application/vnd.ms-excel',
	'.xlb' => 'application/x-excel',
	'.xlc' => 'application/excel',
	'.xlc' => 'application/vnd.ms-excel',
	'.xlc' => 'application/x-excel',
	'.xld' => 'application/excel',
	'.xld' => 'application/x-excel',
	'.xlk' => 'application/excel',
	'.xlk' => 'application/x-excel',
	'.xll' => 'application/excel',
	'.xll' => 'application/vnd.ms-excel',
	'.xll' => 'application/x-excel',
	'.xlm' => 'application/excel',
	'.xlm' => 'application/vnd.ms-excel',
	'.xlm' => 'application/x-excel',
	'.xls' => 'application/excel',
	'.xls' => 'application/vnd.ms-excel',
	'.xls' => 'application/x-excel',
	'.xls' => 'application/x-msexcel',
	'.xlt' => 'application/excel',
	'.xlt' => 'application/x-excel',
	'.xlv' => 'application/excel',
	'.xlv' => 'application/x-excel',
	'.xlw' => 'application/excel',
	'.xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
	'.xlw' => 'application/vnd.ms-excel',
	'.xlw' => 'application/x-excel',
	'.xlw' => 'application/x-msexcel'
						   
		                   );
						   
						   
						   
		if(!empty($type)){
		    $ext_arr = array_merge($ext_arr,$type);
		}
		$return =false;
		 
		if(array_search($filetype, $ext_arr)) {
		    $return =true;
		}
		return $return;
	}

	function file_size($filesize, $max_upload_size){
	    // Check file size
	    $return = false;
	    if ($filesize < $max_upload_size*5000000) {
	      $return = true;
	    }
	    return $return;
  	}

}