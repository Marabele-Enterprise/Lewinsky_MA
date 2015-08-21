<div class="container" >       
	<div class="row">
		<h2>Medical Aids</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createMedicalAid" >
			<span class="glyphicon glyphicon-plus"></span> New Medical Aid
		</button>
	</div>
</div>	
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshMedicalAidsView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<div class="row">
		<table class="table table-hover">
			<thead><tr><th>#</th><th>Name</th><th>Reg Date</th><th>Type</th><th>Phone</th><th></th><th></th></tr></thead>
			<tbody>
				<?php $i = 0;
					foreach ($this->rows as $key => $row) { $i++; ?>
					<tr class="designBlock">
						<th scope="row"><?php echo $i; ?></th>
						<td class="generic searchable" ><?php echo $row->name; ?></td>
						<td class="generic searchable" ><?php echo $row->registration_date; ?></td>
						<td class="generic searchable" ><?php echo $row->type; ?></td>
						<td class="generic searchable" ><?php echo $row->phone; ?></td>
						<td >
							<input type="hidden" value="<?php echo $row->medical_aid_id; ?>" class="medical_aid_id_holder" />
							<button class="btn btn-default btnEditDoctor btn-xs" type="button" >Edit</button>
						</td>
						<td ><button class="btn btn-default btnDeleteDoctor btn-xs" type="button" >Delete</button></td>
						<td ></td>
					</tr>				
				<?php }?>
			</tbody>
		</table> 		
	</div>
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createMedicalAid">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Medical Aid</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<div class="modal-body" scoped style="min-height: 70px;">
					<div class="form-group col-xs-12 col-sm-12 col-md-12" scoped style="margin-bottom: 15px;">
						<label class="col-xs-2 control-label" >Upload Type:</label>
						<div class="col-xs-10">
							<select class="form-control" id="uploadSelect">
								<option value="0">Choose Method</option>
								<option value="Form">Form</option>
								<option value="Exel">Excel file</option>
							</select>
						</div>
					</div>
					<div id="excelUpload" class="dropRow" style="display:none">
						<div class="">
							<!-- THIS IS THE EXEL FILE WEBSITES ADDER-->
							<div style="dispay: none" >
								<select name="format" style="visibility:hidden;">
									<!--option value="csv" > CSV</option-->
									<option value="json" selected> JSON</option>
									<!--option value="form"> FORMULAE</option-->
								</select>
								<br />
							</div>
							
							<img src='<?php echo URL;?>public/img/loading.gif' id='loadingImg' alt='Loading...' class="center-block" scoped style="display:none;" />
							<div id="drop">
								Drop an XLS file here to import product, please note that the format in file should be
								<br/>
								[ Field | Field | Field | Field | Field ]
								<br/>
								[ Values  |  Values  |  Values |  Values  |  Values ]
							</div>
							<!--Use Web Workers: (when available) --><input type="checkbox" name="useworker" checked style="visibility:hidden;">
							<!--Use readAsBinaryString: (when available)--><input type="checkbox" name="userabs" checked style="visibility:hidden;">
							<input type="checkbox" name="xferable" checked style="visibility:hidden;">
							<input type="hidden" class="excelTable" value="medical_aid" />
							<pre id="out" style="display: none"></pre>
							<br/>
							
							<!-- uncomment the next line here and in xlsxworker.js for encoding support -->
							<!--<script src="dist/cpexcel.js"></script>-->
							<script src="<?php echo URL; ?>public/plugins/dropUploader/xls.js"></script>
							<script src="<?php echo URL; ?>public/plugins/dropUploader/script.js"></script>
							<script src="<?php echo URL; ?>public/plugins/dropUploader/shim.js"></script>
							<script src="<?php echo URL; ?>public/plugins/dropUploader/jszip.js"></script>
							<!--script src="<?php echo URL; ?>public/plugins/dropUploader/xlsx.js"></script>
							<script src="<?php echo URL; ?>public/plugins/dropUploader/xlsxScript.js"></script-->
							
							<style>
								#drop{
									border:2px dashed #bbb;
									-moz-border-radius:5px;
									-webkit-border-radius:5px;
									border-radius:5px;
									padding:25px;
									text-align:center;
									font:20pt bold,"Vollkorn";color:#bbb
								}
								#b64data{
									width:100%;
								}
								
								hr{
									margin-top: -5px;
								}
							</style>
							<!-- THIS IS THE EXEL FILE WEBSITES ADDER END-->
						</div>
					</div> <!-- /#excelUpload -->											
					<form class="form-horizontal" id="frmAddMedicalAid" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data" scoped  style="margin-top: 15px; display:none" >
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="name">Name</label>
							<div class="col-xs-10">
								<input type="text" id="name" name="name" placeholder="Name" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="admin">Administrator</label>
							<div class="col-xs-10">
								<input type="text" name="admin" placeholder="Administrator" class="form-control" />
							</div>
						</div>									
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">Code</label>
							<div class="col-xs-10">
								<input type="text" name="code" placeholder="Code" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Phone</label>
							<div class="col-xs-10">
								<input type="text" name="phone" placeholder="Phone" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Contact</label>
							<div class="col-xs-10">
								<input type="text" name="contact" placeholder="Contact" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Email</label>
							<div class="col-xs-10">
								<input type="text" name="email" placeholder="Email" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">Address</label>
							<div class="col-xs-10">
								<input type="text" name="address1" placeholder="Address 1" class="form-control" />
								<input type="text" name="address2" placeholder="Address 2" class="form-control" />
								<input type="text" name="address3" placeholder="Address 3" class="form-control" />
							</div>
						</div>			
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">Direct</label>
							<div class="col-xs-10">
								<input type="text" name="direct" placeholder="true/false" class="form-control" />
							</div>
						</div>																		
						<div class="form-group">
							<label class="col-xs-2 control-label" for="name">EDI</label>
							<div class="col-xs-10">
								<input type="text" id="edi" name="edi" placeholder="true/false" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">Use tarif</label>
							<div class="col-xs-10">
								<input type="text" name="tarif" placeholder="Tarif(has to be select)" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="bill_at">Bill at</label>
							<div class="col-xs-10">
								<input type="text" name="bill_at" placeholder="Bill at" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Round to</label>
							<div class="col-xs-10">
								<input type="text" name="round_to" placeholder="(must b select)" class="form-control" />
							</div>
						</div>																				
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>medical_aid" >
					</form>
				</div>
				<div class="modal-footer">
					<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" id="editMedicalAid">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit MedicalAid</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditMedicalAid" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="medical_aidsEditTarget">
						<div class="modal-body medical_aidsEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="name">Name</label>
								<div class="col-xs-10">
									<input type="text" id="name" name="name" placeholder="Name" class="form-control generic" data-field="name" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="admin">Administrator</label>
								<div class="col-xs-10">
									<input type="text" name="admin" placeholder="Administrator" class="form-control generic" data-field="admin" data-set="value" />
								</div>
							</div>									
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Code</label>
								<div class="col-xs-10">
									<input type="text" name="code" placeholder="Code" class="form-control generic" data-field="code" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="phone">Phone</label>
								<div class="col-xs-10">
									<input type="text" name="phone" placeholder="Phone" class="form-control generic" data-field="phone" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Contact</label>
								<div class="col-xs-10">
									<input type="text" name="contact" placeholder="Contact" class="form-control generic" data-field="contact" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Email</label>
								<div class="col-xs-10">
									<input type="text" name="email" placeholder="Email" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Address</label>
								<div class="col-xs-10">
									<input type="text" name="address1" placeholder="Address 1" class="form-control generic" data-field="address1" data-set="value" />
									<input type="text" name="address2" placeholder="Address 2" class="form-control generic" data-field="address2" data-set="value" />
									<input type="text" name="address3" placeholder="Address 3" class="form-control generic" data-field="address3" data-set="value" />
								</div>
							</div>			
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Direct</label>
								<div class="col-xs-10">
									<input type="text" name="direct" placeholder="true/false" class="form-control generic" data-field="direct" data-set="value" />
								</div>
							</div>																		
							<div class="form-group">
								<label class="col-xs-2 control-label" for="name">EDI</label>
								<div class="col-xs-10">
									<input type="text" id="edi" name="edi" placeholder="true/false" class="form-control generic" data-field="edi" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="surname">Use tarif</label>
								<div class="col-xs-10">
									<input type="text" name="tarif" placeholder="Tarif(has to be select)" class="form-control generic" data-field="tarif" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="bill_at">Bill at</label>
								<div class="col-xs-10">
									<input type="text" name="bill_at" placeholder="Bill at" class="form-control generic" data-field="bill_at" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="drpr">Round to</label>
								<div class="col-xs-10">
									<input type="text" name="round_to" placeholder="(must b select)" class="form-control generic" data-field="round_to" data-set="value" />
								</div>
							</div>
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" name="table" value="<?php echo PREFIX; ?>medical_aid" >
							<input type="hidden" name="where" value="medical_aid_id = " class="generic" data-field="medical_aid_id" data-set="value">
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
	Theses are the jquery.forms options for frmAddMedicalAid above that uses the generic controller 
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
		
		$("#createMedicalAid").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>MedicalAid Added Successfully</div>");
		
		refreshMedicalAidsView();
		
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
		$("#createMedicalAid").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddMedicalAid
$("#frmAddMedicalAid").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditMedicalAid above that uses the generic controller 
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
		
		$("#editMedicalAid").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>MedicalAid Updated Successfully</div>");
		
		refreshMedicalAidsView();
		
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
		$("#editMedicalAid").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddMedicalAid
$("#frmEditMedicalAid").ajaxForm(options);

/**
 * This section creates the medical_aids view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .medical_aidDesign with your own design
var containerDesign = $(".medical_aidDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshMedicalAidsView(){
	var emptyDesign = "<h2>There are no medical_aids in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .medical_aidDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>medical_aid',
		"fields": 'name, registration_date, type, phone',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".medical_aidsContainer", ".medical_aidDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshMedicalAidsView();

var medical_aidsEditDesign = $(".medical_aidsEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteMedicalAid:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var medical_aid_id = $(this).parent().find(".medical_aid_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>medical_aid',
				"where": "medical_aid_id = "+medical_aid_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnEditMedicalAid:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var medical_aid_id = $(this).parent().find(".medical_aid_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>medical_aid',
			"fields": '*',
			"where": 'medical_aid_id = '+medical_aid_id,
			"containerDesign": medical_aidsEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".medical_aidsEditTarget", ".medical_aidsEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editMedicalAid').modal('show');
	});	
}	

$('#uploadSelect').on('change', function(){
	var val = $(this).val();
	if(val == "Form"){
		$('#frmAddMedicalAid').slideDown('slow');
		$('.dropRow').slideUp('slow');
	}else if(val == "Exel"){
		$('#frmAddMedicalAid').slideUp('slow');
		$('.dropRow').slideDown('slow');
	}else{
		$('#frmAddMedicalAid').slideUp('slow');
		$('.dropRow').slideUp('slow');
	}
});

</script>
