<?php

/**
 * RegisterModel
 *
 * Handles the user's register / logout / registration stuff
 */
use Gregwar\Captcha\CaptchaBuilder;

class RegisterModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /*======================
    =   R - functions       =
    ========================*/
    
    /**
    * handles the entire registration process for DEFAULT user (not for people who register with
    * 3rd party services, like facebook) and creates a new user in the database if everything is fine
    * @return boolean Gives back the success status of the registration
    */
    public function registerNewUser($generic_model){
        // perform all necessary form checks
        // clean the input
        $name = strip_tags($_POST['name']);
        $surname = strip_tags($_POST['surname']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $user_account_type = "User";

        // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character
        // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4,
        // by the password hashing compatibility library. the third parameter looks a little bit shitty, but that's
        // how those PHP 5.5 functions want the parameter: as an array with, currently only used with 'cost' => XX
        $hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
        $user_password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
        
        // check if email already exists
        $query = $this->db->prepare("SELECT user_id, user_active FROM ".PREFIX."user WHERE email = :email");
        $query->execute(array(':email' => $email));
        $count =  $query->rowCount();
        if ($count == 1) {
            if($query->fetch()->user_active != 1){
                echo "Account for ".$email." already exists in our database and has not been activated yet. Please enter the VERIFICATION CODE in the email we sent you during your registration.";
                return false;
            }
            echo "Email address already in use.";
            Form::setError("email", "* Mobile email or number already in use.");
            return false;
        }
         
        // generate random code for email verification (5 char string)
        $length = 5;
        $user_verification_code = ''.str_pad(rand(0, pow(10, $length)-1), $length, '0', STR_PAD_LEFT);
        // generate integer-timestamp for saving of account-creating date
        $user_creation_timestamp = time();
        
        // write new user data into database
        $sql = "INSERT INTO ".PREFIX."user (name, surname, username, user_password_hash, email, user_creation_timestamp, user_activation_hash, user_provider_type, user_account_type)
            VALUES (:name, :surname, :username, :user_password_hash, :email, :user_creation_timestamp, :user_activation_hash, :user_provider_type, :user_account_type)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':name' => $name,
            ':surname' => $surname,
            ':username' => null,
            ':user_password_hash' => $user_password_hash,
            ':email' => $email,
            ':user_creation_timestamp' => $user_creation_timestamp,
            ':user_activation_hash' => $user_verification_code,
            ':user_provider_type' => 'DEFAULT',
            ':user_account_type' => $user_account_type));
        $count =  $query->rowCount();
        if ($count != 1) {
            echo "User insert error";
            return false;
        }
        
        // get user_id of the user that has been created, to keep things clean we DON'T use lastInsertId() here
        $query = $this->db->prepare("SELECT user_id FROM ".PREFIX."user WHERE email = :email");
        $query->execute(array(':email' => $email));
        if ($query->rowCount() != 1) {
            echo "The user_id could not be seleced";
            return false;
        }
        $result_user_row = $query->fetch();
        $user_id = $result_user_row->user_id;

        // write new practice data into database
        $sql = "INSERT INTO ".PREFIX."practice (practice_name, practice_number, type, creator_id)
            VALUES (:practice_name, :practice_number, :type, :user_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':practice_name' => $_POST["practice_name"],
            ':practice_number' => $_POST["practice_number"],
            ':type' => $_POST["type"],
            ':user_id' => $user_id
        ));        

        $count =  $query->rowCount();
        if ($count != 1) {
            echo "Account creation failed: ".FEEDBACK_ACCOUNT_CREATION_FAILED;
            return false;
        }

        // get practice_id of the user that has been created, to keep things clean we DON'T use lastInsertId() here
        $query = $this->db->prepare("SELECT practice_id FROM ".PREFIX."practice WHERE creator_id = :user_id ORDER BY practice_id DESC LIMIT 1");
        $query->execute(array(':user_id' => $user_id));
        if ($query->rowCount() != 1) {
            echo "Unable to get practice id";
            return false;
        }
        $result_practice_row = $query->fetch();
        $practice_id = $result_practice_row->practice_id;       

        // write new user data into database
        $sql = "UPDATE ".PREFIX."user SET practice_id = :practice_id WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':practice_id' => $practice_id,
            ':user_id' => $user_id));
        $count =  $query->rowCount();        

        Session::set("user_id", $user_id);

        return true;

        $body = "Thank you ".$name." for using ".SITENAME.".";
        $body .= "\n\nYour verification code is: ".$user_verification_code;
        $body .= "\n\nYou can now login with the details below: ";
        $body .= "\n\nEmail: ".$email;
        $body .= "\nPassword: ".$password;
        $body .= "\n\nYou can update your details and password in your ".SITENAME." dashboard.";
        $body .= "\n\nKind Regards";
        $body .= "\n".SITENAME." Team";
        $body .= "\n"."nuvemed.com";
        //  NOW EMAIL THE NEW DETAILS TO THE USER.
        $request = array(
            'from' => "account@nuvemed.com", 
            'fromName' => SITENAME.".com",
            'subject' => "Your ".$user_account_type." account details for ".SITENAME,
            'body' => $body,
            'address' => [$email]
        );

        if($user_account_type == "Doctor"){
            $generic_model->logActionPHP("Registration Successful", "Register", "A");
            return true;
        }

        // send verification email, if verification email sending failed: instantly delete the user
        if($this->sendEmail($request)) {
            $generic_model->logActionPHP("Registration Successful", "Register", "A");
            $_SESSION["feedback_positive"][] = "Your account has been created successfully and we have sent an email to ".$email.". Please use the VERIFICATION CODE within that email.";
            return true;
        }else{
            $query = $this->db->prepare("DELETE FROM ".PREFIX."user WHERE user_id = :last_inserted_id");
            $query->execute(array(':last_inserted_id' => $user_id));
            echo "Sorry, we could not send you a verification email. Your account has NOT been created.";
            
            $generic_model->logActionPHP("Registration email Send Failed", "Register", "A");
            return false;
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
