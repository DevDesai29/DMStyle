<?php
session_start();
include("header.php");
include("conn.php");
$cartid=$_SESSION['cartid'];


if(isset($_REQUEST['dcdid']))
{
	$cdid=$_REQUEST['dcdid'];
	$query="delete from cart_detail where cart_detail_id='$cdid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Deleted From Cart');";
		echo "window.location.href='cart_detail.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ecdid']))
{
	$cdid=$_REQUEST['ecdid'];
	$res1=mysql_query("select * from cart_detail where cart_detail_id='$cdid'");
	$r1=mysql_fetch_array($res1);
	$qty1=$r1[3];
	$price1=$r1[4];
	$pid=$_REQUEST['pid'];
	$res2=mysql_query("select * from product_detail where prod_id='$pid'");
	$r2=mysql_fetch_array($res2);
	$pname=$r2[1];
}
?>
<script type="text/javascript">
function validation()
{
	
	
	var v=/^[0-9]+$/
	if(form1.txtqty.value=="")
	{
		alert("Please Enter Quantity");
		form1.txtqty.focus();
		return false;
	}else if(parseInt(form1.txtqty.value)<=0)
	{
		alert("Please Enter Quantity Greater Than 0");
		form1.txtqty.focus();
		return false;
	}else if(parseInt(form1.txtqty.value)>50)
	{
		alert("Please Enter Quantity Less Than 50");
		form1.txtqty.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtqty.value))
		{
			alert("Please Enter Only Digits in Quantity");
			form1.txtqty.focus();
			return false;
		}
	}
	
	
}
</script>
<?php
if(isset($_POST['btnedit']))
{
	$cdid=$_REQUEST['ecdid'];
	$qty=$_POST['txtqty'];
	$query="update cart_detail set qty='$qty' where cart_detail_id='$cdid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Quantity Updated Successfully');";
		echo "window.location.href='cart_detail.php';";
		echo "</script>";
	}
}

if(isset($_POST['btncheckout']))
{
	if(isset($_SESSION['cust_id']))
	{
		header("Location: placed_order.php");
	}
	else
	{
		$_SESSION['checkout']="x";
		header("Location: login.php");
	}
}
?>
	<!-- Single Blog page -->
	<section class="page-warp single-blog-page">
		<div class="container">
		<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>CART DETAIL</h2>
						</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-item">
					<?php
					$tot=0;
					$qur1=mysql_query("select * from cart_detail where cart_id='$cartid'");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>PRODUCT IMAGE</th>
									<th>PRODUCT NAME</th>
									<th>QUANTITY</th>
									<th>PRODUCT PRICE</th>
									<th>TOTAL AMOUNT</th>
									<th>EDIT</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								$qur2=mysql_query("select * from product_detail where prod_id='$q1[2]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td><img src='$q2[6]' style='width:150px; height:150px;'></td>";
								echo "<td>$q2[1]</td>";
								echo "<td>$q1[3]</td>";
								echo "<td>Rs. $q1[4] /-</td>";
								$amt=$q1[3]*$q1[4];
								echo "<td>Rs. $amt /-</td>";
								$tot=$tot+$amt;
								echo "<td><a href='cart_detail.php?ecdid=$q1[0]&pid=$q1[2]'>EDIT</a></td>";
								echo "<td><a href='cart_detail.php?dcdid=$q1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
						echo "</table>";
						echo "<h3>Total Amount: Rs. $tot /-</h3>";
					}else
					{
						echo "<h2>No Item Found In Cart....</h2>";
					}
					
					?>
						
					</div>
					
				</div>
				<div class="col-lg-4 sidebar">
					<!-- widget -->
					<div class="blog-comments">
					<?php
					if(isset($_REQUEST['ecdid']))
					{
					?>
						<h2>Product Name</h2>
						<p><?php echo $pname; ?></p>
						<h2>Product Price</h2>
						<p>Rs. <?php echo $price1; ?> /-</p>
						
						<form class="comment-form" name="form1" method="post">
							<div class="row">
								
								<div class="col-md-12">
									<input type="text" placeholder="Enter Quantity" name="txtqty" value="<?php echo $qty1; ?>">
									
									<button class="site-btn sb-dark" type="submit" name="btnedit" onclick="return validation();">EDIT QUANTITY <i class="fa fa-angle-double-right"></i></button>
								</div>
							</div>
						</form>
					<?php
					}
					?>
					</div>
					<!-- widget -->
					
					<?php
					if($tot>0)
					{
					?>
						
						
						<form class="comment-form" name="form2" method="post">
							<div class="row">
								
								<div class="col-md-12">
									
									
									<button class="site-btn sb-dark" type="submit" name="btncheckout" >CHECKOUT <i class="fa fa-angle-double-right"></i></button>
								</div>
							</div>
						</form>
					<?php
					}
					?>
					
				</div>
			</div>
		</div>
	</section>
	<!-- Single Blog page end-->
<?php
include("footer.php");
?>