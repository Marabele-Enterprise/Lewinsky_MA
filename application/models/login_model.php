<?php

/**
 * LoginModel
 *
 * Handles the user's login / logout / registration stuff
 */
use Gregwar\Captcha\CaptchaBuilder;

class LoginModel
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
     * Log out process, deletes cookie, deletes session
     */
    public function logout($generic_model)
    {
        // set the remember-me-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
        $generic_model->logActionPHP("Logout Successful", "Login", "A");
        // delete the session
        Session::destroy();
    }

    /**
     * Deletes the (invalid) remember-cookie to prevent infinitive login loops
     */
    public function deleteCookie()
    {
        // set the rememberme-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
    }

    /**
     * Returns the current state of the user's login
     * @return bool user's login status
     */
    public function isUserLoggedIn()
    {
        return Session::get('user_logged_in');
    }

    /**
     * Edit the user's name, provided in the editing form
     * @return bool success status
     */
    public function editUserName()
    {
        // new username provided ?
        if (!isset($_POST['username']) OR empty($_POST['username'])) {
            echo FEEDBACK_USERNAME_FIELD_EMPTY;
            return false;
        }

        // new username same as old one ?
        if ($_POST['username'] == $_SESSION["username"]) {
            echo FEEDBACK_USERNAME_SAME_AS_OLD_ONE;
            return false;
        }

        // username cannot be empty and must be azAZ09 and 2-64 characters
        if (!preg_match("/^(?=.{2,64}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/", $_POST['username'])) {
            echo FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
            return false;
        }

        // clean the input
        $username = substr(strip_tags($_POST['username']), 0, 64);

        // check if new username already exists
        $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE username = :username");
        $query->execute(array(':username' => $username));
        $count =  $query->rowCount();
        if ($count == 1) {
            echo FEEDBACK_USERNAME_ALREADY_TAKEN;
            return false;
        }

        $query = $this->db->prepare("UPDATE ".PREFIX."users SET username = :username WHERE id = :user_id");
        $query->execute(array(':username' => $username, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count == 1) {
            Session::set('username', $username);
            $_SESSION["feedback_positive"][] = FEEDBACK_USERNAME_CHANGE_SUCCESSFUL;
            return true;
        } else {
            echo FEEDBACK_UNKNOWN_ERROR;
            return false;
        }
    }

    /**
     * Edit the user's email, provided in the editing form
     * @return bool success status
     */
    public function editUserEmail()
    {
        // email provided ?
        if (!isset($_POST['email']) OR empty($_POST['email'])) {
            echo FEEDBACK_PASSWORD_FIELD_EMPTY;
            return false;
        }

        // check if new email is same like the old one
        if ($_POST['email'] == $_SESSION["email"]) {
            echo FEEDBACK_EMAIL_SAME_AS_OLD_ONE;
            return false;
        }

        // user's email must be in valid email format
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN;
            return false;
        }

        // check if user's email already exists
        $query = $this->db->prepare("SELECT * FROM ".PREFIX."users WHERE email = :email");
        $query->execute(array(':email' => $_POST['email']));
        $count =  $query->rowCount();
        if ($count == 1) {
            echo FEEDBACK_USER_EMAIL_ALREADY_TAKEN;
            return false;
        }

        // cleaning and write new email to database
        $email = substr(strip_tags($_POST['email']), 0, 64);
        $query = $this->db->prepare("UPDATE ".PREFIX."users SET email = :email WHERE id = :user_id");
        $query->execute(array(':email' => $email, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count != 1) {
            echo FEEDBACK_UNKNOWN_ERROR;
            return false;
        }

        Session::set('email', $email);
        // call the setGravatarImageUrl() method which writes gravatar URLs into the session
        $this->setGravatarImageUrl($email, AVATAR_SIZE);
        $_SESSION["feedback_positive"][] = FEEDBACK_EMAIL_CHANGE_SUCCESSFUL;
        return false;
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     * Gravatar is the #1 (free) provider for email address based global avatar hosting.
     * The image url (on gravatar servers), will return in something like (note that there's no .jpg)
     * http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=80&d=mm&r=g
     *
     * For deeper info on the different parameter possibilities:
     * @see http://gravatar.com/site/implement/images/
     * @source http://gravatar.com/site/implement/images/php/
     *
     * @param string $email The email address
     * @param int $s Size in pixels [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param array $attributes Optional, additional key/value attributes to include in the IMG tag
     */
    public function setGravatarImageUrl($email, $s = 44, $d = 'mm', $r = 'pg', $attributes = array())
    {
        // create image URL, write it into session
        $image_url = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) .  "?s=$s&d=$d&r=$r";
        Session::set('user_gravatar_image_url', $image_url);

        // build <img /> tag around the URL
        $image_url_with_tag = '<img src="' . $image_url . '"';
        foreach ($attributes as $key => $val) {
            $image_url_with_tag .= ' ' . $key . '="' . $val . '"';
        }
        $image_url_with_tag .= ' />';

        // the image url like above but with an additional <img src .. /> around, write to session
        Session::set('user_gravatar_image_tag', $image_url_with_tag);
    }

    /**
     * Create an avatar picture (and checks all necessary things too)
     * @return bool success status
     */
    public function createAvatar()
    {
        if (!is_dir(AVATAR_PATH) OR !is_writable(AVATAR_PATH)) {
            echo FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE;
            return false;
        }

        if (!isset($_FILES['avatar_file']) OR empty ($_FILES['avatar_file']['tmp_name'])) {
            echo FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED;
            return false;
        }

        // get the image width, height and mime type
        $image_proportions = getimagesize($_FILES['avatar_file']['tmp_name']);

        // if input file too big (>5MB)
        if ($_FILES['avatar_file']['size'] > 5000000 ) {
            echo FEEDBACK_AVATAR_UPLOAD_TOO_BIG;
            return false;
        }
        // if input file too small
        if ($image_proportions[0] < AVATAR_SIZE OR $image_proportions[1] < AVATAR_SIZE) {
            echo FEEDBACK_AVATAR_UPLOAD_TOO_SMALL;
            return false;
        }

        if ($image_proportions['mime'] == 'image/jpeg' || $image_proportions['mime'] == 'image/png') {
            // create a jpg file in the avatar folder
            $target_file_path = AVATAR_PATH . $_SESSION['user_id'] . ".jpg";
            $this->resizeAvatarImage($_FILES['avatar_file']['tmp_name'], $target_file_path, AVATAR_SIZE, AVATAR_SIZE, AVATAR_JPEG_QUALITY, true);
            $query = $this->db->prepare("UPDATE ".PREFIX."users SET user_has_avatar = TRUE WHERE id = :user_id");
            $query->execute(array(':user_id' => $_SESSION['user_id']));
            Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            $_SESSION["feedback_positive"][] = FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL;
            return true;
        } else {
            echo FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE;
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
    public function resizeAvatarImage(
        $source_image, $destination_filename, $width = 44, $height = 44, $quality = 85, $crop = true)
    {
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

    /**
     * Perform the necessary actions to send a password reset mail
     * @return bool success status
     */
    public function requestPasswordReset()
    {
        if (!isset($_POST['username']) OR empty($_POST['username'])) {
            echo FEEDBACK_USERNAME_FIELD_EMPTY;
            return false;
        }

        // generate integer-timestamp (to see when exactly the user (or an attacker) requested the password reset mail)
        $temporary_timestamp = time();
        // generate random hash for email password reset verification (40 char string)
        $user_password_reset_hash = sha1(uniqid(mt_rand(), true));
        // clean user input
        $username = strip_tags($_POST['username']);

        // check if that username exists
        $query = $this->db->prepare("SELECT id, email FROM ".PREFIX."users
                                     WHERE username = :username AND user_provider_type = :provider_type");
        $query->execute(array(':username' => $username, ':provider_type' => 'DEFAULT'));
        $count = $query->rowCount();
        if ($count != 1) {
            echo FEEDBACK_USER_DOES_NOT_EXIST;
            return false;
        }

        // get result
        $result_user_row = $result = $query->fetch();
        $email = $result_user_row->email;

        // set token (= a random hash string and a timestamp) into database
        if ($this->setPasswordResetDatabaseToken($username, $user_password_reset_hash, $temporary_timestamp) == true) {
            // send a mail to the user, containing a link with username and token hash string
            if ($this->sendPasswordResetMail($username, $user_password_reset_hash, $email)) {
                return true;
            }
        }
        // default return
        return false;
    }

    /**
     * Set password reset token in database (for DEFAULT user accounts)
     * @param string $user_name username
     * @param string $user_password_reset_hash password reset hash
     * @param int $temporary_timestamp timestamp
     * @return bool success status
     */
    public function setPasswordResetDatabaseToken($username, $user_password_reset_hash, $temporary_timestamp)
    {
        $query_two = $this->db->prepare("UPDATE ".PREFIX."users
                                            SET user_password_reset_hash = :user_password_reset_hash,
                                                user_password_reset_timestamp = :user_password_reset_timestamp
                                          WHERE username = :username AND user_provider_type = :provider_type");
        $query_two->execute(array(':user_password_reset_hash' => $user_password_reset_hash,
                                  ':user_password_reset_timestamp' => $temporary_timestamp,
                                  ':username' => $username,
                                  ':provider_type' => 'DEFAULT'));

        // check if exactly one row was successfully changed
        $count =  $query_two->rowCount();
        if ($count == 1) {
            return true;
        } else {
            echo FEEDBACK_PASSWORD_RESET_TOKEN_FAIL;
            return false;
        }
    }

    /**
     * send the password reset mail
     * @param string $user_name username
     * @param string $user_password_reset_hash password reset hash
     * @param string $user_email user email
     * @return bool success status
     */
    public function sendPasswordResetMail($user_name, $user_password_reset_hash, $user_email)
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
        $mail->From = EMAIL_PASSWORD_RESET_FROM_EMAIL;
        $mail->FromName = EMAIL_PASSWORD_RESET_FROM_NAME;
        $mail->AddAddress($user_email);
        $mail->Subject = EMAIL_PASSWORD_RESET_SUBJECT;
        $link = EMAIL_PASSWORD_RESET_URL . '/' . urlencode($user_name) . '/' . urlencode($user_password_reset_hash);
        $mail->Body = EMAIL_PASSWORD_RESET_CONTENT . ' ' . $link;

        // send the mail
        if($mail->Send()) {
            $_SESSION["feedback_positive"][] = FEEDBACK_PASSWORD_RESET_MAIL_SENDING_SUCCESSFUL;
            return true;
        } else {
            echo FEEDBACK_PASSWORD_RESET_MAIL_SENDING_ERROR . $mail->ErrorInfo;
            return false;
        }
    }

    /**
     * Verifies the password reset request via the verification hash token (that's only valid for one hour)
     * @param string $user_name Username
     * @param string $verification_code Hash token
     * @return bool Success status
     */
    public function verifyPasswordReset($username, $verification_code)
    {
        // check if user-provided username + verification code combination exists
        $query = $this->db->prepare("SELECT id, user_password_reset_timestamp
                                       FROM ".PREFIX."users
                                      WHERE username = :username
                                        AND user_password_reset_hash = :user_password_reset_hash
                                        AND user_provider_type = :user_provider_type");
        $query->execute(array(':user_password_reset_hash' => $verification_code,
                              ':username' => $username,
                              ':user_provider_type' => 'DEFAULT'));

        // if this user with exactly this verification hash code exists
        if ($query->rowCount() != 1) {
            echo FEEDBACK_PASSWORD_RESET_COMBINATION_DOES_NOT_EXIST;
            return false;
        }

        // get result row (as an object)
        $result_user_row = $query->fetch();
        // 3600 seconds are 1 hour
        $timestamp_one_hour_ago = time() - 3600;
        // if password reset request was sent within the last hour (this timeout is for security reasons)
        if ($result_user_row->user_password_reset_timestamp > $timestamp_one_hour_ago) {
            // verification was successful
            $_SESSION["feedback_positive"][] = FEEDBACK_PASSWORD_RESET_LINK_VALID;
            return true;
        } else {
            echo FEEDBACK_PASSWORD_RESET_LINK_EXPIRED;
            return false;
        }
    }

    /**
     * Set the new password (for DEFAULT user, FACEBOOK-users don't have a password)
     * Please note: At this point the user has already pre-verified via verifyPasswordReset() (within one hour),
     * so we don't need to check again for the 60min-limit here. In this method we authenticate
     * via username & password-reset-hash from (hidden) form fields.
     * @return bool success state of the password reset
     */
    public function setNewPassword()
    {
        // basic checks
        if (!isset($_POST['username']) OR empty($_POST['username'])) {
            echo FEEDBACK_USERNAME_FIELD_EMPTY;
            return false;
        }
        if (!isset($_POST['password_reset_hash']) OR empty($_POST['password_reset_hash'])) {
            echo FEEDBACK_PASSWORD_RESET_TOKEN_MISSING;
            return false;
        }
        if (!isset($_POST['password']) OR empty($_POST['password'])) {
            echo FEEDBACK_PASSWORD_FIELD_EMPTY;
            return false;
        }
        if (!isset($_POST['password_repeat']) OR empty($_POST['password_repeat'])) {
            echo FEEDBACK_PASSWORD_FIELD_EMPTY;
            return false;
        }
        // password does not match password repeat
        if ($_POST['password'] !== $_POST['password_repeat']) {
            echo FEEDBACK_PASSWORD_REPEAT_WRONG;
            return false;
        }
        // password too short
        if (strlen($_POST['password']) < 6) {
            echo FEEDBACK_PASSWORD_TOO_SHORT;
            return false;
        }

        // check if we have a constant HASH_COST_FACTOR defined
        // if so: put the value into $hash_cost_factor, if not, make $hash_cost_factor = null
        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

        // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
        // the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
        // compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
        // want the parameter: as an array with, currently only used with 'cost' => XX.
        $user_password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

        // write users new password hash into database, reset user_password_reset_hash
        $query = $this->db->prepare("UPDATE ".PREFIX."users
                                        SET user_password_hash = :user_password_hash,
                                            user_password_reset_hash = NULL,
                                            user_password_reset_timestamp = NULL
                                      WHERE username = :username
                                        AND user_password_reset_hash = :user_password_reset_hash
                                        AND user_provider_type = :user_provider_type");

        $query->execute(array(':user_password_hash' => $user_password_hash,
                              ':username' => $_POST['username'],
                              ':user_password_reset_hash' => $_POST['user_password_reset_hash'],
                              ':user_provider_type' => 'DEFAULT'));

        // check if exactly one row was successfully changed:
        if ($query->rowCount() == 1) {
            // successful password change!
            $_SESSION["feedback_positive"][] = FEEDBACK_PASSWORD_CHANGE_SUCCESSFUL;
            return true;
        }

        // default return
        echo FEEDBACK_PASSWORD_CHANGE_FAILED;
        return false;
    }

    /**
     * Upgrades/downgrades the user's account (for DEFAULT and FACEBOOK users)
     * Currently it's just the field user_account_type in the database that
     * can be 1 or 2 (maybe "basic" or "premium"). In this basic method we
     * simply increase or decrease this value to emulate an account upgrade/downgrade.
     * Put some more complex stuff in here, maybe a pay-process or whatever you like.
     */
    public function changeAccountType()
    {
        if (isset($_POST["user_account_upgrade"]) AND !empty($_POST["user_account_upgrade"])) {

            // do whatever you want to upgrade the account here (pay-process etc)
            // ...
            // ... myPayProcess();
            // ...

            // upgrade account type
            $query = $this->db->prepare("UPDATE ".PREFIX."users SET user_account_type = 2 WHERE id = :user_id");
            $query->execute(array(':user_id' => $_SESSION["user_id"]));

            if ($query->rowCount() == 1) {
                // set account type in session to 2
                Session::set('user_account_type', 2);
                $_SESSION["feedback_positive"][] = FEEDBACK_ACCOUNT_UPGRADE_SUCCESSFUL;
            } else {
                echo FEEDBACK_ACCOUNT_UPGRADE_FAILED;
            }
        } elseif (isset($_POST["user_account_downgrade"]) AND !empty($_POST["user_account_downgrade"])) {

            // do whatever you want to downgrade the account here (pay-process etc)
            // ...
            // ... myWhateverProcess();
            // ...

            $query = $this->db->prepare("UPDATE ".PREFIX."users SET user_account_type = 1 WHERE id = :user_id");
            $query->execute(array(':user_id' => $_SESSION["user_id"]));

            if ($query->rowCount() == 1) {
                // set account type in session to 1
                Session::set('user_account_type', 1);
                $_SESSION["feedback_positive"][] = FEEDBACK_ACCOUNT_DOWNGRADE_SUCCESSFUL;
            } else {
                echo FEEDBACK_ACCOUNT_DOWNGRADE_FAILED;
            }
        }
    }

    /**
     * Generates the captcha, "returns" a real image,
     * this is why there is header('Content-type: image/jpeg')
     * Note: This is a very special method, as this is echoes out binary data.
     * Eventually this is something to refactor
     */
    public function generateCaptcha()
    {
        // create a captcha with the CaptchaBuilder lib
        $builder = new CaptchaBuilder;
        $builder->build();

        // write the captcha character into session
        $_SESSION['captcha'] = $builder->getPhrase();

        // render an image showing the characters (=the captcha)
        header('Content-type: image/jpeg');
        $builder->output();
    }

    /**
     * Checks if the facebook-user data array has an email. It's possible that users block this, so we don't have
     * an email and therefore cannot register this person (registration without email is impossible).
     * @param array $facebook_user_data stuff from the facebook class
     * @return bool user has email yes/no
     */
    public function facebookUserHasEmail($facebook_user_data)
    {
        if (isset($facebook_user_data["email"]) && !empty($facebook_user_data["email"])) {
            return true;
        }
        // default return
        return false;
    }

    /**
     * Generate unique user_name from facebook-user's username appended with a number
     * @param string $existing_name $facebook_user_data stuff from the facebook class
     * @return string unique user_name not in database yet
     */
    public function generateUniqueUserNameFromExistingUserName($existing_name)
    {
        //strip any dots, trailing numbers and white spaces
        $existing_name = str_replace(".", "", $existing_name);
        $existing_name = preg_replace('/\s*\d+$/', '', $existing_name);

        // loop until we have a new username, adding an increasing number to the given string every time
        $n = 0;
        do {
            $n = $n+1;
            $new_username = $existing_name . $n;
            $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE username = :name_with_number");
            $query->execute(array(':name_with_number' => $new_username));
             
         } while ($query->rowCount() == 1);

        return $new_username;
    }
    
    
    
    
    /*==============================================
    =   NEW FUNCTION MODIFICATIONS  =
    ================================================*/
    /**
    * There has been some major modification to the program flow.
    * Some database names have been changed, while some were dropped.
    * Notice that the new structure is such that the functions are in \
    * alphabetical order, please keep it that way
    */
    
    /*======================
    =   C - functions       =
    ========================*/
    
    /**
    * This function is used solely for the purpose of validating some inputs on the 
    * client side via jquery validate plugin
    */
    public function check($field){
        if($field == "captcha"){
            if($this->checkCaptcha())
                return "true";
            return "Oops! You entered the wrong text, keep trying...";
        }else{
            // get the value
            $value = $_REQUEST[$field];
            
            // check if field already exists
            $sql = $this->db->prepare("SELECT * FROM ".PREFIX."users WHERE ".$field." = :".$field." AND user_active = :user_active");
            $sql->execute(array(':'.$field.'' => $value, ":user_active" => 1));
            $count =  $sql->rowCount();
            if ($count == 1) {
                return "Oops! That ".$field." is already in use, Try another one.";
            }
            else{
                return "true";
            }
        }
    }
    
    /**
    * Checks if the entered captcha is the same like the one from the rendered image which has been saved in session
    * @return bool success of captcha check
    */
    private function checkCaptcha(){
        if (isset($_REQUEST["captcha"]) AND ($_REQUEST["captcha"] == $_SESSION['captcha'])) {
            return true;
        }
        // default return
        return false;
    }
    
    /**
    * Create an avatar picture (and checks all necessary things too)
    * @return bool success status
    */
    public function createAvatar_new(){
        if (!is_dir(AVATAR_PATH) OR !is_writable(AVATAR_PATH)) {
            echo FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE;
            return false;
        }
        
        if (!isset($_FILES['avatar_file']) OR empty ($_FILES['avatar_file']['tmp_name'])) {
            echo FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED;
            return false;
        }
        
        // get the image width, height and mime type
        $image_proportions = getimagesize($_FILES['avatar_file']['tmp_name']);
        
        // if input file too big (>5MB)
        if ($_FILES['avatar_file']['size'] > 5000000 ) {
            echo FEEDBACK_AVATAR_UPLOAD_TOO_BIG;
            return false;
        }
        // if input file too small
        if ($image_proportions[0] < AVATAR_SIZE OR $image_proportions[1] < AVATAR_SIZE) {
            echo FEEDBACK_AVATAR_UPLOAD_TOO_SMALL;
            return false;
        }
        
        if ($image_proportions['mime'] == 'image/jpeg' || $image_proportions['mime'] == 'image/png') {
            // create a jpg file in the avatar folder
            $target_file_path = AVATAR_PATH . $_SESSION['user_id'] . ".jpg";
            $this->resizeAvatarImage($_FILES['avatar_file']['tmp_name'], $target_file_path, AVATAR_SIZE, AVATAR_SIZE, AVATAR_JPEG_QUALITY, true);
            $query = $this->db->prepare("UPDATE ".PREFIX."users SET user_has_avatar = TRUE WHERE id = :user_id");
            $query->execute(array(':user_id' => $_SESSION['user_id']));
            Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            $_SESSION["feedback_positive"][] = FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL;
            return true;
        } else {
            echo FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE;
            return false;
        }
    }
    
    /*======================
    =   E - functions       =
    ========================*/
    
    /**
    * Edit the user's firstname, provided in the editing form
    * @return bool success status
    */
    public function editUserFirstName(){
        // new firstname provided ?
        if (isset($_POST['firstname']) AND !empty($_POST['firstname'])) {
            // new firstname same as old one ?
            if ($_POST['firstname'] == $_SESSION["firstname"]) {
                //echo "Your New First Name is Same as Old One";
                return false;
            }
        
            // clean the input
            $firstname = substr(strip_tags($_POST['firstname']), 0, 64);
            
            $query = $this->db->prepare("UPDATE ".PREFIX."users SET firstname = :firstname WHERE id = :user_id");
            $query->execute(array(':firstname' => $firstname, ':user_id' => $_SESSION['user_id']));
            $count =  $query->rowCount();
            if ($count == 1) {
                Session::set('firstname', $firstname);
                $_SESSION["feedback_positive"][] = "First Name Changed Successfully";
                return $firstname;
            } else {
                //echo FEEDBACK_UNKNOWN_ERROR;
                return false;
            }
        }
        return false;
    }
    
    /**
    * Edit the user's lastname, provided in the editing form
    * @return bool success status
    */
    public function editUserLastName(){
        if (isset($_POST['lastname']) AND !empty($_POST['lastname'])) {
            // new firstname same as old one ?
            if ($_POST['lastname'] == $_SESSION["lastname"]) {
                //echo "Your New First Name is Same as Old One";
                return false;
            }
        
            // clean the input
            $lastname = substr(strip_tags($_POST['lastname']), 0, 64);
            
            $query = $this->db->prepare("UPDATE ".PREFIX."users SET lastname = :lastname WHERE id = :user_id");
            $query->execute(array(':lastname' => $lastname, ':user_id' => $_SESSION['user_id']));
            $count =  $query->rowCount();
            if ($count == 1) {
                Session::set('lastname', $lastname);
                $_SESSION["feedback_positive"][] = "Last Name Changed Successfully";
                return $lastname;
            } else {
                //echo FEEDBACK_UNKNOWN_ERROR;
                return false;
            }
        }
        return false;
    }
    
    /**
    * Edit the user's password, provided in the editing form
    * @return bool success status
    */
    public function editUserPassword(){
        // current password provided ?
        if (!isset($_POST['password']) OR empty($_POST['password'])) {
            echo "Current Password Field Was Empty!";
            return false;
        }
        
        $sth = $this->db->prepare("SELECT a.id, a.user_password_hash,
            FROM ".PREFIX."users as a
            WHERE a.id = :user_id");
        $sth->execute(array(':user_id' => Session::get("user_id")));
        
        // check if hash of provided password matches the hash in the database
        //if (!password_verify($_POST['password'], $sth->fetch()->user_password_hash)) {
        //  echo "Current Password Was Wrong!";
        //  return false;
        //}
        
        // new password provided ?
        if (!isset($_POST['new_password']) OR empty($_POST['new_password'])) {
            echo "New Password Field Was Empty!";
            return false;
        }
        
        // new_password_repeat provided ?
        if (!isset($_POST['new_password_repeat']) OR empty($_POST['new_password_repeat'])) {
            echo "Reapeat New Password Field Was Empty!";
            return false;
        }
        
        // new_password_repeat same as new password ?
        if ($_POST['new_password'] !== $_POST['new_password_repeat']) {
            echo FEEDBACK_PASSWORD_REPEAT_WRONG;
            return false;
        }
        
        // new password same as old one ?
        if ($_POST['new_password'] == $_POST["password"]) {
            echo "New Password is the Same as the Current Password!";
            return false;
        }
        
        $new_password = strip_tags($_POST['new_password']);
        // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character
        // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4,
        // by the password hashing compatibility library. the third parameter looks a little bit shitty, but that's
        // how those PHP 5.5 functions want the parameter: as an array with, currently only used with 'cost' => XX
        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
        $user_password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
        
        $query = $this->db->prepare("UPDATE ".PREFIX."users SET user_password_hash = :user_password_hash WHERE id = :user_id");
        $query->execute(array(':user_password_hash' => $user_password_hash, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_positive"][] = "Password Changed Successfully";
            return true;
        } else {
            echo "Unknown Error Occured";
            return false;
        }
    }
    
    /*======================
    =   F - functions       =
    ========================*/
    
    /**
    * Checks if the facebook-user's email address is already in our database
    * @param array $facebook_user_data stuff from the facebook class
    * @return bool success state
    */
    public function facebookUserEmailExistsAlreadyInDatabase($facebook_user_data){
        $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE email = :facebook_email");
        $query->execute(array(':facebook_email' => $facebook_user_data["email"]));
        
        if ($query->rowCount() == 1) {
            return true;
        }
        // default return
        return false;
    }
    
    /**
    * Check if the facebook-user's UID (unique facebook ID) already exists in our database
    * @param array $facebook_user_data stuff from the facebook class
    * @return bool success state
    */
    public function facebookUserIdExistsAlreadyInDatabase($facebook_user_data){
        $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE user_facebook_uid = :user_facebook_uid");
        $query->execute(array(':user_facebook_uid' => $facebook_user_data["id"]));
        
        if ($query->rowCount() == 1) {
            return true;
        }
        // default return
        return false;
    }
    
    /**
    * Checks if the facebook-user's username is already in our database
    * Note: facebook's user-names have dots, so we remove all dots.
    * @param array $facebook_user_data stuff from the facebook class
    * @return bool success state
    */
    public function facebookUserNameExistsAlreadyInDatabase($facebook_user_data){
        // delete dots from facebook's username (it's the common way to do this like that)
        $clean_user_name_from_facebook = str_replace(".", "", $facebook_user_data["first_name"]);
        
        $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE username = :clean_user_name_from_facebook");
        $query->execute(array(':clean_user_name_from_facebook' => $clean_user_name_from_facebook));
        
        if ($query->rowCount() == 1) {
            return true;
        }
        // default return
        return false;
    }
    
    /*======================
    =   G - functions       =
    ========================*/
    
    /**
    * Gets the user's avatar file path
    * @return string avatar picture path
    */
    public function getUserAvatarFilePath(){
        $query = $this->db->prepare("SELECT user_has_avatar FROM ".PREFIX."users WHERE id = :user_id");
        $query->execute(array(':user_id' => $_SESSION['user_id']));
        
        if ($query->fetch()->user_has_avatar) {
            $avatar_path = AVATAR_REAL_PATH . $_SESSION['user_id'] . '.jpg';
            return URL . AVATAR_PATH . $_SESSION['user_id'] . '.jpg?=' . filemtime($avatar_path);
        } else {
            $avatar_path = AVATAR_REAL_PATH . AVATAR_DEFAULT_IMAGE;
            return URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE . "?=" . filemtime($avatar_path);
        }
    }
    
    /**
    * Gets the URL where the "Login with Facebook"-button redirects the user to
    * @return string The URL
    */
    public function getFacebookLoginUrl(){
        // Create Facebook object (official Facebook SDK, loaded via Composer: facebook/php-sdk), this is the official
        // way to login via Facebook with PHP. Constants come from config/config.php.
        $facebook = new Facebook(array('appId'  => FACEBOOK_LOGIN_APP_ID, 'secret' => FACEBOOK_LOGIN_APP_SECRET));
        
        // get the "login"-URL: This is the URL the user will be redirected to after being sent to the Facebook Auth
        // server by clicking the "login via facebook"-button. Don't touch this until you know exactly what you do.
        $facebook_login_url = $facebook->getLoginUrl(array('redirect_uri' => URL . FACEBOOK_LOGIN_PATH));
        
        return $facebook_login_url;
    }
    
    /**
    * Gets the URL where the "Register with Facebook"-button redirects the user to
    * @return string The URL
    */
    public function getFacebookRegisterUrl(){
        // create our Application instance (necessary to request Facebook data)
        $facebook = new Facebook(array('appId'  => FACEBOOK_LOGIN_APP_ID, 'secret' => FACEBOOK_LOGIN_APP_SECRET));
        
        // build the URL where the user will be redirected to after being authenticated on the Facebook server
        // Note: Facebook needs to know that URL, that's why we pass this
        $redirect_url_after_facebook_auth = URL . FACEBOOK_REGISTER_PATH;
        
        // hard to explain, read the Facebook PHP SDK for more information!
        // basically, when the user clicks the Facebook register button, the following arguments will be passed
        // to Facebook: In this case a request for getting the email (not shown by default btw) and the URL
        // when facebook will send the user after he/she has authenticated
        // "scope" => 'email' means that we need read-access to the user's "public" data plus his/her email address
        // (not public by default)
        $facebook_register_url = $facebook->getLoginUrl(array(
            'scope' => 'public_profile, email, user_birthday, user_location',
            'redirect_uri' => $redirect_url_after_facebook_auth
        ));
        
        return $facebook_register_url;
    }
    
    /*======================
    =   L - functions       =
    ========================*/
    
    /**
    * Login process (for DEFAULT user accounts).
    * Users who login with Facebook etc. are handled with loginWithFacebook()
    * @return bool success state
    */
    public function login($generic_model){
        // we do negative-first checks here
        if (!isset($_POST['username']) OR empty($_POST['username'])) {
            echo FEEDBACK_USERNAME_FIELD_EMPTY;
            return false;
        }
        if (!isset($_POST['password']) OR empty($_POST['password'])) {
            echo FEEDBACK_PASSWORD_FIELD_EMPTY;
            return false;
        }
        
        // get user's data
        // (we check if the password fits the password_hash via password_verify() some lines below)
        $sth = $this->db->prepare("SELECT id,
            firstname,
            lastname,
            username,
            email,
            email,
            user_password_hash,
            user_active,
            user_account_type,
            user_failed_logins,
            user_last_failed_login
            FROM ".PREFIX."users
            WHERE  (username = :username OR email = :username OR email = :username)
            AND user_provider_type = :provider_type");
        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $sth->execute(array(':username' => $_POST['username'], ':provider_type' => 'DEFAULT'));
        $count =  $sth->rowCount();
        // if there's NOT one result
        if ($count != 1) {
            // was FEEDBACK_USER_DOES_NOT_EXIST before, but has changed to FEEDBACK_LOGIN_FAILED
            // to prevent potential attackers showing if the user exists
            echo FEEDBACK_LOGIN_FAILED;
            return false;
        }
        
        // fetch one row (we only have one result)
        $result = $sth->fetch();
        
        // block login attempt if somebody has already failed 3 times and the last login attempt is less than 30sec ago
        if (($result->user_failed_logins >= 3) AND ($result->user_last_failed_login > (time()-30))) {
            echo FEEDBACK_PASSWORD_WRONG_3_TIMES;
            return false;
        }

        // check if hash of provided password matches the hash in the database
        if (password_verify($_POST['password'], $result->user_password_hash)) {
            /*if ($result->user_active != 1) {
                echo FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET;
                Session::set('user_id', $result->id);
                return 0;
            }*/
            // login process, write the user data into session
            //Session::init();
            Session::set('user_logged_in', true);
            Session::set('user_id', $result->id);
            Session::set('firstname', $result->firstname);
            Session::set('lastname', $result->lastname);
            Session::set('username', $result->username);
            Session::set('email', $result->email);
            Session::set('user_account_type', $result->user_account_type);
            Session::set('user_provider_type', 'DEFAULT');
            // put native avatar path into session
            /*Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            Session::set('user_avatar_xsmall', $this->getUserAvatarFilePath());
            Session::set('user_avatar_small', $this->getUserAvatarFilePath());
            Session::set('user_avatar_medium', $this->getUserAvatarFilePath());
            Session::set('user_avatar_large', $this->getUserAvatarFilePath());
            Session::set('user_avatar_xlarge', $this->getUserAvatarFilePath());*/
            // put Gravatar URL into session
           //$this->setGravatarImageUrl($result->email, AVATAR_SIZE);
            
            // reset the failed login counter for that user (if necessary)
            if ($result->user_last_failed_login > 0) {
                $sql = "UPDATE ".PREFIX."users SET user_failed_logins = 0, user_last_failed_login = NULL
                    WHERE id = :user_id AND user_failed_logins != 0";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(':user_id' => $result->id));
            }
            
            // generate integer-timestamp for saving of last-login date
            $user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            $sql = "UPDATE ".PREFIX."users SET user_last_login_timestamp = :user_last_login_timestamp WHERE id = :user_id";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':user_id' => $result->id, ':user_last_login_timestamp' => $user_last_login_timestamp));
            
            // if user has checked the "remember me" checkbox, then write cookie
            if (isset($_POST['rememberme'])) {
                // generate 64 char random string
                $random_token_string = hash('sha256', mt_rand());
                
                // write that token into database
                $sql = "UPDATE ".PREFIX."users SET user_rememberme_token = :user_rememberme_token WHERE id = :user_id";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->id));
                
                // generate cookie string that consists of user id, random string and combined hash of both
                $cookie_string_first_part = $result->id . ':' . $random_token_string;
                $cookie_string_hash = hash('sha256', $cookie_string_first_part);
                $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;
                
                // set cookie
                setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
            }
            $generic_model->logActionPHP("Login Successful", "Login", "A");
            // return true to make clear the login was successful
            return true;
        
        } else {
            // increment the failed login counter for that user
            $sql = "UPDATE ".PREFIX."users
                SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login
                WHERE username = :username OR email = :username";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':username' => $_POST['username'], ':user_last_failed_login' => time() ));
            // feedback message
            //echo FEEDBACK_PASSWORD_WRONG;
            echo FEEDBACK_LOGIN_FAILED;
            
            $generic_model->logActionPHP("Login Failed", "Login", "A");
            return false;
        }
        
        // default return
        return false;
    }
    
    /**
    * performs the login via cookie (for DEFAULT user account, FACEBOOK-accounts are handled differently)
    * @return bool success state
    */
    public function loginWithCookie($generic_model){
        $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';
        
        // do we have a cookie var ?
        if (!$cookie) {
            echo FEEDBACK_COOKIE_INVALID;
            $generic_model->logActionPHP("Login With Cookie Failed", "Login", "A");
            return false;
        }
        
        // check cookie's contents, check if cookie contents belong together
        list ($user_id, $token, $hash) = explode(':', $cookie);
        if ($hash !== hash('sha256', $user_id . ':' . $token)) {
            echo FEEDBACK_COOKIE_INVALID;
            $generic_model->logActionPHP("Login With Cookie Failed", "Login", "A");
            return false;
        }
        
        // do not log in when token is empty
        if (empty($token)) {
            echo FEEDBACK_COOKIE_INVALID;
            $generic_model->logActionPHP("Login With Cookie Failed", "Login", "A");
            return false;
        }
        
        // get real token from database (and all other data)
        $query = $this->db->prepare("SELECT id, firstname, lastname, username, email, email, user_password_hash, 
                    user_active, user_account_type, user_has_avatar, user_failed_logins, user_last_failed_login
                    FROM ".PREFIX."users 
                    WHERE id = :user_id
                    AND user_rememberme_token = :user_rememberme_token
                    AND user_rememberme_token IS NOT NULL
                    AND user_provider_type = :provider_type");
        $query->execute(array(':user_id' => $user_id, ':user_rememberme_token' => $token, ':provider_type' => 'DEFAULT'));
        $count =  $query->rowCount();
        if ($count == 1) {
            // fetch one row (we only have one result)
            $result = $query->fetch();
            // TODO: this block is same/similar to the one from login(), maybe we should put this in a method
            // write data into session
            Session::init();
            Session::set('user_logged_in', true);
            Session::set('user_id', $result->id);
            Session::set('firstname', $result->firstname);
            Session::set('lastname', $result->lastname);
            Session::set('username', $result->username);
            Session::set('email', $result->email);
            Session::set('email', $result->email);
            Session::set('user_account_type', $result->user_account_type);
            Session::set('user_provider_type', 'DEFAULT');
            Session::set('store_name', $result->store_name);
            Session::set('address_status', $result->status);
            Session::set('address', $result->address);
            // put native avatar path into session
            Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            Session::set('user_avatar_xsmall', $this->getUserAvatarFilePath());
            Session::set('user_avatar_small', $this->getUserAvatarFilePath());
            Session::set('user_avatar_medium', $this->getUserAvatarFilePath());
            Session::set('user_avatar_large', $this->getUserAvatarFilePath());
            Session::set('user_avatar_xlarge', $this->getUserAvatarFilePath());
            // call the setGravatarImageUrl() method which writes gravatar urls into the session
            $this->setGravatarImageUrl($result->email, AVATAR_SIZE);
            
            // generate integer-timestamp for saving of last-login date
            $user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            $sql = "UPDATE ".PREFIX."users SET user_last_login_timestamp = :user_last_login_timestamp WHERE id = :user_id";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':user_id' => $user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));
            
            // NOTE: we don't set another rememberme-cookie here as the current cookie should always
            // be invalid after a certain amount of time, so the user has to login with username/password
            // again from time to time. This is good and safe ! ;)
            $_SESSION["feedback_positive"][] = FEEDBACK_COOKIE_LOGIN_SUCCESSFUL;
            $generic_model->logActionPHP("Login With Cookie Successful", "Login", "A");
            return true;
        } else {
            echo FEEDBACK_COOKIE_INVALID;
            $generic_model->logActionPHP("Login With Cookie Failed", "Login", "A");
            return false;
        }
    }
    
    /**
    * Tries to log the user in via Facebook-authentication
    * @return bool
    */
    public function loginWithFacebook($facebook_user_data = NULL, $generic_model){
        if(!isset($facebook_user_data)){
            // instantiate the facebook object
            $facebook = new Facebook(array('appId' => FACEBOOK_LOGIN_APP_ID, 'secret' => FACEBOOK_LOGIN_APP_SECRET));
            
            // get "user", if the user object (array?) exists, the user has identified as a real facebook user
            $user = $facebook->getUser();
            
            if ($user) {
                try {
                    // proceed knowing you have a logged in user who's authenticated.
                    $facebook_user_data = $facebook->api('/me');
                    
                    $facebook_user_data['avatar_xsmall'] = $facebook->api('/me/picture?type=square&redirect=false')['data']['url'];
                    $facebook_user_data['avatar_small'] = $facebook->api('/me/picture?width=100&height=100&redirect=false')['data']['url'];
                    $facebook_user_data['avatar_medium'] = $facebook->api('/me/picture?width=200&height=200&redirect=false')['data']['url'];
                    $facebook_user_data['avatar_large'] = $facebook->api('/me/picture?width=400&height=400&redirect=false')['data']['url'];
                    $facebook_user_data['avatar_xlarge'] = $facebook->api('/me/picture?width=800&height=800&redirect=false')['data']['url'];
                } catch (FacebookApiException $e) {
                    // when facebook goes offline
                    error_log($e);
                    $user = null;
                }
            } else 
                return false;
        }
        
        // check database for data from exactly that user (identified via Facebook ID)
        $query = $this->db->prepare("SELECT id,
            firstname,
            lastname,
            username,
            email,
            email,
            user_active,
            user_account_type,
            user_provider_type
            FROM ".PREFIX."users 
            WHERE user_facebook_uid = :user_facebook_uid
            AND user_provider_type = :provider_type");
        $query->execute(array(':user_facebook_uid' => $facebook_user_data['id'], ':provider_type' => 'FACEBOOK'));
        $count =  $query->rowCount();
        if ($count != 1) {
            //echo FEEDBACK_FACEBOOK_LOGIN_NOT_REGISTERED;
            $generic_model->logActionPHP("Facebook Login Failed", "login", "A");
            return -1;
        }
        
        $result = $query->fetch();
        if ($result->user_active != 1) {
            echo FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET;
            // login process, write the user data into session
            Session::init();
            Session::set('user_logged_in', false);
            Session::set('user_id', $result->id);
            Session::set('firstname', $result->firstname);
            Session::set('lastname', $result->lastname);
            Session::set('username', $result->username);
            Session::set('email', $result->email);
            Session::set('email', $result->email);
            Session::set('user_account_type', $result->user_account_type);
            Session::set('user_provider_type', 'FACEBOOK');
            // put native avatar path into session
            Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            Session::set('user_avatar_xsmall', $facebook_user_data['avatar_xsmall']);
            Session::set('user_avatar_small', $facebook_user_data['avatar_small']);
            Session::set('user_avatar_medium', $facebook_user_data['avatar_medium']);
            Session::set('user_avatar_large', $facebook_user_data['avatar_large']);
            Session::set('user_avatar_xlarge', $facebook_user_data['avatar_xlarge']);
            // put Gravatar URL into session
            $this->setGravatarImageUrl($result->email, AVATAR_SIZE);
            
            return 0;
        }
        // put user data into session
        Session::init();
        Session::set('user_logged_in', true);
        Session::set('user_id', $result->id);
        Session::set('firstname', $result->firstname);
        Session::set('lastname', $result->lastname);
        Session::set('username', $result->username);
        Session::set('email', $result->email);
        Session::set('email', $result->email);
        Session::set('user_account_type', $result->user_account_type);
        Session::set('user_provider_type', 'FACEBOOK');
        Session::set('store_name', $result->store_name);
        Session::set('address_status', $result->status);
        Session::set('address', $result->address);
        
        Session::set('user_avatar_file', $this->getUserAvatarFilePath());
        Session::set('user_avatar_xsmall', $facebook_user_data['avatar_xsmall']);
        Session::set('user_avatar_small', $facebook_user_data['avatar_small']);
        Session::set('user_avatar_medium', $facebook_user_data['avatar_medium']);
        Session::set('user_avatar_large', $facebook_user_data['avatar_large']);
        Session::set('user_avatar_xlarge', $facebook_user_data['avatar_xlarge']);
        
        
        // generate integer-timestamp for saving of last-login date
        $user_last_login_timestamp = time();
        // write timestamp of this login into database (we only write "real" logins via login form into the
        // database, not the session-login on every page request
        $sql = "UPDATE ".PREFIX."users SET user_last_login_timestamp = :user_last_login_timestamp WHERE id = :user_id";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(':user_id' => $result->id, ':user_last_login_timestamp' => $user_last_login_timestamp));
        
        $_SESSION["feedback_positive"][] = FEEDBACK_FACEBOOK_LOGIN_SUCCESSFUL;
        $generic_model->logActionPHP("Facebook Login Successful", "login", "A");
        return true;
    }
    
    /*======================
    =   R - functions       =
    ========================*/
    
    /**
    * handles the entire registration process for DEFAULT users (not for people who register with
    * 3rd party services, like facebook) and creates a new user in the database if everything is fine
    * @return boolean Gives back the success status of the registration
    */
    public function registerNewUser($generic_model){
        // perform all necessary form checks
        if (empty($_POST['firstname'])) {
            echo "First Name field cannot be empty";
            Form::setError("firstname", "* First Name field cannot be empty");
        } elseif (empty($_POST['lastname'])) {
            echo "Last Name field cannot be empty";
            Form::setError("lastname", "* Last Name field cannot be empty");
        } elseif (empty($_POST['email'])) {
            echo "Mobile email number field cannot be empty";
            Form::setError("email", "* Mobile email number field cannot be empty");
        } elseif (empty($_POST['username'])) {
            echo FEEDBACK_USERNAME_FIELD_EMPTY;
            Form::setError("username", "* ".FEEDBACK_USERNAME_FIELD_EMPTY);
        } elseif (strlen($_POST['username']) > 64 OR strlen($_POST['username']) < 2) {
            echo FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
            Form::setError("username", "* ".FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG);
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])) {
            echo FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN;
            Form::setError("username", "* ".FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN);
        } elseif (empty($_POST['password']) OR empty($_POST['password_repeat'])) {
            echo FEEDBACK_PASSWORD_FIELD_EMPTY;
            Form::setError("password", "* ".FEEDBACK_PASSWORD_FIELD_EMPTY);
        } elseif ($_POST['password'] !== $_POST['password_repeat']) {
            echo FEEDBACK_PASSWORD_REPEAT_WRONG;
            Form::setError("password_repeat", "* ".FEEDBACK_PASSWORD_REPEAT_WRONG);
        } elseif (strlen($_POST['password']) < 6) {
            echo FEEDBACK_PASSWORD_TOO_SHORT;
            Form::setError("password", "* ".FEEDBACK_PASSWORD_TOO_SHORT);
        } /*elseif (!$this->checkCaptcha()) {
            echo FEEDBACK_CAPTCHA_WRONG;
            Form::setError("captcha", "* ".FEEDBACK_CAPTCHA_WRONG);
        }*/ elseif (!empty($_POST['username'])
        AND strlen($_POST['username']) <= 64
        AND strlen($_POST['username']) >= 2
        AND preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])
        AND !empty($_POST['email'])
        AND !empty($_POST['password'])
        AND !empty($_POST['password_repeat'])
        AND ($_POST['password'] === $_POST['password_repeat'])) {
            // clean the input
            $firstname = strip_tags($_POST['firstname']);
            $lastname = strip_tags($_POST['lastname']);
            
            $email = strip_tags($_POST['email']);
            
            $username = strip_tags($_POST['username']);
            $password = strip_tags($_POST['password']);

            $user_account_type = strip_tags($_POST['user_account_type']);

            // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character
            // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4,
            // by the password hashing compatibility library. the third parameter looks a little bit shitty, but that's
            // how those PHP 5.5 functions want the parameter: as an array with, currently only used with 'cost' => XX
            $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
            $user_password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
            
            // check if email already exists
            $query = $this->db->prepare("SELECT id, user_active FROM ".PREFIX."users WHERE email = :email");
            $query->execute(array(':email' => $email));
            $count =  $query->rowCount();
            if ($count == 1) {
                if($query->fetch()->user_active != 1){
                    echo "Account for ".$email." already exists in our database and has not been activated yet. Please enter the VERIFICATION CODE in the SMS we sent you during your registration.";
                    return 0;
                }
                echo "Email address already in use.";
                Form::setError("email", "* Mobile email number already in use.");
                return false;
            }
            
            // check if username already exists
            $query = $this->db->prepare("SELECT * FROM ".PREFIX."users WHERE username = :username");
            $query->execute(array(':username' => $username));
            $count =  $query->rowCount();
            if ($count == 1) {
                echo FEEDBACK_USERNAME_ALREADY_TAKEN;
                Form::setError("username", "* ".FEEDBACK_USERNAME_ALREADY_TAKEN);
                return false;
            }
            
            // generate random code for email verification (5 char string)
            $length = 5;
            $user_verification_code = ''.str_pad(rand(0, pow(10, $length)-1), $length, '0', STR_PAD_LEFT);
            // generate integer-timestamp for saving of account-creating date
            $user_creation_timestamp = time();
            
            // write new users data into database
            $sql = "INSERT UPDATE ".PREFIX."users (firstname, lastname, username, user_password_hash, email, user_creation_timestamp, user_activation_hash, user_provider_type, user_account_type)
                VALUES (:firstname, :lastname, :username, :user_password_hash, :email, :user_creation_timestamp, :user_activation_hash, :user_provider_type, :user_account_type)";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':username' => $username,
                ':user_password_hash' => $user_password_hash,
                ':email' => $email,
                ':user_creation_timestamp' => $user_creation_timestamp,
                ':user_activation_hash' => $user_verification_code,
                ':user_provider_type' => 'DEFAULT',
                ':user_account_type' => $user_account_type));
            $count =  $query->rowCount();
            if ($count != 1) {
                echo FEEDBACK_ACCOUNT_CREATION_FAILED;
                return false;
            }
            
            // get user_id of the user that has been created, to keep things clean we DON'T use lastInsertId() here
            $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE email = :email");
            $query->execute(array(':email' => $email));
            if ($query->rowCount() != 1) {
                echo FEEDBACK_UNKNOWN_ERROR;
                return false;
            }
            $result_user_row = $query->fetch();
            $user_id = $result_user_row->id;
            Session::set("user_id", $user_id);
            
            $body = "Thank you ".$firstname." for choosing InfoBlend.";
            $body .= "\n\nYour verification code is: ".$user_verification_code;
            $body .= "\n\nUsername: ".$username;
            $body .= "\nPassword: ".$password;
            
            // send verification email, if verification email sending failed: instantly delete the user
            if($this->sendVerificationEmail2SMS($email, $body)) {
                /**
                * TEMPORARY
                */
                $sql = "UPDATE ".PREFIX."users SET user_id = :user_id WHERE id = :user_id";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(':user_id' => $user_id));
                /*
                *
                */
                
                $count =  $query->rowCount();
                if ($count != 1) {
                    $query = $this->db->prepare("DELETE FROM ".PREFIX."users WHERE id = :last_inserted_id");
                    $query->execute(array(':last_inserted_id' => $user_id));
                    echo FEEDBACK_ACCOUNT_CREATION_FAILED;
                    $generic_model->logActionPHP("Registration Failed", "Register", "A");
                    return false;
                }else{
                    $generic_model->logActionPHP("Registration Successful", "Register", "A");
                    $_SESSION["feedback_positive"][] = "Your account has been created successfully and we have sent an email to ".$email.". Please use the VERIFICATION CODE within that SMS.";
                    return true;
                }
            }else{
                $query = $this->db->prepare("DELETE FROM ".PREFIX."users WHERE id = :last_inserted_id");
                $query->execute(array(':last_inserted_id' => $user_id));
                echo "Sorry, we could not send you a verification SMS. Your account has NOT been created.";
                $generic_model->logActionPHP("Registration SMS Send Failed", "Register", "A");
                return false;
            }
        } else {
            echo FEEDBACK_UNKNOWN_ERROR;
            $generic_model->logActionPHP("Registration Failed Unknown Error", "Register", "A");
        }
        // default return, returns only true of really successful (see above)
        return false;
    }
    
    /**
    * Register user with data from the "facebook object"
    * @param array $facebook_user_data stuff from the facebook class
    * @return bool success state
    */
    public function registerNewUserWithFacebook_old(){
        // perform all necessary form checks
        if (empty($_POST['email'])) {
            echo "Mobile email number field cannot be empty";
            Form::setError("email", "* Mobile email number field cannot be empty");
        } elseif (!preg_match("/^[0-9 ]+$/", $_POST['email'])) {
            echo "Mobile email number should only be digits.";
            Form::setError("email", "* Mobile email number should only be digits.");
        }else{
            // delete dots from facebook-username (it's the common way to do this like that)
            //$clean_user_name_from_facebook = str_replace(".", "", $facebook_user_data["username"]);
            // generate integer-timestamp for saving of account-creating date
            $user_creation_timestamp = time();
            // generate random code for email verification (5 char string)
            $length = 5;
            $user_verification_code = ''.str_pad(rand(0, pow(10, $length)-1), $length, '0', STR_PAD_LEFT);
            
            // clean the input
            $fb_id = strip_tags($_POST['fb_id']);
            $firstname = strip_tags($_POST['firstname']);
            $lastname = strip_tags($_POST['lastname']);
            $gender = (isset($_POST['gender']) && !empty($_POST['gender'])) ? (strtoupper(strip_tags($_POST['gender'])) == "MALE" ? 'M' : 'F') : NULL;
            $dob = strip_tags($_POST['dob']);
            
            $city = strip_tags($_POST['city']);
                
            $email = strip_tags($_POST['email']);
            $email = strip_tags($_POST['email']);
            $email = preg_replace("/[^0-9]/", '', $email);
            if(substr($email, 0, 1) !== '0' && strlen($email) < 10)
                $email = '0'.$email;
            else if(substr($email, 0, 1) !== '0')
                $email = '+'.$email;
                
            // check if email already exists 
            $query = $this->db->prepare("SELECT id FROM ".PREFIX."users WHERE email = :email");
            $query->execute(array(':email' => $email));
            $count =  $query->rowCount();
            if ($count == 1) {
                echo "Mobile email number already in use.";
                Form::setError("email", "* Mobile email number already in use.");
                return false;
            }
            
            $username = strip_tags($_POST['username']);
            
            $sql = "INSERT UPDATE ".PREFIX."users (firstname, lastname, gender, dob, email, username, email, user_creation_timestamp, user_activation_hash, user_provider_type, user_facebook_uid)
                VALUES (:firstname, :lastname, :gender, :dob, :email, :username, :email, :user_creation_timestamp, :user_activation_hash, :user_provider_type, :user_facebook_uid)";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':gender' => $gender,
                ':dob' => $dob,
                ':email' => $email,
                ':username' => $username,
                ':email' => $email,
                ':user_creation_timestamp' => $user_creation_timestamp,
                ':user_activation_hash' => $user_verification_code,
                ':user_provider_type' => 'FACEBOOK',
                ':user_facebook_uid' => $fb_id));

            $count = $query->rowCount();
            if ($count == 1) {
                $query = $this->db->prepare("SELECT id, firstname, lastname, email, username, email, user_account_type, user_provider_type
                    FROM ".PREFIX."users
                    WHERE  username = :username AND user_provider_type = :provider_type");
                $query->execute(array(':username' => $_POST['username'], ':provider_type' => 'FACEBOOK'));
                $count_from_select_statement = $query->rowCount();
                
                if ($count_from_select_statement == 1) {
                    // registration successful
                    
                    $result_user_row = $query->fetch();
                    $user_id = $result_user_row->id;
                    
                    $body = "Thank you ".$firstname." for choosing InfoBlend.";
                    $body .= "\n\nYour verification code is: ".$user_verification_code;
                    
                    // send verification email, if verification email sending failed: instantly delete the user
                    if($this->sendVerificationEmail2SMS($email, $body)) {
                        /**
                        * TEMPORARY
                        */
                        $sql = "UPDATE ".PREFIX."users SET user_id = :user_id WHERE id = :user_id";
                        $sth = $this->db->prepare($sql);
                        $sth->execute(array(':user_id' => $user_id));
                        /*
                        *
                        */
                    
                        $sql = "INSERT UPDATE ".PREFIX."store_details (user_id, city)
                            VALUES (:user_id, :city)";
                        $query = $this->db->prepare($sql);
                        $query->execute(array(
                            ':user_id' => $user_id,
                            ':city' => $city));
                        $count =  $query->rowCount();
                        if ($count != 1) {
                            $query = $this->db->prepare("DELETE FROM ".PREFIX."users WHERE id = :last_inserted_id");
                            $query->execute(array(':last_inserted_id' => $user_id));
                            echo FEEDBACK_ACCOUNT_CREATION_FAILED;
                            return false;
                        }else{
                            $_SESSION["feedback_positive"][] = "Your account has been created successfully and we have sent an SMS to ".$email.". Please use the VERIFICATION CODE within that SMS.";
                            // login process, write the user data into session
                            Session::init();
                            Session::set('user_logged_in', false);
                            Session::set('user_id', $user_id);
                            Session::set('firstname', $result_user_row->firstname);
                            Session::set('lastname', $result_user_row->lastname);
                            Session::set('username', $result_user_row->username);
                            Session::set('email', $result_user_row->email);
                            Session::set('email', $result_user_row->email);
                            Session::set('user_account_type', $result_user_row->user_account_type);
                            Session::set('user_provider_type', 'FACEBOOK');
                            // put native avatar path into session
                            Session::set('user_avatar_xsmall', $_POST['avatar_xsmall']);
                            Session::set('user_avatar_small', $_POST['avatar_small']);
                            Session::set('user_avatar_medium', $_POST['avatar_medium']);
                            Session::set('user_avatar_large', $_POST['avatar_large']);
                            Session::set('user_avatar_xlarge', $_POST['avatar_xlarge']);
                            // put Gravatar URL into session
                            $this->setGravatarImageUrl($result_user_row->email, AVATAR_SIZE);
                            
                            // generate integer-timestamp for saving of last-login date
                            $user_last_login_timestamp = time();
                            // write timestamp of this login into database (we only write "real" logins via login form into the
                            // database, not the session-login on every page request
                            $sql = "UPDATE ".PREFIX."users SET user_last_login_timestamp = :user_last_login_timestamp WHERE id = :user_id";
                            $sth = $this->db->prepare($sql);
                            $sth->execute(array(':user_id' => $user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));
                            
                            return true;
                        }
                    }else{
                        $query = $this->db->prepare("DELETE FROM ".PREFIX."users WHERE id = :last_inserted_id");
                        $query->execute(array(':last_inserted_id' => $user_id));
                        echo "Sorry, we could not send you a verification SMS. Your account has NOT been created.";
                        return false;
                    }
                }
            }
        }
        // default return
        
        echo FEEDBACK_UNKNOWN_ERROR;
        
        return false;
    }
    
    /**
    * Register user with data from the "facebook object"
    * @param array $facebook_user_data stuff from the facebook class
    * @return bool success state
    */
    public function registerNewUserWithFacebook($facebook_user_data){
        // delete dots from facebook-username (it's the common way to do this like that)
        $clean_user_name_from_facebook = str_replace(".", "", $facebook_user_data["username"]);
        // generate integer-timestamp for saving of account-creating date
        $user_creation_timestamp = time();
        
        $facebook_user_data['gender'] = (isset($facebook_user_data['gender']) && !empty($facebook_user_data['gender'])) ? (strtoupper(strip_tags($facebook_user_data['gender'])) == "MALE" ? 'M' : 'F') : NULL;
        
        $sql = "INSERT UPDATE ".PREFIX."users (firstname, lastname, gender, dob, username, email, user_creation_timestamp, user_active, user_provider_type, user_facebook_uid)
            VALUES (:firstname, :lastname, :gender, :dob, :username, :email, :user_creation_timestamp, :user_active, :user_provider_type, :user_facebook_uid)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':firstname' => $facebook_user_data["first_name"],
            ':lastname' => $facebook_user_data["last_name"],
            ':gender' => $facebook_user_data["gender"],
            ':dob' => $facebook_user_data["birthday"],
            ':username' => $clean_user_name_from_facebook,
            ':email' => $facebook_user_data["email"],
            ':user_creation_timestamp' => $user_creation_timestamp,
            ':user_active' => 1,
            ':user_provider_type' => 'FACEBOOK',
            ':user_facebook_uid' => $facebook_user_data["id"]));
            
        $count = $query->rowCount();
        if ($count == 1) {
            $query = $this->db->prepare("SELECT id, firstname, lastname, email, gender, dob, username, email, user_account_type, user_provider_type
                FROM ".PREFIX."users
                WHERE  username = :username AND user_provider_type = :provider_type");
            $query->execute(array(':username' => $clean_user_name_from_facebook, ':provider_type' => 'FACEBOOK'));
            $count_from_select_statement = $query->rowCount();
            if ($count_from_select_statement == 1) {
                // registration successful
                
                $result_user_row = $query->fetch();
                $user_id = $result_user_row->id;
                
                
                $sql = "UPDATE ".PREFIX."users SET user_id = :user_id WHERE id = :user_id";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(':user_id' => $user_id));
                
                $sql = "INSERT UPDATE ".PREFIX."store_details (user_id, city)
                    VALUES (:user_id, :city)";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                    ':user_id' => $user_id,
                    ':city' => $facebook_user_data['location']['name']));
                $count =  $query->rowCount();
                if ($count != 1) {
                    $query = $this->db->prepare("DELETE FROM ".PREFIX."users WHERE id = :last_inserted_id");
                    $query->execute(array(':last_inserted_id' => $user_id));
                    echo FEEDBACK_ACCOUNT_CREATION_FAILED;
                    
                    return false;
                }
                
                // login process, write the user data into session
                Session::init();
                Session::set('user_logged_in', true);
                Session::set('user_id', $user_id);
                Session::set('firstname', $result_user_row->firstname);
                Session::set('lastname', $result_user_row->lastname);
                Session::set('username', $result_user_row->username);
                Session::set('email', $result_user_row->email);
                Session::set('email', $result_user_row->email);
                Session::set('user_account_type', $result_user_row->user_account_type);
                Session::set('user_provider_type', 'FACEBOOK');
                // put native avatar path into session
                Session::set('user_avatar_xsmall', $facebook_user_data['avatar_xsmall']);
                Session::set('user_avatar_small', $facebook_user_data['avatar_small']);
                Session::set('user_avatar_medium', $facebook_user_data['avatar_medium']);
                Session::set('user_avatar_large', $facebook_user_data['avatar_large']);
                Session::set('user_avatar_xlarge', $facebook_user_data['avatar_xlarge']);
                // put Gravatar URL into session
                $this->setGravatarImageUrl($result_user_row->email, AVATAR_SIZE);
                
                // generate integer-timestamp for saving of last-login date
                $user_last_login_timestamp = time();
                // write timestamp of this login into database (we only write "real" logins via login form into the
                // database, not the session-login on every page request
                $sql = "UPDATE ".PREFIX."users SET user_last_login_timestamp = :user_last_login_timestamp WHERE id = :user_id";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(':user_id' => $user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));
                
                return true;
            }
        }
        // default return
        return false;
    }
    
    /**
    * This is the main method to handle the full facebook registration process
    * @return bool The entire facebook registration's success status
    */
    public function registerWithFacebook($generic_model){
        // instantiate the facebook object
        $facebook = new Facebook(array('appId'  => FACEBOOK_LOGIN_APP_ID, 'secret' => FACEBOOK_LOGIN_APP_SECRET));
        
        // get user id (string)
        $user = $facebook->getUser();
        
        // if the user object (array?) exists, the user has identified as a real facebook user
        if ($user) {
            try {
                // Proceed knowing you have a logged in user who's authenticated
                $facebook_user_data = $facebook->api('/me');
                
                $facebook_avatar_xsmall = $facebook->api('/me/picture?type=square&redirect=false');
                $facebook_avatar_small = $facebook->api('/me/picture?width=100&height=100&redirect=false');
                $facebook_avatar_medium = $facebook->api('/me/picture?width=200&height=200&redirect=false');
                $facebook_avatar_large = $facebook->api('/me/picture?width=400&height=400&redirect=false');
                $facebook_avatar_xlarge = $facebook->api('/me/picture?width=800&height=800&redirect=false');
                
                $facebook_user_data['avatar_xsmall'] = $facebook_avatar_xsmall['data']['url'];
                $facebook_user_data['avatar_small'] = $facebook_avatar_small['data']['url'];
                $facebook_user_data['avatar_medium'] = $facebook_avatar_medium['data']['url'];
                $facebook_user_data['avatar_large'] = $facebook_avatar_large['data']['url'];
                $facebook_user_data['avatar_xlarge'] = $facebook_avatar_xlarge['data']['url'];
                
                if(isset($facebook_user_data['birthday']) && !empty($facebook_user_data['birthday'])){
                    $facebook_user_data['birthday'] = DateTime::createFromFormat('m/d/Y', $facebook_user_data['birthday'])->format('Y-m-d');
                }
            } catch (FacebookApiException $e) {
                // when facebook goes offline or armageddon comes or some shit like that
                error_log($e);
                $user = null;
                echo FEEDBACK_FACEBOOK_OFFLINE;
                $generic_model->logActionPHP("Facebook Offline", "Register", "A");
                return false;
            }
        }
        
        // if we don't have the facebook-user array variable, leave the method
        if (!$facebook_user_data) {
            echo FEEDBACK_FACEBOOK_UID_ALREADY_EXISTS;
            $generic_model->logActionPHP("Facebook UID Already Exists", "Register", "A");
            return false;
        }
        
        // check if a user with that facebook user id (UID) has already registered
        if ($this->facebookUserIdExistsAlreadyInDatabase($facebook_user_data)) {
            //echo FEEDBACK_FACEBOOK_UID_ALREADY_EXISTS;
            return $this->loginWithFacebook($facebook_user_data);
            //return false;
        }
        
        // check if a user with that username already exists in our database
        // note: Facebook's internal username is usually the person's full name plus a number (and dots between)
        $facebook_user_data["username"] = $facebook_user_data["first_name"];
        if ($this->facebookUserNameExistsAlreadyInDatabase($facebook_user_data)) {
            $facebook_user_data["username"] = $this->generateUniqueUserNameFromExistingUserName($facebook_user_data["username"]);
            if ($this->facebookUserNameExistsAlreadyInDatabase($facebook_user_data)) {
                //shouldn't get here if we managed to generate a unique name!
                echo FEEDBACK_FACEBOOK_USERNAME_ALREADY_EXISTS;
                $generic_model->logActionPHP("Facebook Username Already Exists", "Register", "A");
                return false;
            }
        }
        
        // check if user provides mail address (registration will only work when user agrees to provide email address)
        if (!$this->facebookUserHasEmail($facebook_user_data)) {
            //echo FEEDBACK_FACEBOOK_EMAIL_NEEDED;
            return $facebook_user_data;
        }
        
        // check if that email address already exists in our database
        if ($this->facebookUserEmailExistsAlreadyInDatabase($facebook_user_data)) {
            echo FEEDBACK_FACEBOOK_EMAIL_ALREADY_EXISTS;
            return false;
        }
        
        // all necessary things have been checked, so let's create that user
        if ($this->registerNewUserWithFacebook($facebook_user_data)) {
            $_SESSION["feedback_positive"][] = FEEDBACK_ACTIVATION_SUCCESSFUL;
            $generic_model->logActionPHP("Facebook Register Successful", "Register", "A");
            return true;
        } else {
            echo FEEDBACK_UNKNOWN_ERROR;
            $generic_model->logActionPHP("Facebook Register Failed", "Register", "A");
            return false;
        }
        
        // default return
        return false;
    }
    
    /*======================
    =   S - functions       =
    ========================*/
    
    /**
    * sends an email to our SMS Gateway and then to the user's email as sms
    * @param string $email user's email
    * @return boolean gives back true if mail has been sent, gives back false if no mail could been sent
    */
    private function sendVerificationEmail2SMS($email, $body){
       return true;
       /*
        // create PHPMailer object (this is easily possible as we auto-load the according class(es) via composer)
        $mail = new PHPMailer;
        
        // please look into the config/config.php for much more info on how to use this!
        if (EMAIL_USE_SMTP){
            // set PHPMailer to use SMTP
            $mail->IsSMTP();
            // useful for debugging, shows full SMTP errors, config this in config/config.php
            $mail->SMTPDebug = PHPMAILER_DEBUG_MODE;
            // enable SMTP authentication
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            // enable encryption, usually SSL/TLS
            if(defined('EMAIL_SMTP_ENCRYPTION')){
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            // set SMTP provider's credentials
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }
        
        // fill mail with data
        $mail->From = EMAIL_VERIFICATION_FROM_EMAIL;
        $mail->FromName = EMAIL_VERIFICATION_FROM_NAME;
        $mail->AddAddress(SMS_GATEWAY);
        $mail->Subject = $email;
        $mail->Body = $body;
        
        // final sending and check
        if($mail->Send()) {
            //$_SESSION["feedback_positive"][] = "A verification SMS has been sent successfully.";
            return true;
        } else {
            echo "Verification SMS could not be sent due to: " . $mail->ErrorInfo;
            return false;
        }
        */
    }
    
    /*======================
    =   V - functions       =
    ========================*/
    
    /**
    * checks the email/verification code combination and set the user's activation status to true in the database
    * @param int $user_id user id
    * @return bool success status
    */
    public function verifyNewUser($user_id, $fb = NULL, $generic_model ){
        $user_activation_verification_code = $_POST['verification_code'];
        
        $sth = $this->db->prepare("UPDATE ".PREFIX."users
            SET user_active = 1, user_activation_hash = NULL
            WHERE id = :user_id AND user_activation_hash = :user_activation_hash");
        $sth->execute(array(':user_id' => $user_id, ':user_activation_hash' => $user_activation_verification_code));
        
        if($sth->rowCount() == 1){
            $_SESSION["feedback_positive"][] = FEEDBACK_ACCOUNT_ACTIVATION_SUCCESSFUL;
            $generic_model->logActionPHP("Account Activation Successful", "Register", "A");
            if(isset($fb)){
                Session::set('user_logged_in', true);
                return 1;
            }
            return true;
        }else{
            echo FEEDBACK_ACCOUNT_ACTIVATION_FAILED;
            $generic_model->logActionPHP("Account Activation Failed", "Register", "A");
            return false;
        }
    }
}
