<?php
session_Start();
include("header.php");
include("conn.php");
$cartid=$_REQUEST['cartid'];


?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
		<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>ORDER DETAIL</h2>
					</div>
			<div class="row">
			<div class="col-lg-12">
				
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