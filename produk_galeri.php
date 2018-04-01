<?php  
$tampil_galeri=mysql_query("select * from product inner join category on product.id_category = category.id_category");
$testimoni=mysql_query("select * from testimoni inner join pelanggan on testimoni.id_pelanggan = pelanggan.id_pelanggan where testimoni.status_testimoni=2");
$foto=mysql_query("select * from testimoni inner join pelanggan on testimoni.id_pelanggan = pelanggan.id_pelanggan where testimoni.status_testimoni=2");
?>
<section>
	<!-- Home start -->
	<div class="wl-home-style3  wl-paralax wl-home-bg3" style="background-postition: 0px;">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items-contents wl-home-items3 wl-section-marginboth">
					<div class="wl-home-heading">
						<h1>Galeri</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">
		<!-- Portfolio section start -->
		<div class="container wl-row4">
			<!-- filter nav start -->
			<div class="row wl-normal-margin">
				<div class="wl-menu-filter">
					<ul id="js-filters-col-three" class="cbp-l-filters-button">
						<li data-filter="*" class="cbp-filter-item-active cbp-filter-item">
							All <div class="cbp-filter-counter"></div>
						</li>
						<li data-filter=".decal" class="cbp-filter-item">
							Decals <div class="cbp-filter-counter"></div>
						</li>
						<li data-filter=".garskin" class="cbp-filter-item">
							Garskin <div class="cbp-filter-counter"></div>
						</li>
						<li data-filter=".skinlaptop" class="cbp-filter-item">
							Skin Laptop <div class="cbp-filter-counter"></div>
						</li>
					</ul>
				</div>
			</div>
			<!-- filter nav end -->
			<div class="row">
				<div id="js-grid-col-three" class="cbp cbp-l-grid-mosaic">
					<?php
						while ($r=mysql_fetch_array($tampil_galeri)){ 
					?>
						<div class="cbp-item <?php echo $r['nama_category'] ?>">
							<div class="wl-overflow wl-relative hover-sibling-2" style="height: 370px">
								<a href="memberpage_pesan_skin_laptop.php">
									<img style="width: 370px;height: auto;" src="gallery/<?php echo $r['gambar_product'] ?>" alt="p6.jpg">
								</a>
								<div class="hover-effect-1">
									<div class="hover-inner">
										<a href="" class="wl-color1" data-icon=&#x30;></a>
									</div>
								</div>
							</div>
							<div class="wl-standard-margin hover-sibling-1">
								<h5><a href="home.php" class="wl-color4"><?php echo $r['judul_product'] ?></a></h5>
								<p class="wl-regular-text">
									<?php echo $r['deskripsi'] ?>
								</p>
							</div>
						</div>
					<?php } ?>
					<!--
					<div class="cbp-item interior nature interior">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p2.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item abstract branding nature">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p3.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item interior flyer">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p4.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item abstract branding">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p11.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item nature branding">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p2.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item interior flyer abstract">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p3.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item interior branding nature">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p4.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					<div class="cbp-item abstract branding">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/ft-portfolio/p4.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="portfolio-single-page-1.html" class="wl-color1" data-icon=&#x30;></a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="portfolio-single-page-1.html" class="wl-color4">PhotoShop Retouch</a></h5>
							<p class="wl-regular-text">
								Photography
							</p>
						</div>
					</div>
					-->
				</div>
			</div>	
		</div>
		<!-- Portfolio section end -->
		<div class="wl-sort-link text-center wl-section-marginbottom">
			<div class="wl-link-to">
				<a href="#">
					<span class="wl-direction-left" data-icon=&#x45;></span>
					load more
					<!-- <span class="wl-direction-right" data-icon=&#x44;></span> -->
				</a>
			</div>
		</div>
	</div>
	<!-- Main content end -->
</section>