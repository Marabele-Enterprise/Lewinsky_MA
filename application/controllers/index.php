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
       parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
        //Session::set('session_id', $this->generateRandomString(15));
        $this->view->isHome = true;
        $this->view->render('index/sitedown', true);
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
        Auth::handleLogin();
        $this->view->target = "patient";
        $generic_model = $this->loadModel('Generic');

        $genericGetRequest = array(
            'table' => PREFIX.'patient_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
            'fields' => "a.*, b.*", 
            'where' => "practice_id = ".Session::get("practice_id"), 
            'returnType' => "array"
        );

        $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);

        $this->view->render('index/patients');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function doctors()
    {
        Auth::handleLogin();
        $this->view->target = "doctor";
        $generic_model = $this->loadModel('Generic');

        $genericGetRequest = array(
            'table' => PREFIX.'doctor_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
            'fields' => "a.*, b.*", 
            'where' => "practice_id = ".Session::get("practice_id"), 
            'returnType' => "array"
        );

        $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);        
        $this->view->render('index/doctors');
    }

    /**
     * Handles what happens when user moves to URL/index/services, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function medical_aids()
    {
        Auth::handleLogin();
        $generic_model = $this->loadModel('Generic');

        $genericGetRequest = array(
            'table' => PREFIX.'medical_aid', 
            'fields' => "*", 
            'returnType' => "array"
        );

        $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);                
        $this->view->target = "medical_aid";        
        $this->view->render('index/medical_aids');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function tariff_codes()
    {
        Auth::handleLogin();
        $this->view->target = "tariff_code";        
        $generic_model = $this->loadModel('Generic');

        $genericGetRequest = array(
            'table' => PREFIX.'tariff_code', 
            'fields' => "*", 
            'returnType' => "array"
        );

        $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);                        

        $this->view->render('index/tariff_codes');
    }

    /**
     * Handles what happens when user moves to URL/index/services, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function diagnosis()
    {
        Auth::handleLogin();
        $generic_model = $this->loadModel('Generic');

        $genericGetRequest = array(
            'table' => PREFIX.'icd10_diagnosis', 
            'fields' => "*", 
            "extra" => 'limit 150',
            'returnType' => "array"
        );

        $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);                        
        $this->view->target = "diagnosis";          
        $this->view->render('index/diagnosis');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function messages()
    {
        Auth::handleLogin();
       $this->view->target = "message";          
       $this->view->render('index/messages');
    }
    
    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function statement_messages()
    {
        Auth::handleLogin();
       $this->view->target = "statement_message";          
       $this->view->render('index/statement_messages');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function use_aid_holder()
    {
        Auth::handleLogin();
        if(isset($_POST["aid_holder_id"])){
            //$this->view->target = "tariff_code";              
            $generic_model = $this->loadModel('Generic');
            $this->view->aid_holder_id = $_POST["aid_holder_id"];

            $genericGetRequest = array(
                'table' => PREFIX.'aid_holder_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "aid_holder_id = ".$_POST['aid_holder_id'], 
                'returnType' => "array"
            );

            $this->view->aid_holder_details = $generic_model->genericGetPhp($genericGetRequest);

            $genericGet2Request = array(
                'table' => PREFIX.'patient_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "a.aid_holder_id = ".$_POST['aid_holder_id'], 
                'returnType' => "array"
            );   

            $this->view->patient_details = $generic_model->genericGetPhp($genericGet2Request);            

            $this->view->render('index/use_aid_holder');
        }
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function use_patient()
    {
        Auth::handleLogin();
        if(isset($_POST["patient_id"])){
            //$this->view->target = "tariff_code";              
            $generic_model = $this->loadModel('Generic');
            $this->view->patient_id = $_POST["patient_id"];

            $genericGetRequest = array(
                'table' => PREFIX.'patient_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "patient_id = ".$_POST['patient_id'], 
                'returnType' => "array"
            );

            $this->view->patient_details = $generic_model->genericGetPhp($genericGetRequest);

            $genericGetRequest = array(
                'table' => PREFIX.'transaction', 
                'fields' => "*", 
                'where' => "patient_id = ".$_POST['patient_id'], 
                'returnType' => "array"
            );

            $this->view->transactions = $generic_model->genericGetPhp($genericGetRequest);            

            $this->view->render('index/use_patient');
        }
    }    

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function aid_holder()
    {
        Auth::handleLogin();
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

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function patient_referral()
    {
        Auth::handleLogin();
        if(isset($_POST["patient_id"])){
            $generic_model = $this->loadModel('Generic');

            $genericGetRequest = array(
                'table' => PREFIX.'user as a JOIN '.PREFIX.'patient_referral as b ON a.user_id = b.user_id', 
                'fields' => "a.name, surname, b.*", 
                'where' => "b.user_id = ".$_POST["patient_id"], 
                'returnType' => "array"
            );
            $this->view->patient_id = $_POST["patient_id"];
            $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);

            $this->view->render('index/patient_referral');   
        }else{
           $this->view->target = "patient";
           $this->view->render('index/patients');            
        }
    } 

    function patient_prescrption()
    {
        Auth::handleLogin();
        if(isset($_POST["patient_id"])){
            $generic_model = $this->loadModel('Generic');

            $genericGetRequest = array(
                'table' => PREFIX.'user as a JOIN '.PREFIX.'patient_prescription as b ON a.user_id = b.user_id', 
                'fields' => "a.name, surname, b.*", 
                'where' => "b.user_id = ".$_POST["patient_id"], 
                'returnType' => "array"
            );
            $this->view->patient_id = $_POST["patient_id"];
            $this->view->rows = $generic_model->genericGetPhp($genericGetRequest);

            $this->view->render('index/prescription');   
        }else{
           $this->view->target = "patient";
           $this->view->render('index/patients');            
        }
    }     

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function welcome()
    {
        //Session::set('session_id', $this->generateRandomString(15));
        Auth::handleLogin();

        $generic_model = $this->loadModel('Generic');

        //---------------------------------------------------
        if (Session::get("user_account_type") == "User") {
            $genericGetRequest = array(
                'table' => PREFIX.'user as a JOIN '.PREFIX.'practice as b ON a.user_id = b.creator_id', 
                'fields' => "a.*, b.*", 
                'where' => "a.user_id = ".Session::get("user_id"), 
                'returnType' => "array"
            );

            $genericGet2Request = array(
                'table' => PREFIX.'image', 
                'fields' => "*",
                'extra' => "ORDER BY image_id Desc LIMIT 1", 
                'where' => "type = 'practice_logo' AND user_id = ".Session::get("user_id"), 
                'returnType' => "array"
            );            

            $this->view->image_details = $generic_model->genericGetPhp($genericGet2Request);

        }else if (Session::get("user_account_type") == "Customer") {
            $genericGetRequest = array(
                'table' => PREFIX.'aid_holder_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "b.user_id = ".Session::get("user_id"), 
                'returnType' => "array"
            );

            $genericGet2Request = array(
                'table' => PREFIX.'patient_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "a.aid_holder_id = ".Session::get("user_id"), 
                'returnType' => "array"
            );            

            $this->view->patient_details = $generic_model->genericGetPhp($genericGet2Request);
        }else if (Session::get("user_account_type") == "Doctor") {
            $genericGetRequest = array(
                'table' => PREFIX.'doctor_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "b.user_id = ".Session::get("user_id"),
                'returnType' => "array"
            );
        }else if (Session::get("user_account_type") == "Patient") {
            $genericGetRequest = array(
                'table' => PREFIX.'patient_user_details_tbls as a JOIN '.PREFIX.'user as b ON a.user_id = b.user_id', 
                'fields' => "a.*, b.*", 
                'where' => "b.user_id = ".Session::get("user_id"), 
                'returnType' => "array"
            );
        }else{
            header("Location: ".URL);
        }

        $this->view->user_details = $generic_model->genericGetPhp($genericGetRequest);
           
        $this->view->render('index/welcome');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function pdf_test($aid_holder_id, $message)
    {
        Auth::handleLogin();
        //echo $aid_holder_id." -- ".$message;
        $model = $this->loadModel('Pdf');
        $model->pdf_test($aid_holder_id, $message); 
    } 

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function get_pdf_statement($aid_holder_id, $patient_id, $message)
    {
        Auth::handleLogin();
        //echo $aid_holder_id." -- ".$message;
        $model = $this->loadModel('Pdf');
        $model->get_pdf_statement($aid_holder_id, $patient_id, $message); 
    }       


}
