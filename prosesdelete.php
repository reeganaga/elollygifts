<?php
include "koneksi.php";
$id=$_GET['id'];
$aksi=$_GET['aksi'];

if ($aksi=='hapuspesanan') {
//echo 'delete from pemesanan_pc where id_pemesanan_pc=$id';
	mysql_query("delete from pemesanan where id_pemesanan=".$id);

	echo "<script> alert('Data Pemesanan Berhasil Dihapus'); window.location='index.php?menu=data_pemesanan'; </script>";

} 
else if ($aksi=='hapusgaleri') {
//echo 'delete from galeri where id_galeri=$id';

	mysql_query("delete from product where id_product=".$id);
	$filelama=$_GET['file'];
	unlink('../gallery/'.$filelama);
	echo "<script> alert('Gambar Berhasil Dihapus'); window.location='index.php?module=daftarfoto'; </script>";

} 

elseif ($aksi=='hapustestimoni') {
//echo 'delete from pemesanan_pc where id_pemesanan_pc=$id';
	mysql_query("delete from testimoni where id_testimoni=".$id );

	echo "<script> alert('Testimoni Berhasil Dihapus'); window.location='index.php?menu=testimoni&id=0'; </script>";
}

elseif ($aksi=='hapusproposal') {
//echo 'delete from pemesanan_pc where id_pemesanan_pc=$id';
	mysql_query("delete from proposal where id_proposal=".$id );
	unlink('admin-web/gambar_pesanan/prposal/'.$file);
	echo "<script> alert('Proposal Berhasil Dihapus'); window.location='index.php?menu=pengajuan_proposal&id=0'; </script>";

}



//versi lama--------------------------------------------------------------

elseif ($aksi=='hapuskota') {
//echo 'delete from pemesanan_pc where id_pemesanan_pc=$id';
 mysql_query("delete from kota where id_kota=$id");

echo "<script> alert('Kota Berhasil Dihapus'); window.location='index.php?module=kota'; </script>";

} 
elseif ($aksi=='hapuspelanggan') {
//echo 'delete from pemesanan_pc where id_pemesanan_pc=$id';
	mysql_query("delete from pelanggan where id_pelanggan=$id");
	$filelama=$_GET['file'];
	if($filelama!==''){
		unlink('../foto_pelanggan/'.$filelama);
	}

	echo "<script> alert('Pelanggan Berhasil Dihapus'); window.location='index.php?module=pelanggan'; </script>";

} 
elseif ($aksi=='hapusslider') {
//echo 'delete from pemesanan_pc where id_pemesanan_pc=$id';
 mysql_query("delete from slider where id_slider=$id");

echo "<script> alert('Gambar Slider Berhasil Dihapus'); window.location='index.php?module=slide'; </script>";
$filelama=$_GET['file'];
unlink('slider/'.$filelama);
} 



?>