<?php
if (isset($_SESSION['id_user'])) {
	$id_user=$_SESSION['id_user'] ;
	$pemesanan=mysql_query("SELECT * from pemesanan where id_pelanggan=$id_user");
	$proses=mysql_query("SELECT * from pelanggan inner join kota on pelanggan.id_kota = kota.id_kota where pelanggan.id_pelanggan=$id_user");
	$bayar=mysql_query("SELECT * from konfirmasi_bayar where id_pelanggan= $id_user");
	// $produk=mysql_query("select * from pemesana");
	// $r=mysql_fetch_array($lihat);
}
?>
<style type="text/css">
	.cus_row{
		padding: 30px;
	    border-radius: 20px;
	    background-color: #eeeeee;
	}
	.cus_table_header {
		background-color: black;
	    color: white;
	}
	.cus_table_row {
		background-color: #9a9a9a;
	    color: red;
	}
	.fade {
		opacity: 1 !important;
	}
	.cus_input_margin_l{
		height: 27px;
		margin-left: 10px;
		width: 60%;
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
						<h1>Keranjang dan Data Pemesanan</h1>
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
					<a class="cus_a_active" id="keranjang_a" onclick="keranjang()" href="#">Keranjang</a>	
				</div>
				<div class="cus_tab" align="center" id="history" onclick="history()"> 
					<a class="cus_a" id="history_a" onclick="history()" href="#">history</a>	
				</div>
			</div>
			<div class="row cus_row" style="margin:10px; margin-top: 0px">
				<?php //echo dirname(__FILE__) ; ?>

				<!-- Keranjang pesanan start -->
				<div class="on" style="width: 100%" id="keranjang_isi">
					<h3>Keranjang Pesanan</h3>
					<table class="table table-bordered table-keranjang" border="2" >
						<tr class="cus_table_header" align="center">
							<td>no</td>
							<td>pemesanan</td>
							<td>tanggal</td>
							<td>kelola</td>
							<td>harga</td>
						</tr>
							<?php
							$i=1;
							$total_harga = 0;
							while ($r=mysql_fetch_array($pemesanan)){
							if ($r['id_konfirmasi'] == '0') { 

								if($r['id_motor'] > 0){
									$type=mysql_query("SELECT * from motor INNER JOIN category on motor.id_category=category.id_category where motor.id_motor=$r[id_motor]");
			                        $x=mysql_fetch_array($type);
			                        $pesanan="Decals Motor";
			                        $jenis=$x['nama_motor'];
			                        $harga=$x['harga'];
			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_decals_motor&id=";
			                    } else if ($r['id_laptop'] > 0) {
			                    	$type=mysql_query("SELECT * from laptop INNER JOIN category on laptop.id_category=category.id_category where laptop.id_laptop=$r[id_laptop]");
			                        $x=mysql_fetch_array($type);
			                        $pesanan="Skin Laptop";
			                        $jenis=$x['nama_laptop'];
			                        $harga=$x['harga'];
			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_skin_laptop&id=";
			                    } else if ($r['id_hp'] > 0) {
			                    	$type=mysql_query("SELECT * from hp INNER JOIN category on hp.id_category=category.id_category where hp.id_hp=$r[id_hp]");
			                        $x=mysql_fetch_array($type);
			                        $pesanan="Skin Hp";
			                        $jenis=$x['nama_hp'];
			                        $harga=$x['harga'];
			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_skin_hp&id=";
			                    }else if ($r['id_kado'] > 0) {
			                    	$sql = "SELECT * from kado where kado.id_kado = {$r['id_kado']} ";
			                    	$sql_desain = "SELECT * from desain where desain.id_desain = {$r['id_desain']} ";
			                    	$type=mysql_query($sql);
			                    	$desain=mysql_query($sql_desain);

			                        $x=mysql_fetch_array($type);
			                        $data_desain = mysql_fetch_array($desain);

			                        $pesanan="Kado";
			                        $jenis=$x['nama_kado'];
			                        $harga=$x['harga'];
			                        $desain = $data_desain['nama'];
			                        $harga_desain = $data_desain['harga'];

			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_skin_hp&id=";
			                    } else { $pesanan="Pesanan Kosong"; $jenis="jenis kosong"; $harga="0";}
							?>
							<tr style="color: black">
								<td width="20px"><?php echo $i ?></td>
								<td><?php echo $o=$pesanan." - ".$jenis.' + '.$desain; ?></td>
								<td><?php echo $r['tanggal_pemesanan'] ?></td>
								<td width="200px">
									<small>
		                                <a class='btn btn-info' href="<?php echo $link.$r['id_pemesanan'] ?>">Lihat Detail</a>
		                            </small>
		                           <?php echo "
		                           <small>
		                                <a class='btn btn-warning' href=\"javascript: delet('".$r['id_pemesanan']."','".$o."','".$r['tanggal_pemesanan']."')\">Delete</a>
		                            </small>
		                           ";
		                           ?>
								</td>
								<td align="right">Rp <?php echo number_format($harga,"2",",",".").' + '.number_format($harga_desain,"2",",",".") ; $total_harga=$total_harga+($harga+$harga_desain); ?></td>
							</tr>
							<?php
							$i++;
							} else {}  
							} ?>
						<tr class="cus_table_row">
							<td colspan="4" align="right"><strong>Total</strong></td>
							<td align="right"><strong>Rp <?php echo number_format($total_harga,"2",",","."); ?></strong></td>
						</tr>
					</table>
					<div style="width: 100% " align="right">
						<button class="btn btn-primary" data-target="#myModal" onclick="proses_pembayaran()">Proses Pembayaran</button>
					</div>
				</div>
				<!-- keranjang pesanan end -->
				
				<!-- <div style="width: 100%; height: 1px; background-color: black; margin-top: 20px; margin-bottom: 20px;"></div> -->

				<!-- Data Pemesanan -->
				<div class="off" style="width: 100%" id="history_isi">
					<h3>Pesanan</h3>
					<?php 
					while ($a=mysql_fetch_array($bayar) ) {
						$pemesanan2=mysql_query("SELECT * from pemesanan where id_konfirmasi='".$a['id_konfirmasi']."'");
						
					?>
					
					<table class="table table-bordered table-keranjang" border="2" >
						<tr>
							<td colspan="6">
								<div style="float: left; width: 100px">
									<img src="admin-web/konfirmasi_bayar/<?php echo $a['bukti_pebayaran'] ?>">
								</div>
								<div style="margin-left: 10px; float: left">
									<b>Pembayaran</b><br>
									bank : <?php echo $a['bank'];?><br>
									nama : <?php echo $a['nama_rekening'];?><br>
									jumlah bayar : Rp <?php echo number_format($a['Jumlah_bayar'],"2",",",".");?><br>
									tanggal konfirmasi : <?php echo $a['tanggal_konfirmasi'];?><br>
									status pembayaran : <?php echo $a['status_pembayaran']; ?><br>
								</div>
							</td>
						</tr>
						<tr class="cus_table_header" align="center">
							<td>no</td>
							<td>pemesanan</td>
							<td>tanggal</td>
							<td>kelola</td>
							<td>status</td>
							<td>harga</td>
						</tr>
							<?php
							$i=1; 
							while ($q=mysql_fetch_array($pemesanan2)){
								if($q['id_motor'] > 0){
									$tipe=mysql_query("SELECT * from motor INNER JOIN category on motor.id_category=category.id_category where motor.id_motor=$q[id_motor]");
			                        $n=mysql_fetch_array($tipe);
			                        $pesanan="Decals Motor";
			                        $jenis=$n['nama_motor'];
			                        $harga2=$n['harga'];
			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_decals_motor&id=";
			                    } else if ($q['id_laptop'] > 0) {
			                    	$tipe=mysql_query("SELECT * from laptop INNER JOIN category on laptop.id_category=category.id_category where laptop.id_laptop=$q[id_laptop]");
			                        $n=mysql_fetch_array($tipe);
			                        $pesanan="Skin Laptop";
			                        $jenis=$n['nama_laptop'];
			                        $harga2=$n['harga'];
			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_skin_laptop&id=";
			                    } else if ($q['id_hp'] > 0) {
			                    	$tipe=mysql_query("SELECT * from hp INNER JOIN category on hp.id_category=category.id_category where hp.id_hp=$q[id_hp]");
			                        $n=mysql_fetch_array($tipe);
			                        $pesanan="Skin Hp";
			                        $jenis=$n['nama_hp'];
			                        $harga2=$n['harga'];
			                        $link="http://localhost/skripsi_abas/index.php?menu=pesan_skin_hp&id=";
			                    } else { $pesanan="Pesanan Kosong"; $jenis="jenis kosong"; $harga="0";}
							?>
						<tr style="color: black">
							<td width="20px"><?php echo $i ?></td>
							<td><?php echo $pesanan." - ".$jenis ?></td>
							<td><?php echo $q['tanggal_pemesanan'] ?></td>
							<td width="120px">
								<small>
	                                <a class='btn btn-info' href="<?php echo $link.$q['id_pemesanan'] ?>">Lihat Detail</a>
	                            </small>
							</td>
							<td><?php echo $q['status_pemesanan'] ?></td>
							<td align="right">Rp <?php echo number_format($harga2,"2",",","."); ?></td>
						</tr>
						<?php } ?>
					</table>
					<br>
					<?php 
					}
					?>
				</div>
				<!-- Data Pemesanan End -->
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
	<!-- dialog pembayaran -->

	<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style="display: none;">
		<?php 
		$p = mysql_fetch_array($proses);
		$ongk = $p['ongkir'];
		$total = $total_harga + $ongk;
		?>
	    <div class='modal-dialog' style="margin-top: 150px;">
	        <div class='modal-content'>
				<form name="prose_bayar" action="proses_memberpage.php" method="post" enctype="multipart/form-data">
		            <div class='modal-header'>
		                <button type='button' class='close' data-dismiss='modal' aria-hidden='true' onclick="close_proses_pembayaran()">×</button>
		                <h4 class='modal-title'>Proses pembayaran</h4>
		            </div>
		            <div class='modal-body'>
		            	<table class="table table-bordered table-keranjang" border="2">
		            		<tr class="cus_table_header" align="center">
		            			<td>Harga Pemesan</td><td>Ongkir</td><td>Total Bayar</td>
		            		</tr>
		            		<tr align="right">
		            			<td>Rp <?php echo number_format($total_harga,"2",",","."); ?></td>
		            			<td>Rp <?php echo number_format($ongk,"2",",","."); ?></td>
		            			<td>Rp <?php echo number_format($total,"2",",","."); ?></td>
		            		</tr>
		            	</table>
		            	<input type="hidden" name="jumlah_bayar" value="<?php echo $total; ?>">
		                <!-- <h5>harga pesanan</h5>
		                <p style="margin-left: 10px;">Rp <?php echo number_format($total_harga,"2",",","."); ?></p>
		                <h5>ongkir</h5>
		                <p style="margin-left: 10px;">Rp </p> -->
		                <h5>Transfer dari bank</h5>
		                <input type="text" name="bank" class="cus_input_margin_l">
		                <h5>Pengiriman atas nama</h5>
		                <input type="text" name="nama_rekening" class="cus_input_margin_l">
		                <h5>Tanggal transfer</h5>
		                <input type="date" name="tanggal_konfirmasi" class="cus_input_margin_l">
		                <h5>Bukti pembayaran</h5>
		                <p style="margin-left: 10px;">
							<input  type="file" name="gambar" class="form-poshytip" />
		                </p>					
		            </div>
		            <div class='modal-footer'>
		            	<button type='button' class='btn btn-default' data-dismiss='modal' onclick="close_proses_pembayaran()">Close</button>
		              	<button type='submit' name='prose_bayar' class='btn btn-primary'>Proses</button>
		          	</div>
		        </form>
	            <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	    </div>
	</div>

	<!-- dialog pembayaran end -->
</section>
<script type="text/javascript">
	function proses_pembayaran(){
		$("#myModal").slideDown(700);
	}
	function close_proses_pembayaran(){
		$("#myModal").fadeOut(200);
	}
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
	function delet(id_pemesanan,pesan,tanggal){
        tanya = confirm("Apakah anda yakin menghapus pesanan :\npesanan : "+pesan+"\ntanggal : "+tanggal);
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuspesanan&id="+id_pemesanan;
        }
    }
</script>