<?php

include "koneksi.php";

if (isset($_POST['edit_about'])) {
    $judul_about=$_POST['judul'];
	$isi_about=$_POST['isi_artikel'];
    
	
	$edit_about=mysql_query("update about set 
		judul='$judul_about',
        isi_about='$isi_about'
        where id_about=1
		");


    if ($edit_about) {
        echo "<script> alert ('Terimakasih sudah mengisi halaman about'); window.location='index.php?module=about&id=1'; </script>";
    }
}
if (isset($_POST['edit_contact'])) {
    // $id=$_POST['id'];
    $no_hp=$_POST['no_hp'];
    $pinbbm=$_POST['pinbbm'];
    $fb=$_POST['fb'];
    $twitter=$_POST['twitter'];
    $gmail=$_POST['gmail'];
    $pinterest=$_POST['pinterest'];
    
    
    $edit_contact=mysql_query("update contact set 
        no_hp='$no_hp',
        pinbbm='$pinbbm',
        fb='$fb',
        twitter='$twitter',
        gmail='$gmail',
        pinterest='$pinterest'
        where id_contact=1
        ");


    if ($edit_contact) {
        echo "<script> alert ('informasi kontak telah diperbarui'); window.location='index.php?module=contact&id=1'; </script>";
        header('index.php?module=contact&id=1');
    }
}

?>

