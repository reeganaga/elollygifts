<?php

include "koneksi.php";

if (isset($_POST['edit_produk'])) {
	$nama_produk=$_POST['nama_produk'];
	$harga_produk=$_POST['harga_produk'];
    $diskripsi_produk=$_POST['diskripsi_produk'];
	$gambar_produk=$_FILES['gambar_produk']['name'];
	$id_produk=$_POST['id'];
    $filelama=$_POST['fotolama'];
	




//upload foto baru
if($_FILES['gambar_produk']['error']==0) {

//hapus gambar yang lama

unlink('foto_produk/'.$filelama);


    $errors     = array();
    $maxsize    = 4097152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['gambar_produk']['size'] >= $maxsize) || ($_FILES["gambar_produk"]["size"] == 0)) {
        $errors[] = 'File terlalu besar, file harus kurang dari 4 MB.';
    }

    if(!in_array($_FILES['gambar_produk']['type'], $acceptable) && (!empty($_FILES["gambar_produk"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['gambar_produk']['tmp_name'], 'foto_produk/'.$_FILES['gambar_produk']['name']);
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'"); window.location="index.php?module=produk";</script>';
        }

        die(); //Ensure no more processing is done
    }
    $foto=$gambar_produk;
}else{
    $foto=$filelama;
}

    $edit_produk=mysql_query("update produk set 
        nama_produk='$nama_produk', 
        harga_produk='$harga_produk',
        diskripsi='$diskripsi_produk',
        gambar_produk='$foto'
        where id_produk=$id_produk
        ");
    echo mysql_error();

    if ($edit_produk) {
        echo "<script> alert ('Terimakasih atas pesanan kamu, akan segera kami proses secepatnya'); window.location='index.php?module=produk'; </script>";
    }
}


?>

