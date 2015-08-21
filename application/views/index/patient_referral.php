<div class="container" >       
	<div class="row">
		<h2>Patient Referrals <?php echo (isset($this->rows[0]) ? "for ".$this->rows[0]->name." ".$this->rows[0]->surname : ""); ?></h2>
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
	<table class="table table-hover">
		<thead><tr><th>#</th><th>Ref Doctor</th><th>Referral</th><th></th><th></th></tr></thead>
		<tbody>
			<?php $i = 0;
				foreach ($this->rows as $key => $row) { $i++; ?>
				<tr class="designBlock">
					<th scope="row"><?php echo $i; ?><div class="data_holder"><?php echo json_encode($row); ?></div></th>
					<td ><?php echo $row->ref_doctor; ?></td>
					<td class="generic searchable" ><?php echo $row->referral; ?></td>
					<td >
						<input type="hidden" value="<?php echo $row->patient_referral_id; ?>" class="id_holder" />
						<button class="btn btn-default btnEditPatientReferral btn-xs" type="button" >Edit</button>
					</td>
					<td ><button class="btn btn-default btnDeletePatientReferral btn-xs" type="button" >Delete</button></td>
					<td ></td>
				</tr>			
			<?php }?>
		</tbody>
	</table> 	
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
				<form class="form-horizontal" id="frmAddPatientReferral" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="aid_holdersEditTarget">
						<div class="modal-body aid_holdersEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Ref Doctor</label>
								<div class="col-xs-10">
									<input type="text" name="ref_doctor" placeholder="Ref Doctor" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="title">Referral</label>
								<div class="col-xs-10">
									<textarea name="referral" placeholder="Ref" class="form-control" ></textarea>
								</div>
							</div>
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>patient_referral" >
							<input type="hidden" name="user_id" value="<?php echo $this->patient_id; ?>" >
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
		
		window.location.reload();
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
		
		var id = $(this).parent().parent().find(".id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>patient_referral',
				"where": "patient_referral_id = "+id
			};

			console.log(data);
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
		
		var id = $(this).parent().parent().find(".id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>patient_referral',
			"fields": '*',
			"where": 'patient_referral_id = '+id,
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
