<?php
session_start();
?>
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
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="shop.php">Shop</a>
					</li>
					<?php
					if(isset($_SESSION['cartid']))
					{
					?>
					<li class="nav-item">
						<a class="nav-link" href="cart_detail.php">Cart Detail</a>
					</li>
					<?php
					}
					?>
					
					<?php
					
					if(!isset($_SESSION['cust_id']))
					{
					?>
					
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<?php
					}
					?>
					
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li> 

				<?php
					
					if(isset($_SESSION['cust_id']))
					{
					?>
					<li class="nav-item">
						<a class="nav-link" href="cust_view_prev_order.php">Previous Orders</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
					<?php
					}
					?>					
				</ul>
				
			</div>
		</nav>
	</header>
	<!-- Header section end-->