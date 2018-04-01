<?php
if (isset($_SESSION['id_user'])) {
	$id_user=$_SESSION['id_user'] ;
	$lihat=mysql_query("select * from pelanggan where id_pelanggan=$id_user");
	$r=mysql_fetch_array($lihat);
}
?>
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
						<h1>Edit Profile</h1>
						<a href="?menu=memberpage">
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
				<form id="contactForm" action="prosesedit.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="col-md-5 wl-right-col">
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
								</div>
								<div class="wl-standard-margin hover-sibling-1">
									<h5>Foto Muka yang beresolusi tinggi</h5>
									<p class="wl-regular-text">
										<input name="foto"  id="web" type="file" class="form-poshytip" />
										<input type="hidden" name="foto_temp" value="<?php echo $r['foto']; ?>">
									</p>
								</div>
						</div>
						<div class="col-md-5 wl-rightfeature-boxes">
							<p style="margin-left:10px">
								<label for="username"><h5>Username</h5></label>
								<input name="username"  id="name" value="<?php echo $r['username']; ?>" type="text" class="col-md-11" />
								<br>
							</p>
							<p>
								<label for="username"><h5>Password</h5></label>
								<a name="editprofil" href="?menu=editpassword" class="btn btn-primary col-md-11">Ubah Password</a>
								<br>
							</p>
							<p>
								<label for="nama_lengkap"><h5>Nama Lengkap</h5></label>
								<input name="nama_lengkap"  id="name" value="<?php echo $r['nama']; ?>" type="text" class="col-md-11" />
								<br>
							</p>
							<p>
								<label for="gender"><h5>Gender</h5></label>
								<input name="gender" <?php if ($r['gender']=='Laki-laki') {echo "checked='checked'";} ?> value="Laki-laki" id="name" type="radio" />Laki-laki
								<input name="gender" <?php if ($r['gender']=='Perempuan') {echo "checked='checked'";} ?> value="Perempuan" id="name" type="radio" />Wanita
							</p>
						</div>
						<div class="col-md-5 wl-rightfeature-boxes">
							<p>
								<label for="email"><h5>Email</h5></label>
								<input name="email"  id="name" value="<?php echo $r['email']; ?>" type="text" class="col-md-11" />
								<br>
							</p>
							<p>
								<label for="email"><h5>Kota</h5></label>
                            	<select class="form-control" id="sel1" name="kota" style="width: 100%;">
                            		<?php 
									$sql_kota=mysql_query("SELECT * from kota");
									while ($a=mysql_fetch_array($sql_kota)) {
									?>
	                              	<option <?php if ($r['id_kota'] == $a['id_kota']) echo "selected"; ?> value="<?php echo $a['id_kota'] ?>" ><?php echo $a['nama_kota'] ?></option>

                            	</select>
								
								<br>
							</p>
							<p>
								<label for="alamat"><h5>Alamat</h5></label>
								<input name="alamat"  id="name" value="<?php echo $r['alamat']; ?>" type="text" class="col-md-11" />
								<br>
							</p>
							<p>
								<label for="no_hp"><h5>Nomor Telepon</h5></label>
								<input name="no_hp"  id="name" value="<?php echo $r['no_hp']; ?>" type="text" class="col-md-11" />
								<br>
							</p>
							<p><br></p>
							<!-- send mail configuration -->
								<input type="hidden" value="your@email.com" name="to" id="to" />
								<input type="hidden" value="ENter the subject here" name="subject" id="subject" />
								<input type="hidden" value="send-mail.php" name="sendMailUrl" id="sendMailUrl" />
							<!-- ENDS send mail configuration -->

								<a><button type="submit" class="btn btn-primary col-md-11" name="editprofil">Ubah Profil</button></a>
							<p><br></p>
						</div>
					</fieldset>
				</form>
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