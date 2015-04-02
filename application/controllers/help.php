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
}
