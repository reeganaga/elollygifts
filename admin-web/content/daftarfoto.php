<?php
include "koneksi.php";
$sql="SELECT * from product inner join category on category.id_category = product.id_category";
$lihat_gambar=mysql_query($sql) ;

?>
<!-- <script type="text/javascript">
    function delet(id_product,gambar_product){
        tanya = confirm("Apakah anda yakin menghapus?");
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapusgaleri&id="+id_product+"&file="+gambar_product ;
        }
    }
</script> -->
<div class="content container">
    <h2 class="page-title"> Gallery Produk dan Tema Desain</h2><br>
    <?php echo "<a href='index.php?module=upload_gambar' class='btn btn-info'>Tambahkan Produk</a>" ?>
    <br><br>
    <section class="widget">
        <header>
            <h4>Tabel <span class="fw-semi-bold">Daftar Product</span></h4>
            

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
                        <th class="no-sort">Gambar</th>
                        <th class="hidden-xs">Judul Produk</th>
                        <th class="no-sort">Diskripsi</th>
                        <th class="hidden-xs">Tanggal Upload</th>
                        <th class="hidden-xs">Kategori</th>
                        <th class="no-sort" width="150px">Kelola</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    while ($r=mysql_fetch_array($lihat_gambar)){
                    echo"<tr>
                        <td>$no</td>
                        <td>
                                <img class='img-rounded' src='../gallery/$r[gambar_product]' alt='' height='50'>
                        </td>
                        <td class='hidden-xs'>
                        $r[judul_product]   
                        </td>
                        <td class='hidden-xs'>$r[deskripsi]</td>
                        <td class='hidden-xs'>$r[tanggal_upload]</td>
                        
                         <td class='hidden-xs'>
                            $r[nama_category] - $r[size]
                        </td>
                        <td>
                        <div class='row margin-bottom text-align-center'>
                            <div class='col-md-12'>
                                <div class='btn-group'>

                   

                                    <a href='index.php?module=upload_gambar&id=$r[id_product]' class='btn btn-info'>Edit</a>
                                    <a class='btn btn-warning' href=\"javascript: delet_product('".$r['id_product']."','".$r['gambar_product']."')\">Delete</a>
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