<?php
session_Start();
include("header.php");
include("conn.php");


?>
<script type="text/javascript">
function validation()
{
	
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Delievery Address");
		form1.txtadd.focus();
		return false;
	}
	
	var v=/^[a-zA-Z ]+$/
	
	if(form1.txtcity.value=="")
	{
		alert("Please Enter Delievery City Name");
		form1.txtcity.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtcity.value))
		{
			alert("Please Enter Only Alphabets in Delievery City Name");
			form1.txtcity.focus();
			return false;
		}
	}
	
	
	var v=/^[0-9]+$/
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Delievery Mobile No");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10)
	{
		alert("Please Enter Only 10 Digits In Delievery Mobile No");
		form1.txtmno.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Delievery Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	

	
}
</script>
<?php

if(isset($_POST['btncheckout']))
{
	$deladd=$_POST['txtadd'];
	$delcity=$_POST['txtcity'];
	$delmno=$_POST['txtmno'];
	$cartid=$_SESSION['cartid'];
	$custid=$_SESSION['cust_id'];
	$orddate=date("Y-m-d");
	$qur6=mysql_query("select sum(qty*price) from cart_detail where cart_id='$cartid'");
	$q6=mysql_fetch_array($qur6);
	$totamt=$q6[0];
	//auto no code start...
	$res1=mysql_query("select max(order_id) from order_master");
	$ordid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$ordid=$r1[0];
	}
	$ordid++;
	//auto no code end....
		
		$query="insert into order_master values('$ordid','$orddate','$custid','$cartid','$deladd','$delcity','$delmno','$totamt')";
		
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Order Generated Successfully');";
			echo "window.location.href='order_detail.php?oid=$ordid&amt=$totamt';";
			echo "</script>";
		}
}
?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
		<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>PLACED YOUR ORDER</h2>
					</div>
			<div class="row">
				<div class="col-lg-4">
					
					<form class="comment-form" name="form1" method="post">
						<div class="row">
							
							<div class="col-md-12">
								<textarea placeholder="Delievery Address" name="txtadd"></textarea>
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Delievery City" name="txtcity">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Delievery Mobile No" name="txtmno" >
							</div>
							<div class="col-md-12">
								
								
								<button class="site-btn sb-dark" name="btncheckout" onclick="return validation();" type="submit">CHECKOUT <i class="fa fa-angle-double-right"></i></button>
							
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-8">
				
					<?php
					
					$tot=0;
					$cartid=$_SESSION['cartid'];
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
		</div>
	</section>
	<!-- Contact page end-->
	

<?php
include("footer.php");
?>