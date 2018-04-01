<?php
include "koneksi.php";
if (isset($_SESSION['tipe'])) {
if ($_SESSION['nama']=="" or $_SESSION['alamat']=="" or $_SESSION['no_hp']=="" or $_SESSION['foto']=="") {
	echo "<script>alert('Isi Data Profil Terlebih Dahulu'); window.location='index.php?menu=editprofil';</script>";
}else{
	if (isset($_GET['id'])) {
		$id=$_GET['id'];	
	}else{
		$id=0;
	}
$id_user=$_SESSION['id_user'] ;
$id_testimoni=$_GET['id'];
$lihat=mysql_query("SELECT * FROM testimoni where id_testimoni=$id");
$q=mysql_query("SELECT * FROM testimoni where id_pelanggan=$id_user");
$r=mysql_fetch_array($lihat);
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
						<h1>Kirim Testimoni</h1>
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
					<a class="cus_a_active" id="keranjang_a" onclick="keranjang()" href="#">komentar</a>	
				</div>
				<div class="cus_tab" align="center" id="history" onclick="history()"> 
					<a class="cus_a" id="history_a" onclick="history()" href="#">history</a>	
				</div>
			</div>
			<div class="row cus_row" style="margin:10px; margin-top: 0px;">
				<div class="on" style="width: 100%" id="keranjang_isi">
					<div class="col-md-5 wl-right-col" style="background-color: black;">
						<div class="wl-overflow wl-relative hover-sibling-2">
							<div class="wl-section-heading">
								<h2 class="wl-margin-topaligned"><font color="white"><br>Kirim<br>Pesan, kritik<br>dan saranmu<br>:)</font></h2>
								<br><br>
							</div>
						</div>
					</div>

					<?php if ($id_testimoni==0) { ?>

					<div>
						<form id="contactForm" action="prosestestimonial.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<p style="margin-bottom:10px; margin-left:10px;">
									<label for="judul_testimoni">Judul Testimonial</label><br>
									<input value="<?php echo $r['judul_testimoni'];?>" name="judul_testimoni"  id="name" type="text" class="col-md-11" />
									<br>
								</p>
								<p style="margin:10px">
									<label for="isi_testimonial">Isi Testimonial</label><br>
									<textarea name="isi_testimoni"  id="email" type="text" style="margin-bottom: 10px; height: 140px; width: 90%;"><?php echo $r['isi_testimonial'];?>
									</textarea>
									<button type="submit" class="btn btn-primary col-md-11"  name="prosestestimonial">kirim testimoni</button>
									<br><br><br>
								</p>
							</fieldset>
						</form>
					</div>
					<?php } else {
					$a=mysql_query("SELECT * FROM testimoni where id_testimoni='".$id_testimoni."'");
					$b=mysql_fetch_array($a);
					?>
					<div>
						<form id="contactForm" action="prosestestimonial.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<p style="margin-bottom:10px; margin-left:10px;">
									<label for="judul_testimoni">Judul Testimonial</label><br>
									<input value="<?php echo $b['judul_testimoni'];?>" name="judul_testimoni"  id="name" type="text" class="col-md-11" />
									<input type="hidden" name="id" value="<?php echo $b['id_testimoni']; ?>">
									<br>
								</p>
								<p style="margin:10px">
									<label for="isi_testimonial">Isi Testimonial</label><br>
									<textarea name="isi_testimoni"  id="email" type="text" style="margin-bottom: 10px; height: 140px; width: 90%;"><?php echo $b['isi_testimoni'];?>
									</textarea>
									<br><button type="submit" class="btn btn-warning col-md-11" value="Update" name="update_testimonial">Update</button>
									<br><br><br>
								</p>
							</fieldset>
						</form>
					</div>
					<?php }?>
				</div>
				<div class="off" style="width: 100%" id="history_isi">
					<h3>Data testimoni</h3>
					<table class="table table-bordered table-keranjang" border="2" >
						<tr class="cus_table_header" align="center">
							<td>no</td>
							<td>Judul Testimoni</td>
							<td>tanggal testimoni</td>
							<td>isi testimoni</td>
							<td>kelola</td>
						</tr>
						<?php
						$i=1; 
						while ($n=mysql_fetch_array($q)) {	
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $n['judul_testimoni']; ?></td>
							<td><?php echo $n['tanggal_testimoni']; ?></td>
							<td><?php echo $n['isi_testimoni']; ?></td>
							<td>
								<small>
		                            <a class='btn btn-info' href="<?php echo "http://localhost/skripsi_abas/index.php?menu=testimoni&id=".$n['id_testimoni'] ?>">edit pesan</a>
	                            </small>
	                            <small>
	                            	<?php echo "
	                                <a class='btn btn-warning' href=\"javascript: delet_testimoni('".$n['id_testimoni']."','".$n['judul_testimoni']."','".$n['isi_testimoni']."')\">Hapus</a>
	                                "
	                                ?>
	                            </small>
	                        </td>
						</tr>
                        <?php 
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
<?php } ?>
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
</script>
<script type="text/javascript">
	function delet_testimoni(id_testimoni,testi,isi_testimoni){
        tanya = confirm("Apakah anda yakin menghapus testimoni\njudul : "+testi+"\nisi testimoni : \n"+isi_testimoni );
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapustestimoni&id="+id_testimoni ;
        }
    }
</script>
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