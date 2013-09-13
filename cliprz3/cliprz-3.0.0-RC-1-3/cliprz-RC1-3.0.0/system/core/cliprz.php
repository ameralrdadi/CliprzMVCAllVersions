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

class cliprz {

    /**
     * The instance of the registry
     *
     * @var object
     *
     * @access private
     * @static
     */
    private static $_instance;

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct () {
        foreach (autoloader::loaded_list() as $key => $object) {
            $this->$key = &autoloader::set($key,'core');
        }
    }

    /**
     * Prevent any copy of this object
     *
     * @access private
     */
    private function __clone() {}

    /**
     * Singleton
     * Creates and gives a new Cliprz instance and keeps a record of it
     *
     * @access public
     * @static
     */
    public static function &get_instance () {
        if (!isset(self::$_instance)) {
            $class = (string) (function_exists('get_called_class')) ? get_called_class() : __CLASS__;
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

}

/**
 * File information
 *
 * @name      cliprz.php
 * @directory ./system/core/
 */

?>