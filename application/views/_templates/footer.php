	<!-- footer -->
	<footer>
		<div class="container clearfix">
			<div class="privacy pull-left">&copy; <?php echo date("Y"); ?> | <a href="http://www.marabele.com"><?php echo SITENAME; ?></a> </div>
		</div>
	</footer>
	
	<div class="row modal-rows">
			<div class="modal fade" id="mdlLogin">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" id="frmLogin" role="form" action="<?php echo URL; ?>login/login" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">Login</h4>
							</div>
							<div class="modal-body">
								<div id="login_response" ></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="email">Email</label>
									<div class="col-sm-10">
										<input type="text" id="username" class="form-control" name="username" placeholder="Username or Email" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="password">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" placeholder="Password" name="password">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="checkbox">
											<input type="checkbox" name="user_rememberme"> Remember me
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<img src="<?php echo URL;?>public/img/loading.gif" class="loading"  />
								<button type="submit" class="btn btn-primary">Login</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			<div class="modal fade" id="mdlRegister">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Register</h4>
						</div>
					
						<div class="modal-body">
							<form class="form-horizontal" id="frmRegister" role="form" action="<?php echo URL; ?>login/register_action" method="post" enctype="multipart/form-data">
								<h3 class="successMsg" scoped style="display: none;" >Register Success!</h3>						
								<div class="form-group">
									<label class="col-sm-2 control-label" for="project_name">Email</label>
									<div class="col-sm-10">
										<input class="form-control" type="email" name="email" id="email" placeholder="Email" required pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="project_name">Username</label>
									<div class="col-sm-10">
										<input class="form-control" type="text" name="username" id="username" placeholder="eg. el_super77" required autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="password">Password</label>
									<div class="col-sm-10">
										<input class="form-control" type="password" name="password" id="password" placeholder="Password" pattern=".{6,}" required title="Minimum: 8 characters" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="cpassword">Confirm</label>
									<div class="col-sm-10">
										<input class="form-control" type="password" name="password_repeat" id="password_repeat" placeholder="Confirm Password" pattern=".{6,}" required title="Minimum: 8 characters" />
									</div>
								</div>						
								<div class="form-group">
									<label class="col-sm-2 control-label" for="firstname" >Name</label>
									<div class="col-sm-10">
										<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Name" required />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="lastname">Surname</label>
									<div class="col-sm-10">
										<input type="text" id="lastname" class="form-control" name="lastname" placeholder="Surname" />
									</div>
								</div>			
								<div class="form-group">
									<!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
									<!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
									<div class="col-sm-6" scoped style="float: right;" >
										<input type="text" name="captcha" class="form-control login_input" placeholder="Enter characters below" required />
									</div>
								</div>			
								<div class="form-group" scoped style="margin-bottom: 0px;">
									<!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
									<!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
									<label class="col-sm-6 control-label" scoped style="float: right;">
										<img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
										<span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
											<!-- quick & dirty captcha reloader -->
											<a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
										</span>
									</label>
								</div>
								<!--div class="form-group">
									<div class="col-sm-12">
										<div class="checkbox">
											<input type="checkbox" required > <a href="#" >I agree to the Terms of Service:</a>
										</div>
									</div>
								</div -->					
								<div class="form-group">
									<div class="col-sm-12">
										<input type="hidden" id="registerType" name="user_account_type" value="User" />
										<input type="hidden" id="title" name="title" value="Mr" />
										
										<button type="submit" class="btn btn-primary">Register</button>
									</div>
								</div>
							</form>
						</div>
						
						<div class="modal-footer">
							<img src="<?php echo URL;?>public/img/loading.gif" class="loading"  />
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		
	</div><!-- /.modal rows-->
</div> <!-- /.container-fluid -->	

<script type="text/javascript" src="<?php echo URL; ?>public/plugins/bootstrap-3.3.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
	var login_options = {
		beforeSend: function(){
			$("#loading").fadeIn('slow');
			console.log("beforeSend");
		}, uploadProgress: function(event, position, total, percentComplete){
			//$("#broadcastBar").width(percentComplete+'%');
			//$("#broadcastPercent").html(percentComplete+'%');
			console.log("uploadProgress");
		}, success: function(response){
			//clear all fields
			//$("form").reset();
			// Success message
			if(response == "Success"){
				window.location = $("#URLholder").val()+"index/index";
				// Fail message
				$('#login_response').html("<div class='alert alert-success'>");
				$('#login_response > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append( "</button>");
				$('#login_response > .alert-success').append("<strong>Success</strong> "+response);
				$('#login_response > .alert-success').append('</div>');
			}else{
				// Fail message
				$('#login_response').html("<div class='alert alert-danger'>");
				$('#login_response > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append( "</button>");
				$('#login_response > .alert-danger').append("<strong>Sorry, but an error occured...</strong> "+response);
				$('#login_response > .alert-danger').append('</div>');
			}
			
			
		}, complete: function(response){
			$("#loading").fadeOut('slow');
			console.log("Complete. response: "+response.responseText);
		}, error: function(){
			// Fail message
			$('#login_response').html("<div class='alert alert-danger'>");
			$('#login_response > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
			.append( "</button>");
			$('#login_response > .alert-danger').append("<strong>Sorry, it seems that server is not responding...</strong> Could you please notify me directly to <a href='kabelokwasi@gmail.com?Subject=Message_Me;>kabelokwasi@gmail.com</a> ? Sorry for the inconvenience!");
			$('#login_response > .alert-danger').append('</div>');
			//clear all fields
			$('form')[0].reset();
			
			console.log("ERROR: ");
		}
	};
	var register_options = {
		beforeSend: function(){
			$("#loading").fadeIn('slow');
			
			console.log("beforeSend");
		}, uploadProgress: function(event, position, total, percentComplete){
			//$("#broadcastBar").width(percentComplete+'%');
			//$("#broadcastPercent").html(percentComplete+'%');
			console.log("uploadProgress");
		}, success: function(response){
				//clear all fields
				//$("form").reset();
				// Success message
				$('.successMsg').delay(667).slideDown('slow').delay(2667).slideUp(666);
		}, complete: function(response){
			$("#loading").fadeOut('slow');
			console.log("Complete. response: "+response.responseText);
		}, error: function(){
			// Fail message
			$('#success').html("<div class='alert alert-danger'>");
			$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
			.append( "</button>");
			$('#success > .alert-danger').append("<strong>Sorry, it seems that server is not responding...</strong> Could you please notify me directly to <a href='kabelokwasi@gmail.com?Subject=Message_Me;>kabelokwasi@gmail.com</a> ? Sorry for the inconvenience!");
			$('#success > .alert-danger').append('</div>');
			//clear all fields
			$('form')[0].reset();
			
			console.log("ERROR: ");
		}
	};
	$("#frmLogin").ajaxForm(login_options);
	$("#frmRegister").ajaxForm(register_options);

	$('.signOut').click(function(e) {
		e.preventDefault();
		$.ajax({
		type: 'POST',
		url: $("#URLholder").val()+'login/logout',
		cache: false,	
		success:function(result){
			if(result == "Success")
			{
				window.location = $("#URLholder").val();
			}
		},
		error:function(result){
			alert("Oops, something went wrong");
		}
		}).done(function(data) {
			console.log(data);
		}).fail(function(jqXHR,status, errorThrown) {
			console.log(errorThrown);
			console.log(jqXHR.responseText);
			console.log(jqXHR.status);
		});
		return false;
	});	

	$('.checkLogin').click(function(e){
		e.preventDefault();
		if($("#LoginStatus").val() == "false"){
			$('#mdlLogin').modal("show");
		}else{
			window.location = $(this).attr("href");
		}
	});
</script>	
</body>
</html>