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
 * Un-quotes a quoted string
 *
 * @param mixed The input string
 */
if (!function_exists('strip_slashes')) {
    function strip_slashes ($str) {
        if (is_array($str)) {
            foreach ($str as $key => $val)
            {
                $str[$key] = strip_slashes($val);
            }
        } else {
            $str = stripslashes($str);
        }
        return $str;
    }
}

/**
 * Quote string with slashes and strip whitespace from the beginning and end of a string
 *
 * @param mixed   The string to be escaped
 * @param boolean Use trim spacing
 *
 * @access public
 * @static
 */
if (!function_exists('add_slashes')) {
    function add_slashes ($str,$trim=true) {
        if (is_array($str))
        {
            foreach ($str as $key => $val) {
                $str[$key] = add_slashes($val,$trim);
            }
        } else {
            $str = (is_bool($trim) && $trim == TRUE) ? trim(addslashes($str)) : addslashes($str);
        }
        return $str;
    }
}

/**
 * File information
 *
 * @name      string_functions.php
 * @directory ./system/functions/
 */

?>