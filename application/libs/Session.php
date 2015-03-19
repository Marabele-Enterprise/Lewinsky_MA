<?php

/**
 * Session class
 *
 * handles the session stuff. creates session when no one exists, sets and
 * gets values, and closes the session properly (=logout). Those methods
 * are STATIC, which means you can call them with Session::get(XXX);
 */
class Session
{
    /**
     * starts the session
     */
    public static function init()
    {
        // if no session exist, start the session
        if (session_id() == '') {
            //ini_set("session.cookie_domain", URL);
            //$some_name = session_name("some_name");
            //session_set_cookie_params(0, "/", URL);
            session_start();
           // $this->set("URL", URL);
        }
    }

    /**
     * sets a specific value to a specific key of the session
     * @param mixed $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        $_SESSION[URL][$key] = $value;
    }

    /**
     * gets/returns the value of a specific key of the session
     * @param mixed $key Usually a string, right ?
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[URL][$key])) {
            return $_SESSION[URL][$key];
        }
    }

    /**
     * deletes the session (= logs the user out)
     */
    public static function destroy()
    {
        //session_start();
        unset($_SESSION[URL]);
        //session_destroy();
    }
}
