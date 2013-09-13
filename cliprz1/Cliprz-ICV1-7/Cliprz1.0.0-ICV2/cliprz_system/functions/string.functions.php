<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 2.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name string.functions.php .
 *  Created date 18/11/2012 07:51 AM.
 *  Last modification date 18/11/2012 07:51 AM.
 *
 * Description :
 *  string functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists('c_addslashes'))
{
    /**
     * Quote string with slashes and strip whitespace from the beginning and end of a string.
     *
     * @param (string) $str - The string to be escaped.
     */
    function c_addslashes ($str)
    {
        return trim(addslashes($str));
    }
}

if (!function_exists('c_stripslashes'))
{
    /**
     * Un-quotes a quoted string.
     *
     * @param (string) $str - The input string.
     */
    function c_stripslashes ($str)
    {
        return stripslashes($str);
    }
}

if (!function_exists('c_htmlentities'))
{
    /**
     * Convert all applicable characters to HTML entities with utf-8.
     *
     * @param (string) $string - The input string..
     * @param (resource) $flags - A bitmask of one or more of the following flags, which specify how to handle quotes,
     *  invalid code unit sequences and the used document type.
     */
    function c_htmlentities($string,$flags=null)
    {
        global $_config;

        if (is_null($flags))
        {
            return htmlentities($string,ENT_COMPAT,$_config['output']['charset']);
        }
        else
        {
            return htmlentities($string,$flags,$_config['output']['charset']);
        }
    }
}

if (!function_exists('c_strip_tags'))
{
    /**
     * Strip HTML and PHP tags from a string.
     *
     * @param (string) $str - The input string. .
     */
    function c_strip_tags($str)
    {
        return trim(strip_tags($str));
    }
}

?>