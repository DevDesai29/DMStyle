<?php
include("admin_header.php");
include("conn.php");

//auto no code start...
$res1=mysql_query("select max(sub_cat_id) from sub_cat_master");
$scid=0;
while($r1=mysql_fetch_array($res1))
{
	$scid=$r1[0];
}
$scid++;
//auto no code end....
?>
<script type="text/javascript">
function validation()
{
	if(form1.selcat.value=="0")
	{
		alert("Please Select Category...");
		form1.selcat.focus();
		return false;
	}
	
	var v=/^[a-zA-Z ]+$/
	if(form1.txtscat.value=="")
	{
		alert("Please Enter Sub Category...");
		form1.txtscat.focus();
		return false;
	}else{
		if(!v.test(form1.txtscat.value))
		{
			alert("Please Enter Only Alphabets In Sub Category...");
			form1.txtscat.focus();
			return false;
		}
	}
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$scid=$_POST['txtscid'];
	$cid=$_POST['selcat'];
	$scat=$_POST['txtscat'];
	
	$query="insert into sub_cat_master values('$scid','$cid','$scat')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Sub Category Inserted Successfully');";
		echo "window.location.href='admin_manage_sub_category.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['scdid']))
{
	$scid1=$_REQUEST['scdid'];
	$query="delete from sub_cat_master where sub_cat_id='$scid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Sub Category Deleted Successfully');";
		echo "window.location.href='admin_manage_sub_category.php';";
		echo "</script>";
	}
	
}

if(isset($_REQUEST['sceid']))
{
	$scid=$_REQUEST['sceid'];
	$res2=mysql_query("select * from sub_cat_master where sub_cat_id='$scid'");
	$r2=mysql_fetch_array($res2);
	$cid=$r2[1];
	$scat=$r2[2];
}

if(isset($_POST['btnedit']))
{
	$scid=$_POST['txtscid'];
	$cid=$_POST['selcat'];
	$scat=$_POST['txtscat'];
	
	$query="update sub_cat_master set cat_id='$cid',sub_cat='$scat' where sub_cat_id='$scid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Sub Category Updated Successfully');";
		echo "window.location.href='admin_manage_sub_category.php';";
		echo "</script>";
	}
}
?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>MANAGE SUB CATEGORY</h2>
					</div>
					<form class="comment-form" name="form1" method="post">
						<div class="row">
							
							<div class="col-md-12">
								<input type="text" placeholder="Enter Sub Category Id" name="txtscid" value="<?php echo $scid; ?>" readonly="true">
							</div>
							<div class="col-md-12">
								<select name="selcat" >
									<option value="0">--Select Category--</option>
								<?php
								$qur4=mysql_query("select * from cat_master");
								while($q4=mysql_fetch_array($qur4))
								{
									?>
									<option value="<?php echo $q4[0]; ?>" <?php if($cid==$q4[0]){ echo "selected='selected'"; } ?>><?php echo $q4[1]; ?></option>
									<?php
								}
								?>
								</select>
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Enter Sub Category Name" name="txtscat" value="<?php echo $scat; ?>">
							
							<?php
							if(isset($_REQUEST['sceid']))
							{
								?>
								<button class="site-btn sb-dark" name="btnedit" type="submit" onclick="return validation();">EDIT <i class="fa fa-angle-double-right"></i></button>
								<?php
							}else{
							
							?>
							
								<button class="site-btn sb-dark" name="btnsave" type="submit" onclick="return validation();">SAVE <i class="fa fa-angle-double-right"></i></button>
							<?php
							}
							?>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-7">
					<div class="map">
						<br/><br/><br/><br/>
					<?php
					
					$qur1=mysql_query("select * from sub_cat_master");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>SUB CATEGORY ID</th>
									<th>CATEGORY</th>
									<th>SUB CATEGORY</th>
									<th>EDIT</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								//echo "<td>$q1[1]</td>";
								$qur2=mysql_query("select * from cat_master where cat_id='$q1[1]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td>$q2[1]</td>";
								echo "<td>$q1[2]</td>";
								echo "<td><a href='admin_manage_sub_category.php?sceid=$q1[0]'>EDIT</a></td>";
								echo "<td><a href='admin_manage_sub_category.php?scdid=$q1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
						echo "</table>";
					}else{
						echo "<h3>No Sub Category Found</h3>";
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