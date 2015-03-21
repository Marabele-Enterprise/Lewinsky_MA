<?php

/**
 * GenericModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class GenericModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    
    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericCreate()
    {
		if(isset($_POST["table"])){
			$table = $_POST["table"];
		}else{
			echo "Error: Target table is not set.";
			return false;
		}
		
		$fields = "";
		$values = "";
		$arr = array();
			
		if(isset($_POST["has_files"]) AND $_POST["has_files"] == "true" AND isset($_POST["file_fields"]) AND isset($_POST["file_dirs"])){
			//This code segment uploads the files and collect the file urls and fieldnames
			
			$file_fields = explode(" ", $_POST["file_fields"]);
			$file_dirs = explode(" ", $_POST["file_dirs"]);
			if(count($file_fields) != count($file_dirs)){
				echo "count(file_fields) != count(file_dirs) error.";
				return false;
			}
			if(isset($_POST['max_size'])){
				$max_size = $_POST['max_size'];
			}else{
				$max_size = '666662048000';
			}
			
			$messeges = $this->uploadFiles($file_fields, $file_dirs, $max_size);
			
			foreach($messeges as $msg){
				if($msg["status"] == "error"){
					//print_r($msg);
					echo $msg["msg"][0];
					return false;
				}else{
					print_r($msg);
					
					$fields_url = explode(" ", $msg["fields-url"][0]);
					
					$fields .= $fields_url[0].",";
					$values .= ":".$fields_url[0].",";
					$arr[":".$fields_url[0]] = $fields_url[1];
					
					//echo "<br/>fields: $fields ---- vals: $values <br/>";
				}
			}
		}
		
		foreach($_POST as $key => $value){
			if($key !== "table" AND $key !== "has_files" AND $key !== "file_fields" AND $key !== "file_dirs" AND $key !== "max_size"){
				$fields .= $key.",";
				$values .= ":".$key.",";
				$arr[":".$key] = $value;
			}
		}
		$fields = rtrim($fields, ',');
		$values = rtrim($values, ',');
		
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		
		$query = $this->db->prepare($sql);
		$query->execute($arr);	
		
		return true;
    }
    
    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericUpdate()
    {
		if(isset($_POST["table"])){
			$table = $_POST["table"];
		}else{
			return false;
		}
		
		if(isset($_POST["where"])){
			$where = "WHERE ".$_POST["where"];
		}else{
			return false;
		}
		
		$values = "";
		$arr = array();
		foreach($_POST as $key => $value){
			if($key !== "table" AND $key !== "where"){
				$values .= $key." = :".$key.",";
				$arr[":".$key] = $value;
			}
		}
		$values = rtrim($values, ',');
		
		$sql = "UPDATE $table SET $values $where";

	        $query = $this->db->prepare($sql);
	        $query->execute($arr);
		
		return true;
    }     

    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericDelete()
    {
		if(isset($_POST["table"])){
			$table = $_POST["table"];
		}else{
			return false;
		}
		
		if(isset($_POST["where"])){
			$where = "WHERE ".$_POST["where"];
		}else{
			return false;
		}
		
		if(isset($_POST["delete_files"])){
			$file_fields = explode(' ', $_POST["delete_files"]);
			$sql = "SELECT * FROM $table $where";
			$query = $this->db->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			
			foreach($file_fields as $field){
				$file =  $result[0]->$field;
				
				if(substr($file, 0, 4) == "http"){
					$startPos = $this->strposX($file, "/", 4);
					$file = ".".substr($file, $startPos);
				}
				
				if (!unlink($file))
				{
					echo ("Error deleting ".$file);
				}
				else
				{
					echo ("Deleted $file".$file);
				}
			}
		}else{
		}
		
		$values = "";
		$arr = array();
		foreach($_POST as $key => $value){
			if($key !== "table" AND $key !== "where"){
				$values .= $key." = :".$key.",";
				$arr[":".$key] = $value;
			}
		}
		$values = rtrim($values, ',');
		
		$sql = "DELETE FROM $table $where";

        $query = $this->db->prepare($sql);
        $query->execute($arr);
	
		return true;
    }     

    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericGet($returnType = null)
    {
		if(isset($_POST['table'])){
			$table = $_POST['table'];
		}else{
			return;
		}
		
		if(isset($_POST['where'])){
			$where = "WHERE ".$_POST['where'];
		}else{
			$where = "";
		}
		
		if(isset($_POST['order'])){
			$order = "ORDER BY ".$_POST['order'];
		}else{
			$order = "";
		}
		
		if(isset($_POST['extra'])){
			$extra = $_POST['extra'];
		}else{
			$extra = "";
		}
		
		if(isset($_POST['fields'])){
			$fields = $_POST['fields'];
		}else{
			$fields = "*";
		}
		
        $sql = "SELECT $fields FROM $table $where $order $extra";
        $query = $this->db->prepare($sql);
        $query->execute();
		$result = $query->fetchAll();
		
		if(count($result) <= 0){
			return "empty";
		}
		
		if($table == "users" || strpos($table,'users') !== false){
			$i = 0;
			foreach($result as $key => $user){
				$result[$i]->avatar = $this->getUserAvatarFilePath($user->user_id);
				$i++;
			}
		}
		
		if($returnType == "json"){
			return json_encode($result);
		}else{
			return $result;
		}
    }
    
    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericGetPhp($genericGetRequest)//$returnType, $table, $fields, $where = "", $order = "", $extra = "")
    {
		if(isset($genericGetRequest['table'])){
			$table = $genericGetRequest['table'];
		}else{
			return;
		}
		
		if(isset($genericGetRequest['where'])){
			$where = "WHERE ".$genericGetRequest['where'];
		}else{
			$where = "";
		}
		
		if(isset($genericGetRequest['order'])){
			$order = "ORDER BY ".$genericGetRequest['order'];
		}else{
			$order = "";
		}
		
		if(isset($genericGetRequest['extra'])){
			$extra = $genericGetRequest['extra'];
		}else{
			$extra = "";
		}
		
		if(isset($genericGetRequest['fields'])){
			$fields = $genericGetRequest['fields'];
		}else{
			$fields = "*";
		}

        $sql = "SELECT $fields FROM ".$table." ".$where." ".$order." ".$extra;

        $query = $this->db->prepare($sql);
        $query->execute();
		$result = $query->fetchAll();
		
		if($genericGetRequest["returnType"] == "json"){
			return json_encode($result);
		}else{
			return $result;
		}
    }

    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function logAction()
    {
		if(isset($_POST["action"])){
			$action = $_POST["action"];
		}else{
			return false;
		}
		
		if(isset($_POST["category"])){
			$category = $_POST["category"];
		}else{
			return false;
		}
		
		if(isset($_POST["test_label"])){
			$test_label = $_POST["test_label"];
		}else{
			return false;
		}		
		
		//Get the user id
		if(null !== Session::get("user_id")){
			$user_id = Session::get("user_id");
		}else{
			$user_id = -1;
		}

		//Get the user ip
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $user_ip = $_SERVER['REMOTE_ADDR'];
		}		

		$sql = "INSERT INTO ".PREFIX."action_log (action, category, user_id, user_ip, session_id, test_label) 
				VALUES (:action, :category, :user_id, :user_ip, :session_id, :test_label)";
		
		$query = $this->db->prepare($sql);
		$query->execute(array(':action' => $action, ':category' => $category, ':session_id' => Session::get('session_id'),
			':user_id' => $user_id, ':user_ip' => $user_ip, ':test_label' => $test_label));	

		return true;
    }     
    
        /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function logActionPHP($action, $category, $test_label)
    {
		//Get the user id
		if(null !== Session::get("user_id")){
			$user_id = Session::get("user_id");
		}else{
			$user_id = -1;
		}

		//Get the user ip
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $user_ip = $_SERVER['REMOTE_ADDR'];
		}		

		$sql = "INSERT INTO ".PREFIX."action_log (action, category, user_id, user_ip, session_id, test_label) 
				VALUES (:action, :category, :user_id, :user_ip, :session_id, :test_label)";
		
		$query = $this->db->prepare($sql);
		$query->execute(array(':action' => $action, ':category' => $category, ':session_id' => Session::get('session_id'),
			':user_id' => $user_id, ':user_ip' => $user_ip, ':test_label' => $test_label));	

		return true;
    }

    /**
     * Gets the user's avatar file path
     * @return string avatar picture path
     */
    public function getUserAvatarFilePath($user_id)
    {
        $query = $this->db->prepare("SELECT user_has_avatar FROM users WHERE user_id = :user_id");
        $query->execute(array(':user_id' => $user_id));

        if ($query->fetch()->user_has_avatar) {
            return URL . AVATAR_PATH . $user_id . '.jpg';
        } else {
            return URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE;
        }
    }
    
    public function uploadFiles($file_fields, $file_dirs, $max_file_size)
    {
	error_reporting(E_ALL);
	
	$messages = array();
	
	for($k = 0; $k < count($file_fields); $k++){
		/*** the upload directory ***/
		$upload_dir= $file_dirs[$k];

		/*** the maximum filesize from php.ini ***/
		$ini_max = str_replace('M', '', ini_get('upload_max_filesize'));
		$upload_max = $ini_max * 1024;

		/*** an array to hold messages ***/
		$messages[$k]['msg'] = array();

		/*** check if a file has been submitted ***/
		if(isset($_FILES[$file_fields[$k]]['tmp_name']))
		{
			/** loop through the array of files ***/
			for($i=0; $i < count($_FILES[$file_fields[$k]]['tmp_name']);$i++)
			{
				// check if there is a file in the array
				if(!is_uploaded_file($_FILES[$file_fields[$k]]['tmp_name'][$i]))
				{
					$messages[$k]['msg'][] = 'No file uploaded for '.$file_fields[$k];
					$messages[$k]['status'][] = "error";
				}
				/*** check if the file is less then the max php.ini size 
				elseif($_FILES[$file_fields[$k]]['size'][$i] > $upload_max)
				{
					$messages[$k]['msg'][] = "File size exceeds $upload_max php.ini limit";
					$messages[$k]['status'][] = "error";
				}
				// check the file is less than the maximum file size
				elseif($_FILES[$file_fields[$k]]['size'][$i] > $max_file_size)
				{
					$messages[$k]['msg'][] = "File size exceeds $max_file_size limit";
					$messages[$k]['status'][] = "error";
				}***/
				else
				{
					$fname = $_FILES[$file_fields[$k]]['name'][$i];
					
					$fileExtension = '.'.substr($fname, strrpos($fname, ".") + 1);
					$fileurl = $upload_dir.uniqid().$fileExtension;
					
					//echo $_FILES[$file_fields[$k]]['name'][$i]." <-- .wtf \n (+_+) ".$fileurl." (*_*) \n ";
					
					// copy the file to the specified dir 
					if(@copy($_FILES[$file_fields[$k]]['tmp_name'][$i], "./".$fileurl))
					{
						/*** give praise and thanks to the php gods :D  ***/
						$messages[$k]['msg'][] = $_FILES[$file_fields[$k]]['name'][$i].' uploaded renamed to: '.$fileurl;
						$messages[$k]['status'][] = "success";
						$messages[$k]['fields-url'][] = $file_fields[$k]." ".URL.$fileurl;
					}
					else{
						/*** an error message ***/
						$messages[$k]['msg'][] = 'Uploading '.$_FILES[$file_fields[$k]]['name'][$i].' Failed';
						$messages[$k]['status'] = "error";
						$messages[$k]['fields-url'][] = "error-field";
					}
				}
			}
		}
	}
	return $messages;
   }
	   
	/**
	 * Find the position of the Xth occurrence of a substring in a string
	 * @param $haystack
	 * @param $needle
	 * @param $number integer > 0
	 * @return int
	 */
	public function strposX($haystack, $needle, $number){
	    if($number == '1'){
		return strpos($haystack, $needle);
	    }elseif($number > '1'){
		return strpos($haystack, $needle, $this->strposX($haystack, $needle, $number - 1) + strlen($needle));
	    }else{
		return error_log('Error: Value for parameter $number is out of range');
	    }
	}
}