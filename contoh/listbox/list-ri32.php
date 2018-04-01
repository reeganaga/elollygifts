<script languange="Javascript1.2">
function pilih(id){
	location.replace("list-ri32.php?id="+id);
}
</script>

<?php
include "conn.php";

if($_GET['']!==""){
	$id=$_GET['id'];
	
	$query=mysql_query("select * from guestbook where id_gb='$id'");
	?>
	<table border="1">
	<tr><th>No</th><th>Nama</th><th>Email</th><th>Pesan</th></tr>
	<?php
	while($row=mysql_fetch_array($query)){
		?>
		<tr><td><?php echo $c=$c+1;?></td><td><?php echo $row['nama'];?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['pesan']; ?></td></tr>
		<?php
	}
	?></table><?php
}

?>
<html>
<head><title>List Data</title></head>
<body>
<p>&nbsp;</p>
<table border="0">
<tr>
	<th align="left">Select Multiple</th>
	<th align="left">Select Combobox</th>
</tr>
<tr>
	<td width="241">
	<select multiple="multiple" name="id" id="id" onChange="pilih(this.value)">
	<?php 
	$query_limit=mysql_query("select * from guestbook");
	
	while($row=mysql_fetch_array($query_limit))
	{
		?><option value="<?php  echo $row['id_gb']; ?>"><?php  echo $row['nama']; ?></option><?php 
	}
	?>
	</select>
	</td>
	<td width="195" valign="top">
	<select name="id" id="id" onChange="pilih(this.value)">
		<option value="0" selected="selected">Pilih Nama</option>
		<?php 
		$query_limit=mysql_query("select * from guestbook");
		
		while($row=mysql_fetch_array($query_limit))
		{
			?><option value="<?php  echo $row['id_gb']; ?>"><?php  echo $row['nama']; ?></option><?php 
		}
		?>
	</select>	
	</td>
</tr>
</table>
</body>
</html>
