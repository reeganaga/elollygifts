<!DOCTYPE html>
<?php 
session_start();
require_once ("koneksi.php");
$sw_menu=(isset($_REQUEST['menu'])) ? $_REQUEST['menu'] :"";  
?>
<html lang="en">

<!-- Mirrored from wilylab.com/wtemplate/portfolio-column-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2016 12:22:24 GMT -->
<head>	
	<!-- Meta tags
	============================================= -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Wilylab" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0, minimum-scale=1, user-scalable=yes"/>

	<!-- Google font
	============================================= -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,700,800,900' rel='stylesheet' type='text/css'>
	
	<!-- Title
	============================================= -->
	<title>Elolly Gifts</title>
	
	<!-- favicon
	============================================= -->
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

	<!-- Bootstrap CSS
	============================================= -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

	<!-- Elegant CSS (icon)
	============================================= -->
	<link rel="stylesheet" href="css/elegant.css" type="text/css" />
	
	<!-- owl.carousel CSS
	============================================= -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

	<!-- Cubeportfolio CSS
	============================================= -->
	<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">

	<!-- Meanmenu CSS
	============================================= -->
	<link rel="stylesheet" type="text/css" href="css/meanmenu.min.css">

	<!-- style CSS
	============================================= -->
	<link rel="stylesheet" href="style.css" type="text/css" />

	<!-- Responsive CSS
	============================================= -->
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />

	<!-- jquery -->
	<script src="js/jquery-1.7.1.min.js"></script>
</head>
<body>
	<!--<div class="wl-body-wraper">-->
		<!-- Header start -->
		<?php
		require_once 'require/header_content.php';
		?>
		<!-- Header end -->
		<?php
		require_once 'link_homepage.php';
		?>
		<!-- Footer start -->
		<!--
		<?php
		
		?>-->
		<!-- Footer end -->
		<!-- scroll-top start -->
		<div class="scroll-top">
			<span title="Go to top" data-icon=&#xe047;></span>
		</div>
		<!-- scroll-top end -->
	</div>

	<!-- External JavaScripts
	============================================= -->
	<!-- jquery js -->
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Bootstrap js -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Meanmenu js -->
	<script src="js/jquery.meanmenu.min.js"></script>

	<!-- Viewport js -->
	<script src="js/viewport.js"></script>

	<!-- jquery parallax -->
	<script src="js/jquery.parallax-1.1.3.js"></script>

	<!-- owl carousel js -->
	<script src="js/owl.carousel.js"></script>

	<!-- jquery appear js -->
	<script src="js/jquery.appear.js"></script>

	<!-- cubeportfolio js -->
	<script src="js/jquery.cubeportfolio.min.js"></script>

	<!-- jquery masonry js -->
	<script src="js/cbp-methods.js"></script>

	<!-- Custom js -->
	<script  src="js/custom.js"></script>

	<script>
		(function($) {
			'use strict';
			cbpFilter.tripleItem();
		})(jQuery);
	</script>

	<!--[if IE 8]>
	    <script src="js/respond.js"></script>
	    <![endif]-->

	</body>

	<!-- Mirrored from wilylab.com/wtemplate/portfolio-column-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2016 12:22:24 GMT -->
	</html>