<footer>
	<!--<div class="container">-->
		
		<?php 
			$query= "SELECT * FROM contact where id_contact= 1";
    		$eksquery = mysql_query($query);
    		$record = mysql_fetch_array($eksquery);
		?>

		<!--<div class="wl-logo">
			<a class="wl-img" href="index.php"><img src="images/w-logo.png" alt="logo"></a>
		</div>
		<div class="wl-copy-right">-->
			<p>
				<strong>Hubungi Kami</strong><br>
				No. Telp : <?php echo $record['no_hp'] ?><br>
				Pin BBM  : <?php echo $record['pinbbm'] ?><br>	 
			</p>
		</div>
		<!--<div class="wl-media-icons">
			<div class="wl-media-plot">-->
				<a href="<?php echo $record['fb'] ?>"><span data-icon=&#xe093;></span></a>
				<a href="<?php echo $record['twitter'] ?>"><span data-icon=&#xe094;></span></a>
				<a href="<?php echo $record['gmail'] ?>"><span data-icon=&#xe096;></span></a>
				<a href="<?php echo $record['pinterest'] ?>"><span data-icon=&#xe095;></span></a>
			<!--</div>
		</div>
	</div>-->
</footer>