<?php
include("header.php");
include("conn.php");

if(isset($_POST['btnlogin']))
{
	
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res=mysql_query("select * from admin_login where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfull');";
		echo "window.location.href='admin_manage_category.php';";
		echo "</script>";
	}
	else
	{
		$res1=mysql_query("select * from customer_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res1)>0)
		{
			$r1=mysql_fetch_array($res1);
			$_SESSION['cust_id']=$r1[0];
			if(isset($_SESSION['checkout']))
			{
				unset($_SESSION['checkout']);
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfull');";
				echo "window.location.href='placed_order.php';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfull');";
				echo "window.location.href='shop.php';";
				echo "</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Check Your Email Id or Password');";
			echo "</script>";
		}
	}
}
?>

<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>LOGIN</h2>
					</div>
					<form class="comment-form" name="form1" method="post">
						<div class="row">
							
							<div class="col-md-12">
								<input type="text" placeholder="Your Email" name="txtemail">
							</div>
							<div class="col-md-12">
								<input type="password" placeholder="******" name="txtpwd">
								
								<button class="site-btn sb-dark" name="btnlogin" type="submit">LOGIN <i class="fa fa-angle-double-right"></i></button>
								<a class="site-btn sb-dark" href="regis.php">CREATE AN ACCOUNT <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-6">
					<div class="map">
						<img src="img/login2.jpg" style="width:400px; height:400px;">
					</div>
				
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->
	

<?php
include("footer.php");
?>