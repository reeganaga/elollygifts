<?php
include "koneksi.php";

$username = $_POST['username'];
//$pass     = antiinjection($_POST['password']);
$pass     = md5($_POST['password']);

$login=mysql_query("SELECT * FROM pelanggan WHERE username='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  /*session_register("username");
  session_register("namalengkap");
  session_register("passuser");
  session_register("leveluser");*/

  $_SESSION['namauser']     = $r['username'];
 // $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
    $_SESSION['id_user']  =$r['id_pelanggan'];
    $_SESSION['nama']=$r['nama'];
    $_SESSION['gender']=$r['gender'];
    $_SESSION['alamat']=$r['alamat'];
    $_SESSION['no_hp']=$r['no_hp'];
    $_SESSION['foto']=$r['foto'];
    $_SESSION['email']=$r['email'];
    $_SESSION['tipe']='member';
  //$_SESSION[leveluser]    = $r[level];
?>
  <script language="JavaScript">
  alert('Selamat, Login Sukses!');
  document.location='index.php?menu=memberpage'</script> 
<?php
}
  else{
?>
  <script type="text/javascript">
  alert("LOGIN SALAH, USERNAME ATAU PASSWORD TIDAK DITEMUKAN");
  window.location = 'index.php?menu=member';
  </script>
<?php
  }
?>