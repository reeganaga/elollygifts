<?php
include "rupiah.php";
include "koneksi.php";
$id=$_GET['id'];
$lihat_order=mysql_query("SELECT * from konfirmasi_bayar inner join pelanggan on konfirmasi_bayar.id_pelanggan=pelanggan.id_pelanggan where konfirmasi_bayar.id_konfirmasi='".$id."'" ) ;
$a=mysql_fetch_array($lihat_order);
$lihat_pesanan=mysql_query("SELECT * from pemesanan where id_konfirmasi='".$id."'");
$ongkir=mysql_query("SELECT * from pelanggan inner join kota on pelanggan.id_kota=kota.id_kota where pelanggan.id_pelanggan='".$a['id_pelanggan']."'");
$ong=mysql_fetch_array($ongkir);

//proses update status
if (isset($_POST['konfirmasi_bayar'])) {
    $status=$_POST['status'];
    $id_konfirmasi=$_POST['id_konfirmasi'];
    $update=mysql_query("update konfirmasi_bayar set status_pembayaran='$status' where id_konfirmasi='$id_konfirmasi'");
    $go="";
    if ($status=="diterima") {
      $pes=mysql_query("SELECT * from pemesanan where id_konfirmasi='$id_konfirmasi'");
      while ($input=mysql_fetch_array($pes)) {
        $go=mysql_query("UPDATE pemesanan set status_pemesanan='dalam proses' where id_pemesanan='".$input['id_pemesanan']."'");
      }
    }
    if ($go) {
        echo "<script> alert ('status pembayaran telah diperbarui'); window.location='index.php?module=detail_pembayaran&id=".$id_konfirmasi."'; </script>"; 
       
    } 
    // if ($go) {
    //   echo "<script> alert ('status pembayaran telah diperbarui'); window.location='index.php?module=detail_pembayaran&id=".$id_konfirmasi."'; </script>"; 
    // }
    //echo "<script> alert ('status dapat diubah'); window.location='media.php?module=datapembayaran'; </script>";
} 
?>
<div class="content container">
        <h2 class="page-title"> Detail Pembayaran</h2>
        <a href="index.php?module=datapembayaran" class="btn btn-warning">kembali</a>
        <br><br>
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Data Pembayaran</span></h4>
            </header>
            <div class="body">
                <div class="mt">
                  <form role="form" action="index.php?module=detail_pembayaran&id=<?php echo $id ?>" method="post">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                          <td colspan="2">
                            <img width="300px" src="konfirmasi_bayar/<?php echo $a['bukti_pebayaran'] ?>">
                          </td>
                          <td colspan="3" style="font-size: 20px;">
                            <b>Pembayaran</b><br>
                            bank : <?php echo $a['bank'];?><br>
                            nama : <?php echo $a['nama_rekening'];?><br>
                            jumlah bayar : Rp <?php echo number_format($a['Jumlah_bayar'],"2",",",".");?><br>
                            ongkir : Rp <?php echo number_format($ong['ongkir'],"2",",",".");?><br>
                            tanggal konfirmasi : <?php echo $a['tanggal_konfirmasi'];?><br>
                            status pembayaran : 
                            <input type="hidden" name="id_konfirmasi" value="<?php echo $a['id_konfirmasi'] ?>">
                            <select class="form-control" id="sel1" name="status" style="width: 190px;">
                              <option <?php if ($a['status_pembayaran'] == 'menunggu konfirmasi') echo "selected"; ?> value="menunggu konfirmasi" >menunggu Konfirmasi</option>
                              <option <?php if ($a['status_pembayaran'] == 'diterima') echo "selected"; ?> value="diterima" >diterima</option>
                              <option <?php if ($a['status_pembayaran'] == 'ditolak') echo "selected"; ?> value="ditolak" >ditolak</option>
                            </select>
                            <br>
                            <small>
                                <button name="konfirmasi_bayar" class='btn btn-info' >konfirmasi pembayaran</button>
                            </small>
                          </td>
                        </tr>
                        <tr style="background-color: black;">
                            <th>no</th>
                            <th class="hidden-xs">Pemesan</th>
                            <th width="350px">tanggal</th>
                            <th class="hidden-xs">status</th>
                            <th class="hidden-xs">harga</th>
                            <th class="hidden-xs">kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        while ($q=mysql_fetch_array($lihat_pesanan)) {
                          // $a=mysql_query("SELECT * from kota where id_kota=$r[id_kota]");
                          // $q=mysql_fetch_array($lihat_pesanan);
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
                          // $total=number_format($r['Jumlah_bayar'],"0",",",".");
                          $total=number_format($harga2,"2",",",".");
                        echo"<tr>
                            <td>$no</td>
                            <td style='width:350px'><span class='fw-semi-bold'>$pesanan - $jenis </span></td>
                            <td class='hidden-xs' style='width:100px'>
                            $q[tanggal_pemesanan]   
                            </td>
                            <td class='hidden-xs' style='width:150px'>
                            $q[status_pemesanan]   
                            </td>
                            <td class='hidden-xs' style='width:150px'>Rp $total</td>
                            <td class='hidden-xs'style='width:150px'>
                              <small>
                                  <a class='btn btn-info' href='index.php?module=detail_pemesanan&l=detail_pembayaran&id=$q[id_pemesanan]'>Lihat Detail</a>
                              </small>
                            </td>
                        </tr>";
                        $no++;


                        ?>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                  </form>
            </div>
        </section>
        </div>