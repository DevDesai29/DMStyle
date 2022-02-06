<?php
session_Start();
include("admin_header.php");
include("conn.php");


if(isset($_REQUEST['oid']))
{
	$idate=date("Y-m-d");
	$oid=$_REQUEST['oid'];
	$res1=mysql_query("select * from order_master where order_id='$oid'");
	$r1=mysql_fetch_array($res1);
	$cartid=$r1[3];
	$custid=$r1[2];
	$totamt=$r1[7];
	//auto no code start...
	$res1=mysql_query("select max(invoice_id) from invocie_master");
	$iid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$iid=$r1[0];
	}
	$iid++;
	//auto no code end....
	$query="insert into invoice_master values('$iid','$idate','$custid','$oid','$cartid','$totamt')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Invoice Generated Successfully');";
		echo "window.location.href='invoice.php?iid=$iid&';";
		echo "</script>";
	}
}
?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
		<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>NEW ORDER DETAIL</h2>
					</div>
			<div class="row">
			<div class="col-lg-12">
				
					<?php
					
					
					
					$qur1=mysql_query("select * from order_master where order_id not in(select order_id from invoice_master)");
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
									<th>GENERATE INVOICE</th>
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
								echo "<td><a href='admin_view_new_order.php?oid=$q1[0]'>GENERATE INVOICE</a></td>";
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