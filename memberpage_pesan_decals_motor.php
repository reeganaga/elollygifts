<?php
if(isset($_SESSION['id_user'])){
	$id_user=$_SESSION['id_user'] ;
	$lihat=mysql_query("select * from motor");
	$id_pemesanan=$_GET['id'];
}
?>
<style type="text/css">
	.cus_custom{
	    width: 100%;
	    border-top: 2px solid black;
	    padding-top: 10px;
	}
</style>
<script type="text/javascript">
	function removeTextAreaWhiteSpace() { 
		var myTxtArea = document.getElementById('remarks'); 
		myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,''); 
	} 
</script>
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
						<h1>Pesan Decals Motor</h1>
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
	<?php if ($id_pemesanan==0) { ?>
	<div class="wl-main-content">
		<br>
		<!-- content start -->
		<div class="container">
			<div class="row" style="margin:10px">
				<form name="decals_motor" action="proses_memberpage.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="col-md-5 wl-right-col">
							<div class="wl-overflow wl-relative hover-sibling-2">
								<img src="images/decals.jpg" alt="p6.jpg">
							</div>
							<div class="wl-standard-margin hover-sibling-1">
								<h5>Upload gambar referensi desain</h5>
								<p class="wl-regular-text">
									<input  type="file" name="gambar" class="form-poshytip" />
								</p>
								<p class="wl-regular-text">
									<input  type="file" name="gambar" class="form-poshytip" />
								</p>
								<p class="wl-regular-text">
									<input  type="file" name="gambar" class="form-poshytip" />
								</p>
							</div>
						</div>
						<div class="col-md-5 wl-rightfeature-boxes" style="width: 66%">
							<label for="username"><h5>Jenis Motor</h5></label><br>
							<select name="jenis_motor" style="width: 250px">
							  	<option value="">pilih jenis motor...</option>
							<?php
								while ($r=mysql_fetch_array($lihat)){ 
							?>
							  	<option value="<?php echo $r['id_motor'] ?>"><?php echo $r['nama_motor'] ?></option>
							<?php } ?>
							</select>
							<!-- <input name="username"  id="name" value="" type="text" class="col-md-11" /> -->
							<br>
							<label for="nama_lengkap"><h5>Deskripsi Pemesanan</h5></label><br>
							<textarea name="deskripsi_pemesanan"  id="remarks" type="text" style="margin-bottom: 10px; height: 140px; width: 90%;"  onClick="javascript:removeTextAreaWhiteSpace(this)";>
							</textarea>
							<br>
							<button type="submit" class="btn btn-primary col-md-11"  name="pesan_decals_motor">Proses pemesanan</button>
							<br>
						
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<?php } else {
	$revisi=mysql_query("select * from contact");
	$j=mysql_fetch_array($revisi);
	$konek="select * from pemesanan,motor where pemesanan.id_pemesanan=$id_pemesanan and pemesanan.id_motor=motor.id_motor";
	// echo $konek;
	$sql=mysql_query($konek);
	// $baca=mysql_fetch_array($sql);
	$baca=mysql_fetch_array($sql);
	if ($baca['gambar_2']=='') {
	 	$metu='none';
	 } else {
	 	$metu='block';
	 }
	 if ($baca['pesan_admin']==''){
	 	$metu2='none';
	 } else {
	 	$metu2='block';
	 }
	 if ($metu=='none' and $metu2=='none'){
	 	$metu3='none';
	 } else {
	 	$metu3='block';
	 }
	 if ($baca['id_konfirmasi']!==''){
	 	$readonly='disabled="disabled"';
	 } else {
	 	$readonly='';
	 }
	?>
	<div class="wl-main-content">
		<br>
		<!-- content start -->
		<div class="container">
			<div class="row" style="margin:10px">
				<form name="decals_motor" action="proses_memberpage.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="col-md-5 wl-right-col">
							<div class="wl-overflow wl-relative hover-sibling-2">
								<img src="admin-web/gambar_pesanan/decals/<?php echo $baca['gambar_1'] ?>">
							</div>
							<div class="wl-standard-margin hover-sibling-1">
								<h5>ganti gambar referensi desain</h5>
								<p class="wl-regular-text">
									<input  type="file" name="gambar" class="form-poshytip" />
								</p>
							</div>
						</div>
						<div class="col-md-5 wl-rightfeature-boxes" style="width: 66%">
							<label for="username"><h5>Jenis Motor</h5></label><br>
							<select name="jenis_motor" style="width: 250px" <?php echo $readonly ?>>
							  	<option value="<?php echo $baca['id_motor']?>"><?php echo $baca['nama_motor']?></option>
							<?php
								while ($r=mysql_fetch_array($lihat)){
							?>
							  	<option value="<?php echo $r['id_motor'] ?>"><?php echo $r['nama_motor'] ?></option>
							<?php } ?>
							</select>
							<!-- <input name="username"  id="name" value="" type="text" class="col-md-11" /> -->
							<br>
							<label for="nama_lengkap"><h5>Deskripsi Pemesanan</h5></label><br>
							<textarea name="deskripsi_pemesanan"  id="remarks" type="text" style="margin-bottom: 10px; height: 140px; width: 90%;"  onClick="javascript:removeTextAreaWhiteSpace(this)";><?php echo $baca['deskripsi_pemesanan'] ?>
							</textarea>
							<br>
							<?php 
							if ($baca['id_konfirmasi']==0 or $baca['id_konfirmasi']=='') {
							?>
							<input type="hidden" name="id_pemesanan" value="<?php echo $baca['id_pemesanan'] ?>">
							<button type="submit" class="btn btn-primary col-md-11"  name="update_pesan_decals_motor">update pemesanan</button>
							<?php } else {} ?>
							<br>
						
						</div>

					</fieldset>

					<div class="cus_custom" style="display:<?php echo $metu3 ?>">
						<div style="width: 50%; float: left; padding-right: 5px;">
							<div style="width: 100%; margin-bottom: 5px">
								<h3 style="display: inline;"><strong>Hasil Desain</strong> - </h3>
								<?php 
								if ($baca['status_pemesanan']!=='gambar dikonfirmasi') {	
								?>
									<input type="hidden" name="tujuan" value="<?php echo $_GET['menu'] ?>">
									<input type="hidden" name="id_pemesanan" value="<?php echo $baca['id_pemesanan'] ?>">
									<button type="submit" class="btn btn-primary"  name="konfirmasi_gambar">konfirmasi gambar untuk dicetak</button>
								<?php 
								} else {
								?>
									<h3 style="display: inline;">Gambar telah dikonfirmasi</h3>
								<?php } ?>
							</div>
							<!-- <img width="100%" src="admin-web/gambar_pesanan/konfirmasi/<?php echo $baca['gambar_2'] ?>"> -->
							<div class="wl-featured-portfolio-box">
								<a href="#"><img src="admin-web/gambar_pesanan/konfirmasi/<?php echo $baca['gambar_2'] ?>" alt="p1.jpg"></a>
								<div class="hover-effect-1">
									<div class="hover-inner">
										<a href="http://localhost/skripsi_abas/admin-web/gambar_pesanan/konfirmasi/<?php echo $baca['gambar_2'] ?>" target="_blank">
											<span class="wl-color1" data-icon=&#x30;></span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div style="width: 50%; float: left; padding-left: 5px;">
							<div style="width: 100%">
								<h3><strong>Pesan dari Admin</strong></h3>
							</div>
							<div style=" width: 100%">
								<p style="font-size: 18px">
									<?php echo $baca['pesan_admin'] ?>
								</p>
								<p style="font-size: 16px; font-style: italic; border-top: 2px solid; padding-top: 5px; margin-top: 5px;">
									Jika kurang puas dengan desain kami, kami berikan fasilitas revisi desain maksimal 2x.
									<br> 
									Untuk revisi desain langsung hubungi kami : <br>
									sms/telp/whatsapp - <?php echo $j['no_hp'] ?> <br>
									bbm - <?php echo $j['pinbbm'] ?>

								</p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
		<!-- content end -->
	}
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