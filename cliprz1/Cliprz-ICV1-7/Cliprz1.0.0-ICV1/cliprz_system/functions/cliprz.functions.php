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
 *  File name cliprz.functions.php .
 *  Created date 30/10/2012 06:52 AM.
 *  Last modification date 31/10/2012 05:34 PM.
 *
 * Description :
 *  cliprz functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists("c_trim_path"))
{
    /**
     * Remove slashes from beginning and ending of path.
     *
     * @param (string) $path - Site path.
     */
    function c_trim_path ($path)
    {
        $output = trim($path,'/');
        return $output;
    }
}

?>