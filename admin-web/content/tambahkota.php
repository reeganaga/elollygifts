<?php
include 'koneksiads.php';
if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id="0";
}

$lihat=mysql_query("SELECT * FROM kota where id_kota=$id");

$r=mysql_fetch_array($lihat);


?>
<div class="content container">
        <h2 class="page-title">Kota <span class="fw-semi-bold">Pengiriman</span> <small>Nama kota dan Harga</small></h2>
        <?php echo "<a href='index.php?module=kota' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a>" ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <section class="widget">
                    <div class="body">
                        <form action="proseskota.php" method="POST" enctype="multipart/form-data">
                            
                            
                           
                            <div class="form-group">
                            <label>Nama Kota: </label>
                            <input value="<?php echo $r['nama_kota'];?>" type="text" name="nama_kota" class="form-control" required title="Tolong Diisi Nama Kotanya"/>
                                                      
                            <label>Biaya Kirim: </label>
                            <input type="number" name="ongkir" class="form-control" value="<?php echo $r['ongkir'];?>" required title="Tolong Diisi Tarif Pengiriman Kekota">
                            </div>

                            <label>Status COD: </label><br>
                            <input name="cod" <?php if ($r['status_cod']=='yes') {echo "checked='checked'";} ?> value="yes" id="name" type="radio" />Yes<br>
                            <input name="cod" <?php if ($r['status_cod']=='no') {echo "checked='checked'";} ?> value="no" id="name" type="radio" />No
                            <br>
                            <br>
                         
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <?php
                        if (isset($_GET['id'])) {
                                
                        ?>
                        <button type="submit" class="btn btn-warning" value="Update" name="edit_kota">Update</button>

                    <?php } else {                     
                    ?>
                        <button type="submit" class="btn btn-primary"  name="tambahkota">Send</button>
                    
                    <?php 
                }
                ?>
                          
                            
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>