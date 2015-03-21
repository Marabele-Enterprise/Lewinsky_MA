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
}
