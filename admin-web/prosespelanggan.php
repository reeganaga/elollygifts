<?php

include "koneksi.php";

if (isset($_POST['edit_pelanggan'])) {
    $username=$_POST['username'];
	$password=$_POST['password'];
	$nama=$_POST['nama'];
    $email=$_POST['email'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $gender=$_POST['gender'];
	$id_pelanggan=$_POST['id_pelanggan'];
	
    $sql="UPDATE pelanggan SET 
        nama='$nama',
        email='$email',
        alamat='$alamat',
        no_hp='$no_hp',
        gender='$gender'
        WHERE pelanggan.id_pelanggan=$id_pelanggan";
    $edit_pelanggan = mysql_query($sql);
    // echo $sql;
    if ($edit_pelanggan) {
        echo "<script> alert ('Data pelanggan telah berhasil diperbarui'); window.location='index.php?module=lihatdetailpelanggan&id=".$id_pelanggan."' ; </script>";
    }
}


?>

