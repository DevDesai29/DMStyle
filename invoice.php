<?php
include("conn.php");
?>
<html>
<head>
</head>
<body onload="window.print();">
	
	<table border='1' align="center" width="80%">
		<tr>
			<td colspan="2" align="center"><img src="img/logo1.png" style="width:228px; height:100px;" alt="" />
		<br/>
			2<sup>nd</sup>-Floor, Om Business Plaza,<br/>
					Opposite Circuit House,<br/>
					Halar Cross Road, <br/>
					Valsad: 396001 <br/>
				Gujarat-(India)
			</td>	
		</tr>
	</table>
	<table border='1' align="center" height="50%" width="80%">
		<tr>
			<td>PRODUCT IMAGE</td>
			<td>PRODUCT NAME</td>
			<td>QUANTITY</td>
			<td>PRICE</td>
			<td>AMOUNT</td>
		</tr>
	<?php
		$tot=0;
		if(isset($_REQUEST['idid']))
		{
			$iid=$_REQUEST['idid'];
		}else if(isset($_REQUEST['idid']))
		{
			//$iid=$_REQUEST['idid'];
		}else {
			$iid=$_REQUEST['iid'];
		
		}	
		$qur=mysql_query("select c.cart_id,c.prod_id,p.prod_name,c.qty,c.price,p.prod_image from cart_detail c,product_detail p where c.prod_id=p.prod_id and c.cart_id=(select cart_id from invoice_master where invoice_id='$iid')");
		while($q=mysql_fetch_row($qur))
		{
			echo "<tr>";
			echo "<td><img src='$q[5]' style='width:100px; height:100px;'></td>";
			echo "<td>$q[2]</td>";
			echo "<td>$q[3]</td>";
			echo "<td>$q[4]</td>";
			$amt=$q[3]*$q[4];
			echo "<td>Rs. $amt /-</td>";
			echo "</tr>";
			$tot=$tot+$amt;
		}
	?>
		<tr>
			<td colspan="4">This is system generated bill, No signature required.<br>
			</td>
			<td >Total Amount Rs. <?php echo $tot; ?>/-</td>
		</tr>
	</table>
	<?php
	if(isset($_REQUEST['idid']))
		{
	?>

		<?php
			
			
		}else if(isset($_REQUEST['iddid']))
		{
			?>
		
			<?php
		}else{
		?>
	<a href="admin_view_new_order.php">BACK</a>
		<?php
		}	
		?>
	
</body>

</html>