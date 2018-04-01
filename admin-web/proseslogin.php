<?php
include "koneksi.php";

$username = $_POST['username'];
//$pass     = antiinjection($_POST['password']);
$pass     = $_POST['password'];

// echo $username." ".$pass;
$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  /*session_register("username");
  session_register("namalengkap");
  session_register("passuser");
  session_register("leveluser");*/

  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[id_admin]     = $r[id_admin];
  $_SESSION[admin]         = 'admin';
  //$_SESSION[leveluser]    = $r[level];
  
  header('location:index.php?module=dashboard');
}
else{
  //echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
   echo "<script>alert('Login Gagal');window.location='login.php'; 
   </script>";
   
  // header('location:media.php?module=login');
}
?>