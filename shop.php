<?php
include("header.php");
include("conn.php");


?>

<!-- Blog page -->
	<section class="blog-page">
		<div class="container">
		<div class="section-title">
						<span>fashion, event, lifestyle</span>
						<h2>PRODUCT</h2>
						</div>
			<div class="row">
			
				<div class="col-lg-8">
					<div class="row">
					<?php
					if(isset($_REQUEST['scatid']))
					{
						$scatid=$_REQUEST['scatid'];
						$res1=mysql_query("select * from product_detail where sub_cat_id='$scatid'");
					}else if(isset($_REQUEST['catid']))
					{
						$catid=$_REQUEST['catid'];
						$res1=mysql_query("select * from product_detail where cat_id='$catid'");
					}else{
						$res1=mysql_query("select * from product_detail where cat_id='1'");
					}
					
					if(mysql_num_rows($res1)>0)
					{
						while($r1=mysql_fetch_array($res1))
						{
					?>
						<div class="col-md-6">
							<div class="blog-item">
								<div class="blog-thumb set-bg" data-setbg="<?php echo $r1[6]; ?>">
									
								</div>
								<div class="blog-head bh-sm">
									<div class="blog-tags">fashion, event, lifestyle</div>
									<h3><a href="product_detail.php?pid=<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?></a></h3>
								</div>
								<p>Price Rs.<?php echo $r1[5]; ?>/-</p>
							</div>
						</div>
						
					<?php
						}
					}else{
						echo "<h2>No Product Found....</h2>";
					}
					?>
						
						
						
					</div>
					
				</div>
				<div class="col-lg-4 sidebar">
								
					<!-- widget -->
					<div class="sb-widget">
						<div class="categories-widget">
							<h2 class="sb-title">Categories</h2>
							<ul>
							<?php
							$qur=mysql_query("select * from cat_master");
							while($q=mysql_fetch_array($qur))
							{
							?>
								<li><a href="shop.php?catid=<?php echo $q[0]; ?>"><?php echo $q[1]; ?></a></li>
								<?php
								if(isset($_REQUEST['catid']))
								{
									$catid=$_REQUEST['catid'];
								if($catid==$q[0])
								{
									$qur1=mysql_query("select * from sub_cat_master where cat_id='$catid'");
									echo "<ul>";
									while($q1=mysql_fetch_array($qur1))
									{
										?>
										<li style="margin-left:25px"><a href="shop.php?catid=<?php echo $q[0]; ?>&scatid=<?php echo $q1[0]; ?>"><?php echo $q1[2]; ?></a></li>
										<?php
									}
									echo "</ul>";
								}
								}
								?>
							<?php
							}
							?>	
							</ul>
						</div>
					</div>
					<!-- widget -->
					
					<!-- widget -->
					
				</div>
			</div>
		</div>
	</section>
	<!-- Blog page end-->
	
	

<?php
include("footer.php");
?>