<?php

/**
 * Class Error
 * This controller simply shows a page that will be displayed when a controller/method is not found.
 * Simple 404 handling.
 */
class Error extends Controller
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
     * This method controls what happens / what the user sees when an error happens (404)
     */
    function index()
    {
        $this->view->render('error/index');
    }
}
