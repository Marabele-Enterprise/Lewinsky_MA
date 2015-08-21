$('#Transactions').css("opacity", 1);

$('.selectpicker').selectpicker('render').change(function(){
	$(".diagContainer").html("");
	var selected_diag = $(this).val();
  	var j = 0;
	for (var i = selected_diag.length - 1; i >= 0; i--) {
		j++;
		//console.log(selected_diag[i]);	
		var selector = ".diag_"+selected_diag[i].replace(".", "_");
		descriptions = $(selector).attr("data-desc");
		code = $(selector).attr("data-code");		
		
		$(".diagContainer").append('<tr class="diagDesign"><th scope="row" >'+j+'</th><td >'+code+'</td><td >'+descriptions+'</td></tr>').children(':last').hide().fadeIn(1666);
	};
});

$("div.diagnosis_select").find(".input-block-level").on("keyup", function(){
	var diag_desc = $(this).val();
	if(diag_desc.length >= 3){
		
		var data = {
			"table": 'ms_icd10_diagnosis',
			"fields": '*',
			"where": "description LIKE '%"+diag_desc+"%' OR name LIKE '%"+diag_desc+"%'",
			"extra": "ORDER BY description ASC LIMIT 10"
		};
		
		Generic.genericAction("get", data, function(response){
			//$("select.diagnosis_select").children().remove();
			var action_list = document.getElementById("diagnosis_select");
			
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

			//$('.selectpicker').selectpicker('refresh');

			response = JSON.parse(response);
			//console.log(response);
			for (var i = response.length - 1; i >= 0; i--) {
				//console.log("Row "+i);
				//console.log(response[i]);var res = str.replace("Microsoft", "W3Schools");
				$("select.diagnosis_select").append("<option class='diag_"+response[i].id+"' data-code='"+response[i].name+"' data-desc='"+response[i].description+"' value='"+response[i].id+"' >"+response[i].name+" "+response[i].description+"</option>");
			};

			$('.selectpicker').selectpicker('refresh');

		});
	}
});

function updateCosts(amount){
	var amount = parseFloat(amount);
	var vat = (parseFloat($("#vat_percentage").val())/100)*amount;
	vat = vat.toFixed(2);
	var cost_incl_vat = parseFloat(amount) + parseFloat(vat);
	$(".vat_target").val(vat);
	$(".cost_incl_vat_target").val(cost_incl_vat);
}

$(".amount_target").on("change", function(){
	updateCosts($(this).val());
});

$('.slct_tarrif_code').selectpicker('render').change(function(){
	//console.log("+++> "+$(this).html());
	new_descriptions = $(".pc_"+$(this).val()).attr("data-desc");
	new_amount = $(".pc_"+$(this).val()).attr("data-cost");
	$('.amount_target').val(new_amount+'.00');
	$('.desc_target').val(new_descriptions);
	updateCosts(new_amount);
});

$(".slct_tarrif_code").find(".input-block-level").on("keyup", function(){
	var diag_desc = $(this).val();
	if(diag_desc.length >= 2){
		var data = {
			"table": 'ms_tariff_code',
			"fields": '*',
			"where": "procedure_code LIKE '%"+diag_desc+"%'"
		};
		
		Generic.genericAction("get", data, function(response){
			$("select.slct_tarrif_code").children().remove();
			$('.slct_tarrif_code').selectpicker('refresh');

			response = JSON.parse(response);
			//console.log(response);
			for (var i = response.length - 1; i >= 0; i--) {
				//console.log("Row "+i);
				//console.log(response[i]);
				$("select.slct_tarrif_code").append("<option class='pc_"+response[i].procedure_code+"' data-cost='"+response[i].dh_rate+"' data-desc='"+response[i].description+"' value='"+response[i].procedure_code+"' >"+response[i].procedure_code+"</option>");
			};

			$('.slct_tarrif_code').selectpicker('refresh');
		});

	}
});

$(".patient_selector").change(function(){
	$(".patient_id_target").val($(".patient_"+$(this).val()).attr("data-id"));
});

//$('#myTab a[href="#Transactions"]').tab('show'); // Select tab by name

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


/*
	Theses are the jquery.forms options for frmAddPatient above that uses the generic controller 
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
		
		$("#createPatient").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patient Added Successfully</div>");
		
		refreshPatientsView();
		
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
		$("#createPatient").modal("hide");
		
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
//Initiat AJAX on submit of frmAddPatient
$("#frmAddPatient").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmEditPatient above that uses the generic controller 
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

		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");				
			return;
		}
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patient Updated Successfully</div>");
		
		refreshPatientsView();
		
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
//Initiat AJAX on submit of frmAddPatient
$("#frmEditPatient").ajaxForm(options);

/*
	Theses are the jquery.forms options for frmAddPatient above that uses the generic controller 
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
		
		$("#createPatient").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Patient Added Successfully</div>");
		
		refreshPatientsView();
		
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
		$("#createPatient").modal("hide");
		
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
//Initiat AJAX on submit of frmAddPatient
$("#frmAddPatient").ajaxForm(options);


/*
	Theses are the jquery.forms options for frmAddTransaction above that uses the generic controller 
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
		
		$("#createTransaction").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Transaction Added Successfully</div>");
		
		refreshTransactionsView();
		
		$("#frmAddTransaction")[0].reset();
		
		//This code segment removes the feedback automatically
		var delay = 16666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);

	}, complete: function(response){
		$("#loader1").remove();
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createTransaction").modal("hide");
		
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
//Initiat AJAX on submit of frmAddTransaction
$("#frmAddTransaction").ajaxForm(options);

/**
 * This section creates the tariff_codes view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .patientDesign with your own design
var transactionDesign = $(".transactionDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshTransactionsView(){
	var emptyDesign = "<tr><td><h2>There are no transactions in the system</h2></td></tr>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .transactionDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": 'ms_transaction',
		"fields": '*',
		"where": 'patient_id = '+$("#patient_id").val(),
		"containerDesign": transactionDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".transactionsContainer", ".transactionDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setBtnHandlers();
	});
}

refreshTransactionsView();



/**
 * This section creates the tariff_codes view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .patientDesign with your own design
var patientDesign = $(".patientDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshPatientsView(){
	var emptyDesign = "<h2>There are no patients in the system</h2>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .patientDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": 'ms_patient_user_details_tbls as a JOIN ms_user as b ON a.user_id = b.user_id',
		"fields": 'a.*, b.*',
		"where": 'a.patient_id = '+$("#patient_id").val(),
		"containerDesign": patientDesign,
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

refreshPatientsView();


var patientsEditDesign = $(".patientsEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setBtnHandlers(){
	$('.btnDeletepatient:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var patient_id = $(this).parent().find(".patient_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": 'ms_patient_user_details_tbls',
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
			"table": 'ms_patient_user_details_tbls',
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

/* Note js
SEPATATOR =====================================================================================================================================||
*/
/*
	Theses are the jquery.forms options for frmAddNote above that uses the generic controller 
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
		
		$("#createNote").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Note Added Successfully</div>");
		
		refreshNotesView();

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
		$("#createNote").modal("hide");
		
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
//Initiat AJAX on submit of frmAddNote
$("#frmAddNote").ajaxForm(options);

/*
	Theses are the jquery.forms options for frmAddNote above that uses the generic controller 
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
		
		$("#createNote").modal("hide");
		
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Note Added Successfully</div>");
		
		refreshNotesView();
		
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
		$("#createNote").modal("hide");
		
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
//Initiat AJAX on submit of frmAddNote
$("#frmEditNote").ajaxForm(options);

/**
 * This section creates the tariff_codes view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .noteDesign with your own design
var noteDesign = $(".noteDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshNotesView(){
	var emptyDesign = "<tr><td><h2>There are no notes in the system</h2></td></tr>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .noteDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": 'ms_note',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": noteDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".notesContainer", ".noteDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setNoteBtnHandlers();
	});
}

refreshNotesView();

var noteEditDesign = $(".noteEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setNoteBtnHandlers(){
	$('.btnDeleteNote:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var note_id = $(this).parent().find(".note_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": 'ms_note',
				"where": "note_id = "+note_id
			};

			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});

	$('.btnEditNote:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var note_id = $(this).parent().find(".note_id_holder").val();

		data = {
			"table": 'ms_note',
			"fields": '*',
			"where": 'note_id = '+note_id,
			"containerDesign": noteEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".editNoteTarget", ".noteEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editNote').modal('show');
	});
}

/* Note js
SEPATATOR =====================================================================================================================================||
*/

/* Message js
SEPATATOR =====================================================================================================================================||
*/
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
		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");		
			return;
		}
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
//Initiat AJAX on submit of frmAddMessage
$("#frmAddMessage").ajaxForm(options);

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
		if(response !== "Success"){
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+"</div>");		
			return;
		}
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
//Initiat AJAX on submit of frmAddMessage
$("#frmEditMessage").ajaxForm(options);

/**
 * This section creates the tariff_codes view
 * It uses the generic MVC class to retrieve the data from the database and merge it with the design
 * The design is replicate for each row of data that is retrieved
 */

 //Int this variable replace .messageDesign with your own design
var messageDesign = $(".messageDesign:first").clone().wrapAll("<div/>").parent().html();

function refreshMessagesView(){
	var emptyDesign = "<tr><td><h2>There are no messages in the system</h2></td></tr>";
	
	//To generate the view using generic class,  state the table, fields, where, order in the json object above
	//The containerDesign which is a string version of .messageDesign needs to be stated.
	//emptyDesign desing contains the message to print if nothing is found in the db
	data = {
		"table": 'ms_patient_message',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
		"containerDesign": messageDesign,
		"emptyDesign": emptyDesign
	};

	//To generate the view, call the function below with the following parameters
	//(targetContainer, designClass, data, type(can be table/grid/other), replace/append, oncomplete function)
	Generic.genericView(".messagesContainer", ".messageDesign", data, "other", "replace", function(){
		console.log("Data append Completed :)");
		//button handlers must be set after the view has been generated
		setMessageBtnHandlers();
	});
}

refreshMessagesView();

var messageEditDesign = $(".messageEditDesign:first").clone().wrapAll("<div/>").parent().html();

function setMessageBtnHandlers(){
	$('.btnDeleteMessage:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var message_id = $(this).parent().find(".message_id_holder").val();

		var x;
		if (confirm("Are you sure you want delete this item?") == true) {
			$(this).parent().fadeOut(666);
			data = {
				"table": 'ms_patient_message',
				"where": "patient_message_id = "+message_id
			};

			Generic.genericAction("delete", data, function(response){
				console.log(response);
				//refreshView();
			});
		} else {
			//x = "You pressed Cancel!";
		}		
	});

	$('.btnEditMessage:not(.bound)').addClass('bound').on("touchstart click", function (e){
		e.preventDefault();
		
		var message_id = $(this).parent().find(".message_id_holder").val();

		data = {
			"table": 'ms_patient_message',
			"fields": '*',
			"where": 'patient_message_id = '+message_id,
			"containerDesign": messageEditDesign,
			"emptyDesign": ""
		};
		
		Generic.genericView(".editMessageTarget", ".messageEditDesign", data, "other", "replace", function(){
			console.log("Data append Completed =)");
		});

		$('#editMessage').modal('show');
	});
}

/* Message js
SEPATATOR =====================================================================================================================================||
*/