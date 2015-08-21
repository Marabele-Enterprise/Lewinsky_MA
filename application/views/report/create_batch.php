<div class="container" >       
	<div class="row">
		<h2>Batch Creator</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default btnCreateBatch" >
			<span class="glyphicon glyphicon-plus"></span> Create Batch
		</button>
	</div>
</div>
<!-- 
	The generic class can print data from the database onto a element design of your choice.
	An element will be printed for each row from your select statement which needs to be 
	written in script tags. See the function refreshpatientsView() bellow to see how to 
	generate the view.
 -->
<div class="container-fluid" >       
	<div class="row created_batch">
		<?php 
        foreach ($this->practices as $key => $practice) {
        	if(isset($practice->patients)){
	            foreach ($practice->patients as $index => $patient) {
	             	//print patient details and practice details.
	            	?>
	            	<hr><br>
	            	<div class="row" >
						<!-- .patientsContainer is the container the generic class will print in -->
						<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-3">
							<!-- 
								.patientDesign is the design for each row in the database. The generic class will print data 
								in the tags that have class="generic". The attribute data-field tells the system what field
								from the database you want to print in that tag. The attribute data-set tells it what to print
								to. Possible values for dataset=(innertext, value, src, href, ...).
							-->
							<div class="thumbnail">
								<h4>Practice <?php echo $practice->practice_id; ?></h4>
								<table class="table table-bordered">
									<tr class="active">
										<td><b>Name Of Practice</b></td>
										<td>
											<?php echo $practice->practice_name; ?>
										</td>
									</tr>
									<tr>
										<td><b>Practice Number</b></td>
										<td>
											<?php echo $practice->practice_number; ?>
										</td>
									</tr>
									<tr class="active">
										<td><b>Name Of Member</b></td>
										<td>
											<?php echo $patient->name." ".$patient->surname; ?>
										</td>
									</tr>
									<tr>
										<td><b>Name Of Patient</b></td>
										<td>
											<?php echo $patient->name." ".$patient->surname; ?>
										</td>
									</tr>		
									<tr class="active">
										<td><b>Name Of Medical Aid</b></td>
										<td>
											<?php echo $patient->medical_aid_name; ?>
										</td>
									</tr>
									<tr>
										<td><b>Membership Number</b></td>
										<td>
											<?php echo $patient->member_id; ?>
										</td>
									</tr>														
								</table>
								<input type="hidden" value="" class="is_aid_holder generic" data-field="is_aid_holder" data-set="value" />
								<input type="hidden" value="" class="patient_id_holder generic" data-field="patient_id" data-set="value" />
							</div>
						</div>       
						<?php if(isset($patient->transactions)){?>             	
						<table class="table table-hover">
							<thead><tr><th>#</th><th>Date</th><th>Tariff Code</th><th>Tariff Cost</th><th>Modifier</th></thead>
							<tbody>
			            	<?php
			             	//print transactions table
			             	foreach ($patient->transactions as $i => $transaction) {
			            	?>
				            	<tr>
									<th scope="row" ><?php echo $transaction->transaction_id; ?> </th>
									<td><?php echo $transaction->date; ?></td>
									<td><?php echo $transaction->code; ?></td>
									<td><?php echo $transaction->amount; ?></td>
									<td><?php echo $transaction->mod1; ?></td>
								</tr>
							<?php
							} ?>             	
							</tbody>
						</table>            	
		            	<?php  
		            	}else {
		            		echo "<h3>No transactions for above patient. Will not be included in bactch</h3>";
		            	}             	
		        echo "</div>";    	
		        } 
		    }      
        }

		?>	
	</div>
	<div class="row practices_array">
		<br/><br/>
		<pre >
			<?php print_r($this->practices); ?>
		</pre>
	</div>
</div>

<style type="text/css">
.created_batch{
	display: none;
}

</style>

<script type="text/javascript">
	$(".btnCreateBatch").on("click", function(){
		$(".created_batch").slideDown(1666);
	});
</script>