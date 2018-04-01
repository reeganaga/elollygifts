<?php
include "koneksi.php";
$sql="SELECT * from pemesanan inner join pelanggan on pemesanan.id_pelanggan = pelanggan.id_pelanggan"; 
$lihat_pesan=mysql_query($sql) ;
$lihat_order=mysql_query("select * from pemesanan, pelanggan where pemesanan.id_pelanggan=pelanggan.id_pelanggan" ) ;
if (isset($_POST['update_status'])) {
    $status=$_POST['status'];
    $pesan_admin=$_POST['pesan_admin'];
    $id_pemesanan=$_POST['id_pemesanan'];
    mysql_query("update pemesanan set status_pemesanan='$status', pesan_admin='$pesan_admin' where id_pemesanan=$id_pemesanan");
    //echo "<script> alert ('status dapat diubah'); window.location='media.php?module=datapembayaran'; </script>";
}
?>
<!-- ====================================lihat detail===================================== -->
<?php
//pop up modul
//perulangan buat pop up modul
$x = [];
while ($r=mysql_fetch_array($lihat_order)) $x[] = $r;
foreach ($x as $r){
  $gambar=$r['gambar_1']; 
  if($r['id_motor'] > 0){
        $l_motor=mysql_query("SELECT * from motor where id_motor='".$r['id_motor']."'");
        $jenis=mysql_fetch_array($l_motor);
        $tipe=$jenis['nama_motor'];
        $pesanan="Decals Motor";
        $div="gambar_pesanan/decals/";
        $divdownload="http://localhost/skripsi_abas/gambar_pesanan/decals/";
    } else if ($r['id_laptop'] > 0) {
        $l_laptop=mysql_query("SELECT * from laptop where id_laptop='".$r['id_laptop']."'");
        $jenis=mysql_fetch_array($l_laptop);
        $tipe=$jenis['nama_laptop'];
        $pesanan="Skin Laptop";
        $div="gambar_pesanan/laptop/";
        $divdownload="http://localhost/skripsi_abas/gambar_pesanan/laptop/";
    } else if ($r['id_hp'] > 0) {
        $l_hp=mysql_query("SELECT * from hp where id_hp='".$r['id_hp']."'");
        $jenis=mysql_fetch_array($l_hp);
        $tipe=$jenis['nama_hp'];
        $pesanan="Skin Hp";
        $div="gambar_pesanan/hp/";
        $divdownload="http://localhost/skripsi_abas/gambar_pesanan/hp/";
    } else { $pesanan="Pesanan Kosong"; }
?>
<div id='myModal<?php echo $r['id_pemesanan']; ?>' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                <h4 class='modal-title' id='myModalLabel'>Detail Pembayaran <?php echo "$r[nama]"; ?> </h4>
            </div>
            <div class='modal-body'>
                <h4>Detail Pemesanan</h4>
                <p>
                    <?php 
                        echo "$r[nama]";
                    ?>
                </p>

                <h4>Rubah Status Pesanan</h4>
               <form role="form" action="index.php?module=datapemesanan" method="post">
                  <p>
                    <input type="hidden" name="id_pemesanan" value="<?php echo $r['id_pemesanan']; ?>">
                    <div class="form-group">
                      <?php 
                      $val=mysql_query("SELECT * from konfirmasi_bayar where id_konfirmasi='".$r['id_konfirmasi']."'");
                      $vali=mysql_fetch_array($val);
                      if ($r['id_konfirmasi']=='0' || $vali['status_pembayaran']=='menunggu konfirmasi') { ?>
                          <p> Pesanan dalam proses Konfirmasi </p>
                          <input type="hidden" name="status" value="">
                        <?php } else { ?>

                        <select class="form-control" id="sel1" name="status">
                            <option <?php if ($r['status_pemesanan'] == 'dalam proses') echo "selected"; ?> value="dalam proses" >dalam proses</option>
                            <option <?php if ($r['status_pemesanan'] == 'gambar dikonfirmasi') echo "selected"; ?> value="gambar dikonfirmasi" >gambar dikonfirmasi</option>
                            <option <?php if ($r['status_pemesanan'] == 'dicetak') echo "selected"; ?> value="dicetak" >dicetak</option>
                            <option <?php if ($r['status_pemesanan'] == 'selesai') echo "selected"; ?> value="selesai" >selesai</option>
                        </select>
                        <!-- <h4>Resi Pengiriman(saat status pengiriman)</h4>
                        <input type="text" name="no_resi" value=" no_resi "> -->
                        <?php } ?>
                    </div>
                
                  </p>
                  <table class="table table-bordered table-keranjang" border="2">
                    <thead>
                      <tr><h4>Pemesanan Produk</h4> </tr>
                      <tr>
                        <th>Tipe</th>
                        <th width="auto">Tanggal Pesan</th>
                        <th>Deskripsi Pemesanan</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $pesanan." - ".$tipe ?></td>
                        <td><?php echo "$r[tanggal_pemesanan]" ?></td>
                        <td><?php echo "$r[deskripsi_pemesanan]" ?></td>                        
                      </tr>
                    </tbody>
                  </table>

                  <!-- menampilkan data konfirmasi -->
                  <div style="width: 100%; height: 230px">
                    <div style="float: left;">
                      Gambar Referensi
                      <br><IMG SRC="<?php echo $div.$gambar ?>" width='200px' height='150px'><br><br>
                      <a href="<?php echo $divdownload.$gambar ?>" target="_blank" class="btn btn-primary"> Download Gambar </a>
                    </div>
                    <div style="width: 60%; float: right;">
                      Informasi untuk pelanggan<br>
                      <textarea id="email" name="pesan_admin" style="width: 100%; height: 199px;" onClick="javascript:removeTextAreaWhiteSpace(this)"><?php $isi ="$r[pesan_admin]"; echo "$isi"?>
                      </textarea>
                    </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                      <button type='submit' name='update_status' class='btn btn-primary'>Save changes</button>
                  </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
<!-- ====================================lihat detail end================================== -->
<?php
 }
?>
<div class="content container">
  <h2 class="page-title"> Seluruh Pemesanan</h2>

  <section class="widget">
      <header>
          <h4>Tabel <span class="fw-semi-bold">Data Pemesanan</span></h4>
          <div class="widget-controls">
              <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
              <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
              <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
          </div>
      </header>
      <div class="body">
          <div class="mt">
              <table id="datatable-table" class="table table-striped table-hover" >
                  <thead>
                    <tr>
                        <tr>
                        <th width="50px">#</th>
                        <th class="hidden-xs">nama pemesan</th>
                        
                        <th width="200px">pemesanan</th>
                        <th class="hidden-xs">tanggal</th>
                        
                        <th class="hidden-xs" width="200px">kelola</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    while ($r=mysql_fetch_array($lihat_pesan)){
                    if($r['id_motor'] > 0){
                        $pesanan="Decals Motor";
                    } else if ($r['id_laptop'] > 0) {
                        $pesanan="Skin Laptop";
                    } else if ($r['id_hp'] > 0) {
                        $pesanan="Skin Hp";
                    } else { $pesanan="Pesanan Kosong"; }
                    echo"<tr>

                        <td>$r[id_pemesanan]</td>
                        <td><span class='fw-semi-bold'>$r[nama]</span></td>
                        
                        <td><span class='fw-semi-bold'>$pesanan</span></td>
                        <td><span class='fw-semi-bold'>$r[tanggal_pemesanan]</span></td>
                        
                        <td><span class='fw-semi-bold'>
                            <small>
                                <a type='button' class='btn btn-info' href='index.php?module=detail_pemesanan&l=datapemesanan&id=$r[id_pemesanan]'>Lihat Detail</a>
                            </small>
                            <small>
                                <a class='btn btn-warning' href=\"javascript: delet('".$r['id_pemesanan']."','".$r['nama']."','".$pesanan."','".$r['tanggal_pemesanan']."')\">Delete</a>
                            </small>
                        </span></td>
                       
                    </tr>";
                    $no++;
                    }
                    ?>
                  </tbody>
              </table>


      </div>
  </section>
</div>