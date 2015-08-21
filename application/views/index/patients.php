<div class="container" >       
	<div class="row">
		<h2>Patients</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createPatient" >
			<span class="glyphicon glyphicon-plus"></span> New Patient
		</button>
	</div>
</div>
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshpatientsView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >    
	<table class="table table-hover">
		<thead><tr><th>#</th><th>Name</th><th>ID</th><th>DoB</th><th>Phone</th><th>Email</th><th>Aid Holder</th><th></th><th></th></tr></thead>
		<tbody>
			<?php $i = 0;
				foreach ($this->rows as $key => $row) { $i++; ?>
				<tr class="designBlock">
					<th scope="row"><?php echo $i; ?></th>
					<td class="generic searchable" ><?php echo $row->name." ".$row->surname; ?></td>
					<td class="generic searchable" ><?php echo $row->id_number; ?></td>
					<td ><?php echo $row->dob; ?></td>
					<td class="generic searchable" ><?php echo $row->phone; ?></td>
					<td class="generic searchable" ><?php echo $row->email; ?></td>
					<td ><?php echo ($row->is_aid_holder == 1 ? "Yes" : "No"); ?></td>
					<td >
						<form action="<?php echo URL; ?>/index/use_patient/" method="post" class="postLink"> 					    
							<input type="hidden" name="patient_id" value="<?php echo $row->patient_id; ?>" > 					    
							<button type="submit" class="btn btn-default btn-xs">Use</button> 					
						</form>
					</td>
					<td ><button class="btn btn-default btn-xs btnTransactionViewAll">Delete</button></td>
					<td ></td>
				</tr>				
			<?php }?>
		</tbody>
	</table>   
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<!-- Patient Modal Rows-->
	<div class="modal fade" id="createPatient">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h2 class="modal-title">New Patient</h2>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddPatient" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Name</label>
							<div class="col-xs-10">
								<input type="text" id="title" name="name" placeholder="Name" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Surname">Surname</label>
							<div class="col-xs-10">
								<input type="text" name="surname" placeholder="Surname" class="form-control" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">ID number</label>
							<div class="col-xs-10">
								<input type="text" name="id_number" placeholder="ID number" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Date of birth</label>
							<div class="col-xs-10">
								<input type="date" name="dob" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="gender">Gender</label>
							<div class="col-xs-10">
								<select name="gender" class="form-control" required >
									<option></option>
									<option value="M">Male</option>
									<option value="F">Female</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Phone</label>
							<div class="col-xs-10">
								<input type="text" name="phone" placeholder="Phone" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Email</label>
							<div class="col-xs-10">
								<input type="email" name="email" placeholder="email" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Address</label>
							<div class="col-xs-10">
								<input type="text" name="address1" placeholder="Address 1" class="form-control" />
								<input type="text" name="address2" placeholder="Address 2" class="form-control" />
								<input type="text" name="address3" placeholder="Address 3" class="form-control" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="allow_email_statements" >Allow E-Mail Statements</label>
							<div class="col-xs-10">
								<select name="allow_email_statements" class="form-control" >
									<option value="1" >True</option>
									<option value="0" >False</option>
								</select>								
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Print Patient Liability</label>
							<div class="col-xs-10">
								<select name="print_patient_liability" class="form-control" >
									<option value="1" >True</option>
									<option value="0" >False</option>
								</select>									
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Is Aid Holder</label>
							<div class="col-xs-10">
								<select name="is_aid_holder" id="isAidHolder" class="form-control" >
									<option></option>
									<option value="1" >True</option>
									<option value="0" >False</option>
								</select>									
							</div>
						</div>							
    					<fieldset class="medicalAidDetails">
    						<legend><h4>Medical Aid Details</h4></legend>																						    						
							<div class="form-group">
								<label class="col-xs-2 control-label" for="medical_aid">Medical Aid</label>
								<div class="col-xs-10">
									<select name="medical_aid" class="selectpicker form-control medical_aid_select" data-live-search="true" id="medical_aid_select" data-showContent="false" >
									</select>						
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Medical Aid Number</label>
								<div class="col-xs-10">
									<input type="text" name="medical_aid_number" placeholder="Medical Aid Number" class="form-control" />
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Dependednt code</label>
								<div class="col-xs-10">
									<input type="text" id="dependent_code" name="dependent_code" placeholder="dependent_code" class="form-control" />
								</div>
							</div>							
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Member ID</label>
								<div class="col-xs-10">
									<input type="text" name="member_id" placeholder="Member ID" class="form-control" />
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-2 control-label" for="authorisation_code">Authorisation Code</label>
								<div class="col-xs-10">
									<input type="text" name="authorisation_code" placeholder="Authorisation Code" class="form-control" />
								</div>
							</div>	    						
    					</fieldset>						
						<!-- div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Referring Dr</label>
							<div class="col-xs-10">
								<input type="text" id="referring_doc" name="referring_doc" placeholder="Dr Name Surname" class="form-control" />
							</div>
						</div -->															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>user" >
						<input type="hidden" name="table_sub" value="<?php echo PREFIX; ?>patient_user_details_tbls" >
						<input type="hidden" name="fk" value="user_id" >
						<input type="hidden" name="practice_id" value="<?php echo Session::get('practice_id'); ?>" />
						<input type="hidden" name="insert_type" value="sub" />
						<input type="hidden" name="user_account_type" value="Patient" />						
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

	<div class="modal fade" id="editPatient">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit patient</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->	<!--doctorsEditTarget-->
				<form class="form-horizontal" id="frmEditpatient" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="patientsEditTarget">
						<div class="modal-body patientsEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Name</label>
							<div class="col-xs-10">
								<input type="text" name="name" placeholder="Name" class="form-control generic" data-field="name" data-set="value"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">ID number</label>
							<div class="col-xs-10">
								<input type="text" name="id_number" placeholder="id_number" class="form-control generic" data-field="id_number" data-set="value"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Date of birth</label>
							<div class="col-xs-10">
								<input type="date" name="date_of_birth" placeholder="yyyy-mm-dd" class="form-control generic" data-field="date_of_birth" data-set="value"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="gender">Gender</label>
							<div class="col-xs-10">
								<input type="text" id="gender" name="gender" placeholder="gender" class="form-control generic" data-field="gender" data-set="value"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Email</label>
							<div class="col-xs-10">
								<input type="email" id="email" name="email" placeholder="email" class="form-control generic" data-field="email" data-set="value" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Phone</label>
							<div class="col-xs-10">
								<input type="text" name="phone" placeholder="Phone" class="form-control generic" data-field="phone" data-set="value"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Diagnosis</label>
							<div class="col-xs-10">
								<input type="text" id="diagnosis" name="diagnosis" placeholder="diagnosis" class="form-control generic" data-field="diagnosis" data-set="value"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Dependednt code</label>
							<div class="col-xs-10">
								<input type="text" id="dependent_code" name="dependent_code" placeholder="dependent_code" class="form-control generic" data-field="dependent_code" data-set="value"/>
							</div>
						</div>
						<!--div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Referring Dr</label>
							<div class="col-xs-10">
								<input type="text" id="referring_doc" name="referring_doc" placeholder="Referring Dr" class="form-control generic" data-field="referring_doc" data-set="value"/>
							</div>
						</div-->															
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" name="table" value="<?php echo PREFIX; ?>patient">
							<input type="hidden" name="where" value="patient_id = " class="generic" data-field="patient_id" data-set="value">
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

<style type="text/css">
	.medicalAidDetails{
		display: none;
	}
</style>

<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/bootstrap-select/css/bootstrap-select.min.css">
<script type="text/javascript" src="<?php echo URL; ?>public/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script>

$("#isAidHolder").on("change", function(){
	if($(this).val() == "1"){
		$(".medicalAidDetails").slideDown("slow");
		$("div.medical_aid_select").find(".input-block-level").on("keyup", function(){
			var select_val = $(this).val();
			if(select_val.length >= 2){
				var data = {
					"table": 'ms_medical_aid',
					"fields": '*',
					"where": "name LIKE '%"+select_val+"%'",
					"extra": "ORDER BY name ASC LIMIT 10"
				};
				
				Generic.genericAction("get", data, function(response){
					//$("select.medical_aid_select").children().remove();
					var action_list = document.getElementById("medical_aid_select");
					// Remember selected items.
					var is_selected = [];
					for (var i = 0; i < action_list.options.length; ++i)
					{
					    is_selected[i] = action_list.options[i].selected;
					}

					// Remove selected items.
					i = action_list.options.length;
					while (i--)
					{
					    if (!is_selected[i])
					    {
					        action_list.remove(i);
					    }
					}

					response = JSON.parse(response);
					//console.log(response);
					for (var i = response.length - 1; i >= 0; i--) {
						$("select.medical_aid_select").append("<option value='"+response[i].medical_aid_id+"' >"+response[i].name+"</option>");
					};

					$('.selectpicker').selectpicker('refresh');

				});
			}
		});		
	}else{
		$(".medicalAidDetails").slideUp("slow");
	}
});

/*
	Theses are the jquery.forms options for frmAddpatient above that uses the generic controller 
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
		
		$("#createpatient").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>patient Added Successfully</div>");
		
		location.reload();
		
		$('form')[0].reset();
		
		//This code segment removes the feedback automatically
		var delay = 10666;
		setTimeout(function() {
		    $("#frmAddPatient").children().fadeOut().html("");
		}, delay);

	}, complete: function(response){
		$("#loader1").remove();
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createpatient").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddpatient
$("#frmAddPatient").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditpatient above that uses the generic controller 
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
		
		$("#editPatient").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>patient Updated Successfully</div>");
		
		refreshpatientsView();
		
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
		$("#editPatient").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddpatient
$("#frmEditPatient").ajaxForm(options);

/**
 * This section creates the patients view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .patientDesign with your own design
var containerDesign = $(".patientDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshpatientsView(){
	var emptyDesign = "<h2>There are no patients in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .patientDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>patient_user_details_tbls as a JOIN <?php echo PREFIX; ?>user as b ON a.user_id = b.user_id',
		"fields": 'a.*, b.*',
		"where": 'practice_id = '+<?php echo Session::get("practice_id"); ?>,
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

refreshpatientsView();

var patientsEditDesign = $(".patientsEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeletepatient:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var patient_id = $(this).parent().find(".patient_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>patient_user_details_tbls',
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

	$('.btnEditPatient:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var patient_id = $(this).parent().find(".patient_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>patient_user_details_tbls',
			"fields": '*',
			"where": 'patient_id = '+patient_id,
			"containerDesign": patientsEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".patientsEditTarget", ".patientsEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editPatient').modal('show');
	});
}	

$(function() {
  

});
</script>
