<?php

/**
* ProfileModel
* Handles users profile data
*/

require 'application/libs/vendor/autoload.php';

class ProfileModel{
	/**
	* Constructor, expects a Database connection
	* @param Database $db The Database object
	*/
	public function __construct(Database $db){
		$this->db = $db;
	}

	public function viewPDF(){	
		// Parse pdf file and build necessary objects.
		$parser = new \Smalot\PdfParser\Parser();
		$pdf    = $parser->parseFile(URL.'/public/tariffs/document.pdf');
		 
		$text = $pdf->getText();
		echo $text;
	}

	/**
	* Get a user's profile details, according to the given $user_id
	* @param int $user_id The user's id
	* @return object/null The selected user's profile data
	*/
	public function getUserProfile($user_id){
		$sql = "SELECT user_fname, user_surname, user_id, user_name, user_email, user_active, user_has_avatar
                FROM users WHERE user_id = :user_id";
		$sth = $this->db->prepare($sql);
		$sth->execute(array(':user_id' => $user_id));
		
		$user = $sth->fetch();
		$count =  $sth->rowCount();

		if ($count == 1) {
		    if (USE_GRAVATAR) {
			$user->user_avatar_link = $this->getGravatarLinkFromEmail($user->user_email);
		    } else {
			$user->user_avatar_link = $this->getUserAvatarLocalFilePath($user->user_has_avatar, $user->user_id);
		    }
		} else {
		    $_SESSION["feedback_negative"][] = FEEDBACK_USER_DOES_NOT_EXIST;
		}

		return $user;
	}
	
	/**
	* Get Store details, according to the given $user_id
	* @param int $user_id The user's id
	* @return object/null The selected user's store details
	*/
	public function getUserStoreDetails($user_id){
		$sql = "SELECT * FROM store_details WHERE store_user = :user_id";
		$sth = $this->db->prepare($sql);
		$sth->execute(array(':user_id' => $user_id));
		
		$store = $sth->fetch();
		$count =  $sth->rowCount();

		if($count == 0){
		    $_SESSION["feedback_negative"][] = FEEDBACK_USER_DOES_NOT_EXIST;
		}

		return $store;
	}
	
	/**
	* Gets a gravatar image link from given email address
	*
	* Gravatar is the #1 (free) provider for email address based global avatar hosting.
	* The URL (or image) returns always a .jpg file !
	* For deeper info on the different parameter possibilities:
	* @see http://gravatar.com/site/implement/images/
	* @source http://gravatar.com/site/implement/images/php/
	*
	* This method will return in something like
	* http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=80&d=mm&r=g
	* Note: the url does NOT have something like ".jpg" ! It works without.
	*
	* @param string $email The email address
	* @param int|string $s Size in pixels, defaults to 50px [ 1 - 2048 ]
	* @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	* @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	* @param array $options Optional, additional key/value attributes to include in the IMG tag
	* @return string
	*/
	public function getGravatarLinkFromEmail($email, $s = AVATAR_SIZE, $d = 'mm', $r = 'pg', $options = array()){
		$gravatar_image_link = 'http://www.gravatar.com/avatar/';
		$gravatar_image_link .= md5( strtolower( trim( $email ) ) );
		$gravatar_image_link .= "?s=$s&d=$d&r=$r";
		
		return $gravatar_image_link;
	}

	/**
	* Gets the user's avatar file path
	* @param int $user_has_avatar Marker from database
	* @param int $user_id User's id
	* @return string/null Avatar file path
	*/
	public function getUserAvatarLocalFilePath($user_has_avatar, $user_id){
		if ($user_has_avatar) {
			return URL . AVATAR_PATH . $user_id . '.jpg';
		} else {
			return URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE;
		}
		// default return
		return null;
	}
	
	/**
	* Gets the user's avatar file path
	* @return string avatar picture path
	*/
	public function getUserAvatarFilePath(){
		$query = $this->db->prepare("SELECT user_has_avatar FROM users WHERE user_id = :user_id");
		$query->execute(array(':user_id' => $_SESSION['user_id']));
		
		if ($query->fetch()->user_has_avatar) {
			return URL . AVATAR_PATH . $_SESSION['user_id'] . '.jpg';
		} else {
			return URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE;
		}
	}
	
	/**
	* Create an avatar picture (and checks all necessary things too)
	* @return bool success status
	*/
	public function createAvatar(){
		if (!is_dir(AVATAR_PATH) OR !is_writable(AVATAR_PATH)) {
			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE;
			return false;
		}
		
		if (!isset($_FILES['avatar_file']) OR empty ($_FILES['avatar_file']['tmp_name'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED;
			return false;
		}

		// get the image width, height and mime type
		$image_proportions = getimagesize($_FILES['avatar_file']['tmp_name']);
		
		// if input file too big (>5MB)
		if ($_FILES['avatar_file']['size'] > 5000000 ) {
			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_UPLOAD_TOO_BIG;
			return false;
		}
		// if input file too small
		if ($image_proportions[0] < AVATAR_SIZE OR $image_proportions[1] < AVATAR_SIZE) {
			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_UPLOAD_TOO_SMALL;
			return false;
		}
		
		if ($image_proportions['mime'] == 'image/jpeg' || $image_proportions['mime'] == 'image/png') {
			// create a jpg file in the avatar folder
			$target_file_path = AVATAR_PATH . $_SESSION['user_id'] . ".jpg";
			$this->resizeAvatarImage($_FILES['avatar_file']['tmp_name'], $target_file_path, AVATAR_SIZE, AVATAR_SIZE, AVATAR_JPEG_QUALITY, false);
			$query = $this->db->prepare("UPDATE users SET user_has_avatar = TRUE WHERE user_id = :user_id");
			$query->execute(array(':user_id' => $_SESSION['user_id']));
			Session::set('user_avatar_file', $this->getUserAvatarFilePath());
			$_SESSION["feedback_positive"][] = FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL;
			return true;
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE;
			return false;
		}
	}

	/**
	* Resize avatar image (while keeping aspect ratio and cropping it off sexy)
	* Originally written by:
	* @author Jay Zawrotny <jayzawrotny@gmail.com>
	* @license Do whatever you want with it.
	*
	* @param string $source_image The location to the original raw image.
	* @param string $destination_filename The location to save the new image.
	* @param int $width The desired width of the new image
	* @param int $height The desired height of the new image.
	* @param int $quality The quality of the JPG to produce 1 - 100
	* @param bool $crop Whether to crop the image or not. It always crops from the center.
	* @return bool success state
	*/
	public function resizeAvatarImage($source_image, $destination_filename, $width = 44, $height = 44, $quality = 85, $crop = true){
		$image_data = getimagesize($source_image);
		if (!$image_data) {
			return false;
		}
		
		// set to-be-used function according to filetype
		switch ($image_data['mime']) {
			case 'image/gif':
				$get_func = 'imagecreatefromgif';
				$suffix = ".gif";
				break;
			case 'image/jpeg';
				$get_func = 'imagecreatefromjpeg';
				$suffix = ".jpg";
				break;
			case 'image/png':
				$get_func = 'imagecreatefrompng';
				$suffix = ".png";
				break;
		}

		$img_original = call_user_func($get_func, $source_image );
		$old_width = $image_data[0];
		$old_height = $image_data[1];
		$new_width = $width;
		$new_height = $height;
		$src_x = 0;
		$src_y = 0;
		$current_ratio = round($old_width / $old_height, 2);
		$desired_ratio_after = round($width / $height, 2);
		$desired_ratio_before = round($height / $width, 2);
		
		if ($old_width < $width OR $old_height < $height) {
			// the desired image size is bigger than the original image. Best not to do anything at all really.
			return false;
		}
		
		// if crop is on: it will take an image and best fit it so it will always come out the exact specified size.
		if ($crop) {
			// create empty image of the specified size
			$new_image = imagecreatetruecolor($width, $height);
			
			// landscape image
			if ($current_ratio > $desired_ratio_after) {
				$new_width = $old_width * $height / $old_height;
			}
			
			// nearly square ratio image
			if ($current_ratio > $desired_ratio_before AND $current_ratio < $desired_ratio_after) {
				if ($old_width > $old_height) {
					$new_height = max($width, $height);
					$new_width = $old_width * $new_height / $old_height;
				} else {
					$new_height = $old_height * $width / $old_width;
				}
			}
			
			// portrait sized image
			if ($current_ratio < $desired_ratio_before) {
				$new_height = $old_height * $width / $old_width;
			}
			
			// find ratio of original image to find where to crop
			$width_ratio = $old_width / $new_width;
			$height_ratio = $old_height / $new_height;
			
			// calculate where to crop based on the center of the image
			$src_x = floor((($new_width - $width) / 2) * $width_ratio);
			$src_y = round((($new_height - $height) / 2) * $height_ratio);
		}
		// don't crop the image, just resize it proportionally
		else {
			if ($old_width > $old_height) {
				$ratio = max($old_width, $old_height) / max($width, $height);
			} else {
				$ratio = max($old_width, $old_height) / min($width, $height);
			}

			$new_width = $old_width / $ratio;
			$new_height = $old_height / $ratio;
			$new_image = imagecreatetruecolor($new_width, $new_height);
		}

		// create avatar thumbnail
		imagecopyresampled($new_image, $img_original, 0, 0, $src_x, $src_y, $new_width, $new_height, $old_width, $old_height);
		
		// save it as a .jpg file with our $destination_filename parameter
		imagejpeg($new_image, $destination_filename, $quality);
		
		// delete "working copy" and original file, keep the thumbnail
		imagedestroy($new_image);
		imagedestroy($img_original);
		
		if (file_exists($destination_filename)) {
			return true;
		}
		// default return
		return false;
	}
}
