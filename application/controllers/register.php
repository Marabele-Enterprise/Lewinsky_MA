<?php

/**
 * Register Controller
 * Controls the register processes
 */

class Register extends Controller
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
    * Index, default action (shows the register form), when you do register/index
    */
    function index(){
        
        $this->view->page_title = "Register | MediSuite";
        // show the view
        $this->view->render('register/index');
    }

    /*======================
    =   I - functions       =
    ========================*/
    
    /**
    * Index, default action (shows the register form), when you do register/index
    */
    function bulk_emails(){
        
        $this->view->page_title = "Register | MediSuite";
        // show the view
        $register_model = $this->loadModel('Register');

        //$emails = explode(",", "u14181895@tuks.co.za,alfimabo@gmail.com,aasimatsi@gmail.com,musaambrose14@gmail.com,mo_amla@webmail.com,chalmers.andrea@gmail.com,andrewmabitoa@gmail.com,aagreen09@gmail.com,u10389581@tuks.co.za,u12318354@tuks.co.za,u12080561@tuks.co.za,bs.tshlia@gmail.com,bragibbs94@gmail.com,u1023354@tuks.co.za,nyathichurchill@gmail.com,u14339201@tuks.co.za,dp.manenzhe2@gmail.com,u13336828@tuks.co.za,u14309042@tuks.co.za,gali.letlape09@gmail.com,muzim7@gmail.com,griffithsmm@gmail.com,relosengcebotimothy@gmail.com,hamphrey.dh@gmail.com,hlauutelo.maluleke@gmail.com,hlavutelo.maluleke@gmail.com,hlulanimabasa@yahoo.co.za,u15345964@tuks.co.za,jacob.sibanda93@gmail.com,u12236081@gmail.com,kabaiqwabaza@gmail.com,kabelokwasi@gmail.com,kalekaylee64@gmail.com,u14403804@tuks.co.za,booysenbonolo.bb@gmail.com,patrickpitso@live.co.za,u11072157@tuks.co.za,kgotsolgenge@gmail.com,mutengwe.k.p@hotmail.com,u13378831@tuks.co.za,kudakwashebopoto@gmail.com,lebogangmalesa7@gmail.com,leboganag222@gmail.com,lebohanghlalele33@gmail.com,leratomolokomme@gmail.com,u10666452@tuks.co.za,luxle&windels@gmail.com,ltfwala@yahoo.com,lwazihlatshwayo@gmail.com,u13407547@tuks.co.za,enayo@yahoo.com,u11121255@tuks.co.za,Emshudu@gmail.com,Hudsonmasilo68@gmail.com,u10403605@tuks.co.za,megswart18@gmail.com,vanwykchella01@gmail.com,mogaem@gmail.com,monyenmj@gmail.com,u15130658@tuks.co.za,mosinane556@yahoo.com,mothekgimphahlele@gmail.com,mp.mello5@gmail.com,u13217934@tuks.co.za,mpho.khanye94@gmail.com,mayemaruso@gmail.com,namhla.jikijela@gmail.com,u13177517772@tuks.co.za,nomly22@gmail.com,nothabisor@gmail.com,ntwebibojosi@gmail.com,nmatjadibodu@gmail.com,u13410133@tuks.co.za,nyasyb2@gmail.com,oserups@gmail.com,onesagandira@gmail.com,panashegotora@gmail.com,u11116774@tuks.co.za,epignosis.92@gmail.com,potsisomuundlela73@gmail.com,predityle@gmail.com,gibertmp@webmail.co.za,qtdioka@gmail.com,u10457365@tuks.co.za,rhee.manganyi@gmail.com,u11059584@tuks.co.za,richardlkoto11@gmail.co.za,keeyaissuf24@gmail.com,u14249601@tuks.co.za,nnguenya@gmail.com,samantha.had@yaho.co.uk,sai442351@gmail.com,sfmanganyi@gmail.com,u11265338@tuks.co.za,sifisomotha@yahoo.com,sinethemamanisi@gmail.com,siphesihlefmazibuko@gmail.com,psypho58@gmail.com,smpangane@gmail.com,taaibah.miller@icloud.com,tmalerotho@gmail.com,tuabotsui07@gmail.com,u15257020@tuks.co.za,therealmrntsaba@gmail.com,u13383567@tuks.co.za,mahlagaretshepo@gmail.com,u13200748@tuks.co.za,u13355270@tuks.co.za,vuyani.shabangu@gmail.com,yusufhassim@tuks.co.za,mgidizalisile@gmail.com");

        foreach ($emails as $key => $email) {
            $registration_successful = $register_model->bulk_emails($email);
            echo "<br/> Sent to: ".$email;
        }
        //$registration_successful = $register_model->bulk_emails("kabelokwasi@gmail.com");
    }    
    
    /*======================
    =   L - functions       =
    ========================*/
    
    /**
    * The register action, when you do register/register
    */
    function register(){
        $register_model = $this->loadModel('Register');
        $generic_model = $this->loadModel('Generic');
        $registration_successful = $register_model->registerNewUser($generic_model);
        
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
            echo "This is odd, Register Error. If the problem persists, contact support@nuvemed.com.";
        }
    }

   /**
    * The register action, when you do register/register
    */
    function update(){
        $register_model = $this->loadModel('Register');
        $generic_model = $this->loadModel('Generic');
        $registration_successful = $register_model->updateUser($generic_model);
        
        if($registration_successful === 0){
            // if account not active, go to the verification page.
            echo "Success";
        }elseif ($registration_successful == true) {
            echo "Success";
        } else {
            Session::set("value_array", $_POST);
            Session::set("error_array", Form::getErrorArray());
            //header('location: ' . URL . 'login/register');
            echo "Error";
        }
    }    
    /**
    * Register with cookie
    */
    function registerWithCookie(){
        // run the registerWithCookie() method in the register-model, put the result in $register_successful (true or false)
        $register_model = $this->loadModel('Register');
        $generic_model = $this->loadModel('Generic');
        $register_successful = $register_model->registerWithCookie($generic_model);
        
        if ($register_successful) {
            header('location: ' . URL . 'dashboard/welcome');
        } else {
            // delete the invalid cookie to prevent infinite register loops
            $register_model->deleteCookie();
            // if NO, then move user to register/index (register form) (this is a browser-redirection, not a rendered view)
            header('location: ' . URL . 'register/index');
        }
    }
}
