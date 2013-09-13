<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 5.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name system.functions.php .
 *  Created date 16/12/2012 06:59 PM.
 *  Last modification date 16/01/2013 11:39 PM.
 *
 * Description :
 *  Our System functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists('c_style'))
{
    /**
     * CSS style url.
     *
     * @param (string) $filename - file name.
     * @param (boolean) $compress - Compress CSS file.
     */
    function c_style ($filename,$compress=false)
    {
        echo cliprz::system(css)->style($filename,$compress);
    }
}

if (!function_exists('c_image'))
{
    /**
     * Get image from public/images/ path.
     *
     * @param (string) $imagename - imaeg name - you can add a folders inside public/image path.
     */
    function c_image ($imagename)
    {
        echo cliprz::system(view)->image($imagename);
    }
}

?>