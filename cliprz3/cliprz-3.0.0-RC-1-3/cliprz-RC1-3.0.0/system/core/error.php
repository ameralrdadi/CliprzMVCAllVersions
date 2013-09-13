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

class cliprz_error {

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {
        $config = &autoloader::set('config','core');
        if ($config->DEVELOPMENT_ENVIRONMENT) {
            ini_set('display_errors','On');
        } else {
            ini_set('display_errors','Off');
        }
        ini_set('error_log',APP_PATH.'logs/'.$config->error_log);
    }

    /**
     * Display HTTP (Hypertext Transfer Protocol) errors pages from application/errors folder
     *
     * @param integer Hypertext Transfer Protocol code you must create a page in application/errors with error code
     * @see http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol
     */
    public function status ($code=404) {
        if (file_exists(APP_PATH.'errors/'.$code.'.php')) {
            include_once (APP_PATH.'errors/'.$code.'.php');
        } else {
            exit($code);
        }
    }

}

/**
 * File information
 *
 * @name      error.php
 * @directory ./system/core/
 */

?>