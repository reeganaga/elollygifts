<?php
include "rupiah.php";
include "koneksi.php";
$lihat_order=mysql_query("SELECT * from konfirmasi_bayar inner join pelanggan on konfirmasi_bayar.id_pelanggan=pelanggan.id_pelanggan" ) ;

//proses update status
if (isset($_POST['update_status'])) {
    $status=$_POST['status'];
    $no_resi=$_POST['no_resi'];
    $id_pemesanan=$_POST['id_pemesanan'];
    mysql_query("update pemesanan set status='$status', no_resi='$no_resi' where id_pemesanan=$id_pemesanan");
    //echo "<script> alert ('status dapat diubah'); window.location='media.php?module=datapembayaran'; </script>";
} 
?>

<div class="content container">
        <h2 class="page-title"> Seluruh Pembayaran - <span class="fw-semi-bold">Terkini</span></h2>
        
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Data Pembayaran</span></h4>
                <div class="widget-controls">
                    <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                    <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </header>
            <div class="body">
                <div class="mt">
                    <table id="datatable-table" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>no</th>
                            <th class="hidden-xs">Nama Pemesan</th>
                            <th width="350px">Alamat Pengiriman</th>
                            <th class="hidden-xs">tarif kirim</th>
                            <th class="hidden-xs">Total Harga</th>
                            <th class="hidden-xs">Tanggal Pesan</th>
                            <th class="no-sort">Status</th>
                            <th class="hidden-xs">Kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        while ($r=mysql_fetch_array($lihat_order)) {
                          $a=mysql_query("SELECT * from kota where id_kota=$r[id_kota]");
                          $b=mysql_fetch_array($a);
                          $total=number_format($r['Jumlah_bayar'],"0",",",".");
                        echo"<tr>
                            <td>$no</td>
                            <td style='width:150px'><span class='fw-semi-bold'>$r[nama]</span></td>
                            <td class='hidden-xs' style='width:200px'>
                            $r[alamat]   
                            </td>
                            <td class='hidden-xs' style='width:150px'>
                            $b[ongkir]   
                            </td>
                            <td class='hidden-xs' style='width:150px'>Rp $total</td>
                            <td class='hidden-xs'style='width:150px'>$r[tanggal_konfirmasi]</td>
                            <td style='width:100px'>
                                <div class='progress progress-sm mt-xs' style='width:100px'>";
                     
                         if ($r['status_pembayaran']=='menunggu konfirmasi') {
                         	echo "<div class='progress-bar progress-bar-warning' style='width: 50%;'></div>";
                         }elseif ($r['status_pembayaran']=='diterima') {
                         	echo "<div class='progress-bar progress-bar-success' style='width: 100%;'></div>";
                         }elseif ($r['status_pembayaran']=='ditolak') {
                            echo "<div class='progress-bar progress-bar-info' style='width: 0%;'></div>";
                         } 
                     
                                   echo "
                                </div>
                            </td>
                             <td class='hidden-xs'>
                                <small>
                                    <a type='button' class='btn btn-info  btn-block' href='index.php?module=detail_pembayaran&id=$r[id_konfirmasi]'>Lihat Detail</a>
                                </small>
                                <br>
                                <small>
                                    <a href='prosesdelete.php?aksi=hapuspesanan&id=$r[id_pemesanan]' class='btn btn-warning'>Delete</a>
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


            </div>
        </section>
        </div>