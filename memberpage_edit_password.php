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
						<!-- Hi user di header -->
						<h1>Ubah Password</h1>
						<a href="?menu=editprofile">
							<button>Kembali</button>
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
		<div class="container">
			<div class="row" style="margin:10px">
				<div class="col-md-5 wl-right-col" style="background-color: black;">
					<div class="wl-overflow wl-relative hover-sibling-2">
						<div class="wl-section-heading">
							<h2 class="wl-margin-topaligned"><font color="white"><br>Ubah password<br>untuk kemanan<br>akunmu</h2></font>
							<br><br><br>
						</div>
					</div>
				</div>
				<div class="col-md-5 wl-rightfeature-boxes">
					<form id="contactForm" action="prosesedit.php" method="post">
      					<fieldset>
							<label for="passwordlama"><h3>Password lama</h3></label>
							<input name="passwordlama"  id="name" type="text" class="col-md-11" />
							<br>
							<label for="passwordbaru"><h3>Password baru</h3></label>
							<input name="passwordbaru"  id="name" type="text" class="col-md-11" />
							<br><br><br><br>
							<div>
			        			<button type="submit" name="editpassword" class="btn btn-primary col-md-11" > Ganti Password </button> 
			        			<br><br>
		        			</div>
		        		</fieldset>
		        	</form>
				</div>
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
	<!-- Main content end -->
</section>