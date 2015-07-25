<?php

/**
 * Class Pages
 * The index controller
 */
class Pages extends Controller
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
    function home()
    {
    	//Session::set('session_id', $this->generateRandomString(15));
    	
    	$this->view->render('pages/home');
    }

}
