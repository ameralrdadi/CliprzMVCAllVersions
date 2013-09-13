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
 * remove separator from path
 *
 * @param string path
 * @param string separator side
 *                             'left'  remove separator from beginning of path
 *                             'right' remove separator from ending of path
 *                             'both'  remove from both side
 */
if (!function_exists('trim_separator')) {
    function trim_separator($path,$side='both') {
        switch ($side) {
            case 'both':
                $path = trim(trim($path,DS),'/');
            break;
            case 'left':
                $path = ltrim(ltrim($path,DS),'/');
            break;
            case 'both':
                $path = rtrim(rtrim($path,DS),'/');
            break;
        }
        return $path;
    }
}

/**
 * Prints human-readable information about a variable with  HTML pre tag
 *
 * @param string The expression to be printed
 */
if (!function_exists('pre_print_r')) {
    function pre_print_r ($expression) {
        echo '<pre>'; print_r($expression); echo '</pre>';
    }
}

/**
 * Get clean website URl and check if have a SSL connection (Secure Socket Layer)
 */
if (!function_exists('website_url')) {
    function website_url () {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = ((!empty($_SERVER['HTTPS']) && mb_strtolower($_SERVER['HTTPS']) != 'off') ? 'https://' : 'http://');
			$script_name = (isset($_SERVER['SCRIPT_NAME'])) ? dirname($_SERVER['SCRIPT_NAME']).'/' : '';
            $url = $http.$_SERVER['HTTP_HOST'].$script_name;
            return $url;
        }
        return null;
    }
}

/**
 * File information
 *
 * @name      common.php
 * @directory ./system/functions/
 */

?>