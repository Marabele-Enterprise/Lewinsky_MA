<?php /*
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>Smart Store Online Inventory Management System</h1>
					<form class="form-inline" role="form">
					  <div class="form-group">
					    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
					  </div>
					  <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
					</form>					
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="<?php echo URL; ?>public/img/ipad-hand.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	*/
?>

	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>Dashboard</h1>
				<!-- echo out the system feedback (error and success messages) -->
				<?php $this->renderFeedbackMessages(); ?>

				<h3>This is an area that's only visible for logged in users</h3>

				Try to log out, an go to /dashboard/ again. You'll be redirected to /index/ as you are not logged in.
				<br/><br/>
				You can protect a whole section in your app within the according controller (here: controllers/dashboard.php)
				by placing <span style='font-style: italic;'>Auth::handleLogin();</span> into the constructor.
			</div>
		</div>
	</div>