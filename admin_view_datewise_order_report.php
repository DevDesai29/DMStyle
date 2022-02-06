<?php
include("admin_header.php");
include("conn.php");


if(isset($_POST['btnreport']))
{
	$sdate=date("Y-m-d",strtotime($_POST['txtsdate']));
	$edate=date("Y-m-d",strtotime($_POST['txtedate']));	
}


?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
			<div class="row">
			<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>DATE WISE ORDER REPORT</h2>
					</div>
				<div class="col-lg-6">
					
					<form class="comment-form" name="form1" method="post" enctype="multipart/form-data">
						<div class="row">
							
							<div class="col-md-12">
								Select Start Date:
								<input type="date"  name="txtsdate" value="<?php if(isset($sdate)){ echo $sdate; }else{ echo date("Y-m-d"); } ?>" >
							</div>
							
							
							
						</div>
					
				</div>
				<div class="col-lg-6">
					
				
						<div class="row comment-form" >
							
							<div class="col-md-12">
								Select End Date:
								<input type="date"  name="txtedate" value="<?php if(isset($edate)){ echo $edate; }else{ echo date("Y-m-d"); } ?>" >
							</div>
							<div class="col-md-12">
								
								
							
								<button class="site-btn sb-dark" name="btnreport" type="submit" >REPORT DETAIL <i class="fa fa-angle-double-right"></i></button>
							
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-12">
					<div class="map">
						<br/><br/><br/><br/>
					<?php
					
					if(isset($_POST['btnreport']))
					{
						$qur1=mysql_query("select * from order_master where order_date>='$sdate' and order_date<='$edate'");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>ORDER ID</th>
									<th>ORDER DATE</th>
									<th>CUSTOMER NAME</th>
									<th>CART ID</th>
									<th>DELIEVERY ADDRESS</th>
									<th>DELIEVERY CITY</th>
									<th>MOBILE NO</th>
									<th>TOTAL AMOUNT</th>
									<th>ORDER DETAIL</th>
									
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								$qur2=mysql_query("select * from customer_regis where cust_id='$q1[2]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td>$q2[1]</td>";
								echo "<td>$q1[3]</td>";
								echo "<td>$q1[4]</td>";
								echo "<td>$q1[5]</td>";
								
								echo "<td>$q1[6]</td>";
								echo "<td>Rs. $q1[7] /-</td>";
								echo "<td><a href='admin_view_order_detail.php?cartid=$q1[3]'>ORDER DETAIL</a></td>";
								
								echo "</tr>";
							}
						echo "</table>";
						
					}else
					{
						echo "<h2>No Order Found....</h2>";
					}
					}
					?>
					</div>
				
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->
	

<?php
include("footer.php");
?>