<section>
	<!-- Home start -->
	<div class="wl-home-style3  wl-paralax wl-home-bg3">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items-contents wl-home-items3 wl-section-marginboth">
					<div class="wl-home-heading">
						<!-- Hi user di header  .$_SESSION['namauser']. -->
						<?php
							if (isset($_SESSION['namauser'])) {
						?>
						<h1>
							Hi, <?php echo $_SESSION['nama'];?>
						</h1>
						<?php  
							}
						?>
						<!-- Hi user di header end-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">
		<!-- Daftar harga start -->
		
		<!-- Daftar harga end -->
		<div class="wl-sort-link text-center wl-section-marginbottom">
			<div class="wl-link-to">
			</div>
		</div>
	</div>
	<!-- Main content end -->
</section>