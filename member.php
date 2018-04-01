<section>
	<!-- Home start -->
	<div class="wl-home-style3  wl-paralax wl-home-bg3">
		<div class="wl-overlay">
			<div class="container">
				<div class="wl-home-items-contents wl-home-items3 wl-section-marginboth">
					<div class="wl-home-heading">
						<h1>Member Area</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home end -->
	<!-- Main content start -->
	<div class="wl-main-content">

<!-- coding member start -->
		<?php
		if (isset($_SESSION['tipe'])) {
		?>
			<script language="JavaScript">
  				alert('Anda Sudah Login rere');
  				document.location='index.php?menu=memberpage'
  			</script> 
  		<?php 
  		} else {
		?>
		<div class="login-box">
			<div class="lb-header">
				<a href="#" class="active" id="login-box-link">Login</a>
				<a href="#" id="signup-box-link">Sign Up</a>
			</div>
			<div class="social-login">
				<a href="#">
					<i class="fa fa-facebook fa-lg"></i>
					Login in with facebook
				</a>
				<a href="#">
					<i class="fa fa-google-plus fa-lg"></i>
					log in with Google
				</a>
			</div>
			<!-- loginplg.proses.php -->
			<form class="email-login" name="login" method="post" action="proseslogin.php">
				<div class="u-form-group">
					<input type="text" placeholder="Username" name="username">
				</div>
				<div class="u-form-group">
					<input type="password" placeholder="Password" name="password">
				</div>
				<div class="u-form-group">
					<button type="submit" name="login_btn">Log in</button>
				</div>
				<div class="u-form-group">
					<a href="#" class="forgot-password">Forgot password?</a>
				</div>
			</form>
			<form class="email-signup" name="register" method="post" action="prosesdaftar.php" style="display: none;">
				<div class="u-form-group">
					<input type="email" placeholder="Email" name="email">
				</div>
				<div class="u-form-group">
					<input type="text" placeholder="Username" name="username">
				</div>
				<div class="u-form-group">
					<input type="password" placeholder="Password" name="password">
				</div>
      <!--<div class="u-form-group">
        <input type="password" placeholder="Confirm Password" name="konfirm_pass"/>
    </div>-->
    			<div class="u-form-group">
    				<button type="submit">Sign Up</button>
    			</div>
			</form>
		</div>
		<?php } ?>

<!-- coding member end -->
</div>
<!-- Main content end -->
</section>
<script type="text/javascript">
$(".email-signup").hide();
$("#signup-box-link").click(function(){
  $(".email-login").fadeOut(100);
  $(".email-signup").delay(100).fadeIn(100);
  $("#login-box-link").removeClass("active");
  $("#signup-box-link").addClass("active");
});
$("#login-box-link").click(function(){
  $(".email-login").delay(100).fadeIn(100);;
  $(".email-signup").fadeOut(100);
  $("#login-box-link").addClass("active");
  $("#signup-box-link").removeClass("active");
});
</script>