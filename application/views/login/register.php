<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Info Blend Registration Form</title>
		
		<link rel="shortcut icon" href="<?php echo URL; ?>public/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo URL; ?>public/img/favicon.ico" type="image/x-icon">
		
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap/bootstrap.min.css" />
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap/styles.css" />
	</head>
	<body>
		<!--login modal-->
		<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<a href="<?php echo URL; ?>" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
						<h1 class="text-center">Register</h1>
					</div>
					<div class="modal-body">
						<!-- echo out the system feedback (error and success messages) -->
						<?php $this->renderFeedbackMessages(); ?>
						
						<form class="form col-md-12 center-block" action="<?php echo URL; ?>login/register_action" name="registerform" method="post">
							<div class="form-group">
								<input id="login_input_fname" type="text" name="user_fname" class="form-control input-lg login_input" placeholder="First Name" required />
							</div>
							<div class="form-group">
								<input id="login_input_surname" type="text" name="user_surname" class="form-control input-lg login_input" placeholder="Surname" required />
							</div>
							<div class="form-group">
								<input id="login_input_email" type="email" name="user_email" class="form-control input-lg login_input" placeholder="Email" required />
							</div>
							<div class="form-group">
								<input id="input_store_phone" type="text" name="store_phone" class="form-control input-lg login_input" placeholder="Phone" required />
							</div>
							<div class="form-group">
								<input id="input_store_name" type="text" name="store_name" class="form-control input-lg login_input" placeholder="Store Name" required />
							</div>
							<div class="form-group">
								<input id="input_store_address_line1" type="text" name="store_address_line1" class="form-control input-lg login_input" placeholder="Address Line 1" required />
							</div>
							<div class="form-group">
								<input id="input_store_address_line2" type="text" name="store_address_line2" class="form-control input-lg login_input" placeholder="Address Line 2" required />
							</div>
							<div class="form-group">
								<input id="input_store_city" type="text" name="store_city" class="form-control input-lg login_input" placeholder="City" required />
							</div>
							<div class="form-group">
								<input id="input_store_zip" type="text" name="store_zip" class="form-control input-lg login_input" placeholder="Zip Code" required />
							</div>
							<div class="form-group">
								<input id="login_input_username" type="text" name="user_name" class="form-control input-lg login_input" placeholder="Username (only letters and numbers, 2 to 64 characters)" pattern="[a-zA-Z0-9]{2,64}" required />
							</div>
							<div class="form-group">
								<input id="login_input_password_new" type="password" name="user_password_new" class="form-control input-lg login_input" placeholder="Password (min. 6 characters!)" pattern=".{6,}" required autocomplete="off" />
							</div>
							<div class="form-group">
								<input id="login_input_password_repeat" type="password" name="user_password_repeat" class="form-control input-lg login_input" placeholder="Repeat Password" pattern=".{6,}" required autocomplete="off" />
							</div>
							<div class="form-group">
								<!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
								<!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
								<img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
								<span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
									<!-- quick & dirty captcha reloader -->
									<a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
								</span>
								<input type="text" name="captcha" class="form-control input-lg login_input" placeholder="Please enter these characters" required />
							</div>
							<div class="form-group">
								<input type="submit" name="register" value="Register" class="btn btn-primary btn-lg btn-block" />
								<span class="pull-right"><a href="<?php echo URL; ?>login/index">Already have an account?</a></span>
								<span><a href="<?php echo URL; ?>">Back To Home </a></span> | <!--span><a href="#">Need help?</a></span-->
							</div>
						</form>
						
						<?php if (FACEBOOK_LOGIN == true) { ?>
							<div class="register-facebook-box">
								<h1>or</h1>
								<a href="<?php echo $this->facebook_register_url; ?>" class="facebook-login-button">Register with Facebook</a>
							</div>
						<?php } ?>
					</div>
					<div class="modal-footer">
						<div class="col-md-12">
							<a href="<?php echo URL; ?>" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</a>
						</div>	
					</div>
				</div>
			</div>
			
			<div style="width: 600px; margin: 30px auto;">
				<p class="centered">Copyright &copy; 2014 Blueberry Bee (Pty) Ltd. All rights reserved.</p>
			</div><!-- /container -->
		</div>
		
		<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo URL; ?>public/js/bootstrap/bootstrap.min.js"></script>
	</body>
</html>