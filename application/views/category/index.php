<?php

require_once("application/controllers/category.php");

function displayCategories($uploaded_by, $category_model){
	global $database;
	
        $categories = $category_model->getCategoriesBy($uploaded_by);
	//print_r($categories);
	//$result = $database->query($q);
	/* Error occurred, return given name by default */
	/*$num_rows = mysqli_num_rows($result);
	if(!$result || ($num_rows < 0)){
		echo "Error displaying info";
		return;
	}
	if($num_rows == 0){
		echo "Database table empty";
		return;
	}*/
	if(count($categories) == 0){
		//echo '<h3 class="col-sm-9 col-md-6 col-lg-4">Categories uploaded by you</h3>';
		return;
	}
	echo '<h3 class="col-sm-9 col-md-6 col-lg-4">Categories uploaded by you</h3>';

	/* Display table contents */
	//echo "<table class='table table-bordered table-striped table-highlight'>";
	echo "<table id='tablesorter' class='metadataTable table table-bordered table-striped table-highlight'>
			<thead>
				<tr>
					<th class='sort' data-sort='asc' data-id='-1' data-type='int' style='white-space: nowrap; cursor: move;'>ID# <i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='5' data-type='str' style='white-space: nowrap; cursor: move;'>Category <i class='icon-sort'></i></th>
					".(Session::get('user_account_type') == 2 || $uploaded_by == 1 ? "<th /><th />" : "<th />")."
				</tr>
			</thead>";
	echo "<tbody>";
	foreach($categories as $row){
		$category_id = $row->category_id;
		$category  = $row->category;

		echo "<tr>
				<td><span class='' >$category_id</span></td>
				<td><span class='fieldText' data-colname='category' >$category</span><input type='text' value='$category' class='fieldEdit' data-colname='category' style='display: none' /></td>
				<!--<td><a class='btnUpdate btn btn-small btn-secondary' data-id='$category_id' data-updateType='delete' href=''><span>delete</span></a></td>-->
				<!--<td><a class='edit btn btn-small btn-secondary' href=''><span>edit</span></a><a class='save btnUpdate btn btn-small btn-secondary' href='' data-id='$category_id' data-updateType='edit' style='display: none' ><span>save</span></a></td>-->
				<!--<td><a class='btnUpdate btn btn-small btn-secondary' data-id='$category_id' data-updateType='delete' href=''><span class='glyphicon glyphicon-trash'></span></a></td>-->
				".(Session::get('user_account_type') == 2 || $uploaded_by == 1 ? "<td><a class='edit btn btn-small btn-secondary' href='' title='edit' ><span class='glyphicon glyphicon-edit'></span></a><a class='save btnUpdate btn btn-small btn-secondary' href='' data-id='$category_id' data-updateType='edit' style='display: none' ><span>save</span></a></td>
				<td><a class='btnUpdate btn btn-small btn-secondary' data-id='$category_id' data-updateType='delete' title='delete' href=''><span class='glyphicon glyphicon-trash'></span></a></td>" 
				: "<td><a class='btnUpdate btn btn-small btn-secondary' data-id='$category_id' data-updateType='disable' title='remove' href=''><span class='glyphicon glyphicon-trash'></span></a></td>")."				
			</tr>
			";
	}
	echo "</tbody></table>";

}

?>

	<div id="content">
		<div class="container">
			 <div class="row">
				  <div class="col-lg-12">
					<h1>Category Manager</h1>
					<h3 class="col-sm-9 col-md-6 col-lg-4">Add Category</h3>
					<form action="<?php echo URL; ?>category/create" class="form-horizontal col-sm-9 col-md-6 col-lg-4" role="form" method="post" enctype="multipart/form-data" id="addCategoryFrm" style="margin-bottom: 20px; padding: 20px;" submit="location.reload()"> 
						<div id="formContents" >
							<div class="form-group"> 
								<label for="category" class="col-sm-2 control-label">Category</label> 
								<div class="col-sm-10"> 
									<input type="text" class="form-control" id="category" name="category" placeholder="Category" style='max-width: 99%'/> 
								</div> 
							</div> 
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10"> 
									<button type="submit" class="btn btn-default">Submit</button> <img src="<?php echo URL;?>public/img/loading.gif" id="loading" style="display: none;">
								</div> 
							</div> 
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10"> 
									<span id="success"></span>
								</div> 
							</div> 
						</div> 	
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="">
					<h3 class="col-sm-9 col-md-6 col-lg-4">System Categories</h3>
					
					<span id="data-holder" data-url="<?php echo URL; ?>" data-user_id="<?php echo Session::get('user_id'); ?>" data-updateClass="category"></span>
					<?php
						displayCategories('2', $this->category_model);
						//print_r($this->view->categories);
					?>
					<h3 class="col-sm-9 col-md-6 col-lg-4">Tip: click on the trash can to remove your category from list.</h3>
					<br/><br/>
					
					<?php
						displayCategories('1', $this->category_model);
						//print_r($this->view->categories);
					?>
				</div> <!-- /.span4 -->
			</div> <!-- /.row -->	
		</div> <!-- /.container -->
	</div> <!-- /#content -->
</div> <!-- /#wrapper -->
<style>
form
{
color: white;
background-color: #254463;
background-image: -moz-linear-gradient(top, #2b4e72, #1d354d);
background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#2b4e72), to(#1d354d));
background-image: -webkit-linear-gradient(top, #2b4e72, #1d354d);
background-image: -o-linear-gradient(top, #2b4e72, #1d354d);
background-image: linear-gradient(to bottom, #2b4e72, #1d354d);
background-repeat: repeat-x;
}
</style>
<script type="text/javascript" src="<?php echo URL; ?>public/js/Updater.js"></script>
<script>
		//console.log("Submitted");
	var options = {
		beforeSend: function(){
			$("#loading").fadeIn('slow');
			
			console.log("beforeSend");
		}, uploadProgress: function(event, position, total, percentComplete){
			//$("#broadcastBar").width(percentComplete+'%');
			//$("#broadcastPercent").html(percentComplete+'%');
			console.log("uploadProgress");
		}, success: function(response){
				// Success message
				$('#success').html("<div class='alert alert-success'>");
				$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
				.append( "</button>");
				$('#success > .alert-success').append("<strong>Upload Success.</strong>");
				$('#success > .alert-success').append('</div>');
				//clear all fields
				$('form')[0].reset();
				location.reload();
		}, complete: function(response){
			$("#loading").fadeOut('slow');
			console.log("Complete. response: "+response.responseText);
		}, error: function(){
			// Fail message
			$('#success').html("<div class='alert alert-danger'>");
			$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
			.append( "</button>");
			$('#success > .alert-danger').append("<strong>Sorry, it seems that server is not responding...</strong> Could you please notify me directly to <a href='kabelokwasi@gmail.com?Subject=Message_Me;>kabelokwasi@gmail.com</a> ? Sorry for the inconvenience!");
			$('#success > .alert-danger').append('</div>');
			//clear all fields
			$('form')[0].reset();
			
			console.log("ERROR: ");
		}
	};
	
	$("#addCategoryFrm").ajaxForm(options);
</script>
	