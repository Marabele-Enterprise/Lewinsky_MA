<?php 
/**
 * Form.php
 *
 * The Form class is meant to simplify the task of keeping
 * track of errors in user submitted forms and the form
 * field values that were entered correctly.
 *
 * @author Mello MP
 * Form Class
 */
 
class Form{
	private static $values = array();  //Holds submitted form field values
	private static $errors = array();  //Holds submitted form error messages
	private static $num_errors;   //The number of errors in submitted form

	/* Initializes the class */
	public static function init(){
		/**
		* Get form value and error arrays, used when there
		* is an error with a user-submitted form.
		*/
		if(isset($_SESSION['value_array']) && isset($_SESSION['error_array'])){
			self::$values = $_SESSION['value_array'];
			self::$errors = $_SESSION['error_array'];
			self::$num_errors = count(self::$errors);
		
			unset($_SESSION['value_array']);
			unset($_SESSION['error_array']);
		}else{
			self::$num_errors = 0;
		}
	}

	/**
	* setValue - Records the value typed into the given
	* form field by the user.
	*/
	public static function setValue($field_name, $value){
		self::$values[$field_name] = $value;
	}

	/**
	* setError - Records new form error given the form
	* field name and the error message attached to it.
	*/
	public static function setError($field_name, $errmsg){
		self::$errors[$field_name] = $errmsg;
		self::$num_errors = count(self::$errors);
	}

	/**
	* value - Returns the value attached to the given
	* field, if none exists, the empty string is returned.
	*/
	public static function getValue($field_name){
		if(array_key_exists($field_name, self::$values)){
			return htmlspecialchars(stripslashes(self::$values[$field_name]));
		}else{
			return "";
		}
	}

	/**
	* error - Returns the error message attached to the
	* given field, if none exists, the empty string is returned.
	*/
	public static function getError($field_name){
		if(array_key_exists($field_name, self::$errors)){
			return "<font size=\"2\" color=\"#ff0000\">".self::$errors[$field_name]."</font>";
		}else{
			return "";
		}
	}

	/* getErrorArray - Returns the array of error messages */
	public static function getErrorArray(){
		return self::$errors;
	}
	
	/* getNumErrors - Returns the total number of errors in a form */
	public static function getNumErrors(){
		return self::$num_errors;
	}
};
 

