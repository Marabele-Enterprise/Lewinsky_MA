var Generic = function () {
	
	return { 
		genericView: genericView,
		genericAction: genericAction,
		logAction: logAction
	};
	
	function genericView(selector, design, data, type, replace, oncomplete) {
		var url = $("#URLholder").val()+"generic/genericGet/buildview";
		//console.log("about to build WTF >>>>"+design);
		$(design).remove();
		$.ajax({ //ajaxing the  data
			url: url,
			data: data,
			cache: false,
			type: "POST",
			success: function(response) {
				desginClass = design.substring(1);
				if(response == "empty"){
					if(replace == "replace"){
						$(selector).html(data.emptyDesign).children().fadeIn(666);
					}else{
						$(selector).append(data.emptyDesign).children().fadeIn(666);
					}
					$(selector).children().removeClass(desginClass);
				}else{
					if(type == "table"){
						try{
							$(selector).html($(selector+" thead").html()+response);
						}catch(e){
						
						}	
					}else{
						if(replace == "replace"){
							$(selector).html(response).children().fadeIn(666);
						}else{
							$(selector).append(response).children().fadeIn(666);
						}
						$(selector).children().removeClass(desginClass);
					}
				}	
				//$(".removeDesign").fadeOut('fast');
			},
			error: function(xhr) {
				console.log(xhr.responseText);
			}
		}).done(function(data) {
			//console.log("done: "+data);
			oncomplete();
		}).fail(function(jqXHR,status, errorThrown) {
		    console.log(errorThrown);
		    console.log(jqXHR.responseText);
		    console.log(jqXHR.status);
		});
		console.log("<= Done build =>");
	}
	
	function genericAction(action, data, oncomplete) { //Create/Update/Delete
		var url = "";
		if(action == "create" || action == "Create"){
			url = $("#URLholder").val()+"generic/genericCreate";
		}else if(action == "update" || action == "Update"){
			url = $("#URLholder").val()+"generic/genericUpdate";
		}else if(action == "delete" || action == "Delete"){
			url = $("#URLholder").val()+"generic/genericDelete";
		}else if(action == "get" || action == "Get"){
			url = $("#URLholder").val()+"generic/genericGet/json";
		}else{
			alert("An unrecogized action was provide. Please note that supported actions are create, update & delete.");
			return false;
		}
		
		$.ajax({ //ajaxing the  data
			url: url,
			data: data,
			cache: false,
			type: "POST",
			success: function(response){
				oncomplete(response);
			},
			error: function(xhr) {
				console.log(xhr.responseText);
			}
		}).done(function(data) {
			//console.log("GenericCreateUdate done: "+data);
		}).fail(function(jqXHR,status, errorThrown) {
		    console.log(errorThrown);
		    console.log(jqXHR.responseText);
		    console.log(jqXHR.status);
		});
	}

	function genericAction(action, data, oncomplete) { //Create/Update/Delete
		var url = "";
		if(action == "create" || action == "Create"){
			url = $("#URLholder").val()+"generic/genericCreate";
		}else if(action == "update" || action == "Update"){
			url = $("#URLholder").val()+"generic/genericUpdate";
		}else if(action == "delete" || action == "Delete"){
			url = $("#URLholder").val()+"generic/genericDelete";
		}else if(action == "get" || action == "Get"){
			url = $("#URLholder").val()+"generic/genericGet/json";
		}else{
			alert("An unrecogized action was provide. Please note that supported actions are create, update & delete.");
			return false;
		}
		
		$.ajax({ //ajaxing the  data
			url: url,
			data: data,
			cache: false,
			type: "POST",
			success: function(response){
				oncomplete(response);
				if(response != "Success"){
					$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Apologies, but an error has been detect: "+response+"</div>");
					//This code segment removes the feedback automatically
					var delay = 23666;
					setTimeout(function() {
					    $("#feedback").children().fadeOut().html("");
					}, delay);
				}
			},
			error: function(xhr) {
				console.log(xhr.responseText);
			}
		}).done(function(data) {
			//console.log("GenericCreateUdate done: "+data);
		}).fail(function(jqXHR,status, errorThrown) {
		    console.log(errorThrown);
		    console.log(jqXHR.responseText);
		    console.log(jqXHR.status);
		});
	}	

	function logAction(action, category, test_label) { //Logs user actions in the background
		var url = $("#URLholder").val()+"generic/logAction";

		$.ajax({ //ajaxing the  data
			url: url,
			data: { "action": action, "category": category, "test_label": test_label },
			cache: false,
			type: "POST",
			success: function(response){
				//oncomplete(response);
			},
			error: function(xhr) {
				console.log(xhr.responseText);
			}
		}).done(function(data) {
			console.log("logAction done: "+data);
		}).fail(function(jqXHR,status, errorThrown) {
		    console.log(errorThrown);
		    console.log(jqXHR.responseText);
		    console.log(jqXHR.status);
		});
	}			
}();