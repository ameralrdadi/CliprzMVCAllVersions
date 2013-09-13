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
 *  File path BASE_PATH/cliprz_system/views/ .
 *  File name view.php .
 *  Created date 17/10/2012 04:15 AM.
 *  Last modification date 02/11/2012 04:23 PM.
 *
 * Description :
 *  View class.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

class view
{

    /**
     * @var (string) $ext - .
     * @access protected.
     */
    protected static $ext = '.page.php';

    /**
     * display file from project views folder.
     *
     * @param (string) $file - file name.
     * @param (string) $folder - if view file in folder but the folder name.
     * @param (array) $data - put data in view files.
     */
    public function display($file,$folder='',$data=null)
    {
        $view_path = null;

        // check path for view file
        if ($folder == '')
        {
            $view_path = APP_PATH.'views/'.$file.self::$ext;
        }
        else
        {
            $view_path = APP_PATH.'views/'.c_trim_path($folder).'/'.$file.self::$ext;
        }

        // extract data if exsists
        if (!is_null($data) && is_array($data))
        {
            extract($data);
        }

        // include and show view file
        if (file_exists($view_path))
        {
            require_once $view_path;
        }
        else
        {
            cliprz::system(error)->show_404();
        }

        // unset data
        unset($data,$view_path,$folder);

    }

}

?>