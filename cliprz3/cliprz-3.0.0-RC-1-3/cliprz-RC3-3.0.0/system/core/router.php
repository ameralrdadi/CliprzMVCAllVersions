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

class cliprz_router {


    /**
     * Get requested URI that sent by the Client
     *
     * @var array
     *
     * @access private
     */
    private $_map = array();

    /**
     * Routing rules
     *
     * @var array
     *
     * @access private
     */
    private $_rule = array();

    /**
     * Get requested URI and requested method
     *
     * @var array
     *
     * @access private
     */
    private $_requested;

    /**
     * Regular expression mask to access routing and parameters
     *
     * @var array
     *
     * @access private
     */
    private $_mask = array(
        ':ANY'    => ".+",
        ':INT'    => "[0-9]+",
        ':FLO'    => "[0-9]+.+[0-9]+",
        ':STR'    => "[a-z0-9-_]+",
        ':CHR'    => "[a-z]+",
        ':ACTION' => "index|show|view|add|create|edit|update|remove|delete",
        ':BOOL'   => "true|false|0|1"
    );

    /**
     * If function does not exists use index function as main function
     *
     * @var string
     *
     * @access private
     */
    private $default_function = 'index';

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {
        $uri = &autoloader::set('uri','core');
        $this->_requested['resource'] = $uri->uri;
        $this->_requested['method']   = (isset($_SERVER["REQUEST_METHOD"])) ? $_SERVER["REQUEST_METHOD"] : null;
        $this->_map = $this->map($this->_requested['resource']);
    }

    /**
     * Add new rule to routing
     *
     * @param array Rule actions as array with keys
     *               string 'regex'       URL mask you want to use
     *               string 'class'       Controller class name
     *               string 'function'    Controller class method (function), By default take self::$default_function value
     *               string 'parameters'  Controller class method (function) parameters as array with position number beginning from zero
     *               string 'path'        If controller class in subfolder inside controllers folder, put the path name here
     *               string 'redirecting' Redirecting page of your choice if Regular expressions matched
     *               string 'method'      Request method to access routing, By default GET u can use (POST|GET)
     *
     * @access public
     */
    public function rule ($_action) {
        if (is_array($_action)) {
            $this->_rule[] = array(
                /** Regular expressions */
                'regex'       => (isset($_action['regex'])) ? (string) $_action['regex'] : null,
                /** Class name */
                'class'       => (isset($_action['class'])) ? (string) $_action['class'] : null,
                /** Metohd (function) name */
                'function'    => (isset($_action['function'])) ? (string) $_action['function'] : (string) $this->default_function,
                /** parameters as array */
                'parameters'  => (isset($_action['parameters'])) ? (array) $_action['parameters'] : null,
                /** Set class sub folder name in controller folder */
                'path'        => (isset($_action['path'])) ? trim_separator($_action['path']).DS : '',
                /** Redirecting to page of your choice if Regular expressions matched */
                'redirecting' => (isset($_action['redirecting'])) ? trim_separator($_action['redirecting']) : null,
                /** Request method type */
                'method'      => (isset($_action['method'])) ? mb_strtoupper($_action['method']) : 'GET'
            );
        }
    }

    /**
     * Handling router to access controller
     *
     * @access public
     */
    public function handler () {
        $is_matched = false;
        $error = &autoloader::set('error','core');
        foreach ($this->_rule as $rule) {
            /** Convert resource to regular expressions */
            $regex = $this->resource_to_regex($rule['regex']);
            /** Check regex if match resource */
            if (preg_match($regex,$this->_requested['resource'])) {
                /** Check request method */
                if ($rule['method'] == $this->_requested['method']) {
                    /** Check if redirecting is isset and not null go to redirecting page */
                    if (isset($rule['redirecting']) && !is_null($rule['redirecting'])) {
                        $this->redirecting($rule['redirecting']);
                    /** else if no redirecting page */
                    } else {
                        /** Set class path */
                        $class_path = APP_PATH.'project/controllers/'.$rule['path'].$rule['class'].'.php';
                        /** Check if class file is exists */
                        if (file_exists($class_path)) {
                            /** Call class */
                            require_once ($class_path);
                            /** check if class exists */
                            if (class_exists($rule['class'])) {
                                /** Create a new object */
                                $object = new $rule['class']();
                                /** Check if method exists */
                                if (method_exists($rule['class'],$rule['function'])) {
                                    /** Check if parameters is array */
                                    if (!is_null($rule['parameters']) && is_array($rule['parameters'])) {
                                        /** Call object and method and set parameters for method */
                                        call_user_func_array(
                                            array($object,$rule['function']),
                                            $this->get_parameters($rule['parameters']));
                                    /** Else if parameters is not array */
                                    } else {
                                        $object->$rule['function']();
                                    }
                                } else {
                                    $error->status();
                                }
                            } else {
                                $error->status();
                            }
                        } else {
                            $error->status();
                        }
                    }
                }
                $is_matched = true;
                break; // if regex matched break the loop
            }

        }
        if (!$is_matched) {
            $error->status();
        }
    }

    /**
     * Set a Index page (homepage)
     *
     * @param string Home page name
     *
     * @access public
     */
    public function index ($index) {
        if (!$this->_requested['resource'] || empty($this->_requested['resource'])) {
            $this->redirecting($index);
        }
    }

    /**
     * Convert requested URI that the sent by the Client to regular expression
     *
     * @param string Requested URI that sent by the Client
     *
     * @access private
     */
    private function resource_to_regex ($resource) {
        $keys    = array_keys($this->_mask);
        $replace = str_replace($keys,$this->_mask,$resource);
        $regex   = (string) "`^{$replace}$`i";
        return $regex;
    }

    /**
     * Convert requested URI that the sent by the Client to array
     *
     * @param string Requested URI that sent by the Client
     *
     * @access private
     */
    private function map ($map) {
        return ((array) explode("/",$map));
    }

    /**
     * Find and set parameters if exsists
     *
     * @param array parameters
     *
     * @access private
     */
    private function set_parameters ($parameters) {
        if (is_array($parameters)) {
            foreach ($parameters as $param) {
                $result[] = $this->_map[$param];
            }
            return $result;
        }
    }

    /**
     * Get parameters if exsists
     *
     * @param array Method (function) parameters
     *
     * @access private
     */
    private function get_parameters ($parameters) {
        return (array) $this->set_parameters($parameters);
    }

    /**
     * Redirecting
     *
     * @param string Redirecting page as default null index.php
     *
     * @access public
     */
    public function redirecting ($page=null) {
        header("HTTP/1.1 301 Moved Permanently");
        if (is_null($page)) {
            header("Location: index.php");
        } else {
            header("Location: ".$page);
        }
        exit();
    }

}

/**
 * File information
 *
 * @name      router.php
 * @directory ./system/core/
 */

?>