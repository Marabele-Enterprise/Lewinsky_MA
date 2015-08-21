<div class="container" >       
	<div class="row">
		<h2>Doctors</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createDoctor" >
			<span class="glyphicon glyphicon-plus"></span> New Doctor
		</button>	
	</div>
</div>	
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshDoctorsView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<table class="table table-hover">
		<thead><tr><th>#</th><th>Title</th><th>Initials</th><th>Surname</th><th>Phone</th><th>Email</th><th>Practice #</th><th></th><th></th></tr></thead>
		<tbody>
			<?php $i = 0;
				foreach ($this->rows as $key => $row) { $i++; ?>
				<tr class="designBlock">
					<th scope="row"><?php echo $i; ?><div class="data_holder"><?php echo json_encode($row); ?></div></th>
					<td ><?php echo $row->title; ?></td>
					<td class="generic searchable" ><?php echo $row->initials; ?></td>
					<td class="generic searchable" ><?php echo $row->surname; ?></td>
					<td class="generic searchable" ><?php echo $row->phone; ?></td>
					<td class="generic searchable" ><?php echo $row->email; ?></td>
					<td ><?php echo $row->practice_number; ?></td>
					<td >
						<input type="hidden" value="<?php echo $row->details_id; ?>" class="doctor_id_holder" />
						<button class="btn btn-default btnEditDoctor btn-xs" type="button" >Edit</button>
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

	<div class="modal fade" id="createDoctor">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Doctor</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddDoctor" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="title">Title</label>
							<div class="col-xs-10">
								<input type="text" id="title" name="title" placeholder="Title" value="Dr" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="initials">Initials</label>
							<div class="col-xs-10">
								<input type="text" id="initials" name="initials" placeholder="Initials" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="name">Name</label>
							<div class="col-xs-10">
								<input type="text" name="name" placeholder="Name" class="form-control" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">Surname</label>
							<div class="col-xs-10">
								<input type="text" name="surname" placeholder="Surname" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Email</label>
							<div class="col-xs-10">
								<input type="email" id="email" name="email" placeholder="Email" class="form-control" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Phone</label>
							<div class="col-xs-10">
								<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="reg_type">Registration Type</label>
							<div class="col-xs-10">
								<select class="form-control reg_type" >
									<option></option>
									<option>HPCSA</option>
									<option>Practice Number</option>
								</select>
							</div>
						</div>						
						<div class="form-group hpcsa">
							<label class="col-xs-2 control-label" for="drpr">HPCSA Reg#</label>
							<div class="col-xs-10">
								<input type="text" name="hpcsa_number" placeholder="HPCSA Registration number" class="form-control" />
							</div>
						</div>
						<div class="form-group practice-number">
							<label class="col-xs-2 control-label" for="drpr">Practice Number</label>
							<div class="col-xs-10">
								<input type="text" name="practice_number" placeholder="Practice number" class="form-control" />
							</div>
						</div>															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>user" >
						<input type="hidden" name="table_sub" value="<?php echo PREFIX; ?>doctor_user_details_tbls" >
						<input type="hidden" name="fk" value="user_id" >
						<input type="hidden" name="practice_id" value="<?php echo Session::get('practice_id'); ?>" />
						<input type="hidden" name="practice_number" value="<?php echo Session::get('practice_number'); ?>" />
						<input type="hidden" name="insert_type" value="sub" />
						<input type="hidden" name="user_account_type" value="Doctor" />						
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

	<div class="modal fade" id="editDoctor">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Doctor</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditDoctor" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="doctorsEditTarget">
						<div class="modal-body doctorsEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="title">Title</label>
								<div class="col-xs-10">
									<input type="text" id="title" name="title" placeholder="Title" class="form-control generic" data-field="title" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="initials">Initials</label>
								<div class="col-xs-10">
									<input type="text" id="initials" name="initials" placeholder="Initials" class="form-control generic" data-field="initials" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Surname</label>
								<div class="col-xs-10">
									<input type="text" id="surname" name="surname" placeholder="Surname" class="form-control generic" data-field="surname" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="phone">Phone</label>
								<div class="col-xs-10">
									<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control generic" data-field="phone" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Practice #</label>
								<div class="col-xs-10">
									<input type="text" id="practice_number" name="practice_number" class="form-control generic" data-field="practice_number" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Email</label>
								<div class="col-xs-10">
									<input type="email" id="email" name="email" placeholder="Email" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>															
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" name="table" value="<?php echo PREFIX; ?>doctor_user_details_tbls" />
							<!--input type="hidden" name="insert_type" value="sub_user" /-->
							<input type="hidden" id="table" name="where" value="details_id = " class="generic" data-field="details_id" data-set="value" />
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
.hpcsa, .practice-number{
	display: none;
}
</style>
<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>
<script>

$("li#services").addClass("active");


$(".reg_type").on("change", function(){
	console.log($(this).val());
	if($(this).val() == "Practice Number"){
		$(".practice-number").slideDown("slow");
		$(".hpcsa").slideUp("slow");
	}else if($(this).val() == "HPCSA"){
		$(".hpcsa").slideDown("slow");
		$(".practice-number").slideUp("slow");
	}else{
		$(".hpcsa").slideUp("slow");
		$(".practice-number").slideUp("slow");
	}
});


/*
	Theses are the jquery.forms options for frmAddDoctor above that uses the generic controller 
*/
var options = {
	beforeSend: function(){
	$(".loader1").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		//clear all fields and close the modal
		if(response == "Success" || response == "success"){
			$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Success! Your details are inserted.</div>");
			window.location.reload();
			//$('form')[0].reset();
		}else{
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+". If the problem persists, please contact us at help@nuvemed.com</div>");     
			window.location.reload();
		}

	}, complete: function(response){
		$(".loader1").fadeOut("fast");
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createDoctor").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddDoctor
$("#frmAddDoctor").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditDoctor above that uses the generic controller 
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
		
		$("#editDoctor").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Doctor Updated Successfully</div>");
		
		refreshDoctorsView();
		
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
		$("#editDoctor").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddDoctor
$("#frmEditDoctor").ajaxForm(options);

/**
 * This section creates the doctors view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .doctorDesign with your own design
var containerDesign = $(".doctorDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshDoctorsView(){
	var emptyDesign = "<h2>There are no doctors in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .doctorDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>doctor_user_details_tbls as a JOIN <?php echo PREFIX; ?>user as b ON a.user_id = b.user_id',
		"fields": 'a.*, b.*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".doctorsContainer", ".doctorDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshDoctorsView();

var doctorsEditDesign = $(".doctorsEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteDoctor:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var doctor_id = $(this).parent().find(".doctor_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>doctor_user_details_tbls',
				"where": "doctor_id = "+doctor_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnEditDoctor:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var doctor_id = $(this).parent().find(".doctor_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>doctor_user_details_tbls as a JOIN <?php echo PREFIX; ?>user as b ON a.user_id = b.user_id',
			"fields": 'a.*, b.*',
			"where": 'a.details_id = '+doctor_id,
			"containerDesign": doctorsEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".doctorsEditTarget", ".doctorsEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editDoctor').modal('show');
	});	
}	

</script>
