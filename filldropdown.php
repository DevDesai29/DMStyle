<?php
include("conn.php");
$cid=$_REQUEST['cid'];
			
$temp1=mysql_query("select * from sub_cat_master where cat_id='$cid'");
			
$response="";
$response.="<option value=0>--Select Sub Category--</option>";
while($t1=mysql_fetch_row($temp1))
{
	$response.="<option value=$t1[0] >$t1[2]</option>";
}
echo $response;

?>							