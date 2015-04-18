<div class="container" >       
	<div class="row">
		<h2>Messages</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createMessage" >
			<span class="glyphicon glyphicon-plus"></span> New Message
		</button>
	</div>
</div>	
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshMessagesView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<div class="row MessagesContainer">
		<!-- .MessagesContainer is the container the generic class will print in -->
		<div class="MessageDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- 
				.MessageDesign is the design for each row in the database. The generic class will print data 
				in the tags that have class="generic". The attribute data-field tells the system what field
				from the database you want to print in that tag. The attribute data-set tells it what to print
				to. Possible values for dataset=(innertext, value, src, href, ...).
			-->
			<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Categoy</b></td><td class="generic" data-field="msg_category" data-set="innertext"></td></tr>
					<tr><td><b>120 Day Message</b></td><td class="generic" data-field="120_day_msg" data-set="innertext"></td></tr>
					<tr class="active"><td><b>90 Day Message</b></td><td class="generic" data-field="90_day_msg" data-set="innertext"></td></tr>
					<tr><td><b>60 Day Message</b></td><td class="generic" data-field="60_day_msg" data-set="innertext"></td></tr>
					<tr class="active"><td><b>30 Day Message</b></td><td class="generic" data-field="30_day_msg" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Current Day Message</b></td><td class="generic" data-field="current_day_msg" data-set="innertext"></td></tr>
				</table>
				<input type="hidden" value="" class="Message_id_holder generic" data-field="Message_id" data-set="value" />
				<button class="btn btn-default btnEditMessage btn-sm" type="button" >Edit</button>
				<button class="btn btn-default btnDeleteMessage btn-sm" type="button" >Delete</button>
			</div>
		</div>	
	</div>
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Message</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddMessage" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="title">Category</label>
							<div class="col-xs-10">
								<input type="text" id="msg_category" name="msg_category" placeholder="Private" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">120 Day Message</label>
							<div class="col-xs-10">
								<input type="text" id="120_day_msg" name="120_day_msg" placeholder="120_day_msg" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">90 Day Message</label>
							<div class="col-xs-10">
								<input type="text" id="90_day_msg" name="90_day_msg" placeholder="90_day_msg" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">60 Day Message</label>
							<div class="col-xs-10">
								<input type="text" id="60_day_msg" name="60_day_msg" placeholder="60_day_msg" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">30 Day Message</label>
							<div class="col-xs-10">
								<input type="text" id="30_day_msg" name="30_day_msg" placeholder="30_day_msg" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Current Day Message</label>
							<div class="col-xs-10">
								<input type="text" id="current_day_msg" name="current_day_msg" placeholder="current_day_msg" class="form-control" />
							</div>
						</div>														
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>Message" >
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

	<div class="modal fade" id="editMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Message</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditMessage" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="MessagesEditTarget">
						<div class="modal-body MessagesEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="title">Category</label>
								<div class="col-xs-10">
									<input type="text" id="title_initials" name="title_initials" placeholder="Pay please" class="form-control generic" data-field="msg_category" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">120 Day Message</label>
								<div class="col-xs-10">
									<input type="text" id="surname" name="surname" placeholder="Pay please" class="form-control generic" data-field="120_day_msg" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="phone">90 Day Message</label>
								<div class="col-xs-10">
									<input type="text" id="phone" name="phone" placeholder="Pay please" class="form-control generic" data-field="90_day_msg" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">60 Day Message</label>
								<div class="col-xs-10">
									<input type="text" id="drpr" name="drpr" placeholder="Pay please" class="form-control generic" data-field="60_day_msg" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">30 Day Message</label>
								<div class="col-xs-10">
									<input type="text" id="email" name="email" placeholder="Pay please" class="form-control generic" data-field="30_day_msg" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Current Day Message</label>
								<div class="col-xs-10">
									<input type="text" id="email" name="email" placeholder="Pay please" class="form-control generic" data-field="current_day_msg" data-set="value" />
								</div>
							</div>																
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>Message" >
							<input type="hidden" id="table" name="where" value="Message_id = " class="generic" data-field="Message_id" data-set="value">
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

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/slick/slick.css">
<script type="text/javascript" src="<?php echo URL; ?>public/plugins/slick/slick.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>
<script>

/*
	Theses are the jquery.forms options for frmAddMessage above that uses the generic controller 
*/
var options = {
	beforeSend: function(){
	$("#loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		//clear all fields and close the modal
		$("#loader1").fadeOut("fast");
		
		$("#createMessage").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Message Added Successfully</div>");
		
		refreshMessagesView();
		
		$('form')[0].reset();
		
		//This code segment removes the feedback automatically
		var delay = 10666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);

	}, complete: function(response){
		$("#loader1").remove();
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createMessage").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddMessage
$("#frmAddMessage").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditMessage above that uses the generic controller 
*/
var options = {
	beforeSend: function(){
	$("#loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		//clear all fields and close the modal
		$("#loader1").fadeOut("fast");
		
		$("#editMessage").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Message Updated Successfully</div>");
		
		refreshMessagesView();
		
		$('form')[0].reset();
		
		//This code segment removes the feedback automatically
		var delay = 10666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);

	}, complete: function(response){
		$("#loader1").remove();
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#editMessage").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddMessage
$("#frmEditMessage").ajaxForm(options);

/**
 * This section creates the Messages view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .MessageDesign with your own design
var containerDesign = $(".MessageDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshMessagesView(){
	var emptyDesign = "<h2>There are no Messages in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .MessageDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>Message',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".MessagesContainer", ".MessageDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshMessagesView();

var MessagesEditDesign = $(".MessagesEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteMessage:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var Message_id = $(this).parent().find(".Message_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>Message',
				"where": "Message_id = "+Message_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		}else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnEditMessage:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var Message_id = $(this).parent().find(".Message_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>Message',
			"fields": '*',
			"where": 'Message_id = '+Message_id,
			"containerDesign": MessagesEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".MessagesEditTarget", ".MessagesEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editMessage').modal('show');
	});	
}	

</script>
