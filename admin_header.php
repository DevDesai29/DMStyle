<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>DMSTYLE</title>
	<meta charset="UTF-8">
	<meta name="description" content="Instyle Fashion HTML Template">
	<meta name="keywords" content="instyle, fashion, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<style>


li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 260px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark site-navbar">
			<a class="navbar-brand site-logo" href="index.html#">
				<h2><span>DM</span>Style</h2>
				<p>Fashion Forward</p>
			</a>
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<!-- Main menu -->
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="admin_manage_category.php">Manage Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin_manage_sub_category.php">Manage Sub Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin_manage_product.php">Manage Products</a>
					</li>
					 <li class="nav-item dropdown">
							<a href="javascript:void(0)" class="nav-link dropbtn">Report</a>
							<div class="dropdown-content">
								<a href="admin_view_new_order.php">View New Order</a>
								<a href="admin_view_datewise_order_report.php">Date Wise Order Report</a>
								<a href="admin_view_datewise_invoice_report.php">Date Wise Invoice Report</a>
								<a href="admin_view_customer_report.php">Customer Detail Report</a>
								<a href="admin_view_all_order_report.php">All Order Report</a>
								<a href="admin_view_all_invoice_report.php">All Invoice Report</a>
								
							</div>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>                                                                
				</ul>
				
			</div>
		</nav>
	</header>
	<!-- Header section end-->