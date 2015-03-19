<input type="hidden" id="current_canvas_version_id" value="<?php echo $this->canvas_versions[0]->canvas_version_id; ?>" />
<input type="hidden" id="current_canvas_version" value="<?php echo $this->canvas_versions[0]->canvas_version; ?>" />
<input type="hidden" id="current_canvas_version_index" />
<div class="container" >       
	<div class="row">
		<h2><?php //print_r($this->canvas_versions[0]); ?> Lean Canvas for <?php echo($this->canvas_details[0]->title); ?></h2>
		<div id="feedback">
		</div>
		<div class="iterator btn-group" >
			<button type="button" class="btn btn-default btn-iterate" data-direction="first" >
				<span class="glyphicon glyphicon-step-backward"></span>
			</button>
			<button type="button" class="btn btn-default btn-iterate" data-direction="left" >
				<span class="glyphicon glyphicon-triangle-left"></span>
			</button>
			<button type="button" class="btn btn-default btn-iterate" data-direction="left" >
				<b>Version <span class="current_canvas_version"><?php echo $this->canvas_versions[0]->canvas_version; ?></span></b>
			</button>
			<button type="button" class="btn btn-default btn-iterate" data-direction="right" >
				<span class="glyphicon glyphicon-triangle-right"></span>
			</button>
			<button type="button" class="btn btn-default btn-iterate" data-direction="last" >
				<span class="glyphicon glyphicon-step-forward"></span>
			</button>										
		</div>	
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="glyphicon glyphicon-plus"></span><span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#" type="button" data-toggle="modal" data-target="#createHypothesis" >New Hypothesis</a></li>
				<!--li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li-->
				<li class="divider"></li>
				<li>
					<form id="frmCreateCanvasVersion" action="<?php echo URL; ?>canvas/createCanvasVersion/" method="post" class="postLink" >
						<input type="hidden" name="canvas_version_id" id="canvas_version_id" value="<?php echo $this->canvas_versions[0]->canvas_version_id; ?>" />
					    <input type="hidden" name="canvas_id" id="canvas_id" value="<?php echo $this->canvas_versions[0]->canvas_id; ?>" />
					    <input type="hidden" name="canvas_version" id="canvas_version" value="<?php echo $this->canvas_versions[0]->canvas_version; ?>" />
					    <button type="submit" class="btn btn-default" >New Canvas Version</button>
					</form>
				</li>
			</ul>
		</div>	
	</div>
</div>	
<div class="container-fluid canvas_container" >       
	<div class="row whiteboard">
		<div class="canvas_header">
			<div class="col long_col category_block scrollable" id="col_1" data-category="Problem" >
				<h3>Problem</h3>
			</div>
			<div class="long_col col" id="col_2" >
				<div id="block_solution" class="col_inner medium_col category_block scrollable" data-category="Solution" >
					<h3>Solution</h3>
					<div class="sticky taped hypothesisDesign" >
						<span class="glyphicon glyphicon-edit hover-icon btnUpdateHypothesis"></span>
						<span class="btnDeleteTask hover-icon delete-icon" >X</span>
						<span class="generic titleHolder" data-field="hypothesis" data-set="innertext" ></span>
						<input type="hidden" class="generic hypothesis_id_holder" data-field="hypothesis_id" data-set="value" />
						<input type="hidden" class="generic hypothesis_status_holder" data-field="status" data-set="value" value="" />
						<br/>
						<select class="statusSelectPicker" data-style="btn-info">
							<option data-icon="glyphicon-hourglass" value="Pending" >Pending</option>
							<option data-icon="glyphicon-ok" value="Validated" >Validated</option>
							<option data-icon="glyphicon-remove" value="Invalidated" >Invalidated</option>
						</select>
					</div>
				</div>
				<div id="block_key_metrics" class="col_inner small_col category_block scrollable" data-category="Key Matrics"><h3>Key Matrics</h3></div>	
			</div>	
			<div class="col long_col category_block scrollable" id="col_3" data-category="Unique Value Proposition" ><h3 id="col-3">Unique Value Proposition</h3></div>
			<div class="long_col col" id="col_4" >
				<div id="block_advantage" class="col_inner medium_col category_block scrollable" data-category="Unfair Advantage" ><h3>Unfair Advantage</h3></div>
				<div id="block_channels" class="col_inner small_col category_block scrollable" data-category="Channels"><h3>Channels</h3></div>
			</div>	
			<div class="col long_col category_block scrollable" id="col_5" data-category="Customer Segments"><h3>Customer Segments</h3></div>
		</div>	
		<div class="canvas_footer" id="col_6">
			<div id="block_costs" class="col_big category_block scrollable" data-category="Cost Structure"><h3 id="col-5">Cost Structure</h3></div>
			<div id="block_revenue" class="col_big category_block scrollable" data-category="Revenue Streams"><h3 id="col-5">Revenue Streams</h3></div>
		</div>	
	</div>
</div>
<div class="modal-rows">
	<div class="modal fade" id="createHypothesis">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Business Model Hypothesis</h4>
				</div>
				<form class="form-horizontal" id="frmAddHypothesis" role="form" action="<?php echo URL; ?>canvas/createHypothesis" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="category">Category</label>
							<div class="col-xs-10">
								<select type="date" id="category" name="category" class="form-control" >
									<option ></option>
									<option value="Problem" > Problem</option>
									<option value="Solution" >Solution</option>
									<option value="Key Matrics" >Key Matrics</option>
									<option value="Unique Value Proposition" >Unique Value Proposition</option>
									<option value="Unfair Advantage" >Unfair Advantage</option>
									<option value="Channels" >Channels</option>
									<option value="Customer Segments" >Customer Segments</option>
									<option value="Cost Structure" >Cost Structure</option>
									<option value="Revenue Streams" >Revenue Streams</option>									
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="hypothesis">Hypothesis</label>
							<div class="col-xs-10">
								<input type="text" id="hypothesis" name="hypothesis" placeholder="Hypothesis" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="category">Priority</label>
							<div class="col-xs-10">
								<select type="date" id="priority" name="priority" class="form-control" >
									<option ></option>
									<option value="Low" >Low</option>
									<option value="Medium" >Medium</option>
									<option value="High" >High</option>
								</select>
							</div>
						</div>						
						<input type="hidden" id="canvas_version_id" name="canvas_version_id" value="<?php echo $this->canvas_versions[0]->canvas_version; ?>" />
						<input type="hidden" id="canvas_id" name="canvas_id" value="<?php echo($this->canvas_details[0]->canvas_id); ?>" />
						<input type="hidden" id="user_id" name="user_id" value="<?php echo Session::get("user_id"); ?>" />
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>hypothesis" >
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
	<div class="modal fade" id="updateHypothesis">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Hypothesis</h4>
				</div>
				<form class="form-horizontal" id="frmUpdateHypothesis" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="hypothesisDetailsTarget" >				
						<div class="modal-body hypothesisDetailsDesign">
							<div id="feedback"></div>	
							<div class="form-group">
								<label class="col-xs-2 control-label" for="category">Category</label>
								<div class="col-xs-10">
									<select type="date" id="category" name="category" class="form-control" >
										<option class="generic" data-field="category" data-set="innertext" selected ></option>
										<option value="Problem" >Problem</option>
										<option value="Solution" >Solution</option>
										<option value="Key Matrics" >Key Matrics</option>
										<option value="Unique Value Proposition" >Unique Value Proposition</option>
										<option value="Unfair Advantage" >Unfair Advantage</option>
										<option value="Channels" >Channels</option>
										<option value="Customer Segments" >Customer Segments</option>
										<option value="Cost Structure" >Cost Structure</option>
										<option value="Revenue Streams" >Revenue Streams</option>									
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="hypothesis">Hypothesis</label>
								<div class="col-xs-10">
									<input type="text" id="hypothesis" name="hypothesis" placeholder="Hypothesis" class="form-control generic" data-field="hypothesis" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="category">Priority</label>
								<div class="col-xs-10">
									<select type="date" id="priority" name="priority" class="form-control" >
										<option class="generic" data-field="priority" data-set="innertext" selected ></option>
										<option value="Low" >Low</option>
										<option value="Medium" >Medium</option>
										<option value="High" >High</option>
									</select>
								</div>
							</div>						
							<input type="hidden" id="canvas_version_id" name="canvas_version_id" value="<?php echo $this->canvas_versions[0]->canvas_version; ?>" />
							<input type="hidden" id="canvas_id" name="canvas_id" value="<?php echo($this->canvas_details[0]->canvas_id); ?>" />
							<input type="hidden" id="user_id" name="user_id" value="<?php echo Session::get("user_id"); ?>" />
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>hypothesis" >
						</div>
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

<link href="<?php echo URL; ?>public/css/canvas_styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/bootstrap-select/css/bootstrap-select.css">
<style>
	.sticky {
		width: 90%;
		margin: 0 auto;
		margin-bottom: 22px;
		color: black;
		-webkit-box-shadow: #DDD 0px 1px 2px;
		position: relative;
		background-color: #F4F39E;
		border-color: #DEE184;
		text-align: center;
		padding: 0.8em;
		-webkit-box-shadow: 6px 6px 32px 16px rgba(0,0,0,0.62);
		-moz-box-shadow: 6px 6px 32px 16px rgba(0,0,0,0.62);
		box-shadow: 6px 6px 32px 16px rgba(0,0,0,0.62);
		font-family: Satisfy;
		box-shadow: 0 10px 10px 2px rgba(0,0,0,0.3);
	}
	.sticky.taped:after {
		display: block;
		content: "";
		position: absolute; 
		width: 45%;
		height: 26px;
		top: -14px;
		left: 25%;    
		background: transparent url(<?php echo URL; ?>public/img/tape.png) 0 0 no-repeat;
	}

	.sticky > .titleHolder{
		font-size: 16px;
		font-weight: bolder;
	}

	.hover-icon{
		opacity: .3;
		font-weight: bold;
	}

	.delete-icon{
		position: absolute;
		left: 93%;
		top: 0px;
		font-family: cursive;
	}

	.btnUpdateHypothesis{
		position: absolute;
		left: 2%;
		top: 4px;	
		font-weight: lighter;
	}
	
	.hover-icon:hover{
		opacity: .9;
		cursor: pointer;
	}	

	.status{
		width: 120px !important;
	}

	.bootstrap-select > .btn {
		width: auto;
	}

	.iterator > button{
		
	}

	.statusSelectPicker{
		display: none;
	}
</style>

<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script>
var options = {
	beforeSend: function(){
	$("#loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		$("#loader1").fadeOut("fast");
		
		$("#createHypothesis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Hypothesis Added Successfully</div>");
		
		refreshView();
		
		//clear all fields and close the modal
		$('#frmAddHypothesis')[0].reset();
		//location.reload();

		var delay = 13666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);

	}, complete: function(response){
		$("#loader1").remove();
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createHypothesis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
$("#frmAddHypothesis").ajaxForm(options);


var options2 = {
	beforeSend: function(){
	$("#loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){

		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Canvas Version Added Successfully</div>");
		
		//refreshView();
		
		//clear all fields and close the modal
		//$('form')[0].reset();
		//location.reload();

		var delay = 13666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);

	}, complete: function(response){
		$("#loader1").remove();
		console.log(":) Smile, Your Rich. response: "+response.responseText);
	}, error: function(){
		//$("#createHypothesis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to create item.</div>");
		
		//clear all fields
		//$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
$("#frmCreateCanvasVersion").ajaxForm(options2);


/**
 * This section creates the view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved.
 */
var containerDesign = $(".hypothesisDesign").clone().wrapAll("<div/>").parent().html();
function refreshView(){
	/**
	 * Loop through all category blocks and populate them with hypothesis
	 */
	 $(".hypothesisDesign, .sticky").remove();

	$(".category_block").each(function(i){
		
		data = {
			"table": '<?php echo PREFIX; ?>hypothesis a JOIN <?php echo PREFIX; ?>hypothesis_version b ON (a.hypothesis_id = b.hypothesis_id)',
			"fields": 'a.*, b.*',
			"where":  "b.canvas_version_id = "+$("#current_canvas_version_id").val()+" AND a.canvas_id = "+<?php echo $this->canvas_details[0]->canvas_id; ?>+
			" AND a.category = '"+$(this).attr("data-category")+"'",
			"containerDesign": containerDesign,
			"emptyDesign": ""
		};

		/*
		data = {
			"table": <?php echo PREFIX; ?>+'hypothesis a JOIN hypothesis_version b1 ON (a.hypothesis_id = b1.hypothesis_id) LEFT OUTER JOIN hypothesis_version b2 ON (a.hypothesis_id = b2.hypothesis_id AND (b1.hypothesis_version_id < b2.hypothesis_version_id))',
			"fields": 'a.*, b1.*',
			"where": "b1.canvas_version_id = "+$("#current_canvas_version_id").val()+" AND a.user_id = "+<?php echo Session::get("user_id"); ?>+" AND a.canvas_id = "+<?php echo $this->canvas_details[0]->canvas_id; ?>+
			" AND a.category = '"+$(this).attr("data-category")+"' AND b2.hypothesis_version_id IS NULL",
			"containerDesign": containerDesign,
			"emptyDesign": ""
		};
		
		data = {
			"table": <?php echo PREFIX; ?>+'hypothesis a INNER JOIN hypothesis_version b1 ON b1.hypothesis_id = (SELECT hypothesis_version_id FROM hypothesis_version WHERE hypothesis_id = a.hypothesis_id ORDER BY hypothesis_version_id DESC LIMIT 1)',
			"fields": 'a.*, b1.*',
			"where": 'a.user_id = '+<?php echo Session::get("user_id"); ?>+" AND a.canvas_id = "+<?php echo $this->canvas_details[0]->canvas_id; ?>+
			" AND a.category = '"+$(this).attr("data-category")+"' ",
			"containerDesign": containerDesign,
			"emptyDesign": ""
		};
		*/
		Generic.genericView("#"+$(this).attr("id"), ".hypothesisDesign", data, "other", "append", function(){
			console.log("Data append Completed :)");

			setBtnHandlers();
		});	
	});
}

refreshView();

var hypothesisDetailsDesign = $(".hypothesisDetailsDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteTask:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var hypothesis_id = $(this).parent().find(".hypothesis_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this hypothesis? It will be deleted for only this canvas version.") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>hypothesis',
				"where": "hypothesis_id = "+hypothesis_id
			};
			Generic.genericAction("delete", data, function(){
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnUpdateHypothesis:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var hypothesis_id = $(this).parent().find(".hypothesis_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>hypothesis',
			"fields": '*',
			"where": 'hypothesis_id = '+hypothesis_id,
			"containerDesign": hypothesisDetailsDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".hypothesisDetailsTarget", ".hypothesisDetailsDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#updateHypothesis').modal('show');
	});	

	//$('.statusSelectPicker').selectpicker();
	var status;
	$('.statusSelectPicker').each(function(i){
		status = $(this).parent().find(".hypothesis_status_holder").val();

		switch (status) {
			case "Pending":
				$(this).val("Pending");
				$(this).selectpicker({
						style: 'btn-info'
					});
				$(this).next().fadeIn(25);
				break;
			case "Validated":
				$(this).val("Validated");
				$(this).selectpicker({
						style: 'btn-success'
					});
				$(this).next().fadeIn(25);
				break;
			case "Invalidated":
				$(this).val("Invalidated");
				$(this).selectpicker({
						style: 'btn-danger'
					});
				$(this).next().fadeIn(25);
				break;								
			default:
				console.log("Unknown Status.");
				if(status == "0"){
					console.log("DELETE ME.");
					//$(this).parent().remove();
				}
				break;
		}
	});

	$('.statusSelectPicker:not(.bound)').addClass('bound').on("change", function(){
		var status = $(this).val();
		var hypothesis_id = $(this).parent().find(".hypothesis_id_holder").val();
		$(this).parent().find(".hypothesis_status_holder").val(status);
		console.log(hypothesis_id+"<<YOU ARE GOD>>"+status+$("#current_canvas_version_id").val());

		switch (status) {
			case 'Pending':
				$(this).val("Pending");
				$(this).selectpicker('setStyle', 'btn-info');
				break;
			case 'Validated':
				$(this).val("Validated");
				$(this).selectpicker('setStyle', 'btn-success');
				break;
			case 'Invalidated':
				$(this).val("Invalidated");
				$(this).selectpicker('setStyle', 'btn-danger');
				break;								
			default:
				console.log("Unknown Status.");
				return;
		}

		data = {
			"table": <?php echo PREFIX; ?>+'hypothesis_version',
			"where": "canvas_version_id = "+$("#current_canvas_version_id").val()+" AND hypothesis_id = "+hypothesis_id,
			"status": status

		};
		
		Generic.genericAction("update", data, function(response){
			console.log("YOU ARE POWERFULL!!! "+response);
		});						
	});
}

//get all canvas version using the current_id
var canvas_versions;
var lastIndex;

data = {
	"table": '<?php echo PREFIX; ?>canvas_version',
	"where": "canvas_id = "+<?php echo $this->canvas_details[0]->canvas_id; ?>
};

Generic.genericAction("get", data, function(response){
	canvas_versions = JSON.parse(response);
	lastIndex = canvas_versions.length - 1;
	$("#current_canvas_version_index").val(lastIndex);
});	

$(".btn-iterate").on("click", function(){
	var direction = $(this).attr("data-direction");
	
	switch (direction) {
		case 'first':
			$("#current_canvas_version_id").val(canvas_versions[0]["canvas_version_id"]);
			$("#current_canvas_version").val(canvas_versions[0]["canvas_version"]);
			$("#current_canvas_version_index").val(0);
			refreshView();
			break;
		case 'last':
			$("#current_canvas_version_id").val(canvas_versions[lastIndex]["canvas_version_id"]);
			$("#current_canvas_version").val(canvas_versions[lastIndex]["canvas_version"]);
			$("#current_canvas_version_index").val(lastIndex);
			refreshView();
			break;
		case 'left':
			if($("#current_canvas_version_index").val() - 1 >= 0){
				$("#current_canvas_version_id").val(canvas_versions[$("#current_canvas_version_index").val() - 1]["canvas_version_id"]);
				$("#current_canvas_version").val(canvas_versions[$("#current_canvas_version_index").val() - 1]["canvas_version"]);
				$("#current_canvas_version_index").val($("#current_canvas_version_index").val() - 1);
				refreshView();
			}
			break;	
		case 'right':
			var newIndex = parseInt($("#current_canvas_version_index").val()) + 1;
			console.log(newIndex+"<<WTF>>"+lastIndex);
			if(newIndex <= lastIndex){
				console.log(newIndex+"<<IM IN>>"+lastIndex);
				$("#current_canvas_version_id").val(canvas_versions[newIndex]["canvas_version_id"]);
				$("#current_canvas_version").val(canvas_versions[newIndex]["canvas_version"]);
				$("#current_canvas_version_index").val(newIndex);
				refreshView();
			}
			break;											
		default:
			console.log("Unknown direction.");
			return;
	}
	$(".current_canvas_version").text($("#current_canvas_version").val());
	
	/*
	canvas_versions.forEach(function(row, i){
		console.log(row);
		console.log(i);
	});
	*/
	//if next/prev version exists, make the updates to the view and refreshView()

});

</script>