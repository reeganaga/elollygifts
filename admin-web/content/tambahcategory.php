<?php
include 'koneksiads.php';
$jenis=$_GET['jenis'];
if (isset($_GET['id'])) {
$id=$_GET['id'];
}else{
    $id=0;
}



$category=mysql_query("SELECT * FROM category where nama_category='$jenis'");
$r=mysql_fetch_array($lihat);

$action = (empty($r['id'])) ? 'tambahcategory' :'editcategory';
?>
<div class="content container">
        <h2 class="page-title">Tambah/update  <span class="fw-semi-bold">product <?php echo $link ?></span></h2>
        <?php echo "<a href='index.php?module=$link' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a>" ?>
        <br><br>
        <div class="row">
            <div class="col-md-8">
                <section class="widget">
                    <div class="body">
                        <form id="fileupload" action="prosescategory.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                            <label>Nama Kategori: </label>
                            <input type="text" name="nama_category" class="form-control" value="<?php echo $r['nama_'.$link.''];?>" required title="isi nama motor">
                            </div>

                            <div class="form-group">
                            <label>Size: </label>
                            <input type="text" name="Size" class="form-control" value="<?php echo $r['nama_'.$link.''];?>" required title="isi nama motor">
                            </div>

                            <div class="form-group">
                            <label>Harga: </label>
                            <input type="text" name="Harga" class="form-control" value="<?php echo $r['nama_'.$link.''];?>" required title="isi nama motor">
                            </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
                        <input type="hidden" name="<?php echo $action ?>" value="1">
                        <div style="width: 100%" align="right">
                            <?php
                            if (isset($_GET['id'])) {        
                            ?>
                                <button type="submit" class="btn btn-primary" value="Update" name="edit_product">Update</button>

                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary"  name="upload_product">Upload</button>
                            <?php } ?>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>