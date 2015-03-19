<?php /*	
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>Smart Store Online Invenotry Management System</h1>
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
				<h1>Verification</h1>

				<!-- echo out the system feedback (error and success messages) -->
				<?php $this->renderFeedbackMessages(); ?>

				<a href="<?php echo URL; ?>login/index">Go to login</a>
			</div>
		</div>
	</div>
