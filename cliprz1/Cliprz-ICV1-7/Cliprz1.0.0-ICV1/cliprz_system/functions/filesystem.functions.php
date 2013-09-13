<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use..
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name filesystem.functions.php .
 *  Created date 17/10/2012 01:56 AM.
 *  Last modification date 17/10/2012 02:34 AM.
 *
 * Description :
 *  Cliprz Filesystem Functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists('c_ini_data'))
{
    /**
     * Parse a configuration file to array.
     *
     * @param (string) $filename - The filename of the ini file being parsed, With .ini extension.
     * @param (string) $process_sections - By setting the process_sections parameter to TRUE,
     *  you get a multidimensional array, with the section names and settings included.
     *  The default for process_sections is FALSE.
     * @return The settings are returned as an associative array on success, and FALSE on failure.
     */
    function c_ini_data($filename,$process_sections=false)
    {

        if (file_exists($filename))
        {
            $output = parse_ini_file($filename,$process_sections);
            return (array) $output;
        }
        else
        {
            trigger_error($filename.' configuration file not found.');
        }

    }
}

?>