<?php
include("admin_header.php");
include("conn.php");

//auto no code start...
$res1=mysql_query("select max(cat_id) from cat_master");
$cid=0;
while($r1=mysql_fetch_array($res1))
{
	$cid=$r1[0];
}
$cid++;
//auto no code end....
?>
<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtcat.value=="")
	{
		alert("Please Enter Category...");
		form1.txtcat.focus();
		return false;
	}else{
		if(!v.test(form1.txtcat.value))
		{
			alert("Please Enter Only Alphabets In Category...");
			form1.txtcat.focus();
			return false;
		}
	}
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$cid=$_POST['txtcid'];
	$cat=$_POST['txtcat'];
	
	$query="insert into cat_master values('$cid','$cat')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Inserted Successfully');";
		echo "window.location.href='admin_manage_category.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['cdid']))
{
	$cid1=$_REQUEST['cdid'];
	$query="delete from cat_master where cat_id='$cid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Deleted Successfully');";
		echo "window.location.href='admin_manage_category.php';";
		echo "</script>";
	}
	
}

if(isset($_REQUEST['ceid']))
{
	$cid=$_REQUEST['ceid'];
	$res2=mysql_query("select * from cat_master where cat_id='$cid'");
	$r2=mysql_fetch_array($res2);
	$cat=$r2[1];
}

if(isset($_POST['btnedit']))
{
	$cid=$_POST['txtcid'];
	$cat=$_POST['txtcat'];
	
	$query="update cat_master set cat_name='$cat' where cat_id='$cid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Updated Successfully');";
		echo "window.location.href='admin_manage_category.php';";
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
						<h2>MANAGE CATEGORY</h2>
					</div>
					<form class="comment-form" name="form1" method="post">
						<div class="row">
							
							<div class="col-md-12">
								<input type="text" placeholder="Enter Category Id" name="txtcid" value="<?php echo $cid; ?>" readonly="true">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Enter Category Name" name="txtcat" value="<?php echo $cat; ?>">
							
							<?php
							if(isset($_REQUEST['ceid']))
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
					
					$qur1=mysql_query("select * from cat_master");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>CATEGORY ID</th>
									<th>CATEGORY</th>
									<th>EDIT</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								echo "<td><a href='admin_manage_category.php?ceid=$q1[0]'>EDIT</a></td>";
								echo "<td><a href='admin_manage_category.php?cdid=$q1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
						echo "</table>";
					}else{
						echo "<h3>No Category Found</h3>";
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