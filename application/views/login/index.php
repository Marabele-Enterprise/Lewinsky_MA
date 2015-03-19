<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Info Blend Login Form</title>
		<meta name="generator" content="Bootply" />
		
		<link rel="shortcut icon" href="<?php echo URL; ?>public/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo URL; ?>public/img/favicon.ico" type="image/x-icon">
		
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
						<h1 class="text-center">Login</h1>
					</div>
					<div class="modal-body">
						<!-- echo out the system feedback (error and success messages) -->
						<?php $this->renderFeedbackMessages(); ?>
						
						<form class="form col-md-12 center-block" action="<?php echo URL; ?>login/login" method="post">
							<div class="form-group">
								<input type="text" name="user_name" class="form-control input-lg" placeholder="Username (or email)" required />
							</div>
							<div class="form-group">
								<input type="password" name="user_password" class="form-control input-lg" placeholder="Password" required />
							</div>
							<div class="form-group">
								<input type="checkbox" name="user_rememberme" class="remember-me-checkbox" style="float: left; min-width: 0px; margin: 3px 10px 15px 0px;" />
								<label class="remember-me-label" style="float: left; min-width: 0px; font-size: 12px; color: #888;">Keep me logged in (for 2 weeks)</label>
								<br />
							</div>
							<div class="form-group">
								<input type="submit" value="Sign In" class="btn btn-primary btn-lg btn-block" />
								<span class="pull-right"><a href="<?php echo URL; ?>login/register">Register</a> | <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a></span>
								<span><a href="<?php echo URL; ?>">Back To Home </a></span> | <!--span><a href="#">Need help?</a></span-->
								<br/>
							</div>
						</form>
						
						<?php if (FACEBOOK_LOGIN == true) { ?>
							<div class="login-facebook-box">
								<h1>or</h1>
								<a href="<?php echo $this->facebook_login_url; ?>" class="facebook-login-button">Log in with Facebook</a>
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