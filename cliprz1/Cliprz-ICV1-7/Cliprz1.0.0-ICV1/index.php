<?php
ob_start();

#ini_set("zlib.output_compression", "On");
#ini_set('memory_limit', '1024M');
#ini_set('open_basedir', '');
#ini_set('cgi.fix_pathinfo', 1);

if(extension_loaded('zlib')) { ob_start('ob_gzhandler'); }

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
 *  File path BASE_PATH/ .
 *  File name index.php .
 *  Created date 17/10/2012 12:54 AM.
 *  Last modification date 26/11/2012 08:36 PM.
 *
 * Description :
 *  Home page, Never modify this file.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

/**
 * @def (boolean) IN_CLIPRZ - We will use this to ensure scripts are not called from outside of the framework.
 */
define('IN_CLIPRZ',true);
// example : if (!defined("IN_CLIPRZ")) die('Access Denied');

/**
 * @def (resource) BASE_PATH - get a base path.
 */
define('BASE_PATH',realpath(dirname(__FILE__)).'/',true);

// check if PHP is 4.4.0 or --
if (version_compare(phpversion(),"5.2.6", "<"))

    exit("Please upgrade to PHP 5.2.6 or >");

require_once BASE_PATH.'cliprz_system/autoload.php';

// Don't include below files. (this files for framework team only)
//include (BASE_PATH."author/md5.php");
// include (BASE_PATH."author/hacking.php");
// include (BASE_PATH."author/console.php");

// Start Lodaed Content

// Loaded content


// End Lodaed Content

if (file_exists(APP_PATH.'config/sleep.php'))

    require_once APP_PATH.'config/sleep.php';

// Don't include below files. (this files for framework team only)
//include (BASE_PATH."author/bench.php");

if(extension_loaded('zlib')) { ob_end_flush(); }

ob_end_flush();
?>