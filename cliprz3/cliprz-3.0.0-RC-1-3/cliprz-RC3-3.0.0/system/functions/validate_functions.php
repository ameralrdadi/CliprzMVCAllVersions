<?php

/**
 * Cliprz framework
 *
 * Color your project, An open source application development framework for PHP 5.3.0 or newer
 *
 * LICENSE: This program is released as free software under the Affero GPL license. You can redistribute it and/or
 * modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 * at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 * written permission from the original author(s)
 *
 * @package    Cliprz
 * @author     Yousef Ismaeil <cliprz@gmail.com>
 * @copyright  Copyright (c) 2012 - 2013, Cliprz Developers team
 * @license    http://www.cliprz.org/agpl.txt
 * @link       http://www.cliprz.org
 * @since      Version 3.0.0
 */


/**
 * Check the value is integer
 *
 * @param integer The validate value
 *
 * @return true if input is integer
 */
if (!function_exists('validate_integer')) {
    function validate_integer ($int) {
        return (boolean) ((preg_match("/^[0-9]+$/",$int) && filter_var($int,FILTER_VALIDATE_INT)) ? true : false);
    }
}

/**
 * Check if email address is validate
 *
 * @param string Input value
 *
 * @return true if email address is validate
 */
if (!function_exists('validate_email')) {
    function validate_email ($email) {
        $pattren = "/^[A-Z0-9_.-]{1,40}+@([A-Z0-9_-]){2,30}+\.([A-Z0-9]){2,20}$/i";
        return (boolean) preg_match($pattren,$email);
    }
}

/**
 * Check if website urls is validate
 *
 * @param string Input value
 *
 * @return true if website url is validate
 */
if (!function_exists('validate_url')) {
    function validate_url ($url) {
        $pattren = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        return (boolean) preg_match($pattren,$url);
    }
}

/**
 * Validate cookie name
 *
 * @param string
 * @return true if validate cookie name
 */
if (!function_exists('validate_cookie')) {
    function validate_cookie ($cookie_id) {
        return (boolean) (preg_match("/^[0-9a-z_-]+$/i",$cookie_id));
    }
}

/**
 * Validate session name
 *
 * @param string
 * @return true if validate session name
 */
if (!function_exists('validate_session')) {
    function validate_session ($session_id) {
        return validate_cookie($session_id);
    }
}

/**
 * File information
 *
 * @name      validate_functions.php
 * @directory ./system/functions/
 */

?>