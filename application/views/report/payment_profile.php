<div class="container-fluid" >       
	<div class="row">
		<h2>Payment Profile</h2>
		<div id="feedback">
		</div>
		<table class="table table-hover">
			<thead>
				<tr><th>Acc #</th><th>ID</th><th>Date</th><th>Full Name</th><th>Amount</th><th>Description</th><th>DRCR</th><th>Age</th><th>Cust ID</th><th>Ref</th><th>PDBY</th></tr>
			</thead>
			<tbody>
				<tr><th scope="row">1</th><td>230</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td></tr>
				<tr><th scope="row">2</th><td>230</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td></tr>
				<tr><th scope="row">3</th><td>230</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td><td>200</td><td>230</td></tr>
			</tbody>
		</table>
	</div>
	<div class="row" style="text-align: center;">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Total Debits</b></td><td class="generic" data-field="surname" data-set="innertext"></td></tr>
					<tr><td><b>Total Credits</b></td><td class="generic" data-field="title" data-set="innertext"></td></tr>
				</table>			
			</div>
		</div>	
	</div>	
</div>
<style type="text/css">
.dateFilters{
	display: inline-flex;
}

.fromDate, .toDate{
	width: 154px;
}

table.table.table-hover {
  text-align: left;
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
</script>
