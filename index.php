<?php

/** /////////////////////////////////////////////////////////////////////
 * A simple, clean and secure PHP Login Script embedded into a small framework.
 * Also available in other versions: one-file, minimal, advanced. See php-login.net for more info.
 *
 * MVC FRAMEWORK VERSION
 *
 * @author Panique
 * @link http://www.php-login.net/
 * @link https://github.com/panique/php-login/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// Load application config (error reporting, database credentials etc.)
require 'application/config/config.php';

// The auto-loader to load the php-login related internal stuff automatically
require 'application/config/autoload.php';

/********************
*	Libraries	*
*********************/
// PHPMailer - A full-featured email creation and transfer class for PHP
require 'application/libs/PHPMailer/class.phpmailer.php';

// This library is intended to provide forward compatibility with the [password_*](http://php.net/password) functions being worked on for PHP 5.5.
require 'application/libs/password_compat/lib/password.php';

// Gregwar's Captcha
require 'application/libs/Captcha/CaptchaBuilderInterface.php';
require 'application/libs/Captcha/PhraseBuilderInterface.php';
require 'application/libs/Captcha/CaptchaBuilder.php';
require 'application/libs/Captcha/PhraseBuilder.php';

//  KINT, a much better version of var_dump. KINT can be used with the simple function d()
require 'application/libs/kint/Kint.class.php';

// load dataTables static helper class
require 'application/libs/dataTables/ssp.class.php';

require 'application/libs/smart_resize_image.function.php';

/***************************
*	End of Libraries	*
****************************/

// The Composer auto-loader (official way to load Composer contents) to load external stuff automatically
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// Start our application
$app = new Application();
