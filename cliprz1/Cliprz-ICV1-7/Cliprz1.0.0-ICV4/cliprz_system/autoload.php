<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 4.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/ .
 *  File name autoload.php .
 *  Created date 17/10/2012 05:06 AM.
 *  Last modification date 06/01/2013 07:00 PM.
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
 * @def (string) CLIPRZ - Cliprz prefix.
 */
define("CLIPRZ","cliprz_");

/**
 * @def (resource) SYS_PATH - get our system files.
 */
define('SYS_PATH',BASE_PATH.'cliprz_system'.DS,true);

/**
 * @def (resource) APP_PATH - get your application path.
 */
define('APP_PATH',BASE_PATH.'cliprz_application'.DS,true);

/**
 * @def (resource) TMP_PATH - temporary path.
 */
define('TMP_PATH',BASE_PATH.'cliprz_temporary'.DS,true);

/**
 * @def (resource) FUNCTIONS - get our system functions.
 */
define('FUNCTIONS',SYS_PATH.'functions'.DS,true);

/**
 * @def (resource) LIB_PATH - libraries path.
 */
define('LIB_PATH',SYS_PATH.'libraries'.DS,true);

/**
 * @def (resource) INCLUDES - get cliprz_application/includes folder.
 */
define("INCLUDES",APP_PATH.'includes'.DS);

/**
 * @def (resource) PUBLIC_PATH - get public path.
 */
define("PUBLIC_PATH",BASE_PATH.'public'.DS);

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

// css
define("css","css",true);

// language
define("language","language",true);

$_config = array();
$_lang   = array();

if (file_exists(APP_PATH.'config'.DS.'config.php'))

    require_once (APP_PATH.'config'.DS.'config.php');

else

    exit(APP_PATH.'config'.DS.'config.php not found.');


if (file_exists(APP_PATH.'config'.DS.'constants.php'))

    require_once APP_PATH.'config'.DS.'constants.php';


// call our functions. __autoload
require_once FUNCTIONS.'error_handling.functions.php';
require_once FUNCTIONS.'array.functions.php';
require_once FUNCTIONS.'string.functions.php';
require_once FUNCTIONS.'multibyte_string.functions.php';
require_once FUNCTIONS.'iconv.functions.php';
require_once FUNCTIONS.'datetime.functions.php';
require_once FUNCTIONS.'server.functions.php';
require_once FUNCTIONS.'network.functions.php';
require_once FUNCTIONS.'sessions.functions.php';
require_once FUNCTIONS.'filesystem.functions.php';
require_once FUNCTIONS.'validate_filters.functions.php';
require_once FUNCTIONS.'url.functions.php';
require_once FUNCTIONS.'php_options.functions.php';
require_once FUNCTIONS.'cliprz.functions.php';

// call core calss.
if (file_exists(SYS_PATH.'cliprz'.DS.'cliprz.php'))

    require_once SYS_PATH.'cliprz'.DS.'cliprz.php';

else

    trigger_error(SYS_PATH.'cliprz'.DS.'cliprz.php Not found.');

//cliprz::get_instance();

cliprz::system_use(security,security);

cliprz::system_use(language.'s',language);

cliprz::system_use(error.'s',error);

if ($_config['db']['use_database'] == true)
{
    define("database",'database',true);
    cliprz::system_use(database.'s',database);
}

cliprz::system_use(model.'s',model);

if (file_exists(APP_PATH.'config'.DS.'wakeup.php'))

    require_once APP_PATH.'config'.DS.'wakeup.php';


cliprz::system_use(session.'s',session);

if (file_exists(APP_PATH."config".DS."libraries.php"))

    require_once APP_PATH."config".DS."libraries.php";

cliprz::system_use(view.'s',view);
cliprz::system_use(css,css);

cliprz::system_use(router,router);

// get user constants file;

if (file_exists(APP_PATH.'config'.DS.'router.php'))

	require_once APP_PATH.'config'.DS.'router.php';

require_once FUNCTIONS.'system.functions.php';

cliprz::system(router)->handler();

?>