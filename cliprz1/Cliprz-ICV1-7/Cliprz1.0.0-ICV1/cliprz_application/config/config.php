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
 *  File path BASE_PATH/cliprz_application/config/ .
 *  File name config.php .
 *  Created date 21/11/2012 01:00 AM.
 *  Last modification date 21/11/2012 01:11 AM.
 *
 * Description :
 *  Config file.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

/**
 * if you wan't to use mysql and pconnect function remove # and add a true value.
 */
#$_config['db']['pconnect'] = false;

/**
 * database host server.
 */
$_config['db']['host'] = "localhost";

/**
 * database username.
 */
$_config['db']['user'] = "root";

/**
 * database password.
 */
$_config['db']['pass'] = "";

/**
 * database name.
 */
$_config['db']['name'] = "";

/**
 * database prefix
 */
$_config['db']['prefix'] = "";

/**
 * database charset.
 */
$_config['db']['charset'] = "utf8";

/**
 * database driver, can by mysql or imysql or pdo.
 */
$_config['db']['driver_path'] = "mysql";
$_config['db']['driver_name'] = "mysql";

/**
 * Sessions and Cookies
 */

$_conifg['session']['name']   = "CLIPRZCOOKIE";
$_conifg['session']['prefix'] = "cliprz_session_";

/**
 * Output and Multibyte String.
 */
$_config['output']['charset'] = "UTF-8";


	

?>