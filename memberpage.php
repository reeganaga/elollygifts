<section>
	<!-- Home start -->
	<div class="wl-home-style3  wl-paralax wl-home-bg3">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items-contents wl-home-items3 wl-section-marginboth">
					<div class="wl-home-heading">
						<?php
							if (isset($_SESSION['tipe'])) {
						?>
						<h1> Hi, <?php echo $_SESSION['nama']?></h1>
						<a href="logout.php">
							<button>Log Out</button>
						</a>

						<!-- Hi user di header end-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">
		<br>
		<!-- content start -->
		<div class="container wl-row4">
			<div class="row">
				<div id="js-grid-col-three" class="cbp cbp-l-grid-mosaic">
					<div class="cbp-item abstract flyer">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<?php
							if ($_SESSION['foto']=="") {
							?>
								<img src="images/member/default.jpg" alt="p6.jpg">
							<?php
							} else {
							?>
								<img src="images/member/<?php echo $_SESSION['foto']; ?>" alt="p6.jpg">
							<?php } ?>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=editprofile" class="wl-color1">
										<p>
											"<br>
											Perbarui profile<br>
											Ubah password<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<a href="" class="wl-color4">
								<h5><?php echo $_SESSION['nama']; ?></h5>
								<p class="wl-regular-text">
									Edit Profil
								</p>
							</a>
						</div>
					</div>
					<div class="cbp-item interior nature interior">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/data pemesanan.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=data_pemesanan" class="wl-color1">
										<p>
											"<br>
											Lihat histori pemesanan<br>
											dan keranjang belanja<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="" class="wl-color4">Data Pemesanan</a></h5>
							<p class="wl-regular-text">
								Keranjang belanja
							</p>
						</div>
					</div>
					<div class="cbp-item abstract branding nature">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/testimoni.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=testimoni&id=0" class="wl-color1">
										<p>
											"<br>
											Kirim testimoni, kritik,<br>
											saran dan komentar<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="" class="wl-color4">Testimoni</a></h5>
							<p class="wl-regular-text">
								Kirim Komentar
							</p>
						</div>
					</div>
					<!--<div class="cbp-item interior flyer">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/decals.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=pesan_decals_motor&id=0" class="wl-color1">
										<p>
											"<br>Pesan decals motor<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="" class="wl-color4">Pesan decals motor</a></h5>
						</div>
					</div>-->
					<div class="cbp-item abstract branding">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/skin_laptop.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=pesan_kado&id=0" class="wl-color1">
										<p>
											"<br>
											Pesan Disini<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="" class="wl-color4">Pesan Disini</a></h5>
						</div>
					</div>
					<!--<div class="cbp-item nature branding">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/skin_hp.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=pesan_skin_hp&id=0" class="wl-color1">
										<p>
											"<br>
											Pesan skin handphone<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="" class="wl-color4">Pesan skin handphone</a></h5>
						</div>
					</div>-->
					<!--<div class="cbp-item nature branding">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<a href="#">
								<img src="images/proposal.jpg" alt="p6.jpg">
							</a>
							<div class="hover-effect-1">
								<div class="hover-inner">
									<a href="?menu=pengajuan_proposal&id=0" class="wl-color1">
										<p>
											"<br>
											Pengajuan proposal<br>acara<br><br>"
										</p>
									</a>
								</div>
							</div>
						</div>
						<div class="wl-standard-margin hover-sibling-1">
							<h5><a href="" class="wl-color4">Pengajuan proposal</a></h5>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<!-- content end -->
		<!-- anti back yg udah logout start -->
		<?php  
			} else {
		?>
			<script language="JavaScript">
  				alert('Anda Belum Login');
  				document.location='index.php?menu=member'
  			</script> 
		<?php  
			}
		?>
		<!-- anti back yg udah logout end -->
		<div class="wl-sort-link text-center wl-section-marginbottom">
			<div class="wl-link-to">
			</div>
		</div>
	</div>
	<!-- Main content end -->
</section>