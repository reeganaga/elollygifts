<?php 
include "koneksi.php";
$lihat_order=mysql_query("select * from pemesanan, pelanggan where pemesanan.id_pelanggan=pelanggan.id_pelanggan" ) ;
$id = $_GET['id'];
$sql="SELECT * FROM pesanan WHERE id_pemesanan = $id";
$lihat = mysql_query($sql);
// $n = mysql_fetch_array($lihat);
$x = [];
while ($n=mysql_fetch_array($lihat_order)) $x[] = $n;

// while ($n=mysql_fetch_array($lihat)) $x[] = $r;
foreach ($x as $n){
	if($n['id_motor'] > 0){
        $pesanan="Decals Motor";
        $div="gambar_pesanan/decals/";
    } else if ($n['id_laptop'] > 0) {
        $pesanan="Skin Laptop";
        $div="gambar_pesanan/laptop/";
    } else if ($n['id_hp'] > 0) {
        $pesanan="Skin Hp";
        $div="gambar_pesanan/hp/";
    } else { $pesanan="Pesanan Kosong"; }


	header("Content-Disposition: attachment; filename=".$n['gambar_1']);
	// header("Content-length:".$r['gambar_1']);
	$fp = fopen("'$div'"."'$n[gambar_1]'", 'r');
	$content = fread($fp, filesize("'$div'"."'$n[gambar_1]'"));
	fclose('$fp');
	echo $content;
	exit;
	}

?>
