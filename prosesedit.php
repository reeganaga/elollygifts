<?php
session_start();
include "koneksi.php";

if (isset($_POST['editprofil'])) {
	
	//$foto=$_FILES['foto']['name'];
	$username=$_POST['username'];
	$nama_lengkap=$_POST['nama_lengkap'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
    $kota=$_POST['kota'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['no_hp'];
	$id_pelanggan=$_SESSION['id_user'];

// if (isset($foto)) {
// $upload=move_uploaded_file($_FILES['foto']['tmp_name'], 'foto_pelanggan/'.$_FILES['foto']['name']);
// };


if($_FILES['foto']['error']==0) {
    //menghapus file yang lama
    unlink('member/'.$_POST['foto_temp']);

    $errors     = array();
    $maxsize    = 1045152;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['foto']['size'] >= $maxsize) || ($_FILES["foto"]["size"] == 0)) {
        $errors[] = 'File terlalu besar, file harus kurang dari 1 MB.';
    }

    if(!in_array($_FILES['foto']['type'], $acceptable) && (!empty($_FILES["foto"]["type"]))) {
        $errors[] = 'Invalid file type. Only jpeg, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['foto']['tmp_name'], 'member/'.$_FILES['foto']['name']);
    } else {
        foreach($errors as $error) {
            echo $_FILES['foto']['name'];
            echo '<script>alert("'.$error.'"); window.location="index.php?menu=editprofil";</script>';
        }

        die(); //Ensure no more processing is done
    }
    $foto=$_FILES['foto']['name'];
}else{
    $foto=$_POST['foto_temp'];
}
// if (empty($foto)) {
// 	$foto=$_POST['foto_temp'];
// }
    $_SESSION['nama']=$nama_lengkap;
    $_SESSION['gender']=$gender;
    $_SESSION['alamat']=$alamat;
    $_SESSION['no_hp']=$no_hp;
    $_SESSION['foto']=$foto;	
	$daftar=mysql_query("update pelanggan set foto='$foto' , username='$username', nama='$nama_lengkap', id_kota='$kota', gender='$gender', email='$email', alamat='$alamat', no_hp='$no_hp' where id_pelanggan=$id_pelanggan");
	 if ($daftar) {
	 		 echo "<script>alert('Update data berhasil'); window.location='index.php?menu=editprofile'; </script>";
	 }


//$r=mysql_fetch_array($daftar);

}

if (isset($_POST['editpassword'])) {
    
    //$foto=$_FILES['foto']['name'];
    $passwordlama=md5($_POST['passwordlama']);
    $passwordbaru=md5($_POST['passwordbaru']);
    $id_pelanggan=$_SESSION['id_user'];

    $cekpassword=mysql_query("select * from pelanggan where password = '$passwordlama'");
    $ketemu=mysql_num_rows($cekpassword);
if ($ketemu>0) {
    $update=mysql_query("update pelanggan set password='$passwordbaru' where id_pelanggan=$id_pelanggan");
    echo "<script>alert('Update password berhasil'); window.location='index.php?menu=memberpage'; </script>";

} else {
    echo "<script>alert('password lama salah '); window.location='index.php?menu=editpassword'; </script>";
}

    }
?>