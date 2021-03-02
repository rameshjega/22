
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    <link rel="shortcut icon" href="images/favicon.png">
    <title>Home</title>
    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
</head>
<body class="full-width">
 <section id="container" class="hr-menu">
      <!--header start-->
  <?php include('header.php');?>
  <section id="main-content">
          <section class="wrapper">
              <!-- page start-->




              <!------>
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                           
                          <li class="active">Home</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
			  <!--mini statistics start-->
			  
			  <?php 
			  $company_sl_no=$_SESSION["company_sl_no"]; 
			  
			  $res_pdt=mysql_query("SELECT * FROM billing_product_master WHERE product_company_ref_id='$company_sl_no' ");
			  $total_pdt=mysql_num_rows($res_pdt);
			  
			  $sql="SELECT sum(billing_opening_stoct) as stocks FROM billing_product_master 
			  WHERE product_company_ref_id='$company_sl_no'";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)){ $tootal_stock= $row['stocks'];}

$res_customer=mysql_query("SELECT * FROM billing_customer WHERE customer_company_ref_id='$company_sl_no' ");
			  $total_customer=mysql_num_rows($res_customer);
			  
	$first_day_this_month = date('Y-m-01');  
	$last_day_this_month  = date('Y-m-t');
	$head_type="Expense";
	  $sql_expense="SELECT sum(income_expense_amount) as expence_amn FROM billing_income_expense,billing_account_head	 
			  WHERE income_expense_company_ref_id='$company_sl_no' AND account_type_ref_id =head_sl_no
			  AND head_type='$head_type' AND 
			  (income_expense_created BETWEEN  '$first_day_this_month' AND '$last_day_this_month')";
$result_expense = mysql_query($sql_expense);
while ($row_exp = mysql_fetch_assoc($result_expense)){  $tootal_expense= $row_exp['expence_amn'];}

		  $sql_credit="SELECT sum(credit_note_total_amount) as tot_amnt FROM billing_credit_note 
			  WHERE credit_note_company_ref_id='$company_sl_no'";
$result_credit = mysql_query($sql_credit);
while ($row_credit = mysql_fetch_assoc($result_credit)){ $tootal_credit= $row_credit['tot_amnt'];}



$res_sale=mysql_query("SELECT * FROM    billing_sale_master ,billing_customer
				  WHERE sale_company_ref_id='$company_sl_no' AND sale_customer_ref_id=customer_sl_no");
			  $daily_sale=mysql_num_rows($res_sale);

 			  
			  ?>
 <div class="row">
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
            <div class="mini-stat-info">
                <span><?php echo $total_pdt;?></span>
                Total Product
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
            <div class="mini-stat-info">
                <span><?php echo $tootal_stock;?></span>
                Total Stock
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon pink"><i class="fa fa-money"></i></span>
            <div class="mini-stat-info">
                <span><?php echo $total_customer;?></span>
                Total Customers
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
            <div class="mini-stat-info">
                <span><?php echo $tootal_expense;?></span>
                Monthly Expense
            </div>
        </div>
    </div>
	 <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
            <div class="mini-stat-info">
                <span><?php echo $daily_sale;?></span>
                Daily Sales
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
            <div class="mini-stat-info">
                <span><?php echo $tootal_credit;?></span>
                Total Credit
            </div>
        </div>
    </div> 
    
</div>
          </section>
      </section>
      
<?php include('side.php');?>
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/skycons/skycons.js"></script>
<script src="js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="js/calendar/moment-2.2.1.js"></script>
<script src="js/evnt.calendar.init.js"></script>
<script src="js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="js/gauge/gauge.js"></script>
<!--clock init-->
<script src="js/css3clock/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<script src="js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="js/morris-chart/morris.js"></script>
<script src="js/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.pie.js"></script>
<script src="js/flot-chart/jquery.flot.animator.min.js"></script>
<script src="js/flot-chart/jquery.flot.growraf.js"></script>

<script src="js/dashboard.js"></script>
<script src="js/jquery.customSelect.min.js" ></script>
<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<!--script for this page-->
</body>
</html>