<?php
include "koneksi.php";
$lihat_slider=mysql_query("select * from slider " ) ;

?>
<div class="content container">
        <h2 class="page-title"> Seluruh Pemesanan - <span class="fw-semi-bold">Terkini</span></h2>
        
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Daftar Foto</span></h4>
                <a href="index.php?module=tambahslider" class="btn btn-primary float-right">Tambah Slider di Home</a>
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
                            <th class="no-sort" width="50px">Id</th>
                            <th class="no-sort" width="100px">Slide</th>
                            <th class="no-sort">Diskripsi</th>
                            <th class="hidden-xs" width="150px">Tanggal Upload</th>
                            <th class="no-sort" width="150px">Kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        while ($r=mysql_fetch_array($lihat_slider)){
                        echo"<tr>
                            <td>$no</td>
                            <td>
                                    <img class='img-rounded' src='slider/$r[gambar]' alt='' height='50'>
                            </td>
                            <td class='hidden-xs'>$r[diskripsi]</td>
                            <td class='hidden-xs'>$r[tanggal]</td>
                            
        
                            <td>
                            <div class='row margin-bottom text-align-center'>
                                <div class='col-md-12'>
                                    <div class='btn-group'>

                       
    
                                        <a href='index.php?module=tambahslider&id=$r[id_slider]' class='btn btn-info'>Edit</a>
                                        <a href='prosesdelete.php?aksi=hapusslider&id=$r[id_slider]&file=$r[gambar]' class='btn btn-warning'>Delete</a>
                                    </div>
                                </div>
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