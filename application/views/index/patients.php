<div class="container" >       
	<div class="row">
		<h2>Patients</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createPatients" >
			<span class="glyphicon glyphicon-plus"></span> New Patient
		</button>
	</div>
</div>	
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshPatientssView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<div class="row patientsContainer">
		<!-- .patientsContainer is the container the generic class will print in -->
		<div class="patientDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- 
				.patientDesign is the design for each row in the database. The generic class will print data 
				in the tags that have class="generic". The attribute data-field tells the system what field
				from the database you want to print in that tag. The attribute data-set tells it what to print
				to. Possible values for dataset=(innertext, value, src, href, ...).
			-->
			<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Name</b></td><td class="generic" data-field="name" data-set="innertext"></td></tr>
					<tr><td><b>Initials</b></td><td class="generic" data-field="initials" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Phone</b></td><td class="generic" data-field="phone" data-set="innertext"></td></tr>
					<tr><td><b>Email</b></td><td class="generic" data-field="email" data-set="innertext"></td></tr>
				</table>
				<input type="hidden" value="" class="patient_id_holder generic" data-field="patient_id" data-set="value" />
				<button class="btn btn-default btnEditPatients btn-sm" type="button" >Edit</button>
				<button class="btn btn-default btnDeletePatients btn-sm" type="button" >Delete</button>
			</div>
		</div>	
	</div>
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createPatients">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Patient</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddPatients" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Title</label>
							<div class="col-xs-10">
								<input type="text" id="title" name="title" placeholder="Mr or Mrs" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="gmail" class="col-sm-2 control-label">Initials</label>
							<div class="col-xs-10">
								<input type="text" id="initials" name="initials" placeholder="initial" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Surname</label>
							<div class="col-xs-10">
								<input type="text" id="surnamae" name="surname" placeholder="Khathaza" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Email</label>
							<div class="col-xs-10">
								<input type="text" id="email" name="email" placeholder="pasekamonyeki@gmail.com" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Address</label>
							<div class="col-xs-10">
								<input type="textarea" id="authcode" name="authcode" placeholder="x2r44f" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">ID number</label>
							<div class="col-xs-10">
								<input type="text" id="id_number" name="id_number" placeholder="954446780954" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Date of birth</label>
							<div class="col-xs-10">
								<input type="text" id="patdob" name="patdob" placeholder="" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Gender</label>
							<div class="col-xs-10">
								<input type="text" id="gender" name="gender" placeholder="Male or Female " class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Cell</label>
							<div class="col-xs-10">
								<input type="text" id="cell" name="cell" placeholder="DRPR ?" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Referring doctor</label>
							<div class="col-xs-10">
								<input type="text" id="refby" name="refby" placeholder="Dr love" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Disorder</label>
							<div class="col-xs-10">
								<input type="text" id="disorder1" name="disorder1" placeholder="Flu" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Diagnosis</label>
							<div class="col-xs-10">
								<input type="text" id="diag1" name="diag1" placeholder="Bipolar Diagnosis" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Medical Aid</label>
							<div class="col-xs-10">
								<input type="text" id="medaid" name="medaid" placeholder="Happy meds" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Medical Aid Number</label>
							<div class="col-xs-10">
								<input type="text" id="medno" name="medno" placeholder="1100 697 500" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Authorisation code</label>
							<div class="col-xs-10">
								<input type="text" id="authcode" name="authcode" placeholder="x2r44f" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Tariff</label>
							<div class="col-xs-10">
								<input type="text" id="authcode" name="authcode" placeholder="x2r44f" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label for="State" class="col-sm-2 control-label">Comment</label>
							<div class="col-xs-10">
								<input type="text" id="authcode" name="authcode" placeholder="x2r44f" class="form-control" />
							</div>
						</div>														
							
						</div>														
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>patient" >
					
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" id="editPatients">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Patient</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditPatients" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="patientsEditTarget">
						<div class="modal-body patientsEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Title</label>
								<div class="col-xs-10">
									<input type="text" name="title" placeholder="Mr or Mrs" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="gmail" class="col-sm-2 control-label">Initials</label>
								<div class="col-xs-10">
									<input type="text" name="initials" placeholder="initial" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Surname</label>
								<div class="col-xs-10">
									<input type="text" name="surname" placeholder="Khathaza" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Email</label>
								<div class="col-xs-10">
									<input type="text" name="email" placeholder="pasekamonyeki@gmail.com" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Address</label>
								<div class="col-xs-10">
									<input type="textarea" name="authcode" placeholder="x2r44f" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">ID number</label>
								<div class="col-xs-10">
									<input type="text" name="id_number" placeholder="954446780954" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Date of birth</label>
								<div class="col-xs-10">
									<input type="text" name="patdob" placeholder="" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Gender</label>
								<div class="col-xs-10">
									<input type="text" name="gender" placeholder="Male or Female " class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Cell</label>
								<div class="col-xs-10">
									<input type="text" name="cell" placeholder="DRPR ?" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Referring doctor</label>
								<div class="col-xs-10">
									<input type="text" name="refby" placeholder="Dr love" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Disorder</label>
								<div class="col-xs-10">
									<input type="text" name="disorder1" placeholder="Flu" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Diagnosis</label>
								<div class="col-xs-10">
									<input type="text" name="diag1" placeholder="Bipolar Diagnosis" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Medical Aid</label>
								<div class="col-xs-10">
									<input type="text" name="medaid" placeholder="Happy meds" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Medical Aid Number</label>
								<div class="col-xs-10">
									<input type="text" name="medno" placeholder="1100 697 500" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Authorisation code</label>
								<div class="col-xs-10">
									<input type="text" name="authcode" placeholder="x2r44f" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Tariff</label>
								<div class="col-xs-10">
									<input type="text" name="authcode" placeholder="x2r44f" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label for="State" class="col-sm-2 control-label">Comment</label>
								<div class="col-xs-10">
									<input type="text" name="authcode" placeholder="x2r44f" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>	
								
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>patient" >
							<input type="hidden" id="table" name="where" value="patient_id = " class="generic" data-field="patient_id" data-set="value">
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
	Theses are the jquery.forms options for frmAddPatients above that uses the generic controller 
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
		
		$("#createPatients").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patients Added Successfully</div>");
		
		refreshPatientssView();
		
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
		$("#createPatients").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddPatients
$("#frmAddPatients").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditPatients above that uses the generic controller 
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
		
		$("#editPatients").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patients Updated Successfully</div>");
		
		refreshPatientssView();
		
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
		$("#editPatients").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddPatients
$("#frmEditPatients").ajaxForm(options);

/**
 * This section creates the patients view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .patientDesign with your own design
var containerDesign = $(".patientDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshPatientssView(){
	var emptyDesign = "<h2>There are no patients in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .patientDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>patient',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".patientsContainer", ".patientDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshPatientssView();

var patientsEditDesign = $(".patientsEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeletePatients:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var patient_id = $(this).parent().find(".patient_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>patient',
				"where": "patient_id = "+patient_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnEditPatients:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var patient_id = $(this).parent().find(".patient_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>patient',
			"fields": '*',
			"where": 'patient_id = '+patient_id,
			"containerDesign": patientsEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".patientsEditTarget", ".patientsEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editPatients').modal('show');
	});	
}	

</script>
