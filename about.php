<?php 
$sql=mysql_query("SELECT * from about where id_about=1");
$sql2=mysql_query("SELECT * from contact where id_contact=1");
$r=mysql_fetch_array($sql);
$r2=mysql_fetch_array($sql2);
?>
<section>
	<!-- Home start -->
	<div class="wl-home-style3  wl-paralax wl-home-bg3">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items-contents wl-home-items3 wl-section-marginboth">
					<div class="wl-home-heading">
						<h1>Tentang Kami</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">
		<!-- About start -->
		<div class="container">
			<div class="row wl-section-margintop">
				<div class="col-md-6">
					<div class="wl-section-heading wl-widemargin">
						<h2>Tentang<br>ADS Decals</h2>
					</div>
					<p>
						<?php echo $r['isi_about']; ?>
					</p>
				</div>
				<div class="col-md-6">
					<div class="wl-section-heading wl-widemargin xs-margin">
						<h2 class="wl-margin-topaligned">We are<br>Connected</h2>
					</div>
					<h3 class="wl-margin-topaligned">
						<strong>Whatsapp - </strong>&nbsp;<?php echo $r2['no_hp'] ?><br>
						<strong>BBm - </strong>&nbsp;<?php echo $r2['pinbbm'] ?><br>
						<strong>G-mail - </strong>&nbsp;<?php echo $r2['gmail'] ?><br>
						<strong>Facebook - </strong>&nbsp;<?php echo $r2['fb'] ?><br>
						<strong>Twitter - </strong>&nbsp;<?php echo $r2['twitter'] ?><br>
						<strong>Pinterest - </strong>&nbsp;<?php echo $r2['pinterest'] ?><br>

					</h3>
					
					<div class="row wl-creative-sec">
						<div class="col-sm-6 wl-img-center">
							<img src="images/ft-portfolio/1.jpg" alt="about-us1.jpg">
						</div>
						<div class="col-sm-6 wl-img-center">
							<img src="images/ft-portfolio/2.jpg" alt="about-us1.jpg">
						</div>
					</div>
				</div>
			</div>
		<!-- About end -->
		<div class="wl-sort-link text-center wl-section-marginbottom">
			<div class="wl-link-to">
			</div>
		</div>
	</div>
	<!-- Main content end -->
</section>