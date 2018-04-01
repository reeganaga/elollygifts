<?php
include 'koneksiads.php';
$jenis=$_GET['jenis'];
if (isset($_GET['id'])) {
$id=$_GET['id'];
}else{
    $id=0;
}
if ($jenis=='decal') {
    $lihat=mysql_query("SELECT * FROM motor where id_motor=$id");  
    $link="motor";  
} 
if ($jenis=='skinlaptop') {
    $lihat=mysql_query("SELECT * FROM laptop where id_laptop=$id");
    $link="laptop";  
}
if ($jenis=='garskin') {
    $lihat=mysql_query("SELECT * FROM hp where id_hp=$id");
    $link="hp";  
}
$category=mysql_query("SELECT * FROM category where nama_category='$jenis'");
$r=mysql_fetch_array($lihat);

?>
<div class="content container">
        <h2 class="page-title">Tambah/update  <span class="fw-semi-bold">product <?php echo $link ?></span></h2>
        <?php echo "<a href='index.php?module=$link' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a>" ?>
        <br><br>
        <div class="row">
            <div class="col-md-8">
                <section class="widget">
                    <div class="body">
                        <form id="fileupload" action="prosesupload.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                            <label>Nama <?php echo $link ?>: </label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $r['nama_'.$link.''];?>" required title="isi nama motor">
                            </div>
                            <label>Pilih Kategori: </label>
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="kategori" required>
                                    <option <?php if ($r['id_category']=='') {echo "selected";} ?> value="" style="font-style: italic;">
                                        Pilih kategori......
                                    </option>
                                    <?php while ($n=mysql_fetch_array($category)){ ?>
                                        <option <?php if ($r['id_category']==$n['id_category']) {echo "selected";} ?> value="<?php echo $n['id_category']; ?>"> 
                                            <?php echo $n['nama_category']." - ".$n['size'] ;?> 
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
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