<?php
include "koneksi.php";
//$sql="SELECT * from laptop inner join category on laptop.id_category = category.id_category";
$sql="SELECT * from kado ";
$lihat_gambar=mysql_query($sql) ;

?>
<div class="content container">
    <h2 class="page-title"> Kado Elolly Gift</h2><br>
    <?php echo "<a href='index.php?module=tambahkado' class='btn btn-info'>Tambahkan Kado</a>" ?>
    <br><br>
    <section class="widget">
        <header>
            <h4>Tabel <span class="fw-semi-bold">Daftar Kategori</span></h4>
            

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
                        <th>Nama</th>
                        <th>Harga</th>
                        <th class="no-sort" width="150px">Kelola</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    while ($r=mysql_fetch_array($lihat_gambar)){
                        $harga=number_format($r['harga'],"0",",",".");
                        echo"<tr>
                            <td>$no</td>
                            <td>$r[nama_kado] - $r[ukuran]</td>
                            <td>Rp $harga</td>
                            
                            <td>
                            <div class='row margin-bottom text-align-center'>
                                <div class='col-md-12'>
                                    <div class='btn-group'>
                                        <a href='index.php?module=tambahkado&id=$r[id_kado]' class='btn btn-info'>Edit</a>
                                        <a class='btn btn-warning' href=\"javascript: delet_kado('".$r['id_kado']."','".$r['nama_kado']."')\">Delete</a>
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