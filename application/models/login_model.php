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
    =   G - functions       =
    ========================*/
    
    /**
    * Gets the user's avatar file path
    * @return string avatar picture path
    */
    public function getUserAvatarFilePath(){
        $query = $this->db->prepare("SELECT user_has_avatar FROM ".PREFIX."user WHERE id = :user_id");
        $query->execute(array(':user_id' => $_SESSION['user_id']));
        
        if ($query->fetch()->user_has_avatar) {
            $avatar_path = AVATAR_REAL_PATH . $_SESSION['user_id'] . '.jpg';
            return URL . AVATAR_PATH . $_SESSION['user_id'] . '.jpg?=' . filemtime($avatar_path);
        } else {
            $avatar_path = AVATAR_REAL_PATH . AVATAR_DEFAULT_IMAGE;
            return URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE . "?=" . filemtime($avatar_path);
        }
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
        
        // get user's data
        // (we check if the password fits the password_hash via password_verify() some lines below)
        $sth = $this->db->prepare("SELECT a.user_id, a.name, a.surname, a.email,
            a.user_password_hash,
            a.user_active,
            a.user_account_type,
            a.user_failed_logins,
            a.user_last_failed_login, b.practice_number, b.practice_id 
            FROM ".PREFIX."user as a JOIN ".PREFIX."practice as b ON a.practice_id = b.practice_id
            WHERE  a.email = :email
            AND a.user_provider_type = :provider_type");
        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $sth->execute(array(':email' => $_POST['email'], ':provider_type' => 'DEFAULT'));
        $count =  $sth->rowCount();
        // if there's NOT one result
        if ($count != 1) {
            // was FEEDBACK_USER_DOES_NOT_EXIST before, but has changed to FEEDBACK_LOGIN_FAILED
            // to prevent potential attackers showing if the user exists
            echo FEEDBACK_LOGIN_FAILED." Email or Password is incorrect.";
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
		// login process, write the user data into session
		Session::init();
		Session::set('user_logged_in', true);
		Session::set('user_id', $result->user_id);
		Session::set('name', $result->name);
		Session::set('surname', $result->surname);
		Session::set('email', $result->email);
		Session::set('user_account_type', $result->user_account_type);
		Session::set('user_provider_type', 'DEFAULT');
        Session::set('practice_number', $result->practice_number);
        Session::set('practice_id', $result->practice_id);

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
			$sql = "UPDATE ".PREFIX."user SET user_failed_logins = 0, user_last_failed_login = NULL
			WHERE user_id = :user_id AND user_failed_logins != 0";
			$sth = $this->db->prepare($sql);
			$sth->execute(array(':user_id' => $result->user_id));
		}
		
		// generate integer-timestamp for saving of last-login date
		$user_last_login_timestamp = time();
		// write timestamp of this login into database (we only write "real" logins via login form into the
		// database, not the session-login on every page request
		$sql = "UPDATE ".PREFIX."user SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
		$sth = $this->db->prepare($sql);
		$sth->execute(array(':user_id' => $result->user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));
		
		// if user has checked the "remember me" checkbox, then write cookie
		if (isset($_POST['rememberme'])) {
			// generate 64 char random string
			$random_token_string = hash('sha256', mt_rand());
			
			// write that token into database
			$sql = "UPDATE ".PREFIX."user SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
			$sth = $this->db->prepare($sql);
			$sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));
			
			// generate cookie string that consists of user id, random string and combined hash of both
			$cookie_string_first_part = $result->user_id . ':' . $random_token_string;
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
		$sql = "UPDATE ".PREFIX."user
			SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login
			WHERE email = :email";
		$sth = $this->db->prepare($sql);
		$sth->execute(array(':email' => $_POST['email'], ':user_last_failed_login' => time() ));
		// feedback message
		//echo FEEDBACK_PASSWORD_WRONG;
		echo FEEDBACK_LOGIN_FAILED;
		
		$generic_model->logActionPHP("Login Failed", "Login", "A");
		//$generic_model->logActionPHP(md5($_POST["password"]), "Login", "A");
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
        $query = $this->db->prepare("SELECT id, name, surname, email, email, user_password_hash, 
                    user_active, user_account_type, user_has_avatar, user_failed_logins, user_last_failed_login
                    FROM ".PREFIX."user 
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
            Session::set('name', $result->name);
            Session::set('surname', $result->surname);
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
            $sql = "UPDATE ".PREFIX."user SET user_last_login_timestamp = :user_last_login_timestamp WHERE id = :user_id";
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
}
