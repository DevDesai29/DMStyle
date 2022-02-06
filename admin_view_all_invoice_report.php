<?php
session_Start();
include("admin_header.php");
include("conn.php");



?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
		<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>ALL INVOICE DETAIL REPORT</h2>
					</div>
			<div class="row">
			<div class="col-lg-12">
				
					<?php
					
					
					
					$qur1=mysql_query("select * from invoice_master");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>INVOICE ID</th>
									<th>INVOICE DATE</th>
									<th>CUSTOMER NAME</th>
									<th>ORDER ID</th>
									<th>CART ID</th>
									<th>TOTAL AMOUNT</th>
									
									<th>VIEW INVOICE</th>
									
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
								echo "<td>Rs. $q1[5] /-</td>";
								echo "<td><a href='invoice.php?idid=$q1[3]' target='_blank'>VIEW INVOICE</a></td>";
								
								echo "</tr>";
							}
						echo "</table>";
						
					}else
					{
						echo "<h2>No Order Found....</h2>";
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