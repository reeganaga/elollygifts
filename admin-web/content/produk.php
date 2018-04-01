<?php
include "koneksi.php";

$lihatkota=mysql_query("select * from produk ")
?>
<div class="content container">
        <h2 class="page-title"> Seluruh Pemesanan - <span class="fw-semi-bold">Terkini</span>

         </h2>
        
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Data Pemesanan</span> 
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
                            <th width="50px">Id</th>
                            <th class="hidden-xs" width="150px">Nama Produk</th>
                            <th width="200px">Harga Produk</th>
                            <th width="350px">Diskripsi</th>
                            <th width="200px">Gambar Produk</th>
                            <th class="hidden-xs" width="100px">Kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php
                        $no=1;
                        while ($r=mysql_fetch_array($lihatkota)){
                        echo"<tr>

                            <td>$r[id_produk]</td>
                            <td><span class='fw-semi-bold'>$r[nama_produk]</span></td>
                            <td class='hidden-xs'>
                            $r[harga_produk]   
                            </td>
                            <td class='hidden-xs'>
                            $r[diskripsi]   
                            </td>
                            
                             <td class='hidden-xs'>
                                <img class='img-rounded' src='foto_produk/$r[gambar_produk]' alt='' height='150'>
                            </td>
                            
                            <td class='hidden-xs'>

                             <div class='btn-group'>
                                        <a href='index.php?module=editproduk&id=$r[id_produk]' class='btn btn-info'>Edit</a>
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