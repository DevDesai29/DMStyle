<?php
include("header.php");
include("conn.php");
?>
<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Your Name");
		form1.txtname.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Your Address");
		form1.txtadd.focus();
		return false;
	}
	
	if(form1.txtcity.value=="")
	{
		alert("Please Enter Your City Name");
		form1.txtcity.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtcity.value))
		{
			alert("Please Enter Only Alphabets in City Name");
			form1.txtcity.focus();
			return false;
		}
	}
	
	
	var v=/^[0-9]+$/
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Your Mobile No");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10)
	{
		alert("Please Enter Only 10 Digits In Mobile No");
		form1.txtmno.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	
	if(form1.gender[0].checked==false)
	{
		if(form1.gender[1].checked==false)
		{
			alert("Please Select Your Gender");
			return false;
		}
	}
	
	var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})$/
	if(form1.txtemail.value=="")
	{
		alert("Please Enter Your Email ID");
		form1.txtemail.focus();
		return false;
	}
	else
	{
		if(!v.test(form1.txtemail.value))
		{
			alert("Please Enter Valid Email ID");
			form1.txtemail.focus();
			return false;
		}
	}
	
	
	if(form1.txtpwd.value=="")
	{
		alert("Please Enter Your Password");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length<6)
	{
		alert("Please Enter Your Password more than 6 characters");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length>10)
	{
		alert("Please Enter Your Password Less than 10 characters");
		form1.txtpwd.focus();
		return false;
	}
	
}
</script>
<?php
if(isset($_POST['btncreate']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$gen=$_POST['gender'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res=mysql_query("select * from customer_regis where email_id='$email'");
	
	if(mysql_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email ID Already Exists');";
		echo "</script>";
	}else{
		//auto no code start...
		$res1=mysql_query("select max(cust_id) from customer_regis");
		$cid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$cid=$r1[0];
		}
		$cid++;
		//auto no code end....
		
		$query="insert into customer_regis values('$cid','$name','$add','$city','$mno','$gen','$email','$pwd')";
		
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Register Successfull');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
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
						<h2>REGISTRATION</h2>
					</div>
					<form class="comment-form" name="form1" method="post">
						<div class="row">
							<div class="col-md-12">
								<input type="text" placeholder="Your Name" name="txtname">
							</div>
							<div class="col-md-12">
								<textarea placeholder="Your Address" name="txtadd"></textarea>
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Your City" name="txtcity">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Your Mobile No" name="txtmno" >
							</div>
							<div class="col-md-12">
								Select Gender: &nbsp;&nbsp;
								<input type="radio"  name="gender" value="MALE"> MALE &nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio"  name="gender" value="FEMALE"> FEMALE
								
							</div>
							<div class="col-md-12">
							<br/>
								<input type="text" placeholder="Your Email" name="txtemail">
							</div>
							<div class="col-md-12">
								<input type="password" placeholder="******" name="txtpwd">
								
								<button class="site-btn sb-dark" name="btncreate" type="submit" onclick="return validation();">CREATE AN ACCOUNT <i class="fa fa-angle-double-right"></i></button>
								
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-6">
					<div class="map" style="margin-top:150px;">
						<img src="img/regis3.jpg" style="500px; height:500px;">
					</div>
				
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->
	

<?php
include("footer.php");
?>