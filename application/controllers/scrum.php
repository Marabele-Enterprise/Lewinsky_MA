<?php

/**
 * Class Index
 * The index controller
 */
class Scrum extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
            parent::__construct();
	    $this->generic_model = $this->loadModel('Generic');
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function scrumboard($project_id)
    {
	$this->view->project =  $this->generic_model->genericGet2("Array", "project", "*", "WHERE project_id = ".$project_id);
	$this->view->render('scrum/scrumboard');
    }
    
    /**
     * Handles what happens when user moves to URL/index/services, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function projects()
    {
	$this->view->render('scrum/projects');
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
