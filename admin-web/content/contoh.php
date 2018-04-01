<?php
include “conn.php”;
if($_GET[”]!==””){
$id=$_GET[‘id’];
$query=mysql_query(“select * from guestbook where id_gb=’$id'”);
?>
<table border=”1″>
<tr><th>No</th><th>Nama</th><th>Email</th><th>Pesan</th></tr>
<?php
while($row=mysql_fetch_array($query)){
?>
<tr><td><?php echo $c=$c+1;?></td><td><?php echo $row[‘nama’];?></td><td><?php echo $row[’email’]; ?></td><td><?php echo $row[‘pesan’]; ?></td></tr>
<?php
}
?></table><?php
}
?>