
<?php
include 'rupiah.php';
include 'koneksiads.php';
$mulai=$_POST['thn_mulai'].'-'.$_POST['bln_mulai'].'-'.$_POST['tgl_mulai'];
$selesai=$_POST['thn_selesai'].'-'.$_POST['bln_selesai'].'-'.$_POST['tgl_selesai'];
//versi ads decals
$lihat_order=mysql_query("SELECT * from konfirmasi_bayar inner join pelanggan on konfirmasi_bayar.id_pelanggan=pelanggan.id_pelanggan where konfirmasi_bayar.status_pembayaran='diterima' and (konfirmasi_bayar.tanggal_konfirmasi between '$mulai 00:00:00' AND '$selesai 00:00:00')" ) ;
$total_jumlah=0;
?>

<div class="content container">
        <h2 class="page-title">Cetak <small>Laporan Penjualan</small></h2>
        <section class="widget">
            <div class="body no-margin">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: black">
                        <th>No</th>
                        <th>Jenis Pemesanan</th>
                        <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=1;
                        $total=0;
                        while ($r=mysql_fetch_array($lihat_order)){
                    ?>        
                                <tr style="background-color: #ff0066">
                                    <td colspan="3">
                                        <?php echo $r['tanggal_konfirmasi']." - ".$r['nama'] ;?>
                                    </td>
                                </tr>
                                <?php
                                $lihat_pesanan=mysql_query("SELECT * from pemesanan where id_konfirmasi= '$[id_konfirmasi]' "); 
                                while ($q=mysql_fetch_array($lihat_pesanan)) {
                                    if($q['id_motor'] > 0){
                                        $tipe=mysql_query("SELECT * from motor INNER JOIN category on motor.id_category=category.id_category where motor.id_motor=$q[id_motor]");
                                          $n=mysql_fetch_array($tipe);
                                          $pesanan= "Decals Motor" ;
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
                                    $total=number_format($harga2,"2",",",".");
                                    $total_jumlah=$total_jumlah+$harga2;
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no ?>
                                    </td>
                                    <td>
                                        <?php echo $pesanan." - ".$jenis ?>
                                    </td>
                                    <td align="right">
                                        <?php echo "Rp ".$total ?>
                                    </td>                                  
                                </tr>

                    <?php 
                                $no++;
                                }
                        }
                    ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-print-6">
                        <blockquote class="blockquote-sm">

                        </blockquote>
                    </div>
                    <div class="col-sm-6 col-print-6">
                        <div class="row text-align-right">
                            <div class="col-xs-6 col-md-6">
                                <p><strong>Subtotal</strong></p>
                                
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <p><strong><?php echo "Rp ".number_format($total_jumlah,"2",",",".");;?></strong></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-align-right mt-lg mb-xs">
                    Owner
                </p>
                <p class="text-align-right">
                    <span class="fw-semi-bold">ADS Decals</span>
                </p>
                <div class="btn-toolbar mt-lg text-align-right hidden-print">
                    <button id="print" class="btn btn-default" onClick="window.print();">
                        <i class="fa fa-print"></i>
                        &nbsp;&nbsp;
                        Print
                    </button>
                  
                </div>
            </div>
        </section>
        </div>