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

/** call the main functions file  */
require_once (SYS_PATH.'functions/common.php');

/** call validate functions */
require_once (SYS_PATH.'functions/validate_functions.php');

/** call autoloader class to startup Cliprz framework */
require_once (SYS_PATH.'core/autoloader.php');

/** startup Cliprz framework */
autoloader::startup();

/** Run libraries */
autoloader::run_libraries();

/** call the main controller for Cliprz framework */
require_once (SYS_PATH.'core/cliprz.php');

/** singleton, set $cliprz variable as the super object */
$cliprz = &cliprz::get_instance();

/**
 * Singleton
 * Creates and gives a new Cliprz instance and keeps a record of it
 */
function &get_instance () {
    return cliprz::get_instance();
}

/** define a website URL */
defined('URL') or define('URL',website_url(),1);

/** call and handling router */
if (file_exists(APP_PATH.'config/router.php')) {
    require_once (APP_PATH.'config/router.php');
    $cliprz->router->handler();
}

/**
 * Some testing
 */
/** don't ever remove (#) from below lines in real website */
#echo '<hr>';
#var_dump($cliprz);
#pre_print_r(autoloader::loaded_list());
#echo '<pre>'; var_dump(autoloader::loaded_list()); echo '</pre>';

/**
 * File information
 *
 * @name      bootstrap.php
 * @directory ./system/
 */

?>