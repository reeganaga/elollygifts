<?php
include "koneksi.php";

$email=$_POST['email'];
$username=$_POST['username'];
$password=md5 ($_POST['password']);

$cek_username=mysql_num_rows(mysql_query("SELECT username FROM pelanggan WHERE username='$_POST[username]'"));
// Kalau email sudah ada yang pakai
if ($cek_username > 0){
  echo "<script>alert('USERNAME $_POST[username] sudah ada yang pakai.'); window.location='index.php?menu=member';</script>";
}
else{


  $daftar=mysql_query("insert into pelanggan (email, username, password) values ('$email', '$username', '$password')");
  $lihat=mysql_query("select * from pelanggan where username='$username'");
  $r=mysql_fetch_array($lihat);

  if ($lihat) {
   session_start();

   $_SESSION['email']     = $r['email'];
   $_SESSION['namauser']  = $r['username'];
   $_SESSION['passuser']  = $r['password'];
   $_SESSION['id_user']	=$r['id_pelanggan'];
   $_SESSION['nama']=$r['nama'];
   $_SESSION['gender']=$r['gender'];
   $_SESSION['alamat']=$r['alamat'];
   $_SESSION['no_hp']=$r['no_hp'];
   $_SESSION['foto']=$r['foto'];

   ?> 
   <script language="JavaScript">
    alert('Selamat, proses daftar anda berhasil, silahkan isi data diri');
    document.location='index.php?menu=memberpage'
   </script>
  <!--header('location:index.php?menu=memberpage'); -->
  <?php 
  }
}	
?>