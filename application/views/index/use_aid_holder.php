<div class="container" >       
	<div class="row">
		<br/>
		<h2><?php //echo $this->patient_id; ?>Medical Aid Holder: User Name</h2>
		<div id="feedback">
		</div>
	</div>	
	<div class="row info-block">
		<div class="topDatesAndVals col-xs-12 col-sm-6 col-md-5 col-lg-4" >
			<table class="table table-bordered" style="background: whitesmoke;">
				<thead>
					<tr class=""><th>120 Days</th><th>90 Days</th><th>60 Days</th><th>30 Days</th><th>Current</th><th>Total</th></tr>
				</thead>
				<tbody>
					<tr class=""><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td><td>10.00</td><td>10.00</td></tr>
				</tbody>
			</table>
		</div>
		<div class="medAidInfo col-xs-12 col-sm-4 col-md-4 col-lg-4 bordered" style="background: whitesmoke; border: solid 1px rgb(221, 221, 221);">
			<b>Medical Aid</b><br/>
			Name: <span>World bank</span><br/>
			Num: <span>6575976532</span><br/>
			MedAid2015 at 116.36%
		</div>
	</div>
<style>
.info-block > div{
	float: left;
}
</style>
		<!--div class="aid_holderDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- 
				.aid_holderDesign is the design for each row in the database. The generic class will print data 
				in the tags that have class="generic". The attribute data-field tells the system what field
				from the database you want to print in that tag. The attribute data-set tells it what to print
				to. Possible values for dataset=(innertext, value, src, href, ...).
			->
			<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Surname</b></td><td class="generic" data-field="surname" data-set="innertext"></td></tr>
					<tr><td><b>Title</b></td><td class="generic" data-field="title" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Initials</b></td><td class="generic" data-field="initials" data-set="innertext"></td></tr>
					<tr><td><b>Phone</b></td><td class="generic" data-field="phone" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Cell</b></td><td class="generic" data-field="cell" data-set="innertext"></td></tr>
					<tr><td><b>Email</b></td><td class="generic" data-field="email" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Tariff Rate</b></td><td class="generic" data-field="tariff_rate" data-set="innertext"></td></tr>
					<tr><td><b>Bill at</b></td><td class="generic" data-field="bill_at" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Medical Aid</b></td><td class="generic" data-field="medical_aid" data-set="innertext"></td></tr>
					<tr><td><b>Medical Aid Number</b></td><td class="generic" data-field="medical_aid_number" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Member ID</b></td><td class="generic" data-field="member_id" data-set="innertext"></td></tr>
					<tr><td><b>Authorisation Code</b></td><td class="generic" data-field="authorisation_code" data-set="innertext"></td></tr>
				</table>
				<input type="hidden" value="" class="aid_holder_id_holder generic" data-field="aid_holder_id" data-set="value" />
				<button class="btn btn-default btnEditAidHolder btn-sm" type="button" >Edit</button>
				<button class="btn btn-default btnDeleteAidHolder btn-sm" type="button" >Delete</button>
				<form action="<?php echo URL; ?>index/use_aid_holder/" method="post" class="postLink"> 					    
					<input type="hidden" name="aid_holder_id" value="" class="generic" data-field="aid_holder_id" data-set="value"> 					    
					<button type="submit" class="btn btn-default btn-sm">Use</button> 					
				</form>				
			</div>
		</div-->	
	<div class="row" >	
		<div role="tabpanel" class=".col-xs-12 .col-sm-6 .col-md-8">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		  	<li role="presentation" ><a href="#Patients" aria-controls="Patients" role="tab" data-toggle="tab">Patients</a></li>
		    <li role="presentation" class="active"><a href="#Transactions" aria-controls="Transactions" role="tab" data-toggle="tab">Transactions</a></li>
		    <li role="presentation"><a href="#AccountDetails" aria-controls="AccountDetails" role="tab" data-toggle="tab">Account Details</a></li>
		    <li role="presentation"><a href="#Notes" aria-controls="Notes" role="tab" data-toggle="tab">Notes</a></li>
		    <li role="presentation"><a href="#Messages" aria-controls="Messages" role="tab" data-toggle="tab">Messages</a></li>
		    <li role="presentation"><a href="#PaymentAllocation" aria-controls="PaymentAllocation" role="tab" data-toggle="tab">Payment Allocation</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content .col-xs-12 .col-sm-6 .col-md-8">
		  	<div role="tabpanel" class="tab-pane fade" id="Patients">
	  			<div class="row">
					<h3>patients</h3>
					<div id="feedback">
					</div>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createpatient" >
						<span class="glyphicon glyphicon-plus"></span> New patient
					</button>
				</div>
				<div class="row patientsContainer">
					<!-- .patientsContainer is the container the generic class will print in -->
					<div class="patientDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
						<!-- 
							.patientDesign is the design for each row in the database. The generic class will print data 
							in the tags that have class="generic". The attribute data-field tells the system what field
							from the database you want to print in that tag. The attribute data-set tells it what to print
							to. Possible values for dataset=(innertext, value, src, href, ...).
						-->
						<div class="thumbnail">
							<table class="table table-bordered">
								<tr class="active"><td><b>Name</b></td><td class="generic" data-field="name" data-set="innertext"></td></tr>
								<tr><td><b>ID</b></td><td class="generic" data-field="id_number" data-set="innertext"></td></tr>
								<tr><td><b>Date of birth</b></td><td class="generic" data-field="date_of_birth" data-set="innertext"></td></tr>
								<tr class="active"><td><b>Cell</b></td><td class="generic" data-field="cell" data-set="innertext"></td></tr>
								<tr><td><b>Email</b></td><td class="generic" data-field="email" data-set="innertext"></td></tr>
								<tr class="active"><td><b>Gender</b></td><td class="generic" data-field="gender" data-set="innertext"></td></tr>
								<tr class="active"><td><b>Diagnosis</b></td><td class="generic" data-field="diagnosis" data-set="innertext"></td></tr>
								<tr class="active"><td><b>Referring Dr</b></td><td class="generic" data-field="referring_doc" data-set="innertext"></td></tr>
								<tr class="active"><td><b>Dependent code</b></td><td class="generic" data-field="dependent_code" data-set="innertext"></td></tr>
							</table>
							<input type="hidden" value="" class="patient_id_holder generic" data-field="patient_id" data-set="value" />
							<button class="btn btn-default btnEditPatient btn-sm" type="button" >Edit</button>
							<button class="btn btn-default btnDeletepatient btn-sm" type="button" >Delete</button>
						</div>
					</div>	
				</div>
		  	</div>
		    <div role="tabpanel" class="tab-pane fade active" id="Transactions">
		    	<div class="row">
					<h3>Transactions</h3>
					<div id="feedback">
					</div>
			    	<div class="btn-group">
						<button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#createTransaction">Invoivce</button>
						<button class="btn btn-default btn-sm" type="button" >Payment</button>
						<button class="btn btn-default btn-sm" type="button" >Others</button>
					</div>
				</div>
				<table class="table table-hover">
					<thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Username</th></tr></thead>
					<tbody>
						<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
						<tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
						<tr><th scope="row">3</th><td>Larry</td><td>the Bird</td><td>@twitter</td></tr>
					</tbody>
				</table>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="AccountDetails">
			<div class="" id="editAidHolder">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">Edit AidHolder</h4>
							</div>
							<!-- 
								*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
								*the submitting of data to the database. Below is an example of how to use it. The input field names must
								*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
								*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
								*create a new controller and model function to handle the process the way you want.
							-->				
							<form class="form-horizontal" id="frmEditAidHolder" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
								<div class="aid_holdersEditTarget">
									<div class="modal-body aid_holdersEditDesign">
										<div id="feedback"></div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="surname">Surname</label>
											<div class="col-xs-10">
												<input type="text" name="surname" placeholder="Surname" class="form-control generic" data-field="surname" data-set="value" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="title">Title</label>
											<div class="col-xs-10">
												<input type="text" name="title" placeholder="Title" class="form-control generic" data-field="title" data-set="value" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="initials">Initials</label>
											<div class="col-xs-10">
												<input type="text" name="initials" placeholder="Initials" class="form-control generic" data-field="initials" data-set="value" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="drpr">Address</label>
											<div class="col-xs-10">
												<input type="text" name="address1" placeholder="Address 1" class="form-control generic" data-field="address1" data-set="value" />
												<input type="text" name="address2" placeholder="Address 2" class="form-control generic" data-field="address2" data-set="value" />
												<input type="text" name="address3" placeholder="Address 3" class="form-control generic" data-field="address3" data-set="value" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="phone">Phone</label>
											<div class="col-xs-10">
												<input type="text" name="phone" placeholder="Phone" class="form-control generic" data-field="phone" data-set="value" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="cell">Cell</label>
											<div class="col-xs-10">
												<input type="text" name="cell" placeholder="Cell" class="form-control generic" data-field="cell" data-set="value" />
											</div>
										</div>							
										<div class="form-group">
											<label class="col-xs-2 control-label" for="email">Email</label>
											<div class="col-xs-10">
												<input type="text" name="email" placeholder="Email" class="form-control generic" data-field="email" data-set="value" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="cc_email">CC Email</label>
											<div class="col-xs-10">
												<input type="text" name="cc_email" placeholder="CC Email" class="form-control generic" data-field="cc_email" data-set="value" />
											</div>
										</div>						
										<div class="form-group">
											<label class="col-xs-2 control-label" for="tariff_rate">Tariff Rate</label>
											<div class="col-xs-10">
												<select name="tariff_rate" class="form-control" >
													<option class="generic" data-field="tariff_rate" data-set="innertext" ></option>
													<option value="Private" >Private</option>
													<option value="MedAid2010" >MedAid2010</option>
													<option value="IOD" >IOD</option>
													<option value="Discovery" >Discovery</option>
													<option value="Rate 5" >Rate 5</option>
													<option value="Medscheme" >Medscheme</option>
													<option value="Rate 7" >Rate 7</option>
													<option value="Rate 8" >Rate 8</option>
													<option value="Rate 9" >Rate 9</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="drpr">Bill at</label>
											<div class="col-xs-10">
												<input type="text" name="bill_at" placeholder="%" class="form-control generic" data-field="bill_at" data-set="value" />
											</div>
										</div>
										<fieldset class="iodDetails">
				    						<legend>IOD Details</legend>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="iod_claim_number">IOD Claim Number</label>
												<div class="col-xs-10">
													<input type="text" name="iod_claim_number" placeholder="IOD Claim Number" class="form-control generic" data-field="iod_claim_number" data-set="value" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="employer">Employer</label>
												<div class="col-xs-10">
													<input type="text" name="iod_employer" placeholder="Employer" class="form-control generic" data-field="iod_employer" data-set="value" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="iod_emp_reg_num">Emp. Reg.#</label>
												<div class="col-xs-10">
													<input type="text" name="iod_emp_reg_num" placeholder="Emp. Reg.#" class="form-control generic" data-field="iod_emp_reg_num" data-set="value" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="date_of_injury" >Date of injury</label>
												<div class="col-xs-10">
													<input type="date" name="iod_date_of_injury" placeholder="Date of injury" class="form-control generic" data-field="iod_date_of_injury" data-set="value" />
												</div>
											</div>																					    						
				    					</fieldset>

										<div class="form-group">
											<label class="col-xs-2 control-label" for="supress_statement">Suppress Statement</label>
											<div class="col-xs-10">
												<select name="supress_statement" class="form-control" >
													<option selected class="form-control generic" data-field="supress_statement" data-set="innertext"></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>	
											</div>
										</div>											
										<div class="form-group">
											<label class="col-xs-2 control-label" for="account_closed">Account Closed</label>
											<div class="col-xs-10">
												<select name="account_closed" class="form-control">
													<option selected class="form-control generic" data-field="account_closed" data-set="innertext"></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>						
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="allow_email_statements" >Allow E-Mail Statements</label>
											<div class="col-xs-10">
												<select name="allow_email_statements" class="form-control" >
													<option selected class="form-control generic" data-field="allow_email_statements" data-set="innertext"></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>								
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="project_name">Print Patient Liability</label>
											<div class="col-xs-10">
												<select name="print_patient_liability" class="form-control" >
													<option selected class="form-control generic" data-field="print_patient_liability" data-set="innertext"></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>									
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="medical_aid" >Medical Aid</label>
											<div class="col-xs-10">
												<input type="text" name="medical_aid" placeholder="Medical Aid" class="form-control generic" data-field="medical_aid" data-set="value" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="project_name">Medical Aid Number</label>
											<div class="col-xs-10">
												<input type="text" name="medical_aid_number" placeholder="Medical Aid Number" class="form-control generic" data-field="medical_aid_number" data-set="value" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="project_name">Member ID</label>
											<div class="col-xs-10">
												<input type="text" name="member_id" placeholder="Member ID" class="form-control generic" data-field="member_id" data-set="value" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="authorisation_code">Authorisation Code</label>
											<div class="col-xs-10">
												<input type="text" name="authorisation_code" placeholder="Authorisation Code" class="form-control generic" data-field="authorisation_code" data-set="value" />
											</div>
										</div>
										<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
										<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>aid_holder" >
										<input type="hidden" id="table" name="where" value="aid_holder_id = " class="generic" data-field="aid_holder_id" data-set="value">
									</div>
								</div>	
								<div class="modal-footer">
									<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="Notes">
		    	<div class="row">
					<h3>Notes</h3>
					<div id="feedback">
					</div>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createNote" >
						<span class="glyphicon glyphicon-plus"></span> New Note
					</button>
				</div>
				<div class="row notesContainer">
					<!-- .notesContainer is the container the generic class will print in -->
					<div class="noteDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
						<!-- 
							.noteDesign is the design for each row in the database. The generic class will print data 
							in the tags that have class="generic". The attribute data-field tells the system what field
							from the database you want to print in that tag. The attribute data-set tells it what to print
							to. Possible values for dataset=(innertext, value, src, href, ...).
						-->
						<div class="thumbnail">
							<table class="table table-bordered">
								<tr class=""><td class="generic" data-field="name" data-set="innertext">A sample note about the customer</td></tr>
							</table>
							<input type="hidden" value="" class="note_id_holder generic" data-field="note_id" data-set="value" />
							<button class="btn btn-default btnEditNote btn-sm" type="button" >Edit</button>
							<button class="btn btn-default btnDeletenote btn-sm" type="button" >Delete</button>
						</div>
					</div>	
				</div>				
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="Messages">
		    	<div class="row">
					<h3>Messages</h3>
					<div id="feedback">
					</div>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createMessage" >
						<span class="glyphicon glyphicon-plus"></span> New Message
					</button>
				</div>
				<div class="row messagesContainer">
					<!-- .messagesContainer is the container the generic class will print in -->
					<div class="messageDesign col-xs-12 col-sm-4 col-md-4 col-lg-3">
						<!-- 
							.messageDesign is the design for each row in the database. The generic class will print data 
							in the tags that have class="generic". The attribute data-field tells the system what field
							from the database you want to print in that tag. The attribute data-set tells it what to print
							to. Possible values for dataset=(innertext, value, src, href, ...).
						-->
						<div class="thumbnail">
							<table class="table table-bordered">
								<tr class=""><td class="generic" data-field="name" data-set="innertext">A sample message about the customer</td></tr>
							</table>
							<input type="hidden" value="" class="message_id_holder generic" data-field="message_id" data-set="value" />
							<button class="btn btn-default btnEditMessage btn-sm" type="button" >Edit</button>
							<button class="btn btn-default btnDeletemessage btn-sm" type="button" >Delete</button>
						</div>
					</div>	
				</div>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="PaymentAllocation">
		    	<div class="row">
					<h3>Payment Allocations</h3>
					<div id="feedback">
					</div>
			    	<div class="btn-group">
						<button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#createPaymentAllocation">Apply a %</button>
						<button class="btn btn-default btn-sm" type="button" >Change</button>
					</div>
				</div>
				<table class="table table-hover">
					<thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Username</th></tr></thead>
					<tbody>
						<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
						<tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
						<tr><th scope="row">3</th><td>Larry</td><td>the Bird</td><td>@twitter</td></tr>
					</tbody>
				</table>
		    </div>
		  </div>
		</div>
	</div>
</div>






















<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">
	<!-- Patient Modal Rows-->
	<div class="modal fade" id="createpatient">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New patient</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddpatient" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Name</label>
							<div class="col-xs-10">
								<input type="text" id="title" name="name" placeholder="Name" class="form-control" />
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
								<input type="text" id="date_of_birth" name="date_of_birth" placeholder="date_of_birth" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="gender">Gender</label>
							<div class="col-xs-10">
								<input type="text" id="gender" name="gender" placeholder="gender" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="cell">Cell</label>
							<div class="col-xs-10">
								<input type="text" id="cell" name="cell" placeholder="cell" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">Email</label>
							<div class="col-xs-10">
								<input type="text" id="email" name="email" placeholder="email" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="diagnosis">Diagnoies</label>
							<div class="col-xs-10">
								<input type="text" id="diagnosis" name="diagnosis" placeholder="diagnosis" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="drpr">Dependednt code</label>
							<div class="col-xs-10">
								<input type="text" id="dependent_code" name="dependent_code" placeholder="dependent_code" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Referring Dr</label>
							<div class="col-xs-10">
								<input type="text" id="referring_doc" name="referring_doc" placeholder="Dr love" class="form-control" />
							</div>
						</div>															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>patient" >
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
							<label class="col-xs-2 control-label" for="phone">Cell</label>
							<div class="col-xs-10">
								<input type="text" id="cell" name="cell" placeholder="cell" class="form-control generic" data-field="cell" data-set="value"/>
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
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Referring Dr</label>
							<div class="col-xs-10">
								<input type="text" id="referring_doc" name="referring_doc" placeholder="Referring Dr" class="form-control generic" data-field="referring_doc" data-set="value"/>
							</div>
						</div>															
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>patient">
							<input type="hidden" id="table" name="where" value="patient_id = " class="generic" data-field="patient_id" data-set="value">
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
<div class="modal-rows">
	<!-- Transactions Modal Rows-->
	<div class="modal fade" id="createTransaction">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Transaction</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddtransaction" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Date</label>
							<div class="col-xs-10">
								<input type="text" name="date" placeholder="Date" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">Code</label>
							<div class="col-xs-10">
								<input type="text" name="code" placeholder="Code" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Modifiers</label>
							<div class="col-xs-10">
								<input type="text" name="modifiers" placeholder="Modifiers" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="gender">Description</label>
							<div class="col-xs-10">
								<textarea name="description" placeholder="Description..." class="form-control" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="cell">Value</label>
							<div class="col-xs-10">
								<input type="text" name="value" placeholder="Value" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">ID</label>
							<div class="col-xs-10">
								<input type="text" name="ID" placeholder="ID" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="age">Age</label>
							<div class="col-xs-10">
								<input type="number" name="age" placeholder="Age" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="diagnosis">Diagnosis</label>
							<div class="col-xs-10">
								<input type="text" name="diagnosis" placeholder="Diagnosis" class="form-control" />
							</div>
						</div>
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>invoice" >
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

	<div class="modal fade" id="editTransaction">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Transaction</h4>
				</div>
				<!-- 
					*If you have select a edit task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are updating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your update requires multiple update in multiple tables, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->	<!--doctorsEditTarget-->
				<form class="form-horizontal" id="frmEdittransaction" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="transactionsEditTarget">
						<div class="modal-body transactionsEditDesign">
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
							<label class="col-xs-2 control-label" for="phone">Cell</label>
							<div class="col-xs-10">
								<input type="text" id="cell" name="cell" placeholder="cell" class="form-control generic" data-field="cell" data-set="value"/>
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
						<div class="form-group">
							<label class="col-xs-2 control-label" for="project_name">Referring Dr</label>
							<div class="col-xs-10">
								<input type="text" id="referring_doc" name="referring_doc" placeholder="Referring Dr" class="form-control generic" data-field="referring_doc" data-set="value"/>
							</div>
						</div>															
							<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
							<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>transaction">
							<input type="hidden" id="table" name="where" value="transaction_id = " class="generic" data-field="transaction_id" data-set="value">
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

<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>
<script>
$('#Transactions').css("opacity", 1);
//$('#myTab a[href="#Transactions"]').tab('show'); // Select tab by name

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

/**
 * This section creates the tariff_codes view
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
		"table": '<?php echo PREFIX; ?>patient',
		"fields": '*',
		//"where": 'user_id = '+<?php echo Session::get("user_id"); ?>,
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
				"table": '<?php echo PREFIX; ?>patient',
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
			"table": '<?php echo PREFIX; ?>patient',
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
</script>
