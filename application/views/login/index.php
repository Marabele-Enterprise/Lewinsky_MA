<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $this->page_title; ?></title>
		<meta name="generator" content="Bootply" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		
		<link href="<?php echo URL; ?>public/plugins/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo URL; ?>public/plugins/bootstrap-3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="<?php echo URL; ?>public/css/signin.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<div class="container">
			<form class="form-signin" method="post" action="<?php echo URL; ?>login/login">
				<h2 class="form-signin-heading">Please sign in</h2>
				<label for="inputEmail" class="sr-only">Username</label>
				<input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>
		
		<!--div class="row"-->
			<div class="col-md-12-">
				<p align="center">Copyright &copy; 2015 MediSuite. All rights reserved.</p>
			</div>
		<!--/div-->
		
		<!-- script references -->
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/plugins/bootstrap-3.3.2/js/bootstrap.min.js"></script>
	</body>
</html>