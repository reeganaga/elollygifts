<?php
include 'koneksi.php';
$jenis=$_GET['jenis'];
if (isset($_GET['id'])) {
$id=$_GET['id'];
}else{
    $id=0;
}

$table = 'desain';

//handle post data
if (isset($_POST['add_data'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    mysql_query($insert);

    $cek_kado=mysql_num_rows(mysql_query("SELECT id FROM {$table} WHERE nama='$_POST[nama]'"));
    // Kalau email sudah ada yang pakai
    if ($cek_kado > 0){
      echo "<script>alert('Nama kado {$nama} sudah dipakai'); window.location='index.php?module=tambahkado';</script>";
    }
    else{

        $insert = "INSERT INTO {$table} (nama,harga) values('{$nama}','{$harga}') ";

        $tambahkado=mysql_query($insert);

    echo "<script> alert('Data desain Berhasil Ditambah'); window.location='index.php?module=desain'; </script>";
    }
}elseif ( $_POST['edit_data'] ) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    mysql_query($insert);
    // $current_data = mysql_query('SELECT')
    $cek_kado=mysql_num_rows(mysql_query("SELECT id FROM {$table} WHERE nama='$nama' and id!=$id  "));
    // Kalau email sudah ada yang pakai
    if ($cek_kado > 0){
      echo "<script>alert('Nama kado {$nama} sudah dipakai'); window.location='index.php?module=tambahkado';</script>";
    }
    else{

        $insert = "UPDATE {$table} set nama='$nama', harga='{$harga}' where id_desain={$id} ";

        $tambahkado=mysql_query($insert);

    echo "<script> alert('Data desain Berhasil Diubah'); window.location='index.php?module=desain'; </script>";
    }
}

$category=mysql_query("SELECT * FROM {$table} where id_desain='$id'");
$r=mysql_fetch_assoc($category);
    
// var_dump($r);
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
                        <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                            <label>Nama kado: </label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $r['nama'];?>" required title="isi nama motor">
                            </div>


                            <div class="form-group">
                            <label>Harga: </label>
                            <input type="text" name="harga" class="form-control" value="<?php echo $r['harga'];?>" required title="isi nama motor">
                            </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="<?php echo $action ?>" value="1">
                        <div style="width: 100%" align="right">
                            <?php
                            if (isset($_GET['id'])) {        
                            ?>
                                <button type="submit" class="btn btn-primary" value="Update" name="edit_data">Update</button>

                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary"  name="add_data">Tambah</button>
                            <?php } ?>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>