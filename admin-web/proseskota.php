<?php

include "koneksi.php";

if (isset($_POST['tambahkota'])) {

$cek_kota=mysql_num_rows(mysql_query("SELECT nama_kota FROM kota WHERE nama_kota='$_POST[nama_kota]'"));
// Kalau email sudah ada yang pakai
if ($cek_kota > 0){
  echo "<script>alert('Nama Kota $_POST[nama_kota] sudah dipakai'); window.location='index.php?module=tambahkota';</script>";
}
else{


	$nama_kota=$_POST['nama_kota'];
	$tarif=$_POST['ongkir'];
	$status=$_POST['cod'];
	
	
	$tambahkota=mysql_query("insert into kota(id_kota,nama_kota,ongkir,status_cod)
	 values ('', '$nama_kota', '$tarif', '$status')");

echo "<script> alert('Data Kota Berhasil Ditambah'); window.location='index.php?module=kota'; </script>";
}
}

?>


<?php


if (isset($_POST['edit_kota'])) {
	$nama_kota=$_POST['nama_kota'];
	$tarif=$_POST['ongkir'];
	$id_kota=$_POST['id'];
	$status=$$_POST['cod'];
	
	
	$tambahkota=mysql_query("update kota set 
		nama_kota='$nama_kota', 
		ongkir='$tarif'
		status_cod='$status'
		where id_kota='$id_kota'");

echo "<script> alert('Data Kota Berhasil Di Edit'); window.location='index.php?module=kota'; </script>";

}
?>