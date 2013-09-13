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

class cliprz_http {

    /**
     * Unknown name
     *
     * @var string
     *
     * @access private
     */
    private $unknown = 'Unknown';

    /**
     * http user agent data arguments as array
     *
     * @var array
     *                       string key 'browser'   browser name
     *                       string key 'platform'  platform name
     *                       string key 'robot'     robot name
     *                       string key 'is_robot'  validate if is robot
     *                       string key 'mobile'    mobile name
     *                       string key 'is_mobile' validate if user browsing from mobile
     *                       string key 'browser'   browser name
     *                       string key 'language'  get browser language
     *
     * @access public
     */
    public $user = array(
        'browser'   => null,
        'platform'  => null,
        'robot'     => null,
        'is_robot'  => false,
        'mobile'    => null,
        'is_mobile' => false,
        'version'   => null,
        'language'  => null,
        'agent'     => null,
        'ip'        => null
    );

    /**
     * A list of platforms loaded from application/config/http/platforms.php file
     *
     * @var string
     *
     * @access private
     */
    private $_platforms = array();

    /**
     * A list of browsers names loaded from application/config/http/browsers.php file
     *
     * @var string
     *
     * @access private
     */
    private $_browsers = array();

    /**
     * A list of mobiles names loaded from application/config/http/mobiles.php file
     *
     * @var string
     *
     * @access private
     */
    private $_mobiles = array();

    /**
     * A list of robots names loaded from application/config/http/robots.php file
     *
     * @var string
     *
     * @access private
     */
    private $_robots = array();

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {
        /** call platforms array */
        if (file_exists(APP_PATH.'config/http/platforms.php')) {
            require_once (APP_PATH.'config/http/platforms.php');
            /** set platforms array */
            if (isset($_platforms)) {
                $this->_platforms = (array) $_platforms;
            }
        }
        /** call browsers array */
        if (file_exists(APP_PATH.'config/http/browsers.php')) {
            require_once (APP_PATH.'config/http/browsers.php');
            /** set browsers array */
            if (isset($_browsers)) {
                $this->_browsers = (array) $_browsers;
            }
        }
        /** call robots array */
        if (file_exists(APP_PATH.'config/http/robots.php')) {
            require_once (APP_PATH.'config/http/robots.php');
            /** set robots array */
            if (isset($_robots)) {
                $this->_robots = (array) $_robots;
            }
        }
        /** call mobiles array */
        if (file_exists(APP_PATH.'config/http/mobiles.php')) {
            require_once (APP_PATH.'config/http/mobiles.php');
            /** set mobiles array */
            if (isset($_mobiles)) {
                $this->_mobiles = (array) $_mobiles;
            }
        }

        /** Store user information */
        $this->store_information();
    }

    /**
     * Store user HTTP information
     *
     * @access private
     */
    private function store_information () {
        /** set user platform */
        $this->store_platform();
        /** set user http agent */
        $this->user['agent'] = $this->user_agent();
        /** set browser accept language */
        $this->user['language'] = $this->accept_language();
        /** set user referer URL address */
        $this->user['referer'] = $this->referer();
        /** set user IP addres */
        $this->user['ip'] = $this->ip();
        /** store user browser name and version */
        $this->store_browser();
        /** store mobile */
        $this->store_mobile();
        /** store robot */
        $this->store_robot();
    }

    /**
     * Get server HTTP_USER_AGENT
     *
     * @access private
     */
    private function user_agent () {
        return ((isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : null);
    }

    /**
     * Contents of the Accept-Language: header from the current request, if there is one. Example: 'en'
     *
     * @access private
     */
    private function accept_language() {
        return ((isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) ? trim($_SERVER['HTTP_ACCEPT_LANGUAGE']) : null);
    }

    /**
     * The address of the page (if any) which referred the user agent to the current page
     *
     * @access private
     */
    private function referer () {
        return (isset($_SERVER['HTTP_REFERER'])) ? trim($_SERVER['HTTP_REFERER']) : null;
    }

    /**
     * User IP address
     *
     * @access private
     */
    private function ip () {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            $ip = $_SERVER["HTTP_FORWARDED"];
        } else if (isset($_SERVER["REMOTE_ADDR"])) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
        return $ip;
    }

    /**
     * Stroe user platform name
     *
     * @access private
     */
    private function store_platform () {
        foreach ($this->_platforms as $key => $value) {
            if (preg_match("|".preg_quote($key)."|i",$this->user_agent())) {
                $this->user['platform'] = $value;
                break;
            } else {
                $this->user['platform'] = $this->unknown;
            }
        }
    }

    /**
     * Store user browser
     *
     * @access private
     */
    private function store_browser () {
        foreach ($this->_browsers as $key => $value) {
            if (preg_match("|".preg_quote($key).".*?([0-9\.]+)|i",$this->user_agent(),$match)) {
                $this->user['browser'] = $value;
                $this->user['version'] = $match[1];
                break;
            } else {
                $this->user['browser'] = $this->unknown;
                $this->user['version'] = $this->unknown;
            }
        }
    }

    /**
     * Store a robot if exists
     *
     * @access private
     */
    private function store_robot () {
        foreach ($this->_robots as $key => $value) {
            if (preg_match("|".preg_quote($key)."|i",$this->user_agent())) {
                /** if visitor is robot stroe value as true in $this->user['is_robot'] */
                $this->user['is_robot'] = true;
                /** store robot */
                $this->user['robot']    = $value;
                break;
            }
        }
    }

    /**
     * Store a mobile data if exists and set a value $this->user['is_mobile'] as true
     *
     * @access private
     */
    private function store_mobile () {
        foreach ($this->_mobiles as $key => $value) {
            if ((strpos(mb_strtolower($this->user_agent()),$key)) === true) {
                $this->user['is_mobile'] = true;
                $this->user['mobile']    = $value;
                break;
            }
        }
    }

}

/**
 * File information
 *
 * @name      http.php
 * @directory ./system/core/
 */

?>