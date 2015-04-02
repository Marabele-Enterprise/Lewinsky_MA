<div class="container">
	<div class="row">
		<h1>ICD 10 Version <?php echo $this->xml->version; ?></h1>
		<?php echo "<h3>" . $this->xml->introduction->introSection[0]->title . "</h3>"; ?>
		<div id="feedback"></div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div style="text-align: left;" class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
			<br />
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<?php echo $this->xml->introduction->introSection[1]->title; ?>
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<?php 
								echo "<h4>" . $this->xml->introduction->introSection[2]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[2]->instruction->note . "</h5>";
								echo "<h4>" . $this->xml->introduction->introSection[3]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[3]->instruction->note . "</h5>";
								echo "<h4>" . $this->xml->introduction->introSection[4]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[4]->instruction->note . "</h5>";
								echo "<h4>" . $this->xml->introduction->introSection[5]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[5]->instruction->note . "</h5>";
								echo "<br />";
								echo "<h4>" . $this->xml->introduction->introSection[6]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[6]->instruction->note[0] . "</h5>";
								echo "<h5>" . $this->xml->introduction->introSection[6]->instruction->note[1] . "</h5>";
								
								echo "<h4>" . $this->xml->introduction->introSection[7]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[7]->instruction->note . "</h5>";
								echo "<h4>" . $this->xml->introduction->introSection[8]->title . "</h4>";
								echo "<h5>" . $this->xml->introduction->introSection[8]->instruction->note . "</h5>";
							?>
						</div>
					</div>
				</div>
				
				<?php
					$key = 0;
					foreach ($this->xml->chapter as $chapter) {
				?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading<?php echo $key; ?>">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
										<?php echo $chapter->name . ' ' . $chapter->desc; ?>
									</a>
								</h4>
							</div>
							<div id="collapse<?php echo $key; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $key; ?>">
								<div class="panel-body">
									<?php 
										echo "<ul>";
										foreach ($chapter->section as $section) {
											//echo "<li>" . $section["id"] . ' ' . $section . "</li>";
											echo "<li>" . $section->desc . "</li>";
											
											echo "<li><ul>";
											foreach ($section->diag as $diag) {
												echo "<li>" . $diag->name . ' ' . $diag->desc . "</li>";
											}
											echo "</ul></li>";
										}
										echo "</ul>";
									?>
								</div>
							</div>
						</div>
				<?php
					$key++;
					}
				?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("li#icd_10").addClass("active");
</script>
