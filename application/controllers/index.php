<?php

/**
 * Class Index
 * The index controller
 */
class Index extends Controller
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
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
    	//Session::set('session_id', $this->generateRandomString(15));
    	
    	$this->view->render('index/index');
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
    
    //---------The following are the menu controllers, when creating a link, writer
    //---------the url handler here
    
    /**
     * Handles what happens when user moves to URL/index/services, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function patients()
    {
       $this->view->target = "patient";
	   $this->view->render('index/patients');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function doctors()
    {
        $this->view->target = "doctor";
	    $this->view->render('index/doctors');
    }

    /**
     * Handles what happens when user moves to URL/index/services, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function medical_aids()
    {
       $this->view->target = "medical_aid";        
       $this->view->render('index/medical_aids');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function tariff_codes()
    {
       $this->view->target = "tariff_code";        
       $this->view->render('index/tariff_codes');
    }

    /**
     * Handles what happens when user moves to URL/index/services, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function diagnosis()
    {
       $this->view->target = "diagnosis";          
       $this->view->render('index/diagnosis');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function messages()
    {
       $this->view->target = "message";          
       $this->view->render('index/messages');
    }
	
	/**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function statement_messages()
    {
       $this->view->target = "statement_message";          
       $this->view->render('index/statement_messages');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function use_aid_holder()
    {
        if(isset($_POST["aid_holder_id"])){
            //$this->view->target = "tariff_code";              
            $generic_model = $this->loadModel('Generic');
            $this->view->aid_holder_id = $_POST["aid_holder_id"];

            $genericGetRequest = array('table' => PREFIX."aid_holder", 'fields' => "*", 'where' => "aid_holder_id = ".$_POST['aid_holder_id'], 'returnType' => "array");
            $this->view->aid_holder_details = $generic_model->genericGetPhp($genericGetRequest);

            $genericGetRequest = array('table' => PREFIX."patient", 'fields' => "patient_id, name, surname", 'where' => "aid_holder_id = ".$_POST['aid_holder_id'], 'returnType' => "array");
            $this->view->patient_details = $generic_model->genericGetPhp($genericGetRequest);            

            $this->view->render('index/use_aid_holder');
        }
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function aid_holder()
    {
        $this->view->target = "aid_holder";        
        $this->view->render('index/aid_holder');
    }           

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function view_pdf()
    {
        $generic_model = $this->loadModel('Profile');
        $generic_model->viewPDF();
    }               
    
}
