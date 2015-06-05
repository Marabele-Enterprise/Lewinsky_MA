<div class="container" >       
	<div class="row">
		<h2>Age analysis</h2>
		<div id="feedback">
		</div>
		<div class="" id="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Age Analysis Selections</h4>
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
								<label class="col-xs-2 control-label" for="title">For</label>
								<div class="col-xs-10">
									<div id="for" class="btn-group" data-toggle="buttons">
										<label class="btn btn-default active">
											<input type="radio" name="forGroup" id="option1" autocomplete="off" checked value="All accounts" >All accounts
										</label>
										<label class="btn btn-default">
											<input type="radio" name="forGroup" id="outstandingOnlyRadio" autocomplete="off" value="Outstanding only" >Outstanding only
										</label>
										<label class="btn btn-default">
											<input type="radio" name="forGroup" id="option3" autocomplete="off" value="Debit & Credit Balance" >Debit & Credit Balance
										</label>
									</div>
								</div>
							</div>	
							<div class="form-group outstandingOnly">
								<label class="col-xs-2 control-label" for="title">Outstanding only</label>
								<div class="col-xs-10">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-default active">
											<input type="checkbox" autocomplete="off" checked class="cbxOutstandingOnly" value="Current Nil Balances" >Current Nil Balances
										</label>
										<label class="btn btn-default">
											<input type="checkbox" autocomplete="off" class="cbxOutstandingOnly" value="Current Outstanding" >Current Outstanding
										</label><br/>
										<label class="btn btn-default">
											<input type="checkbox" autocomplete="off" class="cbxOutstandingOnly" value="30 days Outstanding" >30 days Outstanding
										</label>
										<label class="btn btn-default">
											<input type="checkbox" autocomplete="off" class="cbxOutstandingOnly" value="60 days Outstanding" >60 days Outstanding
										</label><br/>										
										<label class="btn btn-default">
											<input type="checkbox" autocomplete="off" class="cbxOutstandingOnly" value="90 days Outstanding">90 days Outstanding
										</label>
										<label class="btn btn-default">
											<input type="checkbox" autocomplete="off" class="cbxOutstandingOnly" value="120 days Outstanding">120 days Outstanding
										</label>																														
									</div>
								</div>
							</div>							

							<div class="form-group">
								<label class="col-xs-2 control-label" for="initials">Sequence</label>
								<div class="col-xs-10">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-default active">
											<input type="radio" name="rdoSequence" id="option1" autocomplete="off" checked value="Account no" >Account no
										</label>
										<label class="btn btn-default">
											<input type="radio" name="rdoSequence" id="option2" autocomplete="off" value="Surnames" >Surnames
										</label>
										<label class="btn btn-default">
											<input type="radio" name="rdoSequence" id="option3" autocomplete="off" value="MedicalAid Name">MedicalAid Name
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-10 center_chbx" style="text-align: center;" >
									<div class="btn-group" data-toggle="buttons">
									  	<label class="btn btn-default ">
									    	<input type="checkbox" autocomplete="off" id="cbxSelectByMedAid" >Select by MedAid
										</label>
									</div>
								</div>	
							</div>
							<div class="form-group selectByMedicalAidGroup">
								<div class="col-xs-12" style="text-align: center;">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-default active">
											<input type="radio" name="selectByMedicalAidGroup" id="option1" autocomplete="off" value="One Medical Aid" >One Medical Aid
										</label>
										<label class="btn btn-default">
											<input type="radio" name="selectByMedicalAidGroup" id="option2" autocomplete="off" value="Direct Submission" >Direct Submission
										</label>
										<label class="btn btn-default">
											<input type="radio" name="selectByMedicalAidGroup" id="option3" autocomplete="off" value="Not Direct Submission" >Not Direct Submission
										</label>
										<label class="btn btn-default">
											<input type="radio" name="selectByMedicalAidGroup" id="option3" autocomplete="off" value="EDI" >EDI
										</label>
										<label class="btn btn-default">
											<input type="radio" name="selectByMedicalAidGroup" id="option3" autocomplete="off" value="Not EDI" >Not EDI
										</label>																				
									</div>
								</div>
							</div>							
							<div class="form-group oneMedicalAidGroup">
								<label class="col-xs-2 control-label" for="project_name">MedAid</label>
								<div class="col-xs-10">
									<select name="print_patient_liability" class="form-control" >
										<option selected class="form-control generic" data-field="print_patient_liability" data-set="innertext"></option>
										<option value="True" >Aid One</option>
										<option value="False" >World Bank</option>
									</select>									
								</div>
							</div>				
							<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						</div>
						<div class="modal-footer">
							<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</div>	
<style type="text/css">

.form-group > div{
	text-align: left;
}

.center_chbx{
	float: none;
	margin: 0 auto;
}

.outstandingOnly, .selectByMedicalAidGroup, .oneMedicalAidGroup{ 
	display: none;
}
</style>
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshDoctorsView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       

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
								<input type="text" id="title" name="title" placeholder="Title" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="initials">Initials</label>
							<div class="col-xs-10">
								<input type="text" id="initials" name="initials" placeholder="Initials" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="surname">Surname</label>
							<div class="col-xs-10">
								<input type="text" id="surname" name="surname" placeholder="Surname" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Phone</label>
							<div class="col-xs-10">
								<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">DRPR</label>
							<div class="col-xs-10">
								<input type="text" id="drpr" name="drpr" placeholder="DRPR ?" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Email</label>
							<div class="col-xs-10">
								<input type="text" id="email" name="email" placeholder="Email" class="form-control" />
							</div>
						</div>															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>doctor" >
					</div>
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-default">Save</button>
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
								<label class="col-xs-2 control-label" for="drpr">DRPR</label>
								<div class="col-xs-10">
									<input type="text" id="drpr" name="drpr" placeholder="DRPR ?" class="form-control generic" data-field="drpr" data-set="value" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="project_name">Email</label>
								<div class="col-xs-10">
									<input type="text" id="email" name="email" placeholder="Email" class="form-control generic" data-field="email" data-set="value" />
								</div>
							</div>															
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>doctor" >
							<input type="hidden" id="table" name="where" value="doctor_id = " class="generic" data-field="doctor_id" data-set="value">
						</div>
					</div>	
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-default">Save</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal rows-->

<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>

<script>
$("input[name='forGroup']").on("change", function (){
	if($(this).val() == "Outstanding only"){
		$(".outstandingOnly").slideDown(666);
	}else{
		$(".outstandingOnly").slideUp(666);
	}
});

$(".cbxOutstandingOnly").on("change", function (){
	$(".cbxOutstandingOnly:checked").each(function(i){
		console.log(i+". "+$(this).val());
	});
});

$("#cbxSelectByMedAid").on("change", function(){
	if($(this).is(':checked') == true){
		$(".selectByMedicalAidGroup").slideDown(666);
	}else{
		$(".selectByMedicalAidGroup").slideUp(666);
	}
});

$("input[name='selectByMedicalAidGroup']").on("change", function (){
	if($(this).val() == "One Medical Aid"){
		$(".oneMedicalAidGroup").slideDown(666);
	}else{
		$(".oneMedicalAidGroup").slideUp(666);
	}
});
</script>
