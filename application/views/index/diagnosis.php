<div class="container" >       
	<div class="row">
		<h2>Your Business Models</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCanvas" >
			<span class="glyphicon glyphicon-plus"></span> New Business Model Canvas <span class="caret"></span>
		</button>
	</div>
</div>	
<div class="container-fluid canvasContainer" >       
	<div class="row">
		<div class="canvasDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="thumbnail">
				<img src="<?php echo URL; ?>public/img/leancanvas.png" alt="" class="canvasImg" >
				<h3 class="generic" data-field="title" data-set="innertext" ></h3>
				<p>	
					<?php if(Session::get('user_logged_in') == true){?>
					<form action="<?php echo URL; ?>canvas/canvas/" method="post" class="postLink" >
					    <input type="hidden" name="canvas_id" value="" class="generic" data-field="canvas_id" data-set="value" />
					    <button type="submit" class="btn btn-default btn-sm" >View Canvas</button>
					</form>
					<!--button class="btn btn-default btnDetails btn-sm" type="button" data-toggle="modal" data-target="#projectDetails" data-project_id="--project_id" >Progress</button -->	
					<?php }?>	
				</p>
			</div>
		</div>	
	</div>
</div>
<div class="modal-rows">
	<div class="modal fade" id="createCanvas">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Business Model Canvas</h4>
				</div>
				<form class="form-horizontal" id="frmAddCanvas" role="form" action="<?php echo URL; ?>canvas/createCanvas" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Canvas Title</label>
							<div class="col-xs-10">
								<input type="text" id="title" name="title" placeholder="Canvas Title" class="form-control" />
							</div>
						</div>
						<input type="hidden" id="user_id" name="user_id" value="<?php echo Session::get("user_id"); ?>" />
					</div>
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal rows-->

<style>
	.canvasImg{
		width: 245px;
	}

	.canvasContainer{
		min-height: 75%;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/slick/slick.css">
<script type="text/javascript" src="<?php echo URL; ?>public/plugins/slick/slick.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>
<script>

var options = {
	beforeSend: function(){
	$("#loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		$("#loader1").fadeOut("fast");
		
		$("#createCanvas").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Canvas Added Successfully</div>");
		
		refreshCanvas();
		
		//clear all fields and close the modal
		$('form')[0].reset();
		//location.reload();
	}, complete: function(response){
		$("#loader1").remove();
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createCanvas").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
$("#frmAddCanvas").ajaxForm(options);


/**
 * This section creates the view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */
var containerDesign = $(".canvasDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshCanvas(){
	var emptyDesign = "";
	
	data = {
		"table": '<?php echo PREFIX; ?>canvas',
		"fields": '*',
		"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};
	
	Generic.genericView(".canvasContainer", ".canvasDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//setHandlers();
	});
}

refreshCanvas();

</script>
