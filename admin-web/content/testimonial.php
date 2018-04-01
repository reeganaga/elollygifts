<?php
include "koneksi.php";


//edit status
if (isset($_GET['aksi'])) {
    $id=$_GET['id'];
    if ($_GET['aksi']=='tampil') {
        mysql_query("update testimoni set status_testimoni=2 where id_testimoni=$id");
    }else{
        mysql_query("update testimoni set status_testimoni=1 where id_testimoni=$id");
    }
}

$sql="select * from testimoni, pelanggan where testimoni.id_pelanggan=pelanggan.id_pelanggan" ;
$lihat_testimonial=mysql_query($sql) ;

?>
<div class="content container">
        <h2 class="page-title">Testimoni</h2>
        
        <section class="widget">
            <header>
                <h4>Tabel <span class="fw-semi-bold">Data Testimoni</span></h4>
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
                            <th class="hidden-xs">Nama Penulis</th>
                            <th class="no-sort">Judul Testimonial</th>
                            <th class="no-sort">Isi Testimonial</th>
                            <th class="hidden-xs">Tanggal Dipost</th>
                            <th class="no-sort">Status</th>
                            <th class="no-sort">Kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        while ($r=mysql_fetch_array($lihat_testimonial)){
                        echo"<tr>
                            <td>$no</td>
                            <td><span class='fw-semi-bold'>$r[nama]</span></td>
                            <td class='hidden-xs'>
                                $r[judul_testimoni]   
                            </td>
                            <td class='hidden-xs'>
                                $r[isi_testimoni]   
                            </td>
                            <td class='hidden-xs'>$r[tanggal_testimoni]</td>
                            <td class='hidden-xs'>";
                                if ($r['status_testimoni']==1) {
                                    echo "<a href='index.php?module=testimonial&aksi=tampil&id=$r[id_testimoni]' class='btn btn-danger'>Tidak Tampil</a>";
                                }elseif ($r['status_testimoni']==2) {
                                    echo "<a href='index.php?module=testimonial&aksi=tidaktampil&id=$r[id_testimoni]' class='btn btn-success'>Tampil</a>";
                                }
                            echo "</td>
                             <td class='hidden-xs'>
                                <div class='btn-group'>
                                        <a class='btn btn-warning' href=\"javascript: delet_testimoni('".$r['id_testimoni']."','".$r['nama']."','".$r['judul_testimoni']."','".$r['isi_testimoni']."')\" >Delete</a>
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