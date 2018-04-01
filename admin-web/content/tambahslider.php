<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id=0;
}

$lihat=mysql_query("SELECT * FROM slider where id_slider=$id");

$r=mysql_fetch_array($lihat);

?>
<div class="content container">
        <h2 class="page-title">Upload -  <span class="fw-semi-bold">Gambar</span> <small>Drag & drop untuk galeri</small></h2>
        <?php echo "<a href='index.php?module=slide' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a>" ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <section class="widget">
                    <div class="body">
                        <form id="fileupload" action="prosesupload.php" method="POST" enctype="multipart/form-data">
                            
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <p>
                            <label for="gambar">Gambar untuk Slider</label>
                            <?php
                            if (isset($_GET['id'])) {
                                echo "<img  src='slider/".$r['gambar']."' width='600px' height='300px'>";
                            }
                            ?>
                            
                            <input name="gambar"  id="web" type="file"/>
                        </p>       

                                                  <!-- The table listing the files available for upload/download -->
                           
                            <div class="form-group">
                            <label>Deskripsi: </label>
                            <input type="text" name="diskripsi" class="form-control" value="<?php echo $r['diskripsi'];?>" required>
                            </div>
                            

                        <input type="hidden" name="fotolama" value="<?php echo $r['gambar']; ?>">
                        <input type="hidden" name="id_slider" value="<?php echo $id; ?>">

                            <?php
                        if (isset($_GET['id'])) {
                                
                        ?>
                        <button type="submit" class="btn btn-warning" value="Update" name="edit_slider">Update</button>

                    <?php } else {                      
                    ?>
                        <button type="submit" class="btn btn-primary"  name="upload_slider">Send</button>
                    
                    <?php 
                }
                ?>

                          
                            
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>