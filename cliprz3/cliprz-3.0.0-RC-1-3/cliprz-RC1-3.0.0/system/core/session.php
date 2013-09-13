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

class cliprz_session {


    /**
     * Cookies default name
     *
     * @var string
     *
     * @access private
     */
    private $cookie_name = 'CLIPRZCOOKIE';

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {
        $this->cookie_name();
        $this->handle();
        $this->hijacking();
    }

    /**
     * Set session handle type
     *
     * @access private
     */
    private function handle () {
        $config = &autoloader::set('config','core');
        if ($config->cookie_handler == 'files') {
            autoloader::set('session_library','libraries');
        } else {
            session_start();
        }
    }

    /**
     * Change cookie name from php.ini
     *
     * @access private
     */
    private function cookie_name () {
        $config = &autoloader::set('config','core');
        /** Change cookies name from php.ini */
        if (isset($config->cookie_name) && !empty($config->cookie_name))
        {
            ini_set('session.name',mb_strtoupper($config->cookie_name));
        } else {
            ini_set('session.name',$this->cookie_name);
        }
        define('SESSION_PREFIX',$config->cookie_prefix,1);
    }

    /**
     * Set new session (cookie)
     *
     * @param string Session key
     * @param string Session value
     *
     * @access public
     */
    public function set ($key,$val) {
        $_SESSION[SESSION_PREFIX.$key] = $val;
    }

    /**
     * Get session value if exists
     *
     * @param string Session key
     *
     * @access public
     */
    public function get ($key) {
        return (($this->is_set($key)) ? $_SESSION[SESSION_PREFIX.$key] : 'Undefined session index '.$key);
    }

    /**
     * Check if session exists
     *
     * @param string Session key
     *
     * @access public
     * @return true if session exists
     */
    public function is_set ($key) {
        return (boolean) ((isset($_SESSION[SESSION_PREFIX.$key])) ? true : false);
    }

    /**
     * Delete session data
     *
     * @param string Session key
     *
     * @access public
     */
    public function delete ($key) {
        if ($this->is_set($key)) {
            unset($_SESSION[SESSION_PREFIX.$key]);
        } else {
            return false;
        }
    }

    /**
     * Destroys all data registered to a session
     *
     * @param boolean If true system will Update the current session id with a newly generated one
     *
     * @access public
     */
    public function destroy ($regenerate_id=true) {
        #session_unset();
        session_destroy();
        if ($regenerate_id === true) {
            session_regenerate_id();
        }
    }

    /**
     * Protected Sessions from Hijacking
     *
     * @access private
     */
    private function hijacking () {
        $http = &autoloader::set('http','core');
        if (!$this->is_set('hijacking_user_ip')) {
            $this->set('hijacking_user_ip',$http->ip());
        } else {
            if ($this->get('hijacking_user_ip') != $http->ip()) {
                $this->destroy();
            }
        }
    }

}

/**
 * File information
 *
 * @name      session.php
 * @directory ./system/core/
 */

?>