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
 *  File path BASE_PATH/cliprz_application/config/ .
 *  File name wakeup.php .
 *  Created date 21/11/2012 01:00 AM.
 *  Last modification date 01/12/2012 08:17 AM.
 *
 * Description :
 *  Wakeup project jobs.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

/**
if ($_config['db']['pconnect'] == true)
{
    cliprz::system(database)->pconnect($_config['db']['host'],$_config['db']['user'],$_config['db']['pass']);
}
else
{
    cliprz::system(database)->connect($_config['db']['host'],$_config['db']['user'],$_config['db']['pass']);
}

cliprz::system(database)->select_db($_config['db']['name']);
cliprz::system(database)->set_charset();
*/

?>