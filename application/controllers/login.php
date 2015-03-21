<?php

/**
 * Login Controller
 * Controls the login processes
 */

class Login extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
	//Session::set('session_id', $this->generateRandomString(15));
        parent::__construct();
    }
    
    /*==============================================
    =   NEW FUNCTION MODIFICATIONS  =
    ================================================*/
    /**
    * There has been some major modification to the program flow.
    * Some database names have been changed, while some were dropped.
    * Notice that the new structure is such that the functions are in \
    * alphabetical order, please keep it that way
    */
    
    /*======================
    =   I - functions       =
    ========================*/
    
    /**
    * Index, default action (shows the login form), when you do login/index
    */
    function index(){
        // create a login model to perform the getFacebookLoginUrl() method
        $login_model = $this->loadModel('Login');
        
        // if we use Facebook: this is necessary as we need the facebook_login_url in the login form (in the view)
        if (FACEBOOK_LOGIN == true) {
            $this->view->facebook_login_url = $login_model->getFacebookLoginUrl();
        }
        
        $this->view->page_title = "Login | MediSuite";
        // show the view
        $this->view->render('login/index', true);
    }
    
    /*======================
    =   L - functions       =
    ========================*/
    
    /**
    * The login action, when you do login/login
    */
    function login(){
        // run the login() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('Login');
        $generic_model = $this->loadModel('Generic');
        // perform the login method, put result (true or false) into $login_successful
        $login_successful = $login_model->login($generic_model);
        
        // check login status
        if($login_successful === 0){
            // if account not active, go to the verification page.
            header('location: ' . URL . 'login');
            //echo "login/verify";
        } elseif ($login_successful) {
            // if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
           header('location: ' . URL);
          //  echo "Success";
	  
		//echo Session::get('user_logged_in');
		//return false;
        } else {
            // if NO, then move user to login/index (login form) again
            header('location: ' . URL . 'login/index');
            //print_r($_SESSION["feedback_negative"]);
            //echo "Error";
        }
    }
    
    /**
    * Login with cookie
    */
    function loginWithCookie(){
        // run the loginWithCookie() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('Login');
        $generic_model = $this->loadModel('Generic');
        $login_successful = $login_model->loginWithCookie($generic_model);
        
        if ($login_successful) {
            header('location: ' . URL . 'dashboard/welcome');
        } else {
            // delete the invalid cookie to prevent infinite login loops
            $login_model->deleteCookie();
            // if NO, then move user to login/index (login form) (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'login/index');
        }
    }
}
