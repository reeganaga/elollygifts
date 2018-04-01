<?php
$databasetype = 'mysql';
$server='localhost';
$user='root';
$password='';
$database='elollygift';
$connect = mysqli_connect($server, $user, $password, $database);
mysql_connect($server,$user,$password) or die (mysql_error());
mysql_select_db($database);
?>
