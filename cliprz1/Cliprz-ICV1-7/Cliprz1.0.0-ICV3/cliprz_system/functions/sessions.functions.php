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
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name sessions.functions.php .
 *  Created date 09/12/2012 01:50 AM.
 *  Last modification date 09/12/2012 01:50 AM.
 *
 * Description :
 *  Sessions functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists("c_session_prefix"))
{
    /**
     * get session prefix from config.
     */
    function c_session_prefix()
    {
        global $_conifg;
        return $_conifg['session']['prefix'];
    }
}

?>