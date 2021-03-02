<?php 
include("db_config.php");
if (!(isset($_SESSION['admin_login_no']) && $_SESSION['admin_login_no'] != '')) {

echo '<script type="text/javascript"> 
window.location.href = "login.php";</script>';	
}
$admin_login_no=$_SESSION["admin_login_no"];
$data_user = mysql_fetch_array(mysql_query("SELECT *  FROM tbl_add_user ,tbl_add_company
WHERE admin_login_no='".$admin_login_no."' AND user_ref_id='".$admin_login_no."' "));
$user_name=$data_user['username'];    
 $user_type=$data_user['user_type'];  

?>   <!--header start-->
      <header class="header fixed-top">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle hr-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bars"></span>
              </button>

              <!--logo start-->
              <!--logo start-->
              <div class="brand ">
                  <a href="index.php" class="logo">
                      <img src="images/logo.png" alt="">
                  </a>
              </div>
			  
			  <?php  $activePage = basename($_SERVER['PHP_SELF'], ".php");?>	
              <!--logo end-->
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
				  
				  
				  <?php //if($user_type == 'Admin'){?>
				   <!--<li class="<?= ($activePage == 'admin_dashboard') ? 'active':''; ?>"><a href="admin_dashboard.php">Dashboard</a></li>
				   <li class="<?= ($activePage == 'manage_users') ? 'active':''; ?>">
				   <a href="manage_users.php">Manage Users</a></li>-->   
				   
				   
				   
				  <?php //}else{?>
                      <li class="<?= ($activePage == 'index') ? 'active':''; ?>"><a href="index.php">Dashboard</a></li>
<?php $var_user_type=$_SESSION["software_user_type"];
if($var_user_type == 'Admin'){?>
<li class="">
				   <a href="manage_users.php">Manage Users</a></li>	
<?php }else{?>				   
				   
					 <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
						 Masters <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
						   <li><a href="profile.php">Company Profile</a></li>
                              <li><a href="category.php">Category</a></li>
                              <li><a href="sub_category.php">Sub Category</a></li>
							  <li><a href="view_units.php">Units</a></li>
							  <li><a href="tax_setting.php">Tax Setting</a></li>
							   <li><a href="cost_center.php">Cost Centers</a></li>
							   <li><a href="">SMS</a></li>
                          </ul>
                      </li>
					   <li class="<?= ($activePage == 'products') ? 'active':''; ?>"><a href="products.php">Products</a></li>
					   <li class="<?= ($activePage == 'view_suppliers') ? 'active':''; ?>"><a href="view_suppliers.php">Suppliers</a></li>
					<li class="<?= ($activePage == 'purchase') ? 'active':''; ?>"><a href="purchase.php">Purchase</a></li>   
<!--<li class="<?= ($activePage == 'goods') ? 'active':''; ?>"><a href="goods.php">Goods Inward</a></li>    					-->
<li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
						 Sales <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="view_customers.php?id=Category">Customers</a></li>
                              <li><a href="view_sales.php?id=Sub">Sales</a></li>
                          </ul>
                      </li>
					 <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
						 Accounts <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="account_head.php">Account Head</a></li>
                              <li><a href="capital_amount.php">Capital Amount</a></li>
							  <li><a href="income.php?id=Income">Add Income</a></li>
							  <li><a href="income.php?id=Expense">Add Expense</a></li>
							    <li><a href="credit_note.php">Credit Note</a></li>
                          </ul>
                      </li>
					  <li class="<?= ($activePage == 'profit') ? 'active':''; ?>">
					  <a href="profit.php">Profit & Lose</a></li>    
					  
					  
                   <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
						 Reports <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="">GST Report</a></li>
                              <li><a href="po_report.php">Purchase Report</a></li>
                               <li><a href="sales_report.php">Sales Report</a></li>
                                <li><a href="stock_report.php">Stock Report</a></li>
                                 <li><a href="day_report.php">Day Report</a></li>
                                 <li><a href="credit_report.php">Credit Report</a></li>
                                 <li><a href="">Barcode</a></li>
							 
                          </ul>
                      </li>
					  
					  
				  <?php }?>					  
                  </ul>
                  


              </div>
              <div class="top-nav hr-top-nav">
                  <ul class="nav pull-right top-menu">
                      
                      <!-- user login dropdown start-->
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <img alt="" src="images/avatar1_small.jpg">
                              <span class="username"><?php echo $user_name;?></span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
						   <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                              <li><a href="change_password.php"><i class=" fa fa-suitcase"></i>Change Password</a></li>
                           
                              <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                          </ul>
                      </li>
                      <!-- user login dropdown end -->
                  </ul>
              </div>

          </div>

      </header>