<?php

include "koneksi.php";

if (isset($_POST['tambahcategory'])) {

$cek_category=mysql_num_rows(mysql_query("SELECT nama_category FROM category WHERE nama_category='$_POST[nama_category]'"));
// Kalau email sudah ada yang pakai
if ($cek_category > 0){
  echo "<script>alert('Nama category $_POST[nama_category] sudah dipakai'); window.location='index.php?module=tambahcategory';</script>";
}
else{


	$nama_category=$_POST['nama_category'];
	$harga=$_POST['Harga'];
	$size=$_POST['Size'];
	
	
	$tambahcategory=mysql_query("insert into category(id_category,nama_category,harga,size)
	 values ('', '$nama_category', '$harga', '$size')");

echo "<script> alert('Data category Berhasil Ditambah'); window.location='index.php?module=daftarkategori'; </script>";
}
}

?>


<?php


if (isset($_POST['edit_category'])) {
	$nama_category=$_POST['nama_category'];
	$harga=$_POST['Harga'];
	$id_category=$_POST['id'];
	$size=$$_POST['id'];
	
	$tambahcategory=mysql_query("update category set 
		nama_category='$nama_category', 
		harga='$harga'
		size='$size'
		where id_category='$id_category'");

echo "<script> alert('Data category Berhasil Di Edit'); window.location='index.php?module=daftarkategori'; </script>";

}
?>