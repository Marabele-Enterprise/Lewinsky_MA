<div class="container" >       
	<div class="row">
		<h2>Patient</h2>
	</div>
</div>
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshPatientReferralsView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" scoped style="margin-top: -36px;">       
	<div class="" id="editPatient">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Patient Details</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->	<!--doctorsEditTarget-->
				<form class="form-horizontal" id="frmEditpatient" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body ">
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Name</label>
							<div class="col-xs-10">
								<input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo $this->patient_details[0]->name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Surname">Surname</label>
							<div class="col-xs-10">
								<input type="text" name="surname" placeholder="Surname" class="form-control" value="<?php echo $this->patient_details[0]->surname; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">ID number</label>
							<div class="col-xs-10">
								<input type="text" name="id_number" placeholder="id_number" class="form-control" value="<?php echo $this->patient_details[0]->id_number; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Date of birth</label>
							<div class="col-xs-10">
								<input type="date" name="date_of_birth" placeholder="yyyy-mm-dd" class="form-control" value="<?php echo $this->patient_details[0]->date_of_birth; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="gender">Gender</label>
							<div class="col-xs-10">
								<input type="text" id="gender" name="gender" placeholder="gender" class="form-control" value="<?php echo $this->patient_details[0]->gender; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Email</label>
							<div class="col-xs-10">
								<input type="email" id="email" name="email" placeholder="email" class="form-control" value="<?php echo $this->patient_details[0]->email; ?>" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Cell</label>
							<div class="col-xs-10">
								<input type="text" id="cell" name="cell" placeholder="cell" class="form-control" value="<?php echo $this->patient_details[0]->cell; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Diagnosis</label>
							<div class="col-xs-10">
								<input type="text" id="diagnosis" name="diagnosis" placeholder="diagnosis" class="form-control" value="<?php echo $this->patient_details[0]->diagnosis; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Dependednt code</label>
							<div class="col-xs-10">
								<input type="text" id="dependent_code" name="dependent_code" placeholder="dependent_code" class="form-control" value="<?php echo $this->patient_details[0]->dependent_code; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Referring Dr</label>
							<div class="col-xs-10">
								<input type="text" id="referring_doc" name="referring_doc" placeholder="Referring Dr" class="form-control" value="<?php echo $this->patient_details[0]->referring_doc; ?>" />
							</div>
						</div>															
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>patient">
							<input type="hidden" id="table" name="where" value="patient_id = <?php echo $this->patient_details[0]->patient_id; ?>">
						</div>

						<div class="modal-footer">
							<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>	
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>
<div class="container" >       
	<div class="row">
		<h2>Patient Referrals</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createPatientReferral" >
			<span class="glyphicon glyphicon-plus"></span> New Patient Referral
		</button>
	</div>
</div>
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshPatientReferralsView() bellow to see how to 
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
					<tr class="active"><td><b>Surname</b></td><td class="generic" data-field="surname" data-set="innertext"></td></tr>
					<tr><td><b>Title</b></td><td class="generic" data-field="title" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Initials</b></td><td class="generic" data-field="initials" data-set="innertext"></td></tr>
					<tr><td><b>Phone</b></td><td class="generic" data-field="phone" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Cell</b></td><td class="generic" data-field="cell" data-set="innertext"></td></tr>
					<tr><td><b>Email</b></td><td class="generic" data-field="email" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Tariff Rate</b></td><td class="generic" data-field="tariff_rate" data-set="innertext"></td></tr>
					<tr><td><b>Bill at</b></td><td class="generic" data-field="bill_at" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Medical Aid</b></td><td class="generic" data-field="medical_aid" data-set="innertext"></td></tr>
					<tr><td><b>Medical Aid Number</b></td><td class="generic" data-field="medical_aid_number" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Member ID</b></td><td class="generic" data-field="member_id" data-set="innertext"></td></tr>
					<tr><td><b>Authorisation Code</b></td><td class="generic" data-field="authorisation_code" data-set="innertext"></td></tr>
				</table>
				<input type="hidden" value="" class="aid_holder_id_holder generic" data-field="aid_holder_id" data-set="value" />
				<button class="btn btn-default btnEditPatientReferral btn-sm" type="button" >Edit</button>
				<button class="btn btn-default btnDeletePatientReferral btn-sm" type="button" >Delete</button>
				<form action="<?php echo URL; ?>index/use_aid_holder/" method="post" class="postLink"> 					    
					<input type="hidden" name="aid_holder_id" value="" class="generic" data-field="aid_holder_id" data-set="value"> 					    
					<button type="submit" class="btn btn-default btn-sm">Use</button> 					
				</form>				
			</div>
		</div>	
	</div>
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createPatientReferral">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New PatientReferral</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditPatientReferral" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="aid_holdersEditTarget">
						<div class="modal-body aid_holdersEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Ref Doctor</label>
								<div class="col-xs-10">
									<input type="text" name="surname" placeholder="Ref" class="form-control generic" data-field="surname" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="title">Referral</label>
								<div class="col-xs-10">
									<input type="text" name="title" placeholder="Ref" class="form-control generic" data-field="title" data-set="value" />
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
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" id="editPatientReferral">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit PatientReferral</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditPatientReferral" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="aid_holdersEditTarget">
						<div class="modal-body aid_holdersEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Ref Doctor</label>
								<div class="col-xs-10">
									<input type="text" name="surname" placeholder="Ref" class="form-control generic" data-field="surname" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="title">Referral</label>
								<div class="col-xs-10">
									<input type="text" name="title" placeholder="Ref" class="form-control generic" data-field="title" data-set="value" />
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
	Theses are the jquery.forms options for frmAddPatientReferral above that uses the generic controller 
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
		
		$("#createPatientReferral").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>PatientReferral Added Successfully</div>");
		
		refreshPatientReferralsView();
		
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
		$("#createPatientReferral").modal("hide");
		
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
//Initiat AJAX on submit of frmAddPatientReferral
$("#frmAddPatientReferral").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditPatientReferral above that uses the generic controller 
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
		
		$("#editPatientReferral").modal("hide");

		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");				
			return;
		}
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>PatientReferral Updated Successfully</div>");
		
		refreshPatientReferralsView();
		
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
		$("#editPatientReferral").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddPatientReferral
$("#frmEditPatientReferral").ajaxForm(options);

/**
 * This section creates the aid_holders view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .aid_holderDesign with your own design
var containerDesign = $(".aid_holderDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshPatientReferralsView(){
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

refreshPatientReferralsView();

var aid_holdersEditDesign = $(".aid_holdersEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeletePatientReferral:not(.bound)').addClass('bound').on("touchstart click", function (e){
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

	$('.btnEditPatientReferral:not(.bound)').addClass('bound').on("touchstart click", function (e){
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

		$('#editPatientReferral').modal('show');
	});	
}	

</script>
