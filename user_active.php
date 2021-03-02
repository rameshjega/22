<?php
include('db_config.php');

$v_status=$_GET['status'];
$ids=$_GET['id'];
if($v_status == 'Active'){
	$status="In Active";
	$sql="UPDATE tbl_add_user SET status='$status' WHERE admin_login_no='$ids' ";
	$re=mysql_query($sql);
	echo '<script type="text/javascript">alert("Successfully Updated");
					window.location.href = "manage_users.php";</script>';
}else{
	$status="Active";
	$sql="UPDATE tbl_add_user SET status='$status' WHERE admin_login_no='$ids' ";
	$re=mysql_query($sql);
	echo '<script type="text/javascript">alert("Successfully Updated");
					window.location.href = "manage_users.php";</script>';
}
	
	