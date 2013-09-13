<?php

/**
 * Cliprz framework
 *
 * Color your project, An open source application development framework for PHP 5.3.0 or newer
 *
 * LICENSE: This program is released as free software under the Affero GPL license. You can redistribute it and/or
 * modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 * at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 * written permission from the original author(s)
 *
 * @package    Cliprz
 * @author     Yousef Ismaeil <cliprz@gmail.com>
 * @copyright  Copyright (c) 2012 - 2013, Cliprz Developers team
 * @license    http://www.cliprz.org/agpl.txt
 * @link       http://www.cliprz.org
 * @since      Version 3.0.0
 */

/** Check PHP version is 5.3.0 */
if (version_compare(phpversion(),'5.3.0', "<")) exit('Please upgrade to PHP 5.3.0 or newer');

/** Activates the circular reference collector */
if (!gc_enabled()) { gc_enable(); }

/** all error reporting  */
error_reporting(E_ALL);

/** logs the errors */
ini_set('log_errors', 'On');

/** OS Directory separator */
defined('DS') or define('DS',DIRECTORY_SEPARATOR,1);

/** Returns canonicalized absolute pathname and parent directory's path */
defined('BASE_PATH') or define('BASE_PATH',realpath(dirname(__FILE__)).DS,1);

/** Application path */
defined('APP_PATH') or define('APP_PATH',BASE_PATH.'application'.DS,1);

/** System path */
defined('SYS_PATH') or define('SYS_PATH',BASE_PATH.'system'.DS,1);

/** call bootstrap to startup Cliprz framewrok */
if (file_exists(SYS_PATH.'bootstrap.php')) {
    require_once (SYS_PATH.'bootstrap.php');
} else {
    exit('cannot startup Cliprz framework.');
}

/**
 * File information
 *
 * @name      index.php
 * @directory ./
 */

# Don't use ?>