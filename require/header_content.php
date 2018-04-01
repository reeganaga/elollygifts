<!--<header class="wl-header">-->
	<div id="main-menu" class="wl-full-width">
		<div class="container">
			<div class="wl-header-wrap wl-marginzero wl-relative">
				<div class="wl-logo wl-logo-head">
					<a class="wl-img" href="index.php"><img src="images/logo/eloli2.jpg" alt="logo"></a>
				</div>
				<!-- Menu start -->
				<nav class="wl-main-nav">
					<ul>
						<li>
							<a href="?menu=home">Home</a>
						</li>
						<li>
							<a href="?menu=produk" class="wl-relative">Produk</a>	
							<ul class="sub-menu">
								<li>
									<a href="?menu=produk_galeri">Galeri</a>
								</li>
								<li>
									<a href="?menu=produk_daftar_harga">Daftar Harga</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="?menu=cara_pesan">Cara Pesan</a>
						</li>
						<li>
							<a href="?menu=about">About</a>
						</li>
						<!-- Member login blm bener session msh eror  .$_SESSION['namauser']. -->
						<?php
							if (isset($_SESSION['tipe'])) {
						?>
						<li>
							<a href="?menu=memberpage"> HI, <?php echo $_SESSION['namauser'];?> </a>
							<ul class="sub-menu"> 
								<li>
									<a href='?menu=memberpage'>Profile</a></li>
								</li>
								<li>
									<a href='logout.php'>LOGOUT</a></li>
								</li>
							</ul>
						</li>
						<?php
							} else {
						?>
							<li>
								<a href="?menu=member">Member</a>
							</li>
						<?php
							} 
						?>
							<!-- <a href="?menu=member">Member</a> -->
						<!-- Member login end-->
					</ul>
				</nav>
		<!-- Menu end -->
			</div>
		</div>
	</div>
</header>