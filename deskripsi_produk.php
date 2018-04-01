<?php 
$motor=mysql_query("SELECT * FROM motor inner join category on motor.id_category=category.id_category");
$laptop=mysql_query("SELECT * FROM laptop inner join category on laptop.id_category=category.id_category");
$hp=mysql_query("SELECT * FROM hp inner join category on hp.id_category=category.id_category");
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
</style>
<section>
	<!-- Home start -->
	<div class="wl-home-style3  wl-paralax wl-home-bg3">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items-contents wl-home-items3 wl-section-marginboth">
					<div class="wl-home-heading">
						<h1>Daftar Harga</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">
		<!-- Daftar harga start -->
		<div class="container">
			<div class="row cus_row" style="margin: 10px;">
				<h3>Daftar Harga Decals Motor</h3>
				<table class="table table-bordered table-keranjang" border="2" >
					<tr class="cus_table_header" align="center">
						<td>no</td>
						<td>nama motor</td>
						<td>kategori</td>
						<td>harga</td>
					</tr>
					<?php 
					$i=1;
					while ($a=mysql_fetch_array($motor)) {
					?>
					<tr style="color: black" align="center">
						<td><?php echo $i ?></td>
						<td><?php echo $a['nama_motor'] ?></td>
						<td><?php echo $a['nama_category']." - ".$a['size']; ?></td>
						<td>Rp <?php echo number_format($a['harga'],"2",",",".") ?></td>
					</tr>
					<?php $i++;} ?>
				</table>
				<br><br>
				<h3>Daftar Harga skin laptop</h3>
				<table class="table table-bordered table-keranjang" border="2" >
					<tr class="cus_table_header" align="center">
						<td>no</td>
						<td>Jenis laptop</td>
						<td>kategori</td>
						<td>harga</td>
					</tr>
					<?php 
					$i=1;
					while ($b=mysql_fetch_array($laptop)) {
					?>
					<tr style="color: black" align="center">
						<td><?php echo $i ?></td>
						<td><?php echo $b['nama_laptop'] ?></td>
						<td><?php echo $b['nama_category']." - ".$b['size']; ?></td>
						<td>Rp <?php echo number_format($b['harga'],"2",",",".") ?></td>
					</tr>
					<?php $i++;} ?>
				</table>
				<br><br>
				<h3>Daftar Harga garskin</h3>
				<table class="table table-bordered table-keranjang" border="2" >
					<tr class="cus_table_header" align="center">
						<td>no</td>
						<td>nama gadget</td>
						<td>kategori</td>
						<td>harga</td>
					</tr>
					<?php 
					$i=1;
					while ($c=mysql_fetch_array($hp)) {
					?>
					<tr style="color: black" align="center">
						<td><?php echo $i ?></td>
						<td><?php echo $c['nama_hp'] ?></td>
						<td><?php echo $c['nama_category']." - ".$c['size']; ?></td>
						<td>Rp <?php echo number_format($c['harga'],"2",",",".") ?></td>
					</tr>
					<?php $i++;} ?>
				</table>
			</div>
		</div>
		<!-- Daftar harga end -->
		<div class="wl-sort-link text-center wl-section-marginbottom">
			<div class="wl-link-to">
			</div>
		</div>
	</div>
	<!-- Main content end -->
</section>