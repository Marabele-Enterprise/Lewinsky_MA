<?php

/**
 * Class Help
 * The help area
 */
class Help extends Controller
{
	/**
	* Construct this object by extending the basic Controller class
	*/
	function __construct()
	{
		// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
		Auth::handleLogin();
		
		parent::__construct();
	}
	
	/**
	* This method controls what happens when you move to /help/index in your app.
	*/
	function index()
	{
		$this->view->render('help/index');
	}
	
	/**
	* The ICD 10 Codes view
	*/
	function icd_10() {
		// XML parser variables
		$this->view->xml = simplexml_load_file(LIBS_PATH . "ICD10CM_FY2015_Full_XML/FY15_Tabular.xml");
		
		//echo $xml->version;
		
		$this->view->render("help/icd_10");
	}

	function xml_implode($xml, $glue){
		$result = "";

		if(!is_null($xml) OR isset($xml)){
			foreach ($xml as $key => $row) {
				$result .= $row.$glue;
			}			

			$result = substr($result, 0, -2);
		}

		return $result;
	}

	/**
	* The ICD 10 Codes view
	*/
	function store_icd_10() {
		set_time_limit(0);

		$generic_model = $this->loadModel('Generic');

		// XML parser variables
		$this->view->xml = simplexml_load_file(LIBS_PATH . "ICD10CM_FY2015_Full_XML/FY15_Tabular.xml");
		
		//echo $xml->version;
		$key = 0;
		foreach ($this->view->xml->chapter as $chapter) {

			$name1 = (string) $chapter->name;
			$description1 = (string) $chapter->desc;
			$use_additional_code1 = (string) $chapter->use_additional_code;
			$excludes11 = $this->xml_implode($chapter->excludes1->note, "; ");
			$excludes21 = $this->xml_implode($chapter->excludes2->note, "; ");
		
			echo "<h2 style='color: green' >Inserting into chapter: ".$description1."</h2>";

		    $genericRequest = array('table' => PREFIX."icd_chapter", "insert_id" => true, 'name' => $name1, 'description' => $description1, 'use_additional_code' => $use_additional_code1, 'excludes1' => $excludes11, 'excludes2' => $excludes21);
		    print_r($genericRequest);
		  	$icd_chapter_id = $generic_model->genericCreate($genericRequest);
		    
		    if($icd_chapter_id > 0){
		    	echo "<p>Insert into chapter success</p>";
		    }else{
		    	echo "<p style='color:red;' >Insert into chapter error</p>";
		    }
        			
			echo "=========================================================================";
			
			
			echo "<ul>";
			
			foreach ($chapter->section as $section) {
				//echo "<pre>";
					//rint_r($section);
				//echo "</pre><h2>==================================================================</h2>";
				$code = (string) $section["id"];
				$description2 = (string) $section->desc;
				$section_excludes = $this->xml_implode($section->excludes1->note, "; ");
				$section_includes = $this->xml_implode($section->includes->note, "; ");
			
				echo "<h3 style='color: blue' >Inserting into section: ".$description1."</h3>";

			    $genericRequest = array('table' => PREFIX."icd_section", "insert_id" => true, 'code' => $code, 'description' => $description2, 'excludes1' => $section_excludes, 'includes' => $section_includes, 'icd_chapter_id' => $icd_chapter_id);
			    print_r($genericRequest);
			    $icd_section_id = $generic_model->genericCreate($genericRequest);
			    
			    if($icd_section_id > 0){
			    	echo "<p>Insert into section success</p>";
			    }else{
			    	echo "<p style='color:red;' >Insert into section error</p>";
			    }				

				//echo "<li>" . $section["id"] . ' ' . $section . "</li>";
				//echo "<pre>";
					//print_r($section);
				//echo "</pre><h2>==================================================================</h2>";				
				//echo "<li>" . $section->desc . "</li>";
				//description/includes/excludes
			
			   
				
				echo "<li><ul>";
				foreach ($section->diag as $diag) {
					$name3 = (string) $diag->name;
					$description3 = (string) $diag->desc;
					$diag_includes = $this->xml_implode($diag->includes->note, "; ");
					$diag_excludes1 = $this->xml_implode($diag->excludes1->note, "; ");
					$diag_excludes2 = $this->xml_implode($diag->excludes2->note, "; ");

					echo "<h3 style='color: purple' >Inserting into diag: ".$description3."</h3>";

				    $genericRequest = array('table' => PREFIX."icd_diag", "insert_id" => true, 'name' => $name3, 'description' => $description3, 'excludes1' => $section_excludes, 'includes' => $section_includes, 'icd_section_id' => $icd_section_id);

				    print_r($genericRequest);
				    $icd_diag_id = $generic_model->genericCreate($genericRequest);
				    
				    if($icd_diag_id > 0){
				    	echo "<p>Insert into diag success</p>";
				    }else{
				    	echo "<p style='color:red;' >Insert into diag error</p>";
				    }				
				    
					echo "<pre>";

						foreach ($diag->diag as $key => $diag_sub) {
							$name4 = (string) $diag->name;
							$description4 = (string) $diag->desc;
							$inclusion_term = $this->xml_implode($diag->inclusionTerm->note, "; ");

							echo "<h3 style='color: orange' >Inserting into diag: ".$description4."</h3>";

						    $genericRequest = array('table' => PREFIX."icd_diag_sub", "insert_id" => true, 'name' => $name4, 'description' => $description4, 'inclusion_term' => $inclusion_term, 'icd_diag_id' => $icd_diag_id);

						    print_r($genericRequest);
						    $icd_diag_sub_id = $generic_model->genericCreate($genericRequest);
						    
						    if($icd_diag_sub_id > 0){
						    	echo "<p>Insert into diag_sub success</p>";
						    }else{
						    	echo "<p style='color:red;' >Insert into diag_sub error</p>";
						    }

						    
							print_r($diag_sub);
							if(isset($diag_sub->diag)){
								foreach ($diag_sub->diag as $key => $diag_sub2) {
									$name5 = (string) $diag->name;
									$description5 = (string) $diag->desc;
									$inclusion_term5 = $this->xml_implode($diag->inclusionTerm->note, "; ");

									echo "<h3 style='color: maroon' >Inserting into diag_sub2: ".$description5."</h3>";

								    $genericRequest = array('table' => PREFIX."icd_diag_sub2", "insert_id" => true, 'name' => $name5, 'description' => $description5, 'inclusion_term' => $inclusion_term5, 'icd_diag_sub_id' => $icd_diag_sub_id);

								    print_r($genericRequest);
								    $result = $generic_model->genericCreate($genericRequest);
								    
								    if($result > 0){
								    	echo "<p>Insert into diag_sub2 success</p>";
								    }else{
								    	echo "<p style='color:red;' >Insert into diag_sub2 error</p>";
								    }									
								}
							}
							echo "<h2>+_+_+_+_+_+_+_+_+__+_+_+_+_+_+_+_+_+_+_+_+_+_+_+</h2>";	
							/**/								
						}
					echo "</pre><h2>==================================================================</h2>";									
					
				}
				echo "</ul></li>";
				
			}
			echo "</ul>";

				/*
			echo '<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $key; ?>">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
							'.$chapter->name . ' ' . $chapter->desc.'
						</a>
					</h4>
				</div>';
			
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
				
			echo'
			</div>';
				*/
		}

		//$this->view->render("help/icd_10");
	}
}
