<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 3.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/errors/ .
 *  File name error.php .
 *  Created date 14/11/2012 07:54 PM.
 *  Last modification date 29/12/2012 11:46 AM.
 *
 * Description :
 *  Errors class.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

class cliprz_error
{

    /**
     * Show 404 error.
     *
     * @access public.
     */
    public static function show_404 ()
    {
        $forzerofor = APP_PATH.'errors'.DS.'404.php';

        if (file_exists($forzerofor))
        {
            require_once ($forzerofor);
        }
        else
        {
            echo "<h1>404</h1>";
        }
    }

    /**
     * Show database errors.
     *
     * @param (array) $_error - error content.
     *  $_error :
     *   'title'   - error title.
     *   'content' - error content (msg).
     * @access public.
     */
    public static function database ($_error='')
    {
        if (is_array($_error))
        {
            extract($_error);
        }

        if (file_exists(APP_PATH.'errors'.DS.'database.php'))
        {
            require_once APP_PATH.'errors'.DS.'database.php';
        }

        exit();
    }

}

?>