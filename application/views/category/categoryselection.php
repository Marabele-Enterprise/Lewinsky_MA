<?php
	if($this->source == 'newstock'){
		$var = 'dashboard/stock/'.$this->source."/";
	}
	else if($this->source == 'currentstock'){
			$var = 'dashboard/stock/'.$this->source."/";
	}
	
	else if($this->source == 'report'){
			$var = 'dashboard/report/'.$this->source."/";
	}
?>

	<div id="content">
		<div class='container'>
			<div class='row centered' style='margin-top: 30px;'><br/>
				<div class='col-lg-4'>
					<table id='tablesorter' class='table'>
						<th><h2><center>Select Product Category<center></h2></th>
						<tbody>
						<?php			
							foreach($this->categories as $row){
								echo"<tr><td><a class='btnUpdate btn btn-small btn-secondary custom' href='".URL.$var.$row->category_id."'><span>".$row->category."</span></a></td></tr>";
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- /#content -->
</div> <!-- /#wrapper -->
<style>
	.custom{
		width: 175px !important;
	}
	
	#content{
		left : 50%;
	}
</style>
