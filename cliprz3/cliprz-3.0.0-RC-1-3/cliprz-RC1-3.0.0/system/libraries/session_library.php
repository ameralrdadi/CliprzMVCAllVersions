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

class cliprz_session_library {


    /**
     * Session save path
     *
     * @var string
     *
     * @access private
     */
    private $save_path;

    /**
     * Start session handler object automatically
     *
     * @access public
     */
    public function __construct() {
        $config = &autoloader::set('config','core');
        /** set a save path */
        $this->save_path = trim_separator($config->cookie_save_path).DS;
        /** Check path */
        if (!is_dir($this->save_path)) {
            /** If save path not exists create a folder */
            if (!mkdir($this->save_path,0777,true)) {
                exit('cannot create '.$this->save_path);
            }
        } else {
            session_save_path($this->save_path);
        }

        /** Hanling session Methods */
        session_set_save_handler(
                array(&$this,'open'),
                array(&$this,'close'),
                array(&$this,'read'),
                array(&$this,'write'),
                array(&$this,'destroy'),
                array(&$this,'gc'));

        register_shutdown_function('session_write_close');

        /** Set cookie domain */
        $cookie_domain = (empty($config->config->cookie_domain)) ? '' : $config->cookie_domain;

        /** Set cookie params */
        session_set_cookie_params(
            $config->cookie_lifetime,
            $config->cookie_path,
            $cookie_domain,
            $config->cookie_secure,
            $config->cookie_httponly);

        /** Start session */
        session_start();

    }

    /**
     * Open sessions from session save path
     *
     * @param string Session save path
     * @param string Session ID
     *
     * @access public
     */
    public function open ($session_path,$session_id) {
        if (is_dir($this->save_path) && is_writable($this->save_path)
        && is_readable($this->save_path) && validate_cookie($session_id)) {
            return true;
        } else {
            trigger_error("Can not open [".$this->save_path."] path.");
        }
    }

    /**
     * Read session data from session save path
     *
     * @param string Sessions id
     *
     * @access public
     */
    public function read ($session_id) {
        if (validate_cookie($session_id)) {
            $path  = (string) $this->save_path.$session_id;
            if (file_exists($path)) {
                return (string) file_get_contents($path);
            } else {
                return false;
            }
        } else {
            trigger_error("Security error invalid [".$session_id."] session ID.");
        }
    }

    /**
     * Write data in session file
     *
     * @param string Session id
     * @param string Session Data
     *
     * @access public
     */
    public function write($session_id,$session_data) {
        if (validate_cookie($session_id)) {
            $path  = (string) $this->save_path.$session_id;
            if (!file_exists($path)) {
                return file_put_contents($path,$session_data) === false ? false : true;
            } else {
                return file_put_contents($path,$session_data) === false ? false : true;
            }
        } else {
            trigger_error("Security error invalid [".$session_id."] session ID.");
        }
    }

    /**
     * Close session
     *
     * @access public
     */
    public function close() {
        return true;
    }

    /**
     * Destroy session
     *
     * @param string Session id
     *
     * @access public
     */
    public function destroy($session_id) {
        if (validate_cookie($session_id)) {
            $path  = (string) $this->save_path.$session_id;
            if (file_exists($path)) {
                unlink($path);
            } else {
                return false;
            }
        } else {
            trigger_error("Security error invalid [".$session_id."] session ID.");
        }
        return true;
    }

    /**
     * The garbage collector callback is invoked internally by PHP periodically in order to purge old session data
     * The frequency is controlled by session.gc_probability and session.gc_divisor
     * The value of lifetime which is passed to this callback can be set in session.gc_maxlifetime
     * Return value should be TRUE for success, FALSE for failure
     *
     * @param integer max lifet time
     *
     * @access public
     */
    public function gc($maxlifetime) {
        $glob = (string) $this->save_path."*";
        foreach (glob($glob) as $file) {
            if (filemtime($file) + $maxlifetime < time() && file_exists($file)) {
                unlink($file);
            }
        }
        return true;
    }

}

/**
 * File information
 *
 * @name      session_library.php
 * @directory ./system/libraries/
 */

?>