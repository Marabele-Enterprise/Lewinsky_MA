<?php 

/**
* View Profile/index
*/
 $this->renderFeedbackMessages();
 //d($this->user);
 //d($this->store);
 
if($this->user){
?>

	<div id="content">
		<div class="container">
			<div class="row-fluid">
				<div id="content" class="span12">
					<div>
						<h2>Profile</h2>
						
						<div id="details" class="span7">
							<div>
								<div>
									<p>
										<div class="box">
											<img style="position: relative;" width="160" height="160" src="<?php echo $this->user->user_avatar_link; ?>">
												<!--i class="fa fa-camera fa-3x"></i-->
											</img>
											<div class ="overlay">
												<a href="javascript:void(0);">Update Photo</a>
											</div>
											<div id="avatarForm">
												<form style="display: none;" action="<?php echo URL; ?>profile/uploadavatar_action/<?php echo $this->user->user_id; ?>" method="post" enctype="multipart/form-data">
													<label for="avatar_file">Select a photo from your hard-disk (will be scaled to 44x44 px):</label>
													<input id="avatar_file" type="file" name="avatar_file" required />
													<!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
													<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
													<input id="uploadAvatar" name="submit" type="submit" value="Upload image" />
												</form>
												<!--input id="avatarInput" type="file" accept="image/*" /-->
											</div>
										</div>
											
									</p>
								</div>
								
								
						
									
								<h3><?php echo $this->user->user_name; ?></h3>
								<h4>Store Owner</h4>
								<br />
								<br />
								
								<h3>Basic Information</h3>
								<hr />
								<table class="table table-striped" id="basic-info">
									<tbody>
										<tr>
											<td>First Name</td>
											<td>
												:
												<i class="glyphicon glyphicon-user"></i>
												<?php echo $this->user->user_fname; ?>
											</td>
										</tr>
										<tr>
											<td>Surname</td>
											<td>
												:
												<i class="fa fa-user"></i>
												<?php echo $this->user->user_surname; ?>
											</td>
										</tr>
										<tr>
											<td>Store Name</td>
											<td>
												:
												<i class="fa fa-shopping-cart"></i>
												<?php echo $this->store->store_name; ?>
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
												:
												<i class="fa fa-home"></i>
												<?php echo $this->store->store_address; ?>
											</td>
										</tr>
										<tr>
											<td>City</td>
											<td>
												:
												<i class="fa fa-building-o"></i>
												<?php echo $this->store->store_city; ?>
											</td>
										</tr>
										<tr>
											<td>Postal Code</td>
											<td>
												:
												<i class="fa fa-code"></i>
												<?php echo $this->store->store_zip; ?>
											</td>
										</tr>
										<tr>
											<td>Contact Number</td>
											<td>
												:
												<i class="fa fa-phone"></i>
												<?php echo $this->store->store_phone; ?>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>
												:
												<i class="fa fa-envelope"></i>
												<a href="mailto:<?php echo $this->store->store_email; ?>"><?php echo $this->store->store_email; ?></a>
											</td>
										</tr>
									</tbody>
								</table> <!-- /#basic-info -->
							</div> <!-- / -->
						</div> <!-- /#details -->
					</div> <!-- /.span4 -->
				</div> <!-- /#content -->
			</div> <!-- /.row-fluid -->
		</div> <!-- /.container -->
	</div> <!-- /#content -->
</div> <!-- /#wrapper -->
<?php } ?>

<!-- File Upload -->
<!--link href="<?php echo URL; ?>public/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo URL; ?>public/js/fileinput.min.js" type="text/javascript"></script-->

<script>
	$(document).ready(function(){
		/*$("#avatarInput").fileinput({
			previewFileType: "image",
			browseClass: "btn btn-success",
			browseLabel: "Update Photo",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
		});*/
		
		$(".overlay a").click(function(){
			$("#avatar_file").trigger("click");
			//$("#uploadAvatar").trigger("click");
		});
		$("input[name='avatar_file']").change(function(){
			//this.form.submit();
			$("#uploadAvatar").trigger("click");
		});
	});
</script>

<script>
	$(".box").hover(function(){
		$(this).find(".overlay").fadeIn();
	}
	,function(){
		$(this).find(".overlay").fadeOut();
	});
</script>

<style>
div.box div.overlay
{
    display:none;
}

​div.box:hover div.overlay
{
 display:block;   
}​

div.overlay{
    z-index: -10;
}
</style>
