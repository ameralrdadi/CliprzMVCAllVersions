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
 *  File path BASE_PATH/cliprz_system/sessions/ .
 *  File name session.php .
 *  Created date 01/12/2012 01:02 PM.
 *  Last modification date 01/12/2012 02:16 PM.
 *
 * Description :
 *  Sessions class.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

class session
{

    /**
     * @var (string) $session_name - session name.
     * @access protected.
     */
    protected static $session_name = "CLIPRZCOOKIE";

    /**
     * Sessions constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        global $_config;

        // Set new session name.
        if (isset($_conifg['session']['name']) && !empty($_conifg['session']['name']))
        {
            ini_set('session.name',strtoupper($_conifg['session']['name']));
        }
        else
        {
            ini_set('session.name',strtoupper(self::$session_name));
        }

        // gc_maxlifetime
        if (isset($_conifg['session']['gc_maxlifetime'])
        && !empty($_conifg['session']['gc_maxlifetime'])
        && is_integer($_conifg['session']['gc_maxlifetime']))
        {
            ini_set('session.gc_maxlifetime',$_conifg['session']['gc_maxlifetime']);
        }

        // gc_probability
        if (isset($_conifg['session']['gc_probability'])
        && !empty($_conifg['session']['gc_probability'])
        && is_integer($_conifg['session']['gc_probability']))
        {
            ini_set('session.gc_probability',$_conifg['session']['gc_probability']);
        }

        // gc_divisor
        if (isset($_conifg['session']['gc_divisor'])
        && !empty($_conifg['session']['gc_divisor'])
        && is_integer($_conifg['session']['gc_divisor']))
        {
            ini_set('session.gc_divisor',$_conifg['session']['gc_divisor']);
        }

        // gc_maxlifetime
        if (isset($_conifg['session']['gc_maxlifetime'])
        && !empty($_conifg['session']['gc_maxlifetime'])
        && is_integer($_conifg['session']['gc_maxlifetime']))
        {
            ini_set('session.gc_maxlifetime',$_conifg['session']['gc_maxlifetime']);
        }

        // session_start();

    }

    /**
     * get secure $_SESSION variable.
     *
     * @param (string) $name - session name.
     * @access public.
     */
    public static function session(&$name)
    {
        global $_SESSION,$_config;
        return $_SESSION[$_conifg['session']['prefix'].$name];
    }

    /**
     * checking for session ID's if true with numbers and characters.
     *
     * @param (string) session id.
     * @access public.
     */
    public static function check_session($id)
    {
    	if (preg_match("/^[0-9a-z]+$/", $id))
        {
    		return $id;
    	}
        else
        {
    		return "";
    	}
    }

}

?>