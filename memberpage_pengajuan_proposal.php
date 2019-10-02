<?php
if (isset($_SESSION['id_user'])) {
	$id_proposal=$_GET['id'];
	$id_user=$_SESSION['id_user'] ;
	$lihat=mysql_query("select * from pelanggan where id_pelanggan=$id_user");
	$p=mysql_query("SELECT * from proposal where id_pelanggan=$id_user");
}
?>
<style type="text/css">
	.cus_row{
		padding: 30px;
	  border-radius: 20px;
	  background-color: #eeeeee;
	}
	.cus_tab {
		height: 100%;
		width: 120px;
		background-color: black;
		margin-right: 10px;
		float: left;
		display: table;
		border-radius: 5px;
		margin-top: -5px;
	}
	.cus_active {
		height: 100%;
		width: 120px;
		background-color: #eeeeee !important;
		margin-right: 10px;
		float: left;
		display: table;
		border-radius: 5px !important;
		margin-bottom: -5px !important;
		margin-top: 5px;
	}
	.cus_a {
		vertical-align: -webkit-baseline-middle;
		color: white;
	}
	.cus_a_active {
		vertical-align: -webkit-baseline-middle;
		color: black;	
	}
	.on {
		display: block;
	}
	.off {
		display: none;
	}
	.cus_table_header {
		background-color: black;
	    color: white;
	}
	.cus_table_row {
		background-color: #9a9a9a;
	    color: red;
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
						<h1>Pengajuan Proposal</h1>
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
			<div class="row" style="width: 100%; height: 40px; padding-left: 50px; padding-right: 50px;">
				<div class="cus_tab cus_active" align="center" id="keranjang" onclick="keranjang()">
					<a class="cus_a_active" id="keranjang_a" onclick="keranjang()" href="#">upload</a>	
				</div>
				<div class="cus_tab" align="center" id="history" onclick="history()"> 
					<a class="cus_a" id="history_a" onclick="history()" href="#">history</a>	
				</div>
			</div>
			<div class="row cus_row" style="margin:10px; margin-top: 0px;">
				<div class="on" style="width: 100%" id="keranjang_isi">
					<?php if ($id_proposal==0) { ?>
						<form id="contactForm" action="proses_memberpage.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="col-md-5 wl-right-col">
									<div class="wl-overflow wl-relative hover-sibling-2">
										<img src="images/proposal.jpg" alt="p6.jpg">
									</div>
									<div class="wl-standard-margin hover-sibling-1">
										<h5>Upload prposal dalam format *.pdf</h5>
										<p class="wl-regular-text">
											<input  type="file" name="file_pdf" class="form-poshytip" />
										</p>
									</div>
								</div>
								<div class="col-md-5 wl-rightfeature-boxes" style="width: 66%">
									<label for="username"><h5>Nama Kegiatan</h5></label><br>
									<input name="nama_proposal"  id="name" value="" type="text" class="col-md-11" />
									<br>
									<label for="nama_lengkap"><h5>Keterangan Proposal</h5></label><br>
									<textarea name="keterangan_proposal"  id="remarks" type="text" style="margin-bottom: 10px; height: 140px; width: 90%;" onClick="javascript:removeTextAreaWhiteSpace(this)";>
									</textarea>
									<button type="submit" class="btn btn-primary col-md-11"  name="pengajuan_proposal">Kirim Proposal</button>
									<br><br><br>
								</div>
							</fieldset>
						</form>
					<?php } else { 
						$a=mysql_query("SELECT * from proposal where id_proposal=$id_proposal");
						$b=mysql_fetch_array($a);
						if ($b['status_proposal']=='Menunggu Konfirmasi') {
							$display='block';
							$display2='none';
						} else {
							$display='none';
							$display2='block';
						}
					?>

						<form id="contactForm" method="post" enctype="multipart/form-data" action="proses_memberpage.php">
							<fieldset>
								<div class="col-md-5 wl-right-col">
									<div class="wl-overflow wl-relative hover-sibling-2">
										<img src="images/proposal.jpg" alt="p6.jpg">
									</div>
									<div class="wl-standard-margin hover-sibling-1" style="display:<?php echo $display ?>">
										<h5>ganti proposal dalam format *.pdf</h5>
										<p class="wl-regular-text">
											<input  type="file" name="file_pdf" class="form-poshytip" />
										</p>
									</div>
									<div class="wl-standard-margin hover-sibling-1" style="display:<?php echo $display2 ?>">
										<h5>Status - <strong><?php echo $b['status_proposal'] ?></strong></h5>
										<p class="wl-regular-text">
											<a href="http://localhost/skripsi_abas/admin-web/gambar_pesanan/proposal/<?php echo $b['file_proposal'] ?>" class="btn btn-info" target="_blank">lihat proposal</a>
										</p>
									</div>
								</div>
								<div class="col-md-5 wl-rightfeature-boxes" style="width: 66%">
									<label for="username"><h5>Nama Kegiatan</h5></label><br>
									<input name="nama_proposal"  id="name" value="<?php echo $b['nama_proposal']; ?>" type="text" class="col-md-11" />
									<br>
									<label for="nama_lengkap"><h5>Keterangan Proposal</h5></label><br>
									<textarea name="keterangan_proposal"  id="remarks" type="text" style="margin-bottom: 10px; height: 140px; width: 90%;" onClick="javascript:removeTextAreaWhiteSpace(this)";><?php echo $b['keterangan_proposal'];?>
									</textarea>
									<input type="hidden" name="idi" value="<?php echo $b['id_proposal']; ?>">
									<button type="submit" class="btn btn-primary col-md-11"  name="update_proposal" style="display:<?php echo $display ?>">Update Proposal</button>
									<br><br><br>
								</div>
							</fieldset>
							<div style="width: 100%; margin-top: 5px; padding-top: 5px; border-top: 2px solid; display: <?php echo $display2 ?>">
								<p>
									<?php echo $b['keterangan_admin'] ?>
								</p>
							</div>
						</form>
					<?php } ?>
				</div>
				<div class="off" style="width: 100%" id="history_isi">
					<h3>Data Pengajuan proposal</h3>
					<table class="table table-bordered table-keranjang" border="2" >
						<tr class="cus_table_header" align="center">
							<td>no</td>
							<td>nama proposal</td>
							<td>tanggal upload</td>
							<td>keterangan</td>
							<td>status proposal</td>
							<td>kelola</td>
						</tr>
						<?php
						$i=1; 
						while ($r=mysql_fetch_array($p)) {	
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $r['nama_proposal']; ?></td>
							<td><?php echo $r['tanggal_proposal']; ?></td>
							<td><?php echo $r['keterangan_proposal']; ?></td>
							<td><?php echo $r['status_proposal']; ?></td>
							<td>
								<small>
		                            <a class='btn btn-info' href="index.php?menu=pengajuan_proposal&id=<?php echo $r['id_proposal'] ?>">Lihat Detail</a>
	                            </small>
	                            <?php echo "
	                            <small>
	                                <a class='btn btn-warning' href=\"javascript: delet_proposal('".$r['id_proposal']."','".$r['nama_proposal']."','".$r['tanggal_proposal']."','".$r['file_proposal']."')\">Delete
	                                </a>
	                            </small>
	                            "
	                            ?>
	                        </td>
						</tr>
						<?php
						$i++; 
						}
						?>
					</table>
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
<script type="text/javascript">
	function keranjang(){
		$("#keranjang").addClass("cus_active");
		$("#keranjang_a").addClass("cus_a_active");
		$("#keranjang_isi").addClass("on");
		$("#keranjang_isi").removeClass("off");
		$("#history").removeClass("cus_active");
		$("#history_a").removeClass("cus_a_active");
		$("#history_a").addClass("cus_a");
		$("#history_isi").removeClass("on");
		$("#history_isi").addClass("off");
	}
	function history(){
		$("#keranjang").removeClass("cus_active");
		$("#keranjang_a").removeClass("cus_a_active");
		$("#keranjang_a").addClass("cus_a");
		$("#keranjang_isi").removeClass("on");
		$("#keranjang_isi").addClass("off");
		$("#history").addClass("cus_active");
		$("#history_a").addClass("cus_a_active");
		$("#history_isi").addClass("on");
		$("#history_isi").removeClass("off");
	}
	function delet_proposal(id,nama,tanggal,file){
        tanya = confirm("Apakah anda yakin menghapus proposal\njudul proposal : "+nama+"\ntanggal upload: "+tanggal );
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapusproposal&id="+id+"&file="+file ;
        }
    }
</script>
<?php 
if (isset($_POST['update_proposal'])){
	$nama_kegiatan = $_POST('nama_proposal');
	$keterangan_proposal = $_POST('keterangan_proposal');
	$Update=mysql_query("UPDATE proposal SET 
		nama_kegiatan=$nama_kegiatan,  
		keterangan_proposal=$keterangan 
		WHERE id_proposal=$id_proposal  
	");
}
?>