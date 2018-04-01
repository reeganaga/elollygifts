<?php
include "rupiah.php";
include "koneksi.php";
$id=$_GET['id'];
$link=$_GET['l'];
$lihat_pesanan=mysql_query("SELECT * from pemesanan where id_pemesanan='".$id."'");
$r=mysql_fetch_array($lihat_pesanan);

$gambar1=$r['gambar_1'];
if ($r['gambar_2']=='') {
  $gambar2="ads-default.jpg"; 
} else {
  $gambar2=$r['gambar_2']; 
}
  if($r['id_motor'] > 0){
        $l_motor=mysql_query("SELECT * from motor where id_motor='".$r['id_motor']."'");
        $jenis=mysql_fetch_array($l_motor);
        $tipe=$jenis['nama_motor'];
        $pesanan="Decals Motor";
        $div="gambar_pesanan/decals/";
        $divdownload="http://localhost/skripsi_abas/admin-web/gambar_pesanan/decals/";
    } else if ($r['id_laptop'] > 0) {
        $l_laptop=mysql_query("SELECT * from laptop where id_laptop='".$r['id_laptop']."'");
        $jenis=mysql_fetch_array($l_laptop);
        $tipe=$jenis['nama_laptop'];
        $pesanan="Skin Laptop";
        $div="gambar_pesanan/laptop/";
        $divdownload="http://localhost/skripsi_abas/admin-web/gambar_pesanan/laptop/";
    } else if ($r['id_hp'] > 0) {
        $l_hp=mysql_query("SELECT * from hp where id_hp='".$r['id_hp']."'");
        $jenis=mysql_fetch_array($l_hp);
        $tipe=$jenis['nama_hp'];
        $pesanan="Skin Hp";
        $div="gambar_pesanan/hp/";
        $divdownload="http://localhost/skripsi_abas/admin-web/gambar_pesanan/hp/";
    } else { $pesanan="Pesanan Kosong"; }

//fungsi update pemesanan----------------------------------------------------
    if (isset($_POST['update_status'])) {
        $status=$_POST['status'];
        $pesan_admin=$_POST['pesan_admin'];
        $id_pemesanan=$_POST['id_pemesanan'];
        // mysql_query("update pemesanan set status_pemesanan='$status', pesan_admin='$pesan_admin' where id_pemesanan=$id_pemesanan");
        $jeneng=$_FILES['gambar']['name'];
        $gambar="konfirmasi-".rand(1000,100000)."-".$jeneng;
        if ($jeneng==''){
          $query=mysql_query("update pemesanan set status_pemesanan='$status', pesan_admin='$pesan_admin' where id_pemesanan=$id_pemesanan");
          $update=mysql_query($query);
          echo "<script> alert('pesanan berhasil diperbarui'); window.location='index.php?module=detail_pemesanan&l=$link&id=$r[id_pemesanan]'; </script>";
          header("location:index.php?module=detail_pemesanan&l=$link&id=$r[id_pemesanan]");
        } else if(isset($_FILES['gambar'])) {
            $errors     = array();
            $maxsize    = 4097152;
            $acceptable = array(
                'image/jpeg',
                'image/jpg',
                'image/gif',
                'image/png'
            );

            if(($_FILES['gambar']['size'] >= $maxsize) || ($_FILES["gambar"]["size"] == 0)) {
                $errors[] = 'File terlalu besar, file harus kurang dari 4 MB.';
            
            }
              if(!in_array($_FILES['gambar']['type'], $acceptable) && (!empty($_FILES["gambar"]["type"]))) {
                  $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';

              }
              if(count($errors) === 0) {
                  move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar_pesanan/konfirmasi/'.$gambar);
              } else {
                  foreach($errors as $error) {
                      // echo '<script>alert("'.$error.'"); window.location="index.php?module=upload_gambar";</script>';
                  }

                  die(); //Ensure no more processing is done
              }
            $query=mysql_query("update pemesanan set status_pemesanan='$status', pesan_admin='$pesan_admin', gambar_2='$gambar' where id_pemesanan=$id_pemesanan");
            $upload_gambar=mysql_query($query);

            if ($upload_gambar) {
                echo "<script> alert('pesanan berhasil diperbarui'); window.location='index.php?module=detail_pemesanan&l=$link&id=$r[id_pemesanan]'; </script>";
                header("index.php?module=detail_pemesanan&l=$link&id=$r[id_pemesanan]");
                // echo '<script>alert("foto berhasil disimpan min"); window.location="index.php?module=daftarfoto";</script>';
            }
        } else {
            
        }
    }
?>

<div class="content container">
        <h2 class="page-title"> Detail Pemesanan</h2>
        <a href="index.php?module=<?php echo $link."&id=".$r['id_konfirmasi'] ?>" class="btn btn-warning">kembali</a>
        <br><br>
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Data Pemesanan</span></h4>
            </header>
            <div class="body">
                <div class="mt">
                  <form id="fileupload" action="index.php?module=detail_pemesanan&l=<?php echo $link."&id=".$r['id_pemesanan']; ?>" method="post" enctype="multipart/form-data">
                    <h4>Rubah Status Pesanan</h4>
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

                          <select class="form-control" id="sel1" name="status" style="width: 200px;">
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
                      <div style="float: left; width: 45%; height: 300px;margin-right: 20px;">
                        Gambar Referensi
                        <br><IMG SRC="<?php echo $div.$gambar1 ?>" height='200px' width='auto'><br><br>
                        <a href="<?php echo $divdownload.$gambar1 ?>" target="_blank" class="btn btn-primary"> Download Gambar </a>
                      </div>
                      <div style="float: left; width: 45%">
                        Upload desain
                        <br><IMG SRC="gambar_pesanan/konfirmasi/<?php echo $gambar2 ?>" height='200px'><br><br>
                        <input name="gambar"  id="web" type="file" value="">
                      </div>
                    </div>
                    <div style="width: 50%; margin-top: 20px;">
                      Informasi untuk pelanggan<br>
                      <textarea id="email" name="pesan_admin" style="width: 100%; height: 199px; color: black;" onClick="javascript:removeTextAreaWhiteSpace(this)"><?php $isi ="$r[pesan_admin]"; echo "$isi"?>
                      </textarea>
                    </div>
                    <div style="width: 100%; height: 1px; background-color: white; margin-bottom: 5px; margin-top: 5px;"></div>
                    <div align="right" style="width: 100%">
                       <button type='submit' name='update_status' class='btn btn-primary'>
                       Perbarui
                       </button>
                    </div>
                  </form>
                </div>
            </div>
        </section>
        </div>