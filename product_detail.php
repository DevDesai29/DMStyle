<?php
session_start();
include("header.php");
include("conn.php");

$pid=$_REQUEST['pid'];
$res1=mysql_query("select * from product_detail where prod_id='$pid'");
$r1=mysql_fetch_array($res1);
$pname=$r1[1];
$cid=$r1[2];
$scid=$r1[3];
$pdesc=$r1[4];
$price=$r1[5];
$pimg=$r1[6];
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
if(isset($_POST['btnadd']))
{
	$qty=$_POST['txtqty'];
	if(isset($_SESSION['cartid']))
	{
		$cartid=$_SESSION['cartid'];
		//auto no code start...
		$res2=mysql_query("select max(cart_detail_id) from cart_detail");
		$cartdid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$cartdid=$r2[0];
		}
		$cartdid++;
		//auto no code end....
		$query="insert into cart_detail values('$cartdid','$cartid','$pid','$qty','$price')";
		if(mysql_query($query)){
		
			echo "<script type='text/javascript'>";
			echo "alert('Product Added Into Cart');";
			echo "window.location.href='shop.php';";
			echo "</script>";
		}
	
	}else{
		//auto no code start...
		$res1=mysql_query("select max(cart_id) from cart_master");
		$cartid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$cartid=$r1[0];
		}
		$cartid++;
		//auto no code end....
		$cdate=date("Y-m-d");
		mysql_query("insert into cart_master values('$cartid','$cdate')");
		//auto no code start...
		$res2=mysql_query("select max(cart_detail_id) from cart_detail");
		$cartdid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$cartdid=$r2[0];
		}
		$cartdid++;
		//auto no code end....
		$query="insert into cart_detail values('$cartdid','$cartid','$pid','$qty','$price')";
		if(mysql_query($query)){
			$_SESSION['cartid']=$cartid;
			echo "<script type='text/javascript'>";
			echo "alert('Product Added Into Cart');";
			echo "window.location.href='shop.php';";
			echo "</script>";
		}
	}
}
?>

	<!-- Single Blog page -->
	<section class="page-warp single-blog-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="<?php echo $pimg; ?>">
							
						</div>
						<div class="blog-head">
							<div class="blog-tags">fashion, event, lifestyle</div>
							<h2><?php echo $pname; ?></h2>
						</div>
						
					</div>
					
				</div>
				<div class="col-lg-4 sidebar">
					<!-- widget -->
					<div class="blog-comments">
						<h2>Product Description</h2>
						<p><?php echo $pdesc; ?></p>
						<h2>Product Price</h2>
						<p>Rs. <?php echo $price; ?> /-</p>
						
						<form class="comment-form" name="form1" method="post">
							<div class="row">
								
								<div class="col-md-12">
									<input type="text" placeholder="Enter Quantity" name="txtqty">
									
									<button class="site-btn sb-dark" type="submit" name="btnadd" onclick="return validation();">ADD TO CART <i class="fa fa-angle-double-right"></i></button>
								</div>
							</div>
						</form>
					</div>
					<!-- widget -->
					
					
					
				</div>
			</div>
		</div>
	</section>
	<!-- Single Blog page end-->
<?php
include("footer.php");
?>