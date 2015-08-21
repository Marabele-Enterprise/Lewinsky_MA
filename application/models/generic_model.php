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
    public function genericCreate($request)
    {
		if(isset($request["insert_type"]) AND $request["insert_type"] == "sub"){
			return $this->genericCreateSub($request);
		}

		if(isset($request["table"])){
			$table = $request["table"];
		}else{
			echo "Error: Target table is not set.";
			return false;
		}
		
		$fields = "";
		$values = "";
		$arr = array();
			
		if(isset($request["has_files"]) AND $request["has_files"] == "true" AND isset($request["file_fields"]) AND isset($request["file_dirs"])){
			//This code segment uploads the files and collect the file urls and fieldnames
			
			$file_fields = explode(" ", $request["file_fields"]);
			$file_dirs = explode(" ", $request["file_dirs"]);
			if(count($file_fields) != count($file_dirs)){
				echo "count(file_fields) != count(file_dirs) error.";
				return false;
			}
			if(isset($request['max_size'])){
				$max_size = $request['max_size'];
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

		foreach($request as $key => $value){
			if($key !== "table" AND $key !== "has_files" AND $key !== "file_fields" AND $key !== "file_dirs" AND $key !== "max_size" AND $key !== "insert_id"){
				if(is_array($request[$key])){
					//Input with Multiple Detected
					$fields .= $key.",";
					$values .= ":".$key.",";
					$arr[":".$key] = implode(",", $value);				
				}else{
					$fields .= $key.",";
					$values .= ":".$key.",";
					$arr[":".$key] = $value;	
				}
			}
		}
		$fields = rtrim($fields, ',');
		$values = rtrim($values, ',');
		
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		
		$query = $this->db->prepare($sql);
		$query->execute($arr);	
		
		if(isset($request['insert_id']) AND $request['insert_id'] == true){
        	return $this->db->lastInsertId();
        }

		return true;
    }

    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericCreateSub($request)
    {
		if(isset($request["table"]) AND isset($request["table_sub"])){
			$table1 = $request["table"];
			$table2 = $request["table_sub"];
		}else{
			echo "Error: Target table is not set.";
			return false;
		}
		
		$tbl1_fields = "";
		$tbl1_values = "";
		$tbl1_arr = array();

		$tbl2_fields = "";
		$tbl2_values = "";
		$tbl2_arr = array();
		
		if(isset($request["insert_type"]) AND $request["insert_type"] == "sub"){
			$q = $this->db->prepare("DESCRIBE ".$request["table"]);
			$q->execute();
			$table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
			//print_r($table_fields);

			foreach($request as $key => $value){
				if($key !== "insert_type" AND $key !== "fk" AND $key !== "table" AND $key !== "table_sub" AND $key !== "has_files" AND $key !== "file_fields" AND $key !== "file_dirs" AND $key !== "max_size" AND $key !== "insert_id"){
					//echo "\n Testing: ".$key;
					if (in_array($key, $table_fields))
					{
						//echo "\n ARR!: ".$key;
						$tbl1_fields .= $key.",";
						$tbl1_values .= ":".$key.",";
						$tbl1_arr[":".$key] = $value;
					}
					else
					{
						//echo "\n ARR2: ".$key;
						$tbl2_fields .= $key.",";
						$tbl2_values .= ":".$key.",";
						$tbl2_arr[":".$key] = $value;
					}					
				}				
			}
			

			$password = substr(str_shuffle($request["email"]."0123456789"), 0, 8);

			//Add Hashed Password for user from their 
	        // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character
	        // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4,
	        // by the password hashing compatibility library. the third parameter looks a little bit shitty, but that's
	        // how those PHP 5.5 functions want the parameter: as an array with, currently only used with 'cost' => XX
	        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
	        $user_password_hash = password_hash($password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

			$tbl1_fields .= "user_password_hash";
			$tbl1_values .= ":user_password_hash";
			$tbl1_arr[":user_password_hash"] = $user_password_hash;			

			$sql = "INSERT INTO $table1 ($tbl1_fields) VALUES ($tbl1_values)";
			$query = $this->db->prepare($sql);
			$query->execute($tbl1_arr);	
			$insert_id = $this->db->lastInsertId();

			$tbl2_fields .= $request["fk"];
			$tbl2_values .= ":".$request["fk"];
			$tbl2_arr[":".$request["fk"]] = $insert_id;

			// echo "\n Fields2: \n";
			// echo $tbl2_fields;
			// echo "\n Vals2: \n";
			// echo $tbl2_values;	
			// echo "\n array2: \n";
			// print_r($tbl2_arr);			

			$sql = "INSERT INTO $table2 ($tbl2_fields) VALUES ($tbl2_values)";

			//echo "\n SQL: ".$sql;

			$query = $this->db->prepare($sql);
			$query->execute($tbl2_arr);	

			$body = "Thank you ".$request["name"]." for using ".SITENAME.".";
			$body .= "\n\nYou can now login with the details below: ";
			$body .= "\n\nEmail: ".$request["email"];
			$body .= "\nPassword: ".$password;
			$body .= "\n\nYou can update your details and password in your <a href=\"http://nuvemed.com/login/index\">".SITENAME." dashboard.</a>";
			$body .= "\n\nKind Regards";
			$body .= "\n".SITENAME." Team";
			$body .= "\n"."nuvemed.com";
			//	NOW EMAIL THE NEW DETAILS TO THE USER.
			$request = array(
				'from' => "account@nuvemed.com", 
				'fromName' => SITENAME.".com",
				'subject' => "Your ".$request["user_account_type"]." account details for ".SITENAME,
				'body' => $body,
				'address' => [$request["email"]]
			);

			$this->sendEmail($request);

			if(isset($request['insert_id']) AND $request['insert_id'] == true){
	        	return $this->db->lastInsertId();
	        }

			return true;
		}
    }

    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericUpdateSub($request)
    {
		if(isset($request["table"]) AND isset($request["table_sub"])){
			$table1 = $request["table"];
			$table2 = $request["table_sub"];
		}else{
			echo "Error: Target table is not set.";
			return false;
		}
		
		$tbl1_fields = "";
		$tbl1_values = "";
		$tbl1_arr = array();

		$tbl2_fields = "";
		$tbl2_values = "";
		$tbl2_arr = array();
		
		if(isset($request["insert_type"]) AND $request["insert_type"] == "sub"){
			$q = $this->db->prepare("DESCRIBE ".$request["table"]);
			$q->execute();
			$table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
			//print_r($table_fields);

			foreach($request as $key => $value){
				if($key !== "insert_type" AND $key !== "fk" AND $key !== "table" AND $key !== "table_sub" AND $key !== "has_files" AND $key !== "file_fields" AND $key !== "file_dirs" AND $key !== "max_size" AND $key !== "insert_id"){
					//echo "\n Testing: ".$key;
					if (in_array($key, $table_fields))
					{
						//echo "\n ARR!: ".$key;
						$tbl1_fields .= $key.",";
						$tbl1_values .= ":".$key.",";
						$tbl1_arr[":".$key] = $value;
					}
					else
					{
						//echo "\n ARR2: ".$key;
						$tbl2_fields .= $key.",";
						$tbl2_values .= ":".$key.",";
						$tbl2_arr[":".$key] = $value;
					}					
				}				
			}
			

			$password = substr(str_shuffle($request["email"]."0123456789"), 0, 8);

			//Add Hashed Password for user from their 
	        // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character
	        // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4,
	        // by the password hashing compatibility library. the third parameter looks a little bit shitty, but that's
	        // how those PHP 5.5 functions want the parameter: as an array with, currently only used with 'cost' => XX
	        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
	        $user_password_hash = password_hash($password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

			$tbl1_fields .= "user_password_hash";
			$tbl1_values .= ":user_password_hash";
			$tbl1_arr[":user_password_hash"] = $user_password_hash;			

			$sql = "INSERT INTO $table1 ($tbl1_fields) VALUES ($tbl1_values)";
			$query = $this->db->prepare($sql);
			$query->execute($tbl1_arr);	
			$insert_id = $this->db->lastInsertId();

			$tbl2_fields .= $request["fk"];
			$tbl2_values .= ":".$request["fk"];
			$tbl2_arr[":".$request["fk"]] = $insert_id;

			// echo "\n Fields2: \n";
			// echo $tbl2_fields;
			// echo "\n Vals2: \n";
			// echo $tbl2_values;	
			// echo "\n array2: \n";
			// print_r($tbl2_arr);			

			$sql = "INSERT INTO $table2 ($tbl2_fields) VALUES ($tbl2_values)";

			//echo "\n SQL: ".$sql;

			$query = $this->db->prepare($sql);
			$query->execute($tbl2_arr);	

			$body = "Thank you ".$request["name"]." for using ".SITENAME.".";
			$body .= "\n\nYou can now login with the details below: ";
			$body .= "\n\nEmail: ".$request["email"];
			$body .= "\nPassword: ".$password;
			$body .= "\n\nYou can update your details and password in your <a href=\"http://nuvemed.com/login/index\">".SITENAME." dashboard.</a>";
			$body .= "\n\nKind Regards";
			$body .= "\n".SITENAME." Team";
			$body .= "\n"."nuvemed.com";
			//	NOW EMAIL THE NEW DETAILS TO THE USER.
			$request = array(
				'from' => "account@nuvemed.com", 
				'fromName' => SITENAME.".com",
				'subject' => "Your ".$request["user_account_type"]." account details for ".SITENAME,
				'body' => $body,
				'address' => [$request["email"]]
			);

			$this->sendEmail($request);

			if(isset($request['insert_id']) AND $request['insert_id'] == true){
	        	return $this->db->lastInsertId();
	        }

			return true;
		}
    }    
    
    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function genericUpdate()
    {
		if(isset($request["insert_type"]) AND $request["insert_type"] == "sub"){
			return $this->genericUpdate($request);
		}

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
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function insertExcel($items)
    {
    	if($items["table"] == "medical_aid"){
    		return $this->insertExcelMedAids($items);
    	}

		echo "<pre>";
		$data = json_decode($items["data"], true);
		foreach ($data as $key => $page) {
			# code...
			foreach ($page as $key_sub => $row) {
				# code...
				echo "************************** INSERT SUCCESS **********************";
				print_r($row);
				$sql = "INSERT INTO ".PREFIX."tariff_code (description, procedure_code, practice_type, rcf, dh_rate, units, created_with) 
						VALUES (:description, :procedure_code, :practice_type, :rcf, :dh_rate, :units, :created_with)";
				
				$query = $this->db->prepare($sql);
				$query->execute(array(':description' => $row['Procedure Description'], ':procedure_code' => (isset($row['Procedure Code']) ? $row['Procedure Code'] : 0), ':practice_type' => (isset($row['Practice Type']) ? $row['Practice Type'] : 0),
				':rcf' => (isset($row['RCF']) ? $row['RCF'] : -1.00), ':dh_rate' => (isset($row['DH Rate']) ? $row['DH Rate']: 0),
				':units' => (isset($row['Units']) ? $row['Units'] : 0), ':created_with' => "excel"));	
				
			}
			
			echo "=================== you are awsome, you are gonna make it =================";
		}

		echo "</pre>";

		return true;
    }

        /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function insertExcelMedAids($items)
    {
		echo "<pre>";
		$data = json_decode($items["data"], true);
		foreach ($data as $key => $page) {
			# code...
			foreach ($page as $key_sub => $row) {
				# code...
				echo "************************** INSERT SUCCESS **********************";
				print_r($row);
				$sql = "INSERT INTO ".PREFIX."medical_aid (name, registration_date, type, phone, upload_type) 
						VALUES (:name, :registration_date, :type, :phone, :upload_type)";
				
				$query = $this->db->prepare($sql);
				$query->execute(
				array(
					':name' => $row['Scheme Name'], 
					':registration_date' => (isset($row['Registration Date']) ? $row['Registration Date'] : "Unknown"),
					':type' => (isset($row['Type']) ? $row['Type'] : 0),
					':phone' => (isset($row['Telephone']) ? $row['Telephone'] : "none"),
					':upload_type' => "excel"));	
			}
			
			echo "=================== you are awsome, you are gonna make it =================";
		}

		echo "</pre>";

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

    /**
     * send the password reset mail
     * @param array $request username
     * @return array $response
     */
    public function sendEmail($request)
    {
        // create PHPMailer object here. This is easily possible as we auto-load the according class(es) via composer
        $mail = new PHPMailer;

        // please look into the config/config.php for much more info on how to use this!
        if (EMAIL_USE_SMTP) {
            // Set mailer to use SMTP
            $mail->IsSMTP();
            //useful for debugging, shows full SMTP errors, config this in config/config.php
            $mail->SMTPDebug = PHPMAILER_DEBUG_MODE;
            // Enable SMTP authentication
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            // Enable encryption, usually SSL/TLS
            if (defined('EMAIL_SMTP_ENCRYPTION')) {
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            // Specify host server
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }

        // build the email
        foreach ($request["address"] as $key => $address) {
        	$mail->AddAddress($address);
        }

        $mail->From = $request["from"];
        $mail->FromName = $request["fromName"];
        $mail->Subject = $request["subject"];//EMAIL_PASSWORD_RESET_SUBJECT;
       	//$link = EMAIL_PASSWORD_RESET_URL . '/' . urlencode($user_name) . '/' . urlencode($user_password_reset_hash);
        $mail->Body = $request["body"];

        // send the mail
        if($mail->Send()) {
            $_SESSION["feedback_positive"][] = FEEDBACK_PASSWORD_RESET_MAIL_SENDING_SUCCESSFUL;
            return true;
        } else {
            echo FEEDBACK_PASSWORD_RESET_MAIL_SENDING_ERROR . $mail->ErrorInfo;
            return false;
        }
    }	
}