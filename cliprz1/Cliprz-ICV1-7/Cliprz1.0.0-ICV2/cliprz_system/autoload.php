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
 *  File path BASE_PATH/cliprz_system/ .
 *  File name autoload.php .
 *  Created date 17/10/2012 05:06 AM.
 *  Last modification date 25/11/2012 03:19 PM.
 *
 * Description :
 *  Autoload , Never modify this file. This file contains the constants and system files, and functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

/**
 * @def (resource) SYS_PATH - get our system files.
 */
define('SYS_PATH',BASE_PATH.'cliprz_system/',true);

/**
 * @def (resource) APP_PATH - get your application path.
 */
define('APP_PATH',BASE_PATH.'cliprz_application/',true);

/**
 * @def (resource) TMP_PATH - temporary path.
 */
define('TMP_PATH',BASE_PATH.'cliprz_temporary/',true);

/**
 * @def (resource) FUNCTIONS - get our system functions.
 */
define('FUNCTIONS',SYS_PATH.'functions/',true);

/**
 * @def (resource) INCLUDES - get includes file from .
 */
define("INCLUDES",APP_PATH.'includes/');

/**
 * @def (boolean) display errors is false, true for Devs.
 */
define("DEVELOPMENT_ENVIRONMENT",true);

// MVC system constans

// Model
define('model','model',true);

// View
define('view','view',true);

// Controller
// define('controller','controller',true); // removed by Yousef Ismaeil 25/11/2012 03:18 PM

// Router
define('router','router',true);

// errors
define("error","error",true);

// security
define("security","security",true);

// sessions
define("session","session",true);

/**
 * @def (resource) get time now.
 */
define("TIME_NOW",time());

$_config = array(array());

if (file_exists(APP_PATH.'config/config.php'))

    require_once (APP_PATH.'config/config.php');

else

    exit(APP_PATH.'config/config.php not found.');


if (file_exists(APP_PATH.'config/constants.php'))

    require_once APP_PATH.'config/constants.php';


// call our functions. __autoload
require_once FUNCTIONS.'error_handling.functions.php';
require_once FUNCTIONS.'array.functions.php';
require_once FUNCTIONS.'string.functions.php';
require_once FUNCTIONS.'multibyte_string.functions.php';
require_once FUNCTIONS.'server.functions.php';
require_once FUNCTIONS.'network.functions.php';
require_once FUNCTIONS.'filesystem.functions.php';
require_once FUNCTIONS.'cliprz.functions.php';

// call core calss.
if (file_exists(SYS_PATH.'cliprz/cliprz.php'))

    require_once SYS_PATH.'cliprz/cliprz.php';

else

    trigger_error(SYS_PATH.'cliprz/cliprz.php Not found.');

//cliprz::get_instance();

cliprz::system_use(security,security);

cliprz::system_use(error.'s',error);

cliprz::system_use('databases/'.c_trim_path($_config['db']['driver_path']).'/',$_config['db']['driver_name']);
define("database",$_config['db']['driver_name'],true);

if (file_exists(APP_PATH.'config/wakeup.php'))

    require_once APP_PATH.'config/wakeup.php';

//ini_set('session.cookie_domain','.cliprz.org');

cliprz::system_use(session.'s',session);

if (file_exists(APP_PATH."config/libraries.php"))

    require_once APP_PATH."config/libraries.php";

cliprz::system_use(model.'s',model);

cliprz::system_use(view.'s',view);

cliprz::system_use(router,router);

// get user constants file;

if (file_exists(APP_PATH.'config/router.php'))

	require_once APP_PATH.'config/router.php';

cliprz::system(router)->handler();

?>