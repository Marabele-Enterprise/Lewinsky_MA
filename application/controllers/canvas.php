<?php

/**
 * Class Canvas
 * The canvas controller. Here we create, read, update and delete (CRUD) example data.
 */
class Canvas extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
     private $canvas_model;
     
    public function __construct()
    {
	// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
	
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        //Auth::handleLogin();
        $this->canvas_model = $this->loadModel('Canvas');
    }

    /**
     * This method controls what happens when you move to /canvas/index in your app.
     * Gets all canvass (of the user).
     */
    public function index()
    {
        $this->view->render('canvas/index');
    }

    /**
     * This method controls what happens when you move to /canvas/index in your app.
     * Gets all canvass (of the user).
     */
    public function canvas()
    {
        if(isset($_POST['canvas_id'])){
            $generic_model = $this->loadModel('Generic');
            
            $genericGetRequest = array('table' => PREFIX."canvas", 'fields' => "*", 'where' => "canvas_id = ".$_POST['canvas_id'], 'returnType' => "array");
            $this->view->canvas_details = $generic_model->genericGetPhp($genericGetRequest);

            $genericGetRequest = array('table' => PREFIX."canvas_version", 'fields' => "*", 'where' => "canvas_id = ".$_POST['canvas_id'], 'order' => "canvas_version_id Desc" , 'returnType' => "array");
            $this->view->canvas_versions = $generic_model->genericGetPhp($genericGetRequest);

            $this->view->render('canvas/canvas');
        }else{
            echo "<h1>You are accessing this page without a canvas_id</h1>";
        }
    }    

    /**
     * This method controls what happens when you move to /canvas/index in your app.
     * Gets all canvass (of the user).
     */
    public function canvas_manager()
    {
        $this->view->render('canvas/canvas_manager');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new canvas. This is usually the target of form submit actions.
     */
    public function create()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this canvas-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        $this->canvas_model->create();
    }
    
    /**
     * This method controls what happens when you move to /dashboard/addCanvass in your app.
     * Creates a new canvass. This is usually the target of form submit actions that post the data as json.
     */
    public function addCanvas()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this canvas-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        $this->canvas_model->addCanvass();
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new canvas. This is usually the target of form submit actions.
    */
    public function createCanvas()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this canvas-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if($this->canvas_model->createCanvas()){
            echo "Success";
        }else{
            echo "Error";
        }
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new canvas. This is usually the target of form submit actions.
    */
    public function createHypothesis()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this canvas-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if($this->canvas_model->createHypothesis()){
            echo "Success";
        }else{
            echo "Error";
        }        
    }

    /**
     * This method controls what happens when you move to /dashboard/createCanvasVersion in your app.
     * Creates a new canvas version. This is usually the target of form submit actions.
    */
    public function createCanvasVersion()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this canvas-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if($this->canvas_model->createCanvasVersion($_POST)){
            echo "Success";
        }else{
            echo "Error";
        }
    }


}
