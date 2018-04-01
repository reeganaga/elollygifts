<?php
include "koneksi.php";

$lihatkota=mysql_query("select * from kota")
?>
<div class="content container">
        <h2 class="page-title"> Seluruh Pemesanan - <span class="fw-semi-bold">Terkini</span>

         </h2>
        
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Data Pemesanan</span> 
                    <a href="index.php?module=tambahkota" class="btn btn-primary float-right">Tambah Kota</a>
                </h4>
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
                            <th width="100px">Id</th>
                            <th class="hidden-xs">Nama Kota</th>
                            <th width="350px">Biaya Kirim</th>
                            <th>Status COD</th>
                            <th class="hidden-xs" width="200px">Kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php
                        $no=1;
                        while ($r=mysql_fetch_array($lihatkota)){
                        echo"<tr>
                            <td>#$r[id_kota]</td>
                            <td><span class='fw-semi-bold'>$r[nama_kota]</span></td>
                            <td class='hidden-xs'>
                            Rp ".number_format($r['ongkir'],"2",",",".")."   
                            </td>
                            <td>$r[status_cod]</td>
                            <td class='hidden-xs'>

                             <div class='btn-group'>
                                        <a href='index.php?module=tambahkota&id=$r[id_kota]' class='btn btn-info'>Edit</a>
                                        <a href='prosesdelete.php?aksi=hapuskota&id=$r[id_kota]' class='btn btn-warning'>Delete</a>
                                    </div>

                            </td>
                           
                        </tr>";
                       $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
            </div>
        </section>
        </div>