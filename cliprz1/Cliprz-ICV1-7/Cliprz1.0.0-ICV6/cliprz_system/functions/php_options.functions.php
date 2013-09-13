<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 6.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name php_options.functions.php .
 *  Created date 13/12/2012 06:59 PM.
 *  Last modification date 13/12/2012 06:59 PM.
 *
 * Description :
 *  PHP Options/Info functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists('c_php_get_constants'))
{
    /**
     * Returns an associative array with the names of all the constants and their values.
     *
     * @param (boolean) $categorize - Causing this function to return a multi-dimensional array with
     *  categories in the keys of the first dimension and constants and their values in the second dimension.
     */
    function c_php_get_constants($categorize=true,$print_r=true)
    {
        if (is_bool($categorize) && is_bool($print_r))
        {
            if ($print_r == true)
            {
                return c_print_r(get_defined_constants($categorize));
            }
            else
            {
                return get_defined_constants($categorize);
            }
        }
    }
}

?>