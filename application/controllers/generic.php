<?php

// load htnl dom
require 'application/libs/simple_html_dom.php';

/**
 * Class Generic
 * The generic controller. Here we create, read, update and delete (CRUD) example data.
 */
class Generic extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
     private $generic_model;
     
    public function __construct()
    {
	// Auth::handleLogin() makes sure that only logged in users can use this action/method and see that page
        Auth::handleLogin();
	
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        //   Auth::handleLogin();
    	$this->generic_model = $this->loadModel('Generic');
    }

    /**
     * This method controls what happens when you move to /generic/index in your app.
     * Gets all generics (of the user).
     */
    public function index()
    {
        $this->view->generics = $this->generic_model->getAllGenerics();
        $this->view->render('generic/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new generic. This is usually the target of form submit actions.
     */
    public function genericCreate()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this generic-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
	
    	if($this->generic_model->genericCreate($_POST)){
    		echo 'Success';
    	}else{
    		echo "Generic create error. Please make sure the post data matches the fields in the db";
    	}
    }
    
    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new generic. This is usually the target of form submit actions.
     */
    public function genericUpdate()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this generic-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
	
	if($this->generic_model->genericUpdate()){
		echo 'Success';
	}else{
		echo "Generic update error. Please make sure the post data matches the fields in the db";
	}
    }    
        /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new generic. This is usually the target of form submit actions.
     */
    public function genericDelete()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this generic-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
    
        if($this->generic_model->genericDelete()){
            echo 'Success';
        }else{
            echo "Generic delete error. Please make sure the post data matches the fields in the db";
        }
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new generic. This is usually the target of form submit actions.
     */
    public function insertExcel()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this generic-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
    
        if($this->generic_model->insertExcel($_POST)){
            echo 'Success';
        }else{
            echo "Generic insertExcel error. Please make sure the post data matches the fields in the db";
        }
    }        
    
    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new generic. This is usually the target of form submit actions.
     */
    public function logAction()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this generic-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
    
        if($this->generic_model->logAction()){
            echo 'Success';
        }else{
            echo "Generic logAction error. Please make sure the post data matches the fields in the db";
        }
    }
    
    /**
     * This method controls what happens when you move to /artzone/genericGet in your app.
     */
    function genericGet($type)
    {
    	$data =  $this->generic_model->genericGet('array');
    	
    	if($data  == "empty"){
    		echo $data;
    		return;
    	}
    	
    	if($type == 'buildview'){
    		echo $this->buildView2($data, $_POST['containerDesign']);
    	}else{
    		echo json_encode($data);
    	}
    }
    
    /**
     * This method controls what happens when you move to /artzone/index in your app.
     */
    function buildView($data, $design)
    {
    	$res = $design;
    	$result = "";
    	foreach($data as $row){
    		foreach($row as $key => $val){
    			$res = str_replace("--".$key, $val, $res);
    			
    			//while(true){
    				preg_match("/(?<=data-condition-$key )\S+/i", $res, $match);
    			
    				/* Uncomment this to debug the condition parameter of the builder 	
    				echo "<h1>Match data-condition-$key: ";
    				print_r($match); 
    				echo "</h1>";*/
    				if(isset($match[0])){
    					$condition_str = $match[0];
    					$condition_str = rtrim ($condition_str, '"');
    					$val = (string)$val;
    					if($condition_str[0] == '!'){
    						$condition_str = ltrim ($condition_str, '!');
    						if($val != $condition_str){
    						}else{
    							$res = str_replace("data-condition-".$key, "display: none;", $res);
    						}
    					}else{
    						if($val != $condition_str){
    							$res = str_replace("data-condition-".$key, "display: none;", $res);
    						}else{
    						}
    					}
    				}
    			//}
    		}
    		$result .= $res;
    		$res = $design;
    	}	
    	
    	return $result;
    }

    /**
     * This method controls what happens when you move to /artzone/index in your app.
     */
    function buildView2($data, $design)
    {
        $originalDesign = $design;
        $result = "";

        foreach($data as $row){
            $html = str_get_html($design);
            foreach($row as $key => $val){
                foreach ($html->find('.generic') as $index => $element) {
                    if($element->hasAttribute("data-field") AND $element->hasAttribute("data-set")){
                        if($element->getAttribute("data-field") == $key){
                            $element->{$element->getAttribute("data-set")} .= $val;
                        }
                    }
                }
                
            }
            $result .= $html->save();
        }
                
        return $result;
    }    

}
