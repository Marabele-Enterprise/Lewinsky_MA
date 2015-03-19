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
            parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
	    $this->view->render('index/index');
        Session::init();
        Session::set('session_id', $this->generateRandomString(15));
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
    function services()
    {
	$this->view->render('index/services');
    }

    /**
     * Handles what happens when user moves to URL/index/portfolio, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function portfolio()
    {
	$this->view->render('index/portfolio');
    }
    
    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function blog()
    {
	$this->view->render('blog/blog');
    }

    /**
     * Handles what happens when user moves to URL/index/contact, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function contact()
    {
	$this->view->render('index/contact');
    }
}
