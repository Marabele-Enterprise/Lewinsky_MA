<div class="container" >       
	<div class="row">
		<br/>
		<h2><?php //echo $this->aid_holder_id; ?>Patient: <?php echo $this->aid_holder_details[0]->initials." ".$this->aid_holder_details[0]->surname; ?></h2>
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

.row{
	margin-bottom: 10px;
}

</style>
	<div class="row" >	
		<div role="tabpanel" class=".col-xs-12 .col-sm-6 .col-md-8">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		  	<li role="presentation" ><a href="#Patients" aria-controls="Patients" role="tab" data-toggle="tab">Patient IOD</a></li>
		    <li role="presentation" class="active"><a href="#Transactions" aria-controls="Transactions" role="tab" data-toggle="tab">Transactions</a></li>
		    <li role="presentation"><a href="#AccountDetails" aria-controls="AccountDetails" role="tab" data-toggle="tab">Account Details</a></li>
		    <li role="presentation"><a href="#Notes" aria-controls="Notes" role="tab" data-toggle="tab">Notes</a></li>
		    <li role="presentation"><a href="#Messages" aria-controls="Messages" role="tab" data-toggle="tab">Messages</a></li>
		    <li role="presentation"><a href="#PaymentAllocation" aria-controls="PaymentAllocation" role="tab" data-toggle="tab">Payment Allocation</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content .col-xs-12 .col-sm-6 .col-md-8">
		  	<div role="tabpanel" class="tab-pane fade" id="PatientIod">
	  			<div class="row">
					<h3>Patient IOD</h3>
					<div id="feedback">
					</div>
						<fieldset class="iodDetails">
    						<legend>IOD Details</legend>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="iod_claim_number">IOD Claim Number</label>
								<div class="col-xs-10">
									<input type="text" name="iod_claim_number" placeholder="IOD Claim Number" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="employer">Employer</label>
								<div class="col-xs-10">
									<input type="text" name="iod_employer" placeholder="Employer" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="iod_emp_reg_num">Emp. Reg.#</label>
								<div class="col-xs-10">
									<input type="text" name="iod_emp_reg_num" placeholder="Emp. Reg.#" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="date_of_injury" >Date of injury</label>
								<div class="col-xs-10">
									<input type="date" name="iod_date_of_injury" placeholder="Date of injury" class="form-control" />
								</div>
							</div>																					    						
    					</fieldset>					
				</div>
		  	</div>
		    <div role="tabpanel" class="tab-pane fade active" id="Transactions">
		    	<div class="row">
					<h3>Transactions</h3>
					<div id="feedback">
					</div>
			    	<div class="btn-group">
						<button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#createTransaction">Invoivce</button>
						<button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#createPayment" >Payment</button>
						<button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#createStatement" >Statement</button>
						<button class="btn btn-default btn-sm" type="button" >Others</button>
					</div>
				</div>
				<table class="table table-hover">
					<thead><tr><th>#</th><th>Code</th><th>Date</th><th>Amount</th><th>Vat</th><th>Cost Incl Vat</th><th>Mod1</th><th>Patient</th><th>Diagnosis</th><th>Description</th><th></th></tr></thead>
					<tbody class="transactionsContainer">
						<tr class="transactionDesign">
							<th scope="row" class="generic row_id" data-field="transaction_id" data-set="innertext"></th>
							<td class="generic" data-field="code" data-set="innertext" ></td>
							<td class="generic" data-field="date" data-set="innertext" ></td>
							<td class="generic" data-field="amount" data-set="innertext" ></td>
							<td class="generic" data-field="vat" data-set="innertext" ></td>
							<td class="generic" data-field="cost_incl_vat" data-set="innertext" ></td>
							<td class="generic" data-field="mod1" data-set="innertext" ></td>
							<td class="generic" data-field="surname" data-set="innertext" ><span class="generic" data-field="name" data-set="innertext"></span></td>
							<td class="generic" data-field="diagnosis" data-set="innertext" ></td>
							<td class="generic" data-field="description" data-set="innertext" ></td>
							<td ><button class="btn btn-default btn-xs btnTransactionViewAll">View All</button></td>
						</tr>
					</tbody>
				</table>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="AccountDetails">
		    <?php //print_r($this->aid_holder_details); ?>
			<div class="" id="editAidHolder">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">Edit Medical Aid Holder</h4>
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
												<input type="text" name="surname" placeholder="Surname" class="form-control" value="<?php echo $this->aid_holder_details[0]->surname; ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="title">Title</label>
											<div class="col-xs-10">
												<input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $this->aid_holder_details[0]->title; ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="initials">Initials</label>
											<div class="col-xs-10">
												<input type="text" name="initials" placeholder="Initials" class="form-control" value="<?php echo $this->aid_holder_details[0]->initials; ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="drpr">Address</label>
											<div class="col-xs-10">
												<input type="text" name="address1" placeholder="Address 1" class="form-control" value="<?php echo $this->aid_holder_details[0]->address1; ?>" />
												<input type="text" name="address2" placeholder="Address 2" class="form-control" value="<?php echo $this->aid_holder_details[0]->address2; ?>" />
												<input type="text" name="address3" placeholder="Address 3" class="form-control" value="<?php echo $this->aid_holder_details[0]->address3; ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="phone">Phone</label>
											<div class="col-xs-10">
												<input type="text" name="phone" placeholder="Phone" class="form-control" value="<?php echo $this->aid_holder_details[0]->phone; ?>" />
											</div>
										</div>							
										<div class="form-group">
											<label class="col-xs-2 control-label" for="email">Email</label>
											<div class="col-xs-10">
												<input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $this->aid_holder_details[0]->email; ?>" />
											</div>
										</div>	
										<fieldset class="iodDetails">
				    						<legend>IOD Details</legend>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="iod_claim_number">IOD Claim Number</label>
												<div class="col-xs-10">
													<input type="text" name="iod_claim_number" placeholder="IOD Claim Number" class="form-control" value="<?php echo $this->aid_holder_details[0]->iod_claim_number; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="employer">Employer</label>
												<div class="col-xs-10">
													<input type="text" name="iod_employer" placeholder="Employer" class="form-control" value="<?php echo $this->aid_holder_details[0]->iod_employer; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="iod_emp_reg_num">Emp. Reg.#</label>
												<div class="col-xs-10">
													<input type="text" name="iod_emp_reg_num" placeholder="Emp. Reg.#" class="form-control" value="<?php echo $this->aid_holder_details[0]->iod_emp_reg_num; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-2 control-label" for="date_of_injury" >Date of injury</label>
												<div class="col-xs-10">
													<input type="date" name="iod_date_of_injury" placeholder="Date of injury" class="form-control" value="<?php echo $this->aid_holder_details[0]->iod_date_of_injury; ?>" />
												</div>
											</div>																					    						
				    					</fieldset>

										<div class="form-group">
											<label class="col-xs-2 control-label" for="supress_statement">Suppress Statement</label>
											<div class="col-xs-10">
												<select name="supress_statement" class="form-control" >
													<option selected ><?php echo $this->aid_holder_details[0]->supress_statement; ?></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>	
											</div>
										</div>											
										<div class="form-group">
											<label class="col-xs-2 control-label" for="account_closed">Account Closed</label>
											<div class="col-xs-10">
												<select name="account_closed" class="form-control">
													<option selected ><?php echo $this->aid_holder_details[0]->account_closed; ?></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>						
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="allow_email_statements" >Allow E-Mail Statements</label>
											<div class="col-xs-10">
												<select name="allow_email_statements" class="form-control" >
													<option selected ><?php echo $this->aid_holder_details[0]->allow_email_statements; ?></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>								
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="project_name">Print Patient Liability</label>
											<div class="col-xs-10">
												<select name="print_patient_liability" class="form-control" >
													<option selected ><?php echo $this->aid_holder_details[0]->print_patient_liability; ?></option>
													<option value="True" >True</option>
													<option value="False" >False</option>
												</select>									
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-2 control-label" for="medical_aid" >Medical Aid</label>
											<div class="col-xs-10">
												<input type="text" name="medical_aid" placeholder="Medical Aid" class="form-control" value="<?php echo $this->aid_holder_details[0]->medical_aid; ?>" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="project_name">Medical Aid Number</label>
											<div class="col-xs-10">
												<input type="text" name="medical_aid_number" placeholder="Medical Aid Number" class="form-control" value="<?php echo $this->aid_holder_details[0]->medical_aid_number; ?>" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="project_name">Member ID</label>
											<div class="col-xs-10">
												<input type="text" name="member_id" placeholder="Member ID" class="form-control" value="<?php echo $this->aid_holder_details[0]->member_id; ?>" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-2 control-label" for="authorisation_code">Authorisation Code</label>
											<div class="col-xs-10">
												<input type="text" name="authorisation_code" placeholder="Authorisation Code" class="form-control" value="<?php echo $this->aid_holder_details[0]->authorisation_code; ?>" />
											</div>
										</div>
										<!-- The genericCreate controller requires you to specify the table you are inserting to and the where clause-->
										<input type="hidden" name="table" value="<?php echo PREFIX; ?>aid_holder" >
										<input type="hidden" name="where" value="aid_holder_id = <?php echo $this->aid_holder_details[0]->aid_holder_id; ?>">
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
								<tr class=""><td class="generic" data-field="note" data-set="innertext"></td></tr>
							</table>
							<input type="hidden" value="" class="note_id_holder generic" data-field="note_id" data-set="value" />
							<button class="btn btn-default btnEditNote btn-sm" type="button" >Edit</button>
							<button class="btn btn-default btnDeleteNote btn-sm" type="button" >Delete</button>
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
								<tr class=""><td class="generic" data-field="message" data-set="innertext"></td></tr>
							</table>
							<input type="hidden" value="" class="message_id_holder generic" data-field="aid_holder_message_id" data-set="value" />
							<button class="btn btn-default btnEditMessage btn-sm" type="button" >Edit</button>
							<button class="btn btn-default btnDeleteMessage btn-sm" type="button" >Delete</button>
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
					<thead><tr><th>#</th><th>ID</th><th>Date</th><th>Code</th><th>Amount</th><th>Match</th><th>Med Due</th><th>Pat Due</th><th>PD Amount</th><th>PD By</th><th>PD Type</th><th>PD Date</th></tr></thead>
					<tbody>
						<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td><td>Mark</td><td>Otto</td><td>@mdo</td><td>Mark</td><td>Otto</td><td>@mdo</td><td>Mark</td><td>Otto</td></tr>
					</tbody>
				</table>
		    </div>
		  </div>
		</div>
	</div>
</div>



<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">

</div><!-- /.modal rows-->
<div class="modal-rows">

	<!-- Notes Modal Rows-->
	<div class="modal fade" id="createNote">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Note</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddNote" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">Note</label>
							<div class="col-xs-10">
								<input type="text" name="note" placeholder="Note" class="form-control" />
							</div>
						</div>
						<input type="hidden" name="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" >
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>note" >
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

	<!-- Notes Modal Rows-->
	<div class="modal fade" id="editNote">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Note</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditNote" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="editNoteTarget">
						<div class="modal-body noteEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="identification">Note</label>
								<div class="col-xs-10">
									<input type="text" name="note" placeholder="Note" class="form-control generic" data-field="note" data-set="value" />
								</div>
							</div>
							<input type="hidden" name="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" >
							<!-- The genericCreate controller requires you to specify the table you are inserting to -->
							<input type="hidden" name="table" value="<?php echo PREFIX; ?>note" >
							<input type="hidden" name="where" value="note_id = " class="generic" data-field="note_id" data-set="value" />
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

	<!-- Messages Modal Rows-->
	<div class="modal fade" id="createMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Message</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddMessage" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">Message</label>
							<div class="col-xs-10">
								<input type="text" name="message" placeholder="Message" class="form-control" />
							</div>
						</div>
						<input type="hidden" name="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" >
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>aid_holder_message" >
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

	<!-- Notes Modal Rows-->
	<div class="modal fade" id="editMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Edit Message</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditMessage" role="form" action="<?php echo URL; ?>generic/genericUpdate" method="post" enctype="multipart/form-data"  >
					<div class="editMessageTarget">
						<div class="modal-body messageEditDesign">
							<div id="feedback"></div>
							<div class="form-group">
								<label class="col-xs-2 control-label" for="identification">Message</label>
								<div class="col-xs-10">
									<input type="text" name="message" placeholder="Message" class="form-control generic" data-field="message" data-set="value" />
								</div>
							</div>
							<input type="hidden" name="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" />
							<!-- The genericCreate controller requires you to specify the table you are inserting to -->
							<input type="hidden" name="table" value="<?php echo PREFIX; ?>aid_holder_message" />
							<input type="hidden" name="where" value="aid_holder_message_id = " class="generic" data-field="aid_holder_message_id" data-set="value" />
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

	<!-- Payment Modal Rows-->
	<div class="modal fade" id="createPayment">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Payment</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddPayment" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Payment By</label>
							<div class="col-xs-10" >
								<select name="payment_by" class="form-control" >
									<option></option>
									<option value="Patient" >Patient</option>
									<option value="Medical Aid" >Medical Aid</option>
								</select>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Date</label>
							<div class="col-xs-10">
								<input type="date" name="date" placeholder="Date" class="form-control current-date" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">Payment Type</label>
							<div class="col-xs-10">
								<select name="payment_type" class="form-control" >
									<option></option>
									<option value="Cash" >Cash</option>
									<option value="Medical Aid" >Medical Aid</option>
								</select>								
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
								<input type="text" name="amount" placeholder="0.00" class="form-control" />
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
								<select class="selectpicker form-control diagnosis_select" data-live-search="true" name="diagnosis[]" >
								</select>
							</div>
						</div>
						<input type="hidden" name="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" >
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>transaction" >
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
				<form class="form-horizontal" id="frmAddTransaction" role="form" action="<?php echo URL; ?>generic/genericCreate" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Patient</label>
							<div class="col-xs-10" >
								<select name="patient_id" class="form-control patient_selector" >
									<option></option>
									<?php foreach ($this->patient_details as $key => $patient) {?>
									<option value="<?php echo $patient->patient_id;?>" data-id="<?php echo $patient->id_number;?>" class="patient_<?php echo $patient->patient_id;?>" ><?php echo $patient->name;?> <?php echo $patient->surname;?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="phone">ID</label>
							<div class="col-xs-10">
								<input type="text" name="ID" placeholder="ID" class="form-control patient_id_target" />
							</div>
						</div>												
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Date|Time</label>
							<div class="col-xs-10">
							  <div id="datetimepicker2" class="input-append">
							    <div class="input-group">
							    	<span class="input-group-btn">
							    		<button class="add-on btn btn-default" type="button">
							    			<span class="glyphicon glyphicon-calendar"></span>
							    		</button>
							    	</span>
							    	<input class="form-control" data-format="MM/dd/yyyy HH:mm:ss PP" type="text" required ></input>
							    </div>
							  </div>		
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="diagnosis">Diagnosis</label>
							<div class="col-xs-10">
								<select name="diagnosis[]" class="selectpicker form-control diagnosis_select" data-live-search="true" multiple id="diagnosis_select" data-showContent="false" >
								</select>
								<table class="table table-hover table-bordered">
									<thead><tr><th>#</th><th>Code</th><th>Description</th></thead>
									<tbody class="diagContainer">
									</tbody>
								</table>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="identification">Code</label>
							<div class="col-xs-10">
								<select class="form-control slct_tarrif_code" name="code" data-live-search="true" >
								</select>								
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="cell">Amount</label>
							<div class="col-xs-10">
								<input type="text" class="form-control amount_target" name="amount" placeholder="0.00" class="form-control" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="cell">Vat</label>
							<div class="col-xs-10">
								<input type="text" class="form-control vat_target" name="vat" placeholder="0.00" class="form-control" required disabled />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="cell">Cost Incl Vat</label>
							<div class="col-xs-10">
								<input type="text" class="form-control cost_incl_vat_target" name="cost_incl_vat" placeholder="0.00" class="form-control" required disabled/>
							</div>
						</div>																		
						<div class="form-group">
							<label class="col-xs-2 control-label" for="gender">Description</label>
							<div class="col-xs-10">
								<textarea name="description" placeholder="Description..." class="form-control desc_target" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="dob">Modifiers</label>
							<div class="col-xs-3" >
								<select name="mod1" class="form-control" >
									<option></option>
									<option value="x2" >x2</option>
									<option value="x2" >x3</option>
									<option value="x2" >x4</option>
									<option value="None" >[None]</option>
								</select>
							</div>
							<div class="col-xs-3" >
								<select name="mod2" class="form-control" >
									<option></option>
									<option value="x2" >x2</option>
									<option value="x2" >x3</option>
									<option value="x2" >x4</option>
									<option value="None" >[None]</option>
								</select>
							</div>
							<div class="col-xs-3" >
								<select name="mod3" class="form-control" >
									<option></option>
									<option value="x2" >x2</option>
									<option value="x2" >x3</option>
									<option value="x2" >x4</option>
									<option value="None" >[None]</option>
								</select>
							</div>														
						</div>						
						<div class="form-group">
							<label class="col-xs-2 control-label" for="age">Age</label>
							<div class="col-xs-10">
								<input type="number" name="age" placeholder="Age" class="form-control" min="1" max="5" value="1" />
							</div>
						</div>
						<input type="hidden" name="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" >
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>transaction" >
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
							<input type="hidden" name="table" value="<?php echo PREFIX; ?>transaction">
							<input type="hidden" name="where" value="transaction_id = " class="generic" data-field="transaction_id" data-set="value">
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

<!-- This section is for bootstrap modal popups, check out bootstrap modal works -->
<div class="modal-rows">
	<!-- Patient Modal Rows-->
	<div class="modal fade" id="createStatement">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Statement</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddSatement" role="form" action="" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Message</label>
							<div class="col-xs-10">
								<input type="text" id="tbx_message" name="message" placeholder="Message" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="Name">Patient</label>
							<div class="col-xs-10">
								<select class="form-control" name="patient"  id="tbx_patient" >
									<?php foreach ($this->patient_details as $key => $patient) {?>
										<option value="<?php echo $patient->patient_id;?>" ><?php echo $patient->name;?> <?php echo $patient->surname;?></option>
									<?php }?>									
								</select>
							</div>
						</div>							
						<div class="form-group email_container" >
							<label class="col-xs-2 control-label" for="Name">Email</label>
							<div class="col-xs-10">
								<input type="text" id="tbx_email" name="email" placeholder="Message" class="form-control" value="<?php echo $this->aid_holder_details[0]->email; ?>" />
							</div>
						</div>											
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" name="table" value="<?php echo PREFIX; ?>patient" >
					</div>
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
						<div class="email_btns" >
							<button type="button" class="btn btn-default btnSendEmail" >Send</button>
							<button type="button" class="btn btn-primary btnCancelEmail">Cancel</button>
						</div><br>						
						<input type="hidden" id="aid_holder_id" name="aid_holder_id" value="<?php echo $this->aid_holder_details[0]->aid_holder_id; ?>" >	
						<!--button type="button" class="btn btn-default btn-sm btn_download_statement">Download</button --> 					
						<a href="<?php echo URL; ?>index/pdf_test/<?php echo $this->aid_holder_details[0]->aid_holder_id; ?>/" class="btn btn-default btn-sm tbx_message_target" download >Download</a> 
						<!--form id="download_statement_form" action="<?php echo URL; ?>/index/pdf_test" method="post" class="postLink" > 					    
							<input type="hidden" name="message" value="" class="tbx_message_target" >
							<input type="hidden" id="aid_holder_id" name="aid_holder_id" value="<?php echo $this->aid_holder_details[0]->aid_holder_id; ?>" >
							
						</form -->
						<button type="button" class="btn btn-primary btnEmail">Email</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</div><!-- /.modal rows-->
<input type="hidden" id="aid_holder_id" value="<?php echo $this->aid_holder_id; ?>" >
<input type="hidden" id="vat_percentage" value="14" >
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/bootstrap-select/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

<script type="text/javascript" src="<?php echo URL; ?>public/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/use_aid_holder.js"></script>
<script>

$(function() {
    $('#datetimepicker2').datetimepicker({
		language: 'en',
		pick12HourFormat: true
    });
});

$(".btnEmail").on("click", function (){
	$(".email_container").slideDown("slow");
	$(".email_btns").slideDown("slow");
});

$(".btnCancelEmail").on("click", function (){
	$(".email_container").slideUp("slow");
	$(".email_btns").slideUp("slow");
});

$('.email_container, .email_btns').slideUp(10);

$('#tbx_message').on("change", function(){
	$('.tbx_message_target').attr("href", $("#URLholder").val()+"index/get_pdf_statement/"+$("#aid_holder_id").val()+"/"+$("#tbx_patient").val()+"/"+$(this).val());
});

$('#tbx_patient').on("change", function(){
	$('.tbx_message_target').attr("href", $("#URLholder").val()+"index/get_pdf_statement/"+$("#aid_holder_id").val()+"/"+$(this).val()+"/"+$("#tbx_message").val());
});

$('.btn_download_statement').click(function(e){
	console.log("download statement");
    e.preventDefault();
    form = $('#download_statement_form');
    form.submit();
});
</script>
