<?php

include "koneksi.php";

if (isset($_POST['upload_gambar'])) {
	$judul=$_POST['judul'];
	$diskripsi_gambar=$_POST['diskripsi_gambar'];
	$tanggal_upload=date('Y-m-d');
	$kategori=$_POST['kategori'];
	$gambar=$tanggal_upload."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
	
    
if(isset($_FILES['gambar'])) {
    $errors     = array();
    $maxsize    = 4097152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['gambar']['size'] >= $maxsize) || ($_FILES["gambar"]["size"] == 0)) {
        $errors[] = 'File terlalu besar, file harus kurang dari 4 MB.';
    }

    if(!in_array($_FILES['gambar']['type'], $acceptable) && (!empty($_FILES["gambar"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../gallery/'.$gambar);
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'"); window.location="index.php?module=upload_gambar";</script>';
        }

        die(); //Ensure no more processing is done
    }

    $query="INSERT into product (id_product,judul_product,gambar_product, deskripsi, tanggal_upload, id_category)
     values ('','".$judul."','".$gambar."','".$diskripsi_gambar."','".$tanggal_upload."','".$kategori."')";
    $upload_gambar=mysql_query($query);

    if ($upload_gambar) {
        echo '<script>alert("foto berhasil disimpan min"); window.location="index.php?module=daftarfoto";</script>';
    }
}
}






if (isset($_POST['edit_gambar'])) {
    $judul=$_POST['judul'];
    $diskripsi_gambar=$_POST['diskripsi_gambar'];
    $tanggal_upload=date('Y-m-d');
    $kategori=$_POST['kategori'];
    $id_gambar=$_POST['id'];
    $id_kado=$_POST['id_kado'];
    
    $sql="UPDATE product set 
        judul_product='".$judul."',
        deskripsi='".$diskripsi_gambar."',
        tanggal_upload='".$tanggal_upload."', 
        id_category='".$kategori."', 
        id_kado='".$id_kado."' 
        where id_product = $id_gambar";
    $edit_gambar = mysql_query($sql);

    if ($edit_gambar) {
        echo "<script> alert ('Update berhasil min'); window.location='index.php?module=daftarfoto'; </script>";
    }
    
// $filelama=$_POST['fotolama'];
// unlink('../gallery/'.$filelama);

//upload foto baru

}


if (isset($_POST['upload_slider'])) {
    $diskripsi=$_POST['diskripsi'];
    $tanggal=date('Y-m-d');
    $gambar=$_FILES['gambar']['name'];
    $filelama=$_POST['fotolama'];
    

    
if($_FILES['gambar']['error']==0) {


    $errors     = array();
    $maxsize    = 4097152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['gambar']['size'] >= $maxsize) || ($_FILES["gambar"]["size"] == 0)) {
        $errors[] = 'File terlalu besar, file harus kurang dari 4 MB.';
    }

    if(!in_array($_FILES['gambar']['type'], $acceptable) && (!empty($_FILES["gambar"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'slider/'.$_FILES['gambar']['name']);
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'"); window.location="index.php?module=slide";</script>';
        }

        die(); //Ensure no more processing is done
    }
    echo '<script>alert("foto berhasil disimpan min"); window.location="index.php?module=slide";</script>';
}else{
    $gambar=$filelama;
}

    $upload_gambar=mysql_query("insert into slider(diskripsi, tanggal, gambar)
     values ('$diskripsi','$tanggal','$gambar')");
}






if (isset($_POST['edit_slider'])) {
    $diskripsi=$_POST['diskripsi'];
    $tanggal=date('Y-m-d');
    $gambar=$_FILES['gambar']['name'];
       $filelama=$_POST['fotolama'];
       $id_slider=$_POST['id_slider'];
    


if($_FILES['gambar']==0) {
        //hapus gambar yang lama

unlink('slider/'.$filelama);

    $errors     = array();
    $maxsize    = 4097152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['gambar']['size'] >= $maxsize) || ($_FILES["gambar"]["size"] == 0)) {
        $errors[] = 'File terlalu besar, file harus kurang dari 4 MB.';
    }

    if(!in_array($_FILES['gambar']['type'], $acceptable) && (!empty($_FILES["gambar"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'slider/'.$_FILES['gambar']['name']);
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'"); window.location="index.php?module=slide";</script>';
        }

        die(); //Ensure no more processing is done
    }
}else{
$gambar=$filelama;
}
$edit_slider=mysql_query("update slider set 
        diskripsi='$diskripsi',
        tanggal='$tanggal',  
        gambar='$gambar'
        where id_slider=$id_slider");

    echo '<script>alert("foto berhasil disimpan min"); window.location="index.php?module=slide";</script>';

}

// proses upload product 
if (isset($_POST['upload_product'])) {
    $jenis=$_POST['jenis'];
    $nama=$_POST['nama'];
    $id_category=$_POST['kategori'];

    if ($jenis=='decal') {
         $sql=mysql_query("INSERT INTO `motor` (`id_motor`, `nama_motor`, `id_category`) VALUES (NULL, '$nama', '$id_category');");
         if ($sql) {
            echo '<script>alert("Produk motor berhasil ditambahkan"); window.location="index.php?module=motor";</script>';
         }
    } 
    if ($jenis=='skinlaptop') {
        $sql=mysql_query("INSERT INTO `laptop` (`id_laptop`, `nama_laptop`, `id_category`) VALUES (NULL, '$nama', '$id_category');");
        if ($sql) {
            echo '<script>alert("Produk laptop berhasil ditambahkan"); window.location="index.php?module=laptop";</script>';
        }    
    }
    if ($jenis=='garskin') {
        $sql=mysql_query("INSERT INTO `hp` (`id_hp`, `nama_hp`, `id_category`) VALUES (NULL, '$nama', '$id_category');");
        if ($sql) {
            echo '<script>alert("Produk hp berhasil ditambahkan"); window.location="index.php?module=hp";</script>';
        }
    }
}

//edit product
if (isset($_POST['edit_product'])) {
    $id=$_POST['id'];
    $jenis=$_POST['jenis'];
    $nama=$_POST['nama'];
    $id_category=$_POST['kategori'];

    if ($jenis=='decal') {
         $sql=mysql_query("UPDATE motor SET nama_motor='$nama', id_category='$id_category' where id_motor='$id'");
         if ($sql) {
            echo '<script>alert("Produk motor berhasil diperbarui"); window.location="index.php?module=motor";</script>';
         }
    } 
    if ($jenis=='skinlaptop') {
        $sql=mysql_query("UPDATE laptop SET nama_laptop='$nama', id_category='$id_category' where id_laptop='$id'");
        if ($sql) {
            echo '<script>alert("Produk laptop berhasil diperbarui"); window.location="index.php?module=laptop";</script>';
        }    
    }
    if ($jenis=='garskin') {
        $sql=mysql_query("UPDATE hp SET nama_hp='$nama', id_category='$id_category' where id_hp='$id'");
        if ($sql) {
            echo '<script>alert("Produk hp berhasil diperbarui"); window.location="index.php?module=hp";</script>';
        }
    }
}


?>


