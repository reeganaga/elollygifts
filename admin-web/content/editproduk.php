<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
$id=$_GET['id'];   
}else{
    $id="0";
}

$lihat=mysql_query("SELECT * FROM produk where id_produk=$id");

$r=mysql_fetch_array($lihat);


?>
<div class="content container">
        <h2 class="page-title">Produk <span class="fw-semi-bold">Penjualan</span> <small>Di Voala Huit Gift</small></h2>
        <?php echo "<a href='index.php?module=produk' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a>" ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <section class="widget">
                    <div class="body">
                        <form  action="prosesproduk.php" method="POST" enctype="multipart/form-data">
                            
                            
                           
                            <div class="form-group">
                            <label>Nama Produk </label>
                            <input type="text" name="nama_produk" class="form-control" value="<?php echo $r['nama_produk'];?>" required title="Tolong Diisi nama Produknya">
                            <label>Harga Produk </label>
                            <input type="number" name="harga_produk" class="form-control" value="<?php echo $r['harga_produk'];?>" required title="Tolong Diisi harga produknyaa">
                            <label>Diskripsi</label>
                            <textarea type="text" name="diskripsi_produk" class="form-control" title="Maksimal 20 kata"><?php echo $r['diskripsi'];?></textarea>
                            </div>
                            <p>
                            <label for="gambar">Gambar untuk galeri</label>
                            
                            <?php
                            if (isset($_GET['id'])) {
                                echo "<img  src='foto_produk/".$r['gambar_produk']."' width='300px' height='300px'>";
                            }
                            ?>
                            
                            <input name="gambar_produk"  id="web" type="file"/>
                        </p> 
                            
                            
                            <input type="hidden" name="fotolama" value="<?php echo $r['gambar_produk']; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <?php
                        if (isset($_GET['id'])) {
                                
                        ?>
                        <button type="submit" class="btn btn-warning" value="Update" name="edit_produk">Update</button>

                                          <?php } ?>
                            
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>