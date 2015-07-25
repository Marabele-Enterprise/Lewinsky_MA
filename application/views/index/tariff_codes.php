<div class="container" >       
	<div class="row">
		<h2>Tariff Codes</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTariffCode" >
			<span class="glyphicon glyphicon-plus"></span> New Tariff Code
		</button>
	</div>
</div>	

<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshTariffCodesView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<div class="row tariff_codesContainer">
		<!-- .tariff_codesContainer is the container the generic class will print in -->
		<div class="tariff_codeDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- 
				.tariff_codeDesign is the design for each row in the database. The generic class will print data 
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
				<input type="hidden" value="" class="tariff_code_id_holder generic" data-field="tariff_code_id" data-set="value" />
				<button class="btn btn-default btnEditTariffCode btn-sm" type="button" >Edit</button>
				<button class="btn btn-default btnDeleteTariffCode btn-sm" type="button" >Delete</button>
			</div>
		</div>	
	</div>
</div>
<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

	<div class="modal fade" id="createTariffCode">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New TariffCode</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<div class="modal-body">
					<label class="col-xs-3 control-label">Upload Type:</label>
					<div class="col-sm-9">
						<select class="form-control" id="uploadSelect">
							<option value="0">Choose Method</option>
							<option value="Form">Form</option>
							<option value="Exel">Excel file</option>
						</select>
					</div><br/><br/>
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
								[ Product Name | Brandname | Description | Size | Category ]
								<br/>
								[ Values  |  Values  |  Values |  Values  |  Values ]
							</div>
							<!--Use Web Workers: (when available) --><input type="checkbox" name="useworker" checked style="visibility:hidden;">
							<!--Use readAsBinaryString: (when available)--><input type="checkbox" name="userabs" checked style="visibility:hidden;">
							<input type="checkbox" name="xferable" checked style="visibility:hidden;">
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
					<form class="form-horizontal" id="frmAddTariffCode" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" style="display:none" enctype="multipart/form-data"  >
						
						<div id="feedback"></div>
						<div class="form-group" scoped style="display: inline-flex;">
							<label class="col-xs-2 control-label" for="code">Code</label>
							<div class="col-xs-10">
								<input type="text" name="code" placeholder="Code" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="description">Description</label>
							<div class="col-xs-10">
								<input type="text" id="description" name="description" placeholder="Description" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="private">Private</label>
							<div class="col-xs-10">
								<input type="text" id="private" name="private" placeholder="Private" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Med Aid 2010</label>
							<div class="col-xs-10">
								<input type="text" id="drpr" name="med_aid_2010" placeholder="Med Aid 2010 ?" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">IOD</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="iod" placeholder="IOD" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Discovery</label>
							<div class="col-xs-10">
								<input type="text" id="discovery" name="discovery" placeholder="Discovery" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Rate 5</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_5" placeholder="Rate 5" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Rate 7</label>
							<div class="col-xs-10">
								<input type="text" id="rate_7" name="rate_7" placeholder="Rate 7" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Rate 8</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_8" placeholder="Rate 8" class="form-control" />
							</div>
						</div>											
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Rate 9</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="rate_9" placeholder="Rate 9" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Material</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="material" placeholder="Material" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Mod Minutes</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="modminutes" placeholder="Mod Minutes" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">MatPic</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="matpic" placeholder="Mat Pic" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Units</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="units" placeholder="Units" class="form-control" />
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">CF Type</label>
							<div class="col-xs-10">
								<input type="text" id="iod" name="cf_type" placeholder="CF Type" class="form-control" />
							</div>
						</div>																																									
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>tariff_code" >
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

	<div class="modal fade" id="editTariffCode">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit TariffCode</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditTariffCode" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="tariff_codesEditTarget">
						<div class="modal-body tariff_codesEditDesign">
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
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>tariff_code" >
							<input type="hidden" id="table" name="where" value="tariff_code_id = " class="generic" data-field="tariff_code_id" data-set="value">
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
	Theses are the jquery.forms options for frmAddTariffCode above that uses the generic controller 
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
		
		$("#createTariffCode").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>TariffCode Added Successfully</div>");
		
		refreshTariffCodesView();
		
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
		$("#createTariffCode").modal("hide");
		
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
//Initiat AJAX on submit of frmAddTariffCode
$("#frmAddTariffCode").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditTariffCode above that uses the generic controller 
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
		
		$("#editTariffCode").modal("hide");

		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");				
			return;
		}
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>TariffCode Updated Successfully</div>");
		
		refreshTariffCodesView();
		
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
		$("#editTariffCode").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmAddTariffCode
$("#frmEditTariffCode").ajaxForm(options);

/**
 * This section creates the tariff_codes view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .tariff_codeDesign with your own design
var containerDesign = $(".tariff_codeDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshTariffCodesView(){
	var emptyDesign = "<h2>There are no tariff_codes in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .tariff_codeDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": '<?php echo PREFIX; ?>tariff_code',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": containerDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".tariff_codesContainer", ".tariff_codeDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshTariffCodesView();

var tariff_codesEditDesign = $(".tariff_codesEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeleteTariffCode:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var tariff_code_id = $(this).parent().find(".tariff_code_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": '<?php echo PREFIX; ?>tariff_code',
				"where": "tariff_code_id = "+tariff_code_id
			};
			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});	

	$('.btnEditTariffCode:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var tariff_code_id = $(this).parent().find(".tariff_code_id_holder").val();

		data = {
			"table": '<?php echo PREFIX; ?>tariff_code',
			"fields": '*',
			"where": 'tariff_code_id = '+tariff_code_id,
			"containerDesign": tariff_codesEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".tariff_codesEditTarget", ".tariff_codesEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editTariffCode').modal('show');
	});	
}	

$('#uploadSelect').on('change', function(){
	var val = $(this).val();
	if(val == "Form"){
		$('#frmAddTariffCode').slideDown('slow');
		$('.dropRow').slideUp('slow');
	}else if(val == "Exel"){
		$('#frmAddTariffCode').slideUp('slow');
		$('.dropRow').slideDown('slow');
	}else{
		$('#frmAddTariffCode').slideUp('slow');
		$('.dropRow').slideUp('slow');
	}
});
</script>
