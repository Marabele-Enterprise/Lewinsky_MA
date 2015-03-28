<?php

/**
 * CanvasModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class CanvasModel
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
     * Setter for a product (create)
     * @param string $product_text product text that will be created
     * @return bool feedback (was the product created properly ?)
     */
    public function createCanvas()
    {
    	//Create team for canvas
		$sql = "INSERT INTO ".PREFIX."team (creator_id) 
		VALUES (:creator_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':creator_id' => $_POST["user_id"]));

		$team_id = $this->db->lastInsertId();
		echo $_POST["canvas_type"];
		$sql = "INSERT INTO ".PREFIX."canvas (title, canvas_type, user_id, team_id) 
		VALUES (:title, :canvas_type, :user_id, :team_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':title' => $_POST["title"], ':canvas_type' => $_POST["canvas_type"], ':user_id' => $_POST["user_id"], ':team_id' => $team_id));

		$canvas_id = $this->db->lastInsertId();

		$sql = "INSERT INTO ".PREFIX."canvas_version (canvas_id, canvas_version) 
		VALUES (:canvas_id, :canvas_version)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':canvas_id' => $canvas_id, ':canvas_version' => 1));

		$count =  $query->rowCount();
		if ($count == 1) {
			return true;
		}else {
		    echo "canvas_version insert error. ".FEEDBACK_NOTE_CREATION_FAILED;
		}
        // default return
        return false;
    }

    /**
     * Setter for a product (create)
     * @param string $product_text product text that will be created
     * @return bool feedback (was the product created properly ?)
     */
    public function createHypothesis()
    {
		$sql = "INSERT INTO ".PREFIX."hypothesis (hypothesis, category, canvas_id, user_id) 
		VALUES (:hypothesis, :category, :canvas_id, :user_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':hypothesis' => $_POST["hypothesis"], ':category' => $_POST["category"], 
			':canvas_id' => $_POST["canvas_id"], ':user_id' => $_POST["user_id"]));

		$hypothesis_id = $this->db->lastInsertId();

		$sql = "INSERT INTO ".PREFIX."hypothesis_version (hypothesis_id, canvas_id, canvas_version_id) 
		VALUES (:hypothesis_id, :canvas_id, :canvas_version_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':hypothesis_id' => $hypothesis_id, ':canvas_id' => $_POST["canvas_id"], ':canvas_version_id' => $_POST["canvas_version_id"]));

		$count =  $query->rowCount();
		if ($count == 1) {
			return true;
		}else {
		    echo "hypothesis_version insert error. ".FEEDBACK_NOTE_CREATION_FAILED;
		}
        // default return
        return false;
    }

    /**
     * Creates a new canvas version if there is activity on the previous version
     * @param string $product_text product text that will be created
     * @return bool feedback (was the product created properly ?)
     */
    public function createCanvasVersion($createRequest)
    {
		//print_r($createRequest);

		$sql = "INSERT INTO ".PREFIX."canvas_version (canvas_id, canvas_version) 
		VALUES (:canvas_id, :canvas_version)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':canvas_id' => $createRequest['canvas_id'], ':canvas_version' => $createRequest['canvas_version'] + 1));
		

		$count =  $query->rowCount();
		if ($count == 1) {
			
		}else {
		    echo "canvas_version insert error. ".FEEDBACK_NOTE_CREATION_FAILED;
		}

		$canvas_version_id = $this->db->lastInsertId();

		$sql = "SELECT * FROM ".PREFIX."hypothesis_version WHERE canvas_version_id = :canvas_version_id AND canvas_id = :canvas_id";
		$query = $this->db->prepare($sql);
	    $query->execute(array(':canvas_version_id' => $createRequest['canvas_version_id'], ':canvas_id' => $createRequest['canvas_id']));
		$result = $query->fetchAll();

		//echo "Gonna re-create these hypothesis_versions \n ";
		
		//print_r($result);

		foreach($result as $row){
			$sql = "INSERT INTO ".PREFIX."hypothesis_version (hypothesis_id, canvas_id, status, canvas_version_id) 
			VALUES (:hypothesis_id, :canvas_id, :status, :canvas_version_id)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':hypothesis_id' => $row->hypothesis_id, ':canvas_id' => $row->canvas_id, ':status' => $row->status,':canvas_version_id' => $canvas_version_id));
		}

        // default return

		/*
		$sql = "INSERT INTO ".PREFIX."hypothesis (hypothesis, category, canvas_id, user_id) 
		VALUES (:hypothesis, :category, :canvas_id, :user_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':hypothesis' => $_POST["hypothesis"], ':category' => $_POST["category"], 
			':canvas_id' => $_POST["canvas_id"], ':user_id' => $_POST["user_id"]));

		$hypothesis_id = $this->db->lastInsertId();

		$sql = "INSERT INTO ".PREFIX."hypothesis_version (hypothesis_id, canvas_version_id) 
		VALUES (:hypothesis_id, :canvas_version_id)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':hypothesis_id' => $hypothesis_id, ':canvas_version_id' => $_POST["canvas_version_id"]));

		$count =  $query->rowCount();
		if ($count == 1) {
			return true;
		}else {
		    echo "hypothesis_version insert error. ".FEEDBACK_NOTE_CREATION_FAILED;
		}
        // default return
        */
        return true;

    }
        
    public function UploadFiles(&$file,$fPath)
    {
	$result = 1;
	
	if(isset($_FILES["file"])){ //processes the file that was uploaded
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$i = 0;
		/*Upload file, assign it a name, check to see if its a valid format and move it to the designated folder*/
		for($i = 0; $i < 1; $i++){
		
			$temp = explode(".", $_FILES["file"]["name"][$i]);
			$extension = end($temp);
			/*
			if ((($_FILES["file"]["type"][$i] == "image/gif")
			|| ($_FILES["file"]["type"][$i] == "image/jpeg")
			|| ($_FILES["file"]["type"][$i] == "image/jpg")
			|| ($_FILES["file"]["type"][$i] == "image/pjpeg")
			|| ($_FILES["file"]["type"][$i] == "image/x-png")
			|| ($_FILES["file"]["type"][$i] == "image/png"))
			&& ($_FILES["file"]["size"][$i] < 80000) && in_array($extension, $allowedExts)) 
			{*/
				$ext = substr(strrchr($_FILES['file']['name'][$i], "."), 1);
			
				$name =  substr($_FILES['file']['name'][$i], 0);
				
				$name =  current(explode(".", $name));
				
				$name = strip_tags($name);
				
				//generate a random file name to avoid name confilct
				$name = md5(rand() * time()).$name;
				
				$field = $name;
				if(!$field || strlen($field = trim($field)) == 0){
					echo "File not selected";
					return false;
				}
				
				if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $fPath.$name.'.'.$ext)){
					//echo '<p> The file "'.$_FILES["file"]["name"][$i].'" has been successfully uploaded. Click <a target="_blank" href="'.$fPath. $name .'.'. $ext.'">here</a> to view. </p>';
					//echo "WTFKS1".$i);
					//return false;
					$file = $fPath.$name.'.'.$ext;
				}else{
					
					//return false;
					switch ($_FILES['file'][$i]['error']){  
						case 1:
							echo '<p> The file "'.$_FILES["file"]["name"][$i].'" is bigger than this PHP installation allows, please try <a href="Register.php">again.</a></p>';
							return false;
						case 2:
							echo '<p> The file "'.$_FILES["file"]["name"][$i].'" is bigger than this form allows, please try <a href="./Register.php">again.</a></p>';
							return false;
						case 3:
							echo '<p> Only part of the file "'.$_FILES["file"]["name"][$i].'" was uploaded. Please try <a href="./Register.php">again.</a></p>';
							return false;
					}
				}
			//}
		}
		if($i == 0){
			echo "No photos where selected.";		
			return false;
		}
	}
	
	return true;
    }    
}
