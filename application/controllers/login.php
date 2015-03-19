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
        parent::__construct();
    }

    /**
     * The logout action, login/logout
     */
    function logout()
    {
        $login_model = $this->loadModel('Login');
        $generic_model = $this->loadModel('Generic');
        $login_model->logout($generic_model);
        // redirect user to base URL
        //header('location: ' . URL);
        echo "Success";
    }

    /**
     * Show user's profile
     */
    function showProfile()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $this->view->render('login/showprofile');
    }

    /**
     * Edit user name (show the view with the form)
     */
    function editUsername()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $this->view->render('login/editusername');
    }

    /**
     * Edit user name (perform the real action after form has been submitted)
     */
    function editUsername_action()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        // Note: This line was missing in early version of the script, but it was never a real security issue as
        // it was not possible to read or edit anything in the database unless the user is really logged in and
        // has a valid session.
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $login_model->editUserName();
        $this->view->render('login/editusername');
    }

    /**
     * Edit user email (show the view with the form)
     */
    function editUserEmail()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $this->view->render('login/edituseremail');
    }

    /**
     * Edit user email (perform the real action after form has been submitted)
     */
    function editUserEmail_action()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        // Note: This line was missing in early version of the script, but it was never a real security issue as
        // it was not possible to read or edit anything in the database unless the user is really logged in and
        // has a valid session.
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $login_model->editUserEmail();
        $this->view->render('login/edituseremail');
    }

    /**
     * Upload avatar
     */
    function uploadAvatar()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $this->view->avatar_file_path = $login_model->getUserAvatarFilePath();
        $this->view->render('login/uploadavatar');
    }

    /**
     *
     */
    function uploadAvatar_action()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        // Note: This line was missing in early version of the script, but it was never a real security issue as
        // it was not possible to read or edit anything in the database unless the user is really logged in and
        // has a valid session.
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $login_model->createAvatar();
        $this->view->render('login/uploadavatar');
    }

    /**
     *
     */
    function changeAccountType()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
        $this->view->render('login/changeaccounttype');
    }

    /**
     *
     */
    function changeAccountType_action()
    {
        // Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        // Note: This line was missing in early version of the script, but it was never a real security issue as
        // it was not possible to read or edit anything in the database unless the user is really logged in and
        // has a valid session.
        Auth::handleLogin();
        $login_model = $this->loadModel('Login');
        $login_model->changeAccountType();
        $this->view->render('login/changeaccounttype');
    }
    
    /**
     * Send verification email to user after they registered
     */
    function sendverificationemail()
    {
    $this->view->render('login/sendverificationemail');
    }

    /**
     * Request password reset page
     */
    function requestPasswordReset()
    {
        $this->view->render('login/requestpasswordreset');
    }

    /**
     * Request password reset action (after form submit)
     */
    function requestPasswordReset_action()
    {
        $login_model = $this->loadModel('Login');
        $login_model->requestPasswordReset();
        $this->view->render('login/requestpasswordreset');
    }

    /**
     * Verify the verification token of that user (to show the user the password editing view or not)
     * @param string $user_name username
     * @param string $verification_code password reset verification token
     */
    function verifyPasswordReset($user_name, $verification_code)
    {
        $login_model = $this->loadModel('Login');
        if ($login_model->verifyPasswordReset($user_name, $verification_code)) {
            // get variables for the view
            $this->view->user_name = $user_name;
            $this->view->user_password_reset_hash = $verification_code;
            $this->view->render('login/changepassword');
        } else {
            header('location: ' . URL . 'login/index');
        }
    }

    /**
     * Set the new password
     * Please note that this happens while the user is not logged in.
     * The user identifies via the data provided by the password reset link from the email.
     */
    function setNewPassword()
    {
        $login_model = $this->loadModel('Login');
        // try the password reset (user identified via hidden form inputs ($user_name, $verification_code)), see
        // verifyPasswordReset() for more
        $login_model->setNewPassword();
        // regardless of result: go to index page (user will get success/error result via feedback message)
        header('location: ' . URL . 'login/index');
    }

    /**
     * Generate a captcha, write the characters into $_SESSION['captcha'] and returns a real image which will be used
     * like this: <img src="......./login/showCaptcha" />
     * IMPORTANT: As this action is called via <img ...> AFTER the real application has finished executing (!), the
     * SESSION["captcha"] has no content when the application is loaded. The SESSION["captcha"] gets filled at the
     * moment the end-user requests the <img .. >
     * If you don't know what this means: Don't worry, simply leave everything like it is ;)
     */
    function showCaptcha()
    {
        $login_model = $this->loadModel('Login');
        $login_model->generateCaptcha();
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
    =   C - functions       =
    ========================*/
    
    /**
    * This function is used solely for the purpose of validating some inputs on the 
    * client side via jquery validate plugin
    */
    public function check($field){
        if(isset($field)){
            $login_model = $this->loadModel('Login');
            // Check the field in the model, this is just the controller remember?
            echo json_encode($login_model->check($field));
        }
    }
    
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
        
        //$this->view->page_title = "Login | InfoBlend";
        // show the view
        //$this->view->render_new('login/index', true);
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
            //header('location: ' . URL . 'login/verify');
            echo "login/verify";
        } elseif ($login_successful) {
            // if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
            //header('location: ' . URL . 'dashboard/welcome');
            echo "Success";
        } else {
            // if NO, then move user to login/index (login form) again
            //header('location: ' . URL . 'login/index');
            //print_r($_SESSION["feedback_negative"]);
            //echo "Error";
        }
    }
    
    /**
    * The login action, when you do login/login
    */
    public function login2(){
        // run the login() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('Login');
        // perform the login method, put result (true or false) into $login_successful
        $login_successful = $login_model->login();
        
        echo "Hola Mundial!";
        //echo $login_successful;
        
        // check login status
        /*if($login_successful === 0){
            // if account not active, go to the verification page.
            header('location: ' . URL . 'login/verify');
        } elseif ($login_successful) {
            // if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
            header('location: ' . URL . 'dashboard/welcome');
        } else {
            // if NO, then move user to login/index (login form) again
            header('location: ' . URL . 'login/index');
        }*/
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
    
    /**
    * The login action, this is where the user is directed after being checked by the Facebook server by
    * clicking the facebook-login button
    */
    function loginWithFacebook(){
        // run the login() method in the login-model, put the result in $login_successful (true or false)
        $login_model = $this->loadModel('Login');
        $generic_model = $this->loadModel('Generic');
        $login_successful = $login_model->loginWithFacebook($generic_model);
        
        // check login status
        if($login_successful === -1){
            // if the fb user is not in our database yet, add them
            header('location: ' . $login_model->getFacebookRegisterUrl());
        } elseif($login_successful === 0){
            // if account not active, go to the verification page.
            header('location: ' . URL . 'login/verify');
        } elseif ($login_successful) {
            // if YES, then move user to dashboard/index (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'dashboard/welcome');
        } else {
            // if NO, then move user to login/index (login form) (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'login/index');
        }
    }
    
    /*======================
    =   R - functions       =
    ========================*/
    
    /**
    * Register page
    * Show the register form (with the register-with-facebook button). We need the facebook-register-URL for that.
    */
    function register(){
        $login_model = $this->loadModel('Login');
        
        $this->view->cities = json_decode(file_get_contents(URL."public/json/cities.json"));
        $this->view->municipalities = json_decode(file_get_contents(URL."public/json/municipalities.json"));
        
        // if we use Facebook: this is necessary as we need the facebook_register_url in the login form (in the view)
        if (FACEBOOK_LOGIN == true) {
            $this->view->facebook_register_url = $login_model->getFacebookRegisterUrl();
        }
        
        $this->view->page_title = "Registration | InfoBlend";
        $this->view->render_new('login/register', true);
    }
    
    /**
    * Register page action (after form submit)
    */
    function register_action(){
        $login_model = $this->loadModel('Login');
        $generic_model = $this->loadModel('Generic');
        $registration_successful = $login_model->registerNewUser($generic_model);
        
        if($registration_successful === 0){
            // if account not active, go to the verification page.
            //header('location: ' . URL . 'login/verify');
            echo "Success";
        }elseif ($registration_successful == true) {
            //header('location: ' . URL . 'login/verify');
            echo "Success";
        } else {
            Session::set("value_array", $_POST);
            Session::set("error_array", Form::getErrorArray());
            //header('location: ' . URL . 'login/register');
            print_r($_SESSION["feedback_negative"]);
            echo "Error";
        }
    }
    
    /**
    * Register a user via Facebook-authentication
    * Prepopulate the form with values from the Facebook-authentication data
    */
    function registerWithFacebook(){
        $login_model = $this->loadModel('Login');
        $generic_model = $this->loadModel('Generic');
        // perform the register method, put result (true or false) into $registration_successful
        $facebook_user_data = $login_model->registerWithFacebook($generic_model);
        
        // check registration status
        if($facebook_user_data === 0){
            // if account not active, go to the verification page.
            header('location: ' . URL . 'login/verify/NULL/fb');
        }elseif($facebook_user_data === true){
            $category_model = $this->loadModel('Category');    
            $category_model->create_user_categories(Session::get("user_id"));
            $category_model->create_user_products(Session::get("user_id"));
            
            header('location: ' . URL . 'dashboard/welcome');
        }elseif ($facebook_user_data != false) {
            // if YES, then render the render the registerWithFacebook view, prepopulated with the facebook data
            $this->view->cities = json_decode(file_get_contents(URL."public/json/cities.json"));
            $this->view->municipalities = json_decode(file_get_contents(URL."public/json/municipalities.json"));
            
            //$this->view->facebook_user_data = $facebook_user_data;
            Form::setValue('fb_id', $facebook_user_data['id']);
            Form::setValue('firstname', $facebook_user_data['first_name']);
            Form::setValue('lastname', $facebook_user_data['last_name']);
            Form::setValue('gender', $facebook_user_data['gender']);
            Form::setValue('username', $facebook_user_data['first_name']);
            if(isset($facebook_user_data['birthday']) && !empty($facebook_user_data['birthday']))
                Form::setValue('dob', $facebook_user_data['birthday']);
            if(isset($facebook_user_data['email']) && !empty($facebook_user_data['email']))
                Form::setValue('email', $facebook_user_data['email']);
            if(isset($facebook_user_data['location']) && !empty($facebook_user_data['location']))
                Form::setValue('city', $facebook_user_data['location']['name']);
            
            if(isset($facebook_user_data['avatar_xsmall']) && !empty($facebook_user_data['avatar_xsmall']))
                Form::setValue('avatar_xsmall', $facebook_user_data['avatar_xsmall']);
            if(isset($facebook_user_data['avatar_small']) && !empty($facebook_user_data['avatar_small']))
                Form::setValue('avatar_small', $facebook_user_data['avatar_small']);
            if(isset($facebook_user_data['avatar_medium']) && !empty($facebook_user_data['avatar_medium']))
                Form::setValue('avatar_medium', $facebook_user_data['avatar_medium']);
            if(isset($facebook_user_data['avatar_large']) && !empty($facebook_user_data['avatar_large']))
                Form::setValue('avatar_large', $facebook_user_data['avatar_large']);
            if(isset($facebook_user_data['avatar_xlarge']) && !empty($facebook_user_data['avatar_xlarge']))
                Form::setValue('avatar_xlarge', $facebook_user_data['avatar_xlarge']);
            
            $this->view->page_title = "Register With Facebook | InfoBlend";
            $this->view->render_new('login/registerwithfacebook', true);
        } else {
            // if NO, then move user to login/register_new (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'login/register');
        }
    }
    
    /**
    * Register a user via Facebook-authentication
    */
    function registerWithFacebook_action(){
        $login_model = $this->loadModel('Login');
        // perform the register method, put result (true or false) into $registration_successful
        $registration_successful = $login_model->registerNewUserWithFacebook_old();
        
        // check registration status
        if ($registration_successful) {
            // if YES, then move user to login/index (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'login/verify/NULL/fb');
        } else {
            // if NO, then move user to login/register (this is a browser-redirection, not a rendered view)
            Session::set("value_array", $_POST);
            Session::set("error_array", Form::getErrorArray());
            header('location: ' . URL . 'login/registerWithFacebook_render');
        }
    }
    
    /**
    * Render the minimum form
    */
    function registerWithFacebook_render(){
        $this->view->cities = json_decode(file_get_contents(URL."public/json/cities.json"));
        $this->view->municipalities = json_decode(file_get_contents(URL."public/json/municipalities.json"));
        
        $this->view->page_title = "Register With Facebook | InfoBlend";
        $this->view->render_new('login/registerwithfacebook', true);
    }
    
    /*======================
    =   S - functions       =
    ========================*/
    
    /**
    * Send verification email to user after they registered
    */
    function sendverificationemail_new(){
        $this->view->render_new('login/sendverificationemail_new');
    }
    
    /*======================
    =   V - functions       =
    ========================*/
    
    /**
    * Verify user after registration
    * @param int $user_id user's id
    */
    function verify($user_id = NULL, $fb = NULL){
        if(isset($user_id) && $user_id != NULL && $user_id !== "NULL"){
            $login_model = $this->loadModel('Login');
            $generic_model = $this->loadModel('Generic');
            $verification_successful = $login_model->verifyNewUser($user_id, $fb, $generic_model);
            // check the verification status
            if($verification_successful === 1){
                $category_model = $this->loadModel('Category');
                $category_model->create_user_categories($user_id);
                $category_model->create_user_products($user_id);
                
                header('location: ' . URL . 'dashboard/welcome');
            }elseif($verification_successful == true){
                $category_model = $this->loadModel('Category');
                $category_model->create_user_categories($user_id);
                $category_model->create_user_products($user_id);
                
                header('location: ' . URL . 'login/index');
            }else{
                // if NO, then move user to login/verify (this is a browser-redirection, not a rendered view)
                Session::set("value_array", $_POST);
                Session::set("error_array", Form::getErrorArray());
                header('location: ' . URL . 'login/verify');
            }
        }else{
            if(isset($fb))
                $this->view->fb = $fb;
            $this->view->page_title = "Account Verification | InfoBlend";
            $this->view->render_new('login/verify', true);
        }
    }
}
