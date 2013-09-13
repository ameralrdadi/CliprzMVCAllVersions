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

final class autoloader {

    /**
     * Our loaded classes
     *
     * @var array
     *
     * @access private
     * @static
     */
    private static $_classes = array();

    /**
     * The core classes
     *
     * @var array core classes that loaded on startup
     *
     * @access private
     * @static
     */
    private static $_core = array('config','security','error','uri','router','http','view','session','language','model');

    /**
     * Our loaded libraries
     *
     * @var array
     *
     * @access public
     * @static
     */
    public static $_libraries = array();

    /**
     * Prevent any copy of this object
     *
     * @access public
     */
    private function __clone () { }

    /**
     * Startup Cliprz frameowrk classes
     *
     * @access public
     * @static
     */
    public static function startup () {
        foreach (self::$_core as $core) {
            if (self::is_loaded($core)) {
                continue;
            } else {
                self::set($core,'core');
            }
        }
    }

    /**
     * Run libraries
     *
     * @access public
     * @static
     */
    public static function run_libraries () {
        if (file_exists(APP_PATH.'config/libraries.php')) {
            require_once (APP_PATH.'config/libraries.php');
            foreach (self::$_libraries as $library => $turn) {
                if (self::is_loaded($library)) {
                    continue;
                } else {
                    if ($turn == true) {
                        self::set($library);
                    }
                }
            }
        }
    }

    /**
     * Set a new class or find the class if not loaded
     *
     * @param string class name without prefix
     * @param string class directory
     * @param string class name prefix
     *
     * @access public
     * @static
     */
    public static function &set ($class_name,$class_directory='libraries',$class_prefix='cliprz_') {
        /** if class is already loaded return to class */
        if (self::is_loaded($class_name)) {
            return self::$_classes[$class_name];
        }
        /** set $object variable as class full name with prefix */
        $object = (string) $class_prefix.$class_name;
        /** is class loaded, this variable check if class is loaded */
        $is_loaded = false;
        /** if class not exists create a a loop to find class file */
        foreach (array(APP_PATH,SYS_PATH) as $path) {
            if (file_exists($path.$class_directory.DS.$class_name.'.php')) {
                require_once ($path.$class_directory.DS.$class_name.'.php');
                if (class_exists($object)) {
                    /** set a new class */
                    self::$_classes[$class_name] = new $object();
                    /** set true to $is_loaded variable */
                    $is_loaded = true;
                }
                break; // stop the loop if class exists
            }
        }
        /** check if class not loaded */
        if (!$is_loaded) {
            exit('cannot store '.$object.' class');
        }
        return self::$_classes[$class_name];
    }

    /**
     * Check if class is loaded or not
     *
     * @param string class name without prefix
     *
     * @access public
     * @static
     * @return to true if class is loaded or false if not
     */
    public static function is_loaded ($class_name) {
        return (boolean) ((isset(self::$_classes[$class_name])) ? true : false);
    }

    /**
     * Get loaded classes list
     *
     * @access public
     * @static
     * @return to classes list as array
     */
    public static function loaded_list() {
        return (array) self::$_classes;
    }

}

/**
 * File information
 *
 * @name      autoloader.php
 * @directory ./system/core/
 */

?>