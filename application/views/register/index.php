<!--Register Starts-->
<div id="contact" class="spacer fullpage">
	<form id="frmRegister" action="<?php echo URL; ?>register/register" method="post" class="container form center">
		<h2 class="text-center  wowload fadeInUp no-margin-btm">Create An Account</h2>
		<div class="row wowload fadeInLeftBig">      
			<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			    <div class="panel panel-info">
			        <div class="panel-heading">
			        	<div class="panel-image thumbnail" >
			        		<span class="glyphicon glyphicon-home thumbnail no-margin-btm" aria-hidden="true"></span>
			        	</div>
			            <div class="panel-title">Setup Your Practice</div>
			        </div>  
			        <div class="panel-body" >
			            <div id="signupform" class="form-horizontal" role="form">
			                <div id="signupalert" style="display:none" class="alert alert-danger">
			                    <p>Error:</p>
			                    <span></span>
			                </div>
			                <div class="form-group">
			                    <label for="firstname" class="col-md-3 control-label">Practice Name</label>
			                    <div class="col-md-9">
			                        <input type="text" class="form-control" required name="practice_name" placeholder="Practice Name" >
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="lastname" class="col-md-3 control-label">Practice Number</label>
			                    <div class="col-md-9">
			                        <input type="text" class="form-control" required name="practice_number" placeholder="Practice Number" >
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="type" class="col-md-3 control-label">Type</label>
			                    <div class="col-md-9">
			                        <select class="form-control" required name="type" >
			                        	<option></option>
			                        	<option>Physiotherapist</option>			                        	
			                        	<option>Pediatrician</option>
			                        	<option>Physiatrist</option>
			                        	<option>Surgeon</option>
			                        	<option>Plastic surgeon</option>
			                        	<option>Family Practitioner</option>
			                        	<option>Primary care physician</option>
			                        	<option>Oncologist</option>
			                        	<option>Allergist</option>
			                        	<option>Anesthetist</option>
			                        	<option>Cardiologist</option>
			                        	<option>Dermatologist</option>
			                        	<option>Neurologist</option>
			                        	<option>Orthopedist</option>
			                        	<option>Otorhinolaryngologist</option>
			                        	<option>Radiologist</option>
			                        	<option>Urologist</option>
			                        	<option>Acupuncturist</option>
			                        	<option>Chiropractor</option>
			                        </select>
			                    </div>
			                </div>
			            </div>
			         </div>
			    </div>
			 </div> 
		</div>
		<div id="feedback" ></div>
		<div class="row wowload fadeInRightBig">      
			<div id="signupbox" style="margin-top:0px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			    <div class="panel panel-info">
			        <div class="panel-heading">
			        	<div class="panel-image thumbnail" >
			        		<span class="glyphicon glyphicon-user thumbnail no-margin-btm" aria-hidden="true"></span>
			        	</div>
			            <div class="panel-title">Your Account</div>
			        </div>  
			        <div class="panel-body" >
			            <div id="signupform" class="form-horizontal" role="form">
			                <div id="signupalert" style="display:none" class="alert alert-danger">
			                    <p>Error:</p>
			                    <span></span>
			                </div>
			                <div class="form-group">
			                    <label for="email" class="col-md-3 control-label">Email</label>
			                    <div class="col-md-9">
			                        <input type="email" class="form-control" required name="email" placeholder="Email Address">
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="password" class="col-md-3 control-label">Password</label>
			                    <div class="col-md-9">
			                        <input type="password" class="form-control" required name="password" placeholder="Password">
			                    </div>
			                </div>			                
			                <div class="form-group">
			                    <label for="name" class="col-md-3 control-label">Name</label>
			                    <div class="col-md-9">
			                        <input type="text" class="form-control" required name="name" placeholder="Name">
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="surname" class="col-md-3 control-label">Surname</label>
			                    <div class="col-md-9">
			                        <input type="text" class="form-control" required name="surname" placeholder="Surname">
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="phone" class="col-md-3 control-label">Phone</label>
			                    <div class="col-md-9">
			                        <input type="text" class="form-control" required name="phone" placeholder="Phone">
			                    </div>
			                </div>
			                <div class="form-group">
			                	<label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
			                    <!-- Button -->                                        
			                    <div class="col-md-9">
			                        <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
			                    </div>
			                </div>
			            </div>
			         </div>
			    </div>
			 </div> 
		</div>		
	</form>
</div>
<!--Register Ends-->

<style type="text/css">
.panel-image{
  width: 66px;
  height: 56px;
  margin: 0px;	
  float: left;
}

.panel-image > span{
	font-size: 25px;
  	text-align: center;
}

.panel-heading{
	height: 52px;
}

.panel-title{
   width: 80%;
  float: right;
  font-size: 22px;
  margin-top: 10px;  
}
</style>

<script type="text/javascript">
/*
	Theses are the jquery.forms options for frmAddDoctor above that uses the generic controller 
*/
var options = {
	beforeSend: function(){
		$(".loading").fadeIn("fast");
	console.log("beforeSend");
	}, uploadProgress: function(event, position, total, percentComplete){
		console.log("uploadProgress");
	}, success: function(response){
		if(response == "Success" || response == "success"){
			$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Success! You are now registered and a verification email is sent. <a href='"+$("#URLholder").val()+"login/index'>Continue to login.</a></div>");
			
			$('form')[0].reset();

		}else{
			$("#feedback").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+". If the problem persists, please contact us at help@nuvemed.com</div>");			
		}
		//This code segment removes the feedback automatically
		/*var delay = 15666;
		setTimeout(function() {
		    $("#feedback").children().fadeOut().html("");
		}, delay);
		*/
	}, complete: function(response){
		$(".loading").fadeOut("fast");
		console.log("Complete. response: "+response.responseText);
	}, error: function(){
		$("#createDoctor").modal("hide");
		
		$("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
		
		//clear all fields
		$('form')[0].reset();
		
		console.log("ERROR: ");
	}
};
//Initiat AJAX on submit of frmRegister
$("#frmRegister").ajaxForm(options);

</script>