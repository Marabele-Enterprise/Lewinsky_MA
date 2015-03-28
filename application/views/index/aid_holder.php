<div class="container" >       
	<div class="row">
		<h2>Mediacal Aid Holder</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAidHolder" >
			<span class="glyphicon glyphicon-plus"></span> New Medical Aid Holder
		</button>
	</div>
</div>
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshAidHoldersView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<div class="row aid_holdersContainer">
		<!-- .aid_holdersContainer is the container the generic class will print in -->
		<div class="aid_holderDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- 
				.aid_holderDesign is the design for each row in the database. The generic class will print data 
				in the tags that have class="generic". The attribute data-field tells the system what field
				from the database you want to print in that tag. The attribute data-set tells it what to print
				to. Possible values for dataset=(innertext, value, src, href, ...).
			-->
			<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Code</b></td><td class="generic" data-field="code" data-set="innertext"></td></tr>
					<tr><td><b>Description</b></td><td class="generic" data-field="description" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Private</b></td><td class="generic" data-field="private" data-set="innertext"></td></tr>
					<tr><td><b>Med Aid 2010</b></td><td class="generic" data-field="med_aid_2010" data-set="innertext"></td></tr>
					<tr class="active"><td><b>IOD</b></td><td class="generic" data-field="iod" data-set="innertext"></td></tr>
					<tr><td><b>Discovery</b></td><td class="generic" data-field="discovery" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Rate_5</b></td><td class="generic" data-field="rate_5" data-set="innertext"></td></tr>
					<tr><td><b>Rate_7</b></td><td class="generic" data-field="rate_7" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Rate_8</b></td><td class="generic" data-field="rate_8" data-set="innertext"></td></tr>
					<tr><td><b>Rate_9</b></td><td class="generic" data-field="rate_9" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Material</b></td><td class="generic" data-field="material" data-set="innertext"></td></tr>
					<tr><td><b>Mod Minutes</b></td><td class="generic" data-field="modminutes" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Matpic</b></td><td class="generic" data-field="matpic" data-set="innertext"></td></tr>
					<tr><td><b>Units</b></td><td class="generic" data-field="units" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Cf Type</b></td><td class="generic" data-field="cf_type" data-set="innertext"></td></tr>
				</table>
				<input type="hidden" value="" class="aid_holder_id_holder generic" data-field="aid_holder_id" data-set="value" />
				<button class="btn btn-default btnEditAidHolder btn-sm" type="button" >Edit</button>
				<button class="btn btn-default btnDeleteAidHolder btn-sm" type="button" >Delete</button>
			</div>
		</div>	
	</div>
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createAidHolder">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New AidHolder</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddAidHolder" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="title">Surname</label>
							<div class="col-xs-10">
								<TEXTAREA class="form-control" >Hello</TEXTAREA>
								<!--input type="text" name="surname" placeholder="Surname" class="form-control" /-->
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="description">Title</label>
							<div class="col-xs-10">
								<input type="text" name="title" placeholder="Title" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="initials">Initials</label>
							<div class="col-xs-10">
								<input type="text" name="initials" placeholder="Initials" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Address</label>
							<div class="col-xs-10">
								<input type="text" id="authcode" name="address1" placeholder="Address 1" class="form-control" />
								<input type="text" id="authcode" name="address2" placeholder="Address 2" class="form-control" />
								<input type="text" id="authcode" name="address3" placeholder="Address 3" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Phone</label>
							<div class="col-xs-10">
								<input type="text" name="phone" placeholder="Phone" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Cell</label>
							<div class="col-xs-10">
								<input type="text" name="cell" placeholder="Cell" class="form-control" />
							</div>
						</div>							
						<div class="form-group">
							<label class="col-xs-2 control-label" for="email">Email</label>
							<div class="col-xs-10">
								<input type="text" name="email" placeholder="Email" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="email">CC Email</label>
							<div class="col-xs-10">
								<input type="text" name="cc_email" placeholder="CC Email" class="form-control" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Tariff Rate</label>
							<div class="col-xs-10">
								<select name="tariff_rate" >
									<option value="Private" >Private</option>
									<option value="MedAid2010" >MedAid2010</option>
									<option value="IOD" >IOD</option>
									<option value="Discovery" >Discovery</option>
									<option value="Rate 5" >Rate 5</option>
									<option value="Medscheme" >Medscheme</option>
									<option value="Rate 7" >Rate 7</option>
									<option value="Rate 8" >Rate 8</option>
									<option value="Rate 9" >Rate 9</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Bill at</label>
							<div class="col-xs-10">
								<input type="text" id="rate_7" name="rate_7" placeholder="Rate 7" class="form-control" />
							</div>
						</div>
						<fieldset class="iodDetails">
    						<legend>IOD Details</legend>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="iod_claim_number">IOD Claim Number</label>
								<div class="col-xs-10">
									<input type="text" name="iod_claim_number" placeholder="IOD Claim Number" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="employer">Employer</label>
								<div class="col-xs-10">
									<input type="text" name="iod_employer" placeholder="Employer" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Emp. Reg.#</label>
								<div class="col-xs-10">
									<input type="text" id="emp_reg_num" name="" placeholder="Emp. Reg.#" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="date_of_injury" >Date of injury</label>
								<div class="col-xs-10">
									<input type="text" name="date_of_injury" placeholder="Date of injury" class="form-control" />
								</div>
							</div>																					    						
    					</fieldset>

						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Suppress Statement</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_8" placeholder="Rate 8" class="form-control" />
							</div>
						</div>											
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Account Closed</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_9" placeholder="Rate 9" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Allow E-Mail Statements</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="material" placeholder="Material" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Print Patient Liability</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="modminutes" placeholder="Mod Minutes" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Medical Aid</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="matpic" placeholder="Mat Pic" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Medical Aid Number</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="units" placeholder="Units" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Member ID</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="cf_type" placeholder="CF Type" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Authorisation Code</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="cf_type" placeholder="CF Type" class="form-control" />
							</div>
						</div>	
																																																				
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>aid_holder" >
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

	<div class="modal fade" id="editAidHolder">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit AidHolder</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditAidHolder" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="aid_holdersEditTarget">
						<div class="modal-body aid_holdersEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="code">Code</label>
								<div class="col-xs-10">
									<input type="text" name="code" placeholder="Code" class="form-control generic" data-field="code" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="description">Description</label>
								<div class="col-xs-10">
									<input type="text" name="description" placeholder="Description" class="form-control generic" data-field="description" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="private">Private</label>
								<div class="col-xs-10">
									<input type="text" name="private" placeholder="Private" class="form-control generic" data-field="private" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="med_aid_2010">Med Aid 2010</label>
								<div class="col-xs-10">
									<input type="text" name="med_aid_2010" placeholder="Med Aid 2010 ?" class="form-control generic" data-field="med_aid_2010" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">IOD</label>
								<div class="col-xs-10">
									<input type="text" id="iod" name="iod" placeholder="IOD" class="form-control generic" data-field="iod" data-set="value" />
								</div>
							</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="discovery">Discovery</label>
							<div class="col-xs-10">
								<input type="text" id="discovery" name="discovery" placeholder="Discovery" class="form-control generic" data-field="discovery" data-set="value" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Rate 5</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_5" placeholder="Rate 5" class="form-control generic" data-field="rate_5" data-set="value" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Rate 7</label>
							<div class="col-xs-10">
								<input type="text" id="rate_7" name="rate_7" placeholder="Rate 7" class="form-control generic" data-field="rate_7" data-set="value" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Rate 8</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_8" placeholder="Rate 8" class="form-control generic" data-field="rate_8" data-set="value" />
							</div>
						</div>											
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Rate 9</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_9" placeholder="Rate 9" class="form-control generic" data-field="rate_9" data-set="value" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Material</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="material" placeholder="Material" class="form-control generic" data-field="material" data-set="value" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Mod Minutes</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="modminutes" placeholder="Mod Minutes" class="form-control generic" data-field="modminutes" data-set="value" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">MatPic</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="matpic" placeholder="Mat Pic" class="form-control generic" data-field="matpic" data-set="value" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Units</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="units" placeholder="Units" class="form-control generic" data-field="units" data-set="value" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">CF Type</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="cf_type" placeholder="CF Type" class="form-control generic" data-field="cf_type" data-set="value" />
							</div>
						</div>																					
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>aid_holder" >
							<input type="hidden" id="table" name="where" value="aid_holder_id = " class="generic" data-field="aid_holder_id" data-set="value">
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
	Theses are the jquery.forms options for frmAddAidHolder above that uses the generic controller 
*/
var options = {
	beforeSend: function(){
	$("#loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");		
			return;
		}
		//clear all fields and close the modal
		$("#loader1").fadeOut("fast");
		
		$("#createAidHolder").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>AidHolder Added Successfully</div>");
		
		refreshAidHoldersView();
		
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
		$("#createAidHolder").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//This code segment removes the feedback automatically
		var delay = 10666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);

		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddAidHolder
$("#frmAddAidHolder").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditAidHolder above that uses the generic controller 
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
		
		$("#editAidHolder").modal("hide");

		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");				
			return;
		}
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>AidHolder Updated Successfully</div>");
		
		refreshAidHoldersView();
		
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
		$("#editAidHolder").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddAidHolder
$("#frmEditAidHolder").ajaxForm(options);

/**
 * This section creates the aid_holders view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .aid_holderDesign with your own design
var containerDesign = $(".aid_holderDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshAidHoldersView(){
	var emptyDesign = "<h2>There are no aid_holders in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .aid_holderDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>aid_holder',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".aid_holdersContainer", ".aid_holderDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshAidHoldersView();

var aid_holdersEditDesign = $(".aid_holdersEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteAidHolder:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var aid_holder_id = $(this).parent().find(".aid_holder_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>aid_holder',
				"where": "aid_holder_id = "+aid_holder_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnEditAidHolder:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var aid_holder_id = $(this).parent().find(".aid_holder_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>aid_holder',
			"fields": '*',
			"where": 'aid_holder_id = '+aid_holder_id,
			"containerDesign": aid_holdersEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".aid_holdersEditTarget", ".aid_holdersEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editAidHolder').modal('show');
	});	
}	

</script>
