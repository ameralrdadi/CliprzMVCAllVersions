<?php
ob_start();

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
 *  File path BASE_PATH/ .
 *  File name index.php .
 *  Created date 17/10/2012 12:54 AM.
 *  Last modification date 29/12/2012 11:39 AM.
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

// Don't modify remove (#) from below lines.

/**
 * Paths and Directories.
 */
#ini_set("doc_root","");
#ini_set("user_dir","");

#ini_set("cgi.force_redirect",1);
#ini_set("cgi.fix_pathinfo",1);
#ini_set("fastcgi.impersonate",1);
#ini_set("fastcgi.logging",1);

/**
 * Magic quotes
 */
ini_set("magic_quotes_gpc","Off");
ini_set("magic_quotes_runtime","Off");
ini_set("magic_quotes_sybase","Off");

/**
 * File Uploads
 */
#ini_set("file_uploads","On");
#ini_set("upload_max_filesize","4M");
#ini_set("max_file_uploads","20");

/**
 * iconv
 */
#ini_set("iconv.input_encoding","UTF-8");
#ini_set("iconv.internal_encoding","UTF-8");
#ini_set("iconv.output_encoding","UTF-8");

/**
 * @def (boolean) IN_CLIPRZ - We will use this to ensure scripts are not called from outside of the framework.
 */
define('IN_CLIPRZ',true);
// example : if (!defined("IN_CLIPRZ")) die('Access Denied');

/**
 * @def (string) DS - Directory separator.
 */
define("DS","/",true);

/**
 * @def (resource) BASE_PATH - get a base path.
 */
define('BASE_PATH',realpath(dirname(__FILE__)).DS,true);

// check if PHP is 5.2.6 or ++
if (version_compare(phpversion(),"5.2.6", "<"))

    exit("Please upgrade to PHP 5.2.6 or >");

require_once BASE_PATH.'cliprz_system'.DS.'autoload.php';

// Don't include below files. (this files for framework team only)
#include (BASE_PATH."author".DS."md5.php");
#include (BASE_PATH."author".DS."hacking.php");
#include (BASE_PATH."author".DS."console.php");

// Start Lodaed Content

// Loaded content

// End Lodaed Content

if (file_exists(APP_PATH.'config'.DS.'sleep.php'))

    require_once APP_PATH.'config'.DS.'sleep.php';

ob_end_flush();

// Don't include below files. (this files for framework team only)
#include (BASE_PATH."author".DS."bench.php");
?>