<?php
$testimoni=mysql_query("select * from testimoni inner join pelanggan on testimoni.id_pelanggan = pelanggan.id_pelanggan where testimoni.status_testimoni=2");
$foto=mysql_query("select * from testimoni inner join pelanggan on testimoni.id_pelanggan = pelanggan.id_pelanggan where testimoni.status_testimoni=2");
?>
<section>
	<!-- Home start -->
	<!--<div class="wl-home wl-paralax wl-home-bg1">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items">
					<div class="wl-home-heading">
						<img src="images/w-logo-big.png" >
					</div>
					<p>
						DESIGN YOUR GIFTS WITH YOUR PHOTO <br> 
					</p>
				</div>
			</div>
		</div>
	</div>-->
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">
		<!-- Container start -->
		<div class="container">
			<!-- Services start -->
			<div class="row wl-section-margintop3 wl-rowsqueezing">
				<div class="wl-section-heading">
					<h2 class="wl-margintopzero">Fitur Produk</h2>
				</div>
				<div class="col-md-5 wl-right-col">
					<div class="wl-feature-images" style="width: 360px; height: 450px;">
						<div  id="feature-owl"  class=" owl-carousel owl-theme">
							<div class="item">
								<img src="images/1.jpg" alt="fp-1.jpg">
							</div>
							<div class="item">
								<img src="images/5.jpg" alt="fp-2.jpg">
							</div>
							<div class="item">
								<img src="images/11.jpg" alt="fp-3.jpg">
							</div>
						</div>
					</div>
					<div class="wl-feature-navigation">
						<span class="feature-prev" data-icon=&#x23;></span>
						<span class="feature-next pull-right" data-icon=&#x24;></span>
					</div>
				</div>
				<div class="col-md-6 wl-rightfeature-boxes">
					<div class="wl-feature-box  wl-box-marginbottom">
						<h5><a href="#"><span data-icon=&#x67;></span>Bla bla bla </a></h5>
						<p>
							
						</p>
					</div>
					<div class="wl-feature-box wl-box-marginbottom">
						<h5><a href="#"> <span data-icon=&#xe00a;></span>The Best Quality & Price</a></h5>
						<p>
							
						</p>
					</div>
					<div class="wl-feature-box">
						<h5><a href="#"> <span data-icon=&#xe072;></span>Unique Ideas</a></h5>
						<p>
							
						</p>
					</div>
				</div>
			</div>
			<!-- Services end -->
			<!-- Featured portfolios start -->
			<div class="row wl-section-margintop">
				<div class="col-lg-4">
					<div class="wl-section-heading">
						<h2 class="wl-margintopzero">Simpan Momen Terbaikmu<br>dengan<br>Kado<br>Terbaik Pilihanmu</h2>
					</div>
					<p>
						Design Your Photo with anygifts you want <br>	
					</p>
					<br>
					<a href="?menu=produk_galeri"><button>Galeri</button></a>
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-sm-6 wl-align-padding">
							<div class="wl-featured-portfolio-box">
								<a href="#"><img src="images/logo/eloli2.jpg" alt="p1.jpg"></a>
								<div class="hover-effect-1">
									<div class="hover-inner">
										<a href="#">
											<span class="wl-color1" data-icon=&#x30;></span>
										</a>
									</div>
								</div>
							</div>
							<br>
						</div>
						<div class="col-sm-6 wl-align-padding">
							<div class="wl-featured-portfolio-box">
								<a href="#"><img src="images/eloli/eloli2.jpg" alt="p2.jpg"></a>
								<div class="hover-effect-1">
									<div class="hover-inner">
										<a href="#">
											<span class="wl-color1" data-icon=&#x30;></span>
										</a>
									</div>
								</div>
							</div>
							<br>
						</div>
						
							

					</div>
				</div>
			</div>
			<!-- Featured portfolios end -->
			<!-- Our clients start -->
			<div class="row wl-section-marginboth wl-section-slider">
				<div class="col-md-6 pull-right">
					<div class="wl-clients-testimonial wl-text-slider">
						<div class="wl-section-heading">
							<h2 class="wl-margin-topaligned">Testimoni</h2>
							<a href="?menu=testimoni&id=0"><button>Kirim testimoni</button></a>
						</div>
						<div class="text-owl owl-carousel owl-theme">
							<?php
								while ($r=mysql_fetch_array($testimoni)){ 
							?>
								<div class="item">
									<p>
										<?php 
											echo "<h3>".$r['judul_testimoni']."</h3>";
											echo $r['isi_testimoni'];
										?>
									</p>
									<h5><?php echo $r['nama']?></h5>
									<p class="wl-client-designation"><?php echo $r['tanggal_testimoni']?></p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="wl-clients">
						<div class="img-owl owl-carousel owl-theme">
							<?php 
								while ($r=mysql_fetch_array($foto)){
							?>

								<div class="item" style="height: 400px">
									<img src="images/member/<?php echo $r['foto'] ?>" alt="testimonial.jpg">
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Our clients end -->
		</div>
		<!-- Container end -->
	</div>
	<!-- Main content end -->
</section>