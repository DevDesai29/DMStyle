<?php
include("admin_header.php");
include("conn.php");

//auto no code start...
$res1=mysql_query("select max(prod_id) from product_detail");
$pid=0;
while($r1=mysql_fetch_array($res1))
{
	$pid=$r1[0];
}
$pid++;
//auto no code end....
?>
<script type="text/javascript">
function change_sub_cat(value)
{
		datastring="cid="+value;
		$.ajax({
				type: "POST",
				url: "filldropdown.php",
				data: datastring,
				success: function(responseText){$("#selsub").html(responseText);}
			});
}
function validation()
{
	if(form1.selcat.value=="0")
	{
		alert("Please Select Category...");
		form1.selcat.focus();
		return false;
	}
	
	if(form1.selsub.value=="0")
	{
		alert("Please Select Sub Category...");
		form1.selsub.focus();
		return false;
	}
	
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Product Name...");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets In Product Name...");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Product Description...");
		form1.txtdesc.focus();
		return false;
	}
	
	var v=/^[0-9]+$/
	if(form1.txtprice.value=="")
	{
		alert("Please Enter Product Price...");
		form1.txtprice.focus();
		return false;
	}
	else if(form1.txtprice.value=="0"){
		alert("Please Enter Product Price Greater Than 0...");
		form1.txtprice.focus();
		return false;

	}
	else{
		if(!v.test(form1.txtprice.value))
		{
			alert("Please Enter Only Digits In Product Price...");
			form1.txtprice.focus();
			return false;
		}
	}
	
	var fname=document.getElementById('txtimg').value;
	var ext=fname.substr(fname.lastIndexOf('.')+1).toLowerCase().trim();
	if(document.getElementById('txtimg').value=="")
	{
		alert("Please Select Product Image");
		return false;
	}else{
		if(!(ext=="jpg" || ext=="jpeg" || ext=="png"))
		{
			//alert(extension);
			alert("Please Select Product Image in Format like jpg png or jpeg");
			return false;
		}
	}
	
}

function validation1()
{
	if(form1.selcat.value=="0")
	{
		alert("Please Select Category...");
		form1.selcat.focus();
		return false;
	}
	
	if(form1.selsub.value=="0")
	{
		alert("Please Select Sub Category...");
		form1.selsub.focus();
		return false;
	}
	
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Product Name...");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets In Product Name...");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Product Description...");
		form1.txtdesc.focus();
		return false;
	}
	
	var v=/^[0-9]+$/
	if(form1.txtprice.value=="")
	{
		alert("Please Enter Product Price...");
		form1.txtprice.focus();
		return false;
	}
	else if(form1.txtprice.value=="0"){
		alert("Please Enter Product Price Greater Than 0...");
		form1.txtprice.focus();
		return false;

	}
	else{
		if(!v.test(form1.txtprice.value))
		{
			alert("Please Enter Only Digits In Product Price...");
			form1.txtprice.focus();
			return false;
		}
	}
	
	var fname=document.getElementById('txtimg').value;
	var ext=fname.substr(fname.lastIndexOf('.')+1).toLowerCase().trim();
	if(document.getElementById('txtimg').value!="")
	{
		
		if(!(ext=="jpg" || ext=="jpeg" || ext=="png"))
		{
			//alert(extension);
			alert("Please Select Product Image in Format like jpg png or jpeg");
			return false;
		}
	}
	
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$pid=$_POST['txtpid'];
	
	$cid=$_POST['selcat'];
	$scid=$_POST['selsub'];
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	$tmppath=$_FILES['txtimg']['tmp_name'];
	$imgpath="productimg/p".$pid."_".rand(100,9999).".png";
	$query="insert into product_detail values('$pid','$name','$cid','$scid','$desc','$price','$imgpath')";
	if(mysql_query($query))
	{
		move_uploaded_file($tmppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Product Inserted Successfully');";
		echo "window.location.href='admin_manage_product.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['pdid']))
{
	$pid1=$_REQUEST['pdid'];
	$query="delete from product_detail where prod_id='$pid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Deleted Successfully');";
		echo "window.location.href='admin_manage_product.php';";
		echo "</script>";
	}
	
}

if(isset($_REQUEST['peid']))
{
	$pid=$_REQUEST['peid'];
	$res2=mysql_query("select * from product_detail where prod_id='$pid'");
	$r2=mysql_fetch_array($res2);
	$pname1=$r2[1];
	$cid1=$r2[2];
	$scid1=$r2[3];
	$pdesc1=$r2[4];
	$price1=$r2[5];
	$pimage1=$r2[6];
}

if(isset($_POST['btnedit']))
{
	$pid=$_POST['txtpid'];
	
	$cid=$_POST['selcat'];
	$scid=$_POST['selsub'];
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	
	if($_FILES['txtimg']['size']>0)
	{
		$tmppath=$_FILES['txtimg']['tmp_name'];
		$imgpath="productimg/p".$pid."_".rand(100,9999).".png";
		move_uploaded_file($tmppath,$imgpath);
		$query="update product_detail set prod_name='$name',cat_id='$cid',sub_cat_id='$scid',description='$desc',price='$price',prod_image='$imgpath' where prod_id='$pid'";	
	}else{
		$query="update product_detail set prod_name='$name',cat_id='$cid',sub_cat_id='$scid',description='$desc',price='$price' where prod_id='$pid'";	
	}
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Updated Successfully');";
		echo "window.location.href='admin_manage_product.php';";
		echo "</script>";
	}
}
?>
<!-- Contact page -->
	<section class="page-warp contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>MANAGE PRODUCT</h2>
					</div>
					<form class="comment-form" name="form1" method="post" enctype="multipart/form-data">
						<div class="row">
							
							<div class="col-md-12">
								<input type="text" placeholder="Enter Product Id" name="txtpid" value="<?php echo $pid; ?>" readonly="true">
							</div>
							<div class="col-md-12">
								<select name="selcat" onchange="change_sub_cat(this.value);" >
									<option value="0">--Select Category--</option>
								<?php
								$qur4=mysql_query("select * from cat_master");
								while($q4=mysql_fetch_array($qur4))
								{
									?>
									<option value="<?php echo $q4[0]; ?>" <?php if($cid1==$q4[0]){ echo "selected='selected'"; } ?>><?php echo $q4[1]; ?></option>
									<?php
								}
								?>
								</select>
							</div>
							<div class="col-md-12">
							<?php
							if(isset($_REQUEST['peid']))
							{
								?>
								<select name="selsub" id="selsub">
									<option value="0">--Select Sub Category--</option>
								<?php
									$qur5=mysql_query("select * from sub_cat_master where cat_id='$cid1'");
									while($q5=mysql_fetch_array($qur5))
									{
										?>
										<option value="<?php echo $q5[0]; ?>" <?php if($scid1==$q5[0]){ echo "selected='selected'"; } ?>><?php echo $q5[2]; ?></option>
										<?php
									}
								?>
								</select>
								<?php
							}else{
							?>	
								<select name="selsub" id="selsub">
									<option value="0">--Select Sub Category--</option>
								
								</select>
							<?php
							}
							?>
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Enter Product Name" name="txtname" value="<?php echo $pname1; ?>">
							
							
							</div>
						</div>
					
				</div>
				<div class="col-lg-6">
					<div class="section-title">
						<span><br/></span>
						<h2><br/></h2>
					</div>
				
						<div class="row comment-form" >
							
							<div class="col-md-12">
								<textarea placeholder="Enter Product Description" name="txtdesc"><?php echo $pdesc1;?></textarea>
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Enter Product Price" name="txtprice" value="<?php echo $price1; ?>">
							</div>
							<div class="col-md-12">
								
								<input type="file"  name="txtimg" id="txtimg">
								<br/><br/>
							<?php
							if(isset($_REQUEST['peid']))
							{
								?>
								<img src='<?php echo $pimage1; ?>' style="width:250px; height:200px;">
								<br/>
								<button class="site-btn sb-dark" name="btnedit" type="submit" onclick="return validation1();">EDIT <i class="fa fa-angle-double-right"></i></button>
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
				<div class="col-lg-12">
					<div class="map">
						<br/><br/><br/><br/>
					<?php
					
					$qur1=mysql_query("select * from product_detail");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>PRODUCT ID</th>
									<th>PRODUCT NAME</th>
									<th>CATEGORY</th>
									<th>SUB CATEGORY</th>
									<th>DESCRIPTION</th>
									<th>PRICE</th>
									<th>PRODUCT IMAGE</th>
									<th>EDIT</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								$qur2=mysql_query("select * from cat_master where cat_id='$q1[2]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td>$q2[1]</td>";
								$qur2=mysql_query("select * from sub_cat_master where sub_cat_id='$q1[3]'");
								$q2=mysql_fetch_array($qur2);
								echo "<td>$q2[2]</td>";
								echo "<td>$q1[4]</td>";
								echo "<td>$q1[5]</td>";
								echo "<td><a href='$q1[6]' target='_blank'><img src='$q1[6]' style='width:270px; height:150px;'></a></td>";
								
								echo "<td><a href='admin_manage_product.php?peid=$q1[0]'>EDIT</a></td>";
								echo "<td><a href='admin_manage_product.php?pdid=$q1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
						echo "</table>";
					}else{
						echo "<h3>No Product Found</h3>";
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