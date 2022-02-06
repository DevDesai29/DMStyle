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
						<h2>CUSTOMER DETAIL REPORT</h2>
					</div>
			<div class="row">
			<div class="col-lg-12">
				
					<?php
					
				
					$qur1=mysql_query("select * from customer_regis");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>CUSTOMER ID</th>
									<th>CUSTOMER NAME</th>
									<th>ADDRESS</th>
									<th>CITY</th>
									<th>MOBILE NO</th>
									<th>EMAIL ID</th>
									<th>ORDER DETAIL</th>
									<th>INVOICE DETAIL</th>
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								echo "<td>$q1[2]</td>";
								echo "<td>$q1[3]</td>";
								echo "<td>$q1[4]</td>";
								
								echo "<td>$q1[5]</td>";
								echo "<td><a href='admin_view_customer_wise_order_report.php?custid=$q1[0]'>ORDER DETAIL</a></td>";
								echo "<td><a href='admin_view_customer_wise_invoice_report.php?custid=$q1[0]'>INVOICE DETAIL</a></td>";
								echo "</tr>";
							}
						echo "</table>";
						
					}else
					{
						echo "<h2>No Customer Found....</h2>";
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