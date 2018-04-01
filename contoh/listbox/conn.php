<?php 
$host="localhost";
$user="root";
$pass="";
$db="test";

//koneksi 
$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);

?>
