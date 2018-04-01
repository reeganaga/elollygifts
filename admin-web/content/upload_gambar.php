<?php
include 'koneksiads.php';

if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id=0;
}

$lihat=mysql_query("SELECT * FROM product where id_product=$id");
$category=mysql_query("SELECT * FROM category");
$r=mysql_fetch_array($lihat);

?>
<div class="content container">
        <h2 class="page-title">Upload -  <span class="fw-semi-bold">Gambar</span></h2>
        <?php echo "<a href='index.php?module=daftarfoto' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a>" ?>
        <br><br>
        <div class="row">
            <div class="col-md-8">
                <section class="widget">
                    <div class="body">
                        <form id="fileupload" action="prosesupload.php" method="POST" enctype="multipart/form-data">
                            
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <p>
                            <label for="gambar">Gambar untuk galeri</label><br>
                            <?php
                            $hide="block";
                            if (isset($_GET['id'])) {
                                echo "<img  src='../gallery/".$r['gambar_product']."' width='300px' height='300px'>
                                    ";
                                $hide="none";
                            }
                            ?>
                            
                            <br>
                            <input name="gambar"  id="web" type="file" style="display:<?php echo $hide; ?>;"/>
                        </p>                            <!-- The table listing the files available for upload/download -->
                           
                            <div class="form-group">
                            <label>Judul Gambar: </label>
                            <input type="text" name="judul" class="form-control" value="<?php echo $r['judul_product'];?>" required title="isi judul gambarnyaaa">
                            </div>
                            <div class="form-group">
                            <label>Deskripsi: </label>
                            <input type="text" name="diskripsi_gambar" class="form-control" value="<?php echo $r['deskripsi'];?>" required title="jangan males isi diskripsi" >
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

                        <input type="hidden" name="fotolama" value="<?php echo $r['gambar_product']; ?>" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div style="width: 100%" align="right">
                            <?php
                            if (isset($_GET['id'])) {        
                            ?>
                                <button type="submit" class="btn btn-primary" value="Update" name="edit_gambar">Update</button>

                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary"  name="upload_gambar">Upload</button>
                            <?php } ?>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>