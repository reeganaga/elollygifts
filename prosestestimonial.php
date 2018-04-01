<?php
session_start();
include "koneksi.php";

if (isset($_POST['prosestestimonial'])){
	$judul_testimoni=$_POST['judul_testimoni'];
	$isi_testimoni=$_POST['isi_testimoni'];
	$id_pelanggan=$_SESSION['id_user'];
	$tanggal=date('Y-m-d');

	$prosestestimonial=mysql_query("insert into testimoni (id_testimoni, judul_testimoni, tanggal_testimoni, isi_testimoni, id_pelanggan, status_testimoni) 
		values 
	('', '$judul_testimoni', '$tanggal', '$isi_testimoni', '$id_pelanggan', '1')");

// 	if(isset($_FILES['gambar'])) {
//     $errors     = array();
//     $maxsize    = 4097152;
//     $acceptable = array(
//         'image/jpeg',
//         'image/jpg',
//         'image/gif',
//         'image/png'
//     );

//     if(($_FILES['gambar']['size'] >= $maxsize) || ($_FILES["gambar"]["size"] == 0)) {
//         $errors[] = 'File terlalu besar, file harus kurang dari 4 MB.';
//     }

//     if(!in_array($_FILES['gambar']['type'], $acceptable) && (!empty($_FILES["gambar"]["type"]))) {
//         $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
//     }

//     if(count($errors) === 0) {
//         move_uploaded_file($_FILES['gambar']['tmp_name'], 'foto_testimonial/'.$_FILES['gambar']['name']);
//     } else {
//         foreach($errors as $error) {
//             echo '<script>alert("'.$error.'"); window.location="media.php?module=isitestimonial";</script>';
//         }

//         die(); //Ensure no more processing is done
//     }
// }
	if ($isi_testimoni) {
		echo "<script> alert ('Terimakasih atas testimonialnya, order barunnya kami tunggu kak'); window.location='index.php?menu=memberpage'; </script>";
	


	}
}

///////////////////////////////////////////////////////////


if (isset($_POST['update_testimonial'])){
	$judul_testimoni=$_POST['judul_testimoni'];
	$isi_testimoni=$_POST['isi_testimoni'];
	// $gambar=$_POST['gambar'];
	$id_pelanggan=$_SESSION['id_user'];
	$id_testimoni=$_POST['id'];


	$update_testimonial=mysql_query("UPDATE `testimoni` SET `judul_testimoni` = '".$judul_testimoni."', `isi_testimoni` = '".$isi_testimoni."' WHERE `testimoni`.`id_testimoni` = ".$id_testimoni);

    if ($update_testimonial) {
        echo "<script> alert ('testimoni telah perbarui'); window.location='index.php?menu=testimoni&id=".$id_testimoni."'; </script>";
    


    }
}

?>