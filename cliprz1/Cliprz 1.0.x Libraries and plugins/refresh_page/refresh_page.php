<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Stability Stable.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/libraries/refresh_page/ .
 *  File name refresh_page.php .
 *  Created date 18/01/2013 04:00 AM.
 *  Last modification date 18/01/2013 05:30 AM.
 *
 * Description :
 *  Refrech page and show message.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

class library_refresh_page
{

    /**
     * Refrech page and show message .
     *
     * @param (string) $title - title message.
     * @param (string) $msg - content message.
     * @param (string) $page - name page.
     * @param (integer) $time - guidance after count time.
     * @access public.
     */
    
    public function refresh($title,$msg,$page=NULL,$time=NULL)
    {
    
        $refresh = array(
            "title"  => $title,
            "msg"  => $msg,
            "page" => $page,
            "time"  => $time
        );
                
        return cliprz::system(view)->display("refresh_page","",$refresh);        
        
        unset($refresh);
            
    }


}

?>