<div class="container" >       
	<div class="row">
		<h2>Diagnosis</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createDiagnosis" >
			<span class="glyphicon glyphicon-plus"></span> New Diagnosis
		</button>
	</div>
</div>	
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshDiagnosissView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<table class="table table-hover">
		<thead><tr><th>#</th><th>ICD 10 Code</th><th>Description</th><th>Level</th><th></th><th></th></tr></thead>
		<tbody>
			<?php $i = 0;
				foreach ($this->rows as $key => $row) { $i++; ?>
				<tr class="designBlock">
					<th scope="row"><?php echo $i; ?></th>
					<td class="generic searchable" ><?php echo $row->name; ?></td>
					<td class="generic searchable" ><?php echo $row->description; ?></td>
					<td class="generic searchable" ><?php echo $row->level; ?></td>
					<td >
						<input type="hidden" value="<?php echo $row->id; ?>" class="medical_aid_id_holder" />
						<button class="btn btn-default btnEditDiagnosis btn-xs" type="button" >Edit</button>
					</td>
					<td ><button class="btn btn-default btnDeleteDoctor btn-xs" type="button" >Delete</button></td>
					<td ></td>
				</tr>				
			<?php }?>
		</tbody>
	</table> 	
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createDiagnosis">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Diagnosis</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddDiagnosis" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="desc">Description</label>
							<div class="col-xs-10">
								<input type="text" name="description" placeholder="Description" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="icd10">ICD 10</label>
							<div class="col-xs-10">
								<input type="text" name="icd10" placeholder="ICD 10" class="form-control" />
							</div>
						</div>															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>icd_diag" >
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

	<div class="modal fade" id="editDiagnosis">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Diagnosis</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditDiagnosis" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="diagnosissEditTarget">
						<div class="modal-body diagnosissEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="desc">Description</label>
								<div class="col-xs-10">
									<input type="text" name="description" placeholder="Description" class="form-control generic" data-field="description" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="icd10">ICD 10</label>
								<div class="col-xs-10">
									<input type="text" name="icd10" placeholder="ICD 10" class="form-control generic" data-field="icd10" data-set="value" />
								</div>
							</div>
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>icd_diag" >
							<input type="hidden" id="table" name="where" value="diagnosis_id = " class="generic" data-field="diagnosis_id" data-set="value">
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
	$("li#services").addClass("active");

/*
	Theses are the jquery.forms options for frmAddDiagnosis above that uses the generic controller 
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
		
		$("#createDiagnosis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis Added Successfully</div>");
		
		refreshDiagnosissView();
		
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
		$("#createDiagnosis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddDiagnosis
$("#frmAddDiagnosis").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditDiagnosis above that uses the generic controller 
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
		
		$("#editDiagnosis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Diagnosis Updated Successfully</div>");
		
		refreshDiagnosissView();
		
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
		$("#editDiagnosis").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddDiagnosis
$("#frmEditDiagnosis").ajaxForm(options);

/**
 * This section creates the diagnosiss view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .diagnosisDesign with your own design
var containerDesign = $(".diagnosisDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshDiagnosissView(){
	var emptyDesign = "<h2>There are no diagnosiss in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .diagnosisDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>icd_diag',
		"fields": '*',
		"extra": 'limit 100',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".diagnosissContainer", ".diagnosisDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshDiagnosissView();

var diagnosissEditDesign = $(".diagnosissEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteDiagnosis:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var diagnosis_id = $(this).parent().find(".diagnosis_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>icd_diag',
				"where": "diagnosis_id = "+diagnosis_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}
	});	

	$('.btnEditDiagnosis:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		console.log(diagnosis_id+"<>>>>>");
		
		var diagnosis_id = $(this).parent().find(".diagnosis_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>icd_diag',
			"fields": '*',
			"where": 'diagnosis_id = '+diagnosis_id,
			"containerDesign": diagnosissEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".diagnosissEditTarget", ".diagnosissEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editDiagnosis').modal('show');
	});	
}	

</script>
