<?php
include 'koneksi.php';
$jenis=$_GET['jenis'];
if (isset($_GET['id'])) {
$id=$_GET['id'];
}else{
    $id=0;
}


//handle post data
if (isset($_POST['add_kado'])) {
    $nama_kado = $_POST['nama_kado'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    mysql_query($insert);

    $cek_kado=mysql_num_rows(mysql_query("SELECT id FROM kado WHERE nama_kado='$_POST[nama_kado]'"));
    // Kalau email sudah ada yang pakai
    if ($cek_kado > 0){
      echo "<script>alert('Nama kado {$nama_kado} sudah dipakai'); window.location='index.php?module=tambahkado';</script>";
    }
    else{

        $insert = "INSERT INTO kado (nama_kado,ukuran,harga) values('{$nama_kado}','{$ukuran}','{$harga}') ";

        $tambahkado=mysql_query($insert);

    echo "<script> alert('Data kado Berhasil Ditambah'); window.location='index.php?module=kado'; </script>";
    }
}elseif ( $_POST['edit_product'] ) {
    $nama_kado = $_POST['nama_kado'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    mysql_query($insert);
    // $current_data = mysql_query('SELECT')
    $cek_kado=mysql_num_rows(mysql_query("SELECT id FROM kado WHERE nama_kado='$nama_kado' and id!=$id  "));
    // Kalau email sudah ada yang pakai
    if ($cek_kado > 0){
      echo "<script>alert('Nama kado {$nama_kado} sudah dipakai'); window.location='index.php?module=tambahkado';</script>";
    }
    else{

        $insert = "UPDATE kado set nama_kado='$nama_kado', ukuran = '{$ukuran}', harga='{$harga}' where id_kado={$id} ";

        $tambahkado=mysql_query($insert);

    echo "<script> alert('Data kado Berhasil Diubah'); window.location='index.php?module=kado'; </script>";
    }
}

$category=mysql_query("SELECT * FROM kado where id_kado='$id'");
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
                            <input type="text" name="nama_kado" class="form-control" value="<?php echo $r['nama_kado'];?>" required title="isi nama motor">
                            </div>

                            <div class="form-group">
                            <label>Ukuran: </label>
                            <input type="text" name="ukuran" class="form-control" value="<?php echo $r['ukuran'];?>" required title="isi nama motor">
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
                                <button type="submit" class="btn btn-primary" value="Update" name="edit_product">Update</button>

                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary"  name="add_kado">Tambah</button>
                            <?php } ?>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>