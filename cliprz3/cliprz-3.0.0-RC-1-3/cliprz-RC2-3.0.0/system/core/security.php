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

class cliprz_security {

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {

        if ($this->clean_get_xss($_GET)) {
            exit("Access Denied");
        }

        $super_destruct = array("_GET","_POST","_SERVER","_COOKIE","_FILES","_ENV","GLOBALS");

        foreach($super_destruct as $var) {
            if(isset($_REQUEST[$var]) || isset($_FILES[$var])) {
                exit("Access Denied");
            }
        }

        // Clean server variables
        $_SERVER['PHP_SELF']     = $this->clean_url($_SERVER['PHP_SELF']);
        $_SERVER['QUERY_STRING'] = isset($_SERVER['QUERY_STRING']) ? $this->clean_url($_SERVER['QUERY_STRING']) : null;
        $_SERVER['PATH_INFO']    = isset($_SERVER['PATH_INFO']) ? $this->clean_url($_SERVER['PATH_INFO']) : null;
        $_SERVER['REQUEST_URI']  = isset($_SERVER['REQUEST_URI']) ? $this->clean_url($_SERVER['REQUEST_URI']) : null;
        $_SERVER['SCRIPT_NAME']  = isset($_SERVER['SCRIPT_NAME']) ? $this->clean_url($_SERVER['SCRIPT_NAME']) : NULL;
    }

    /**
     * Clean URL Function, prevents entities in server globals
     *
     * @param string the server super global request and selfs
     *
     * @access public
     */
    public function clean_url($url) {
        $bad_entities = array("&", "\"", "'", '\"', "\'", "<", ">", "(", ")", "*",'$');
        $safe_entities = array("&amp;", "", "", "", "", "", "", "", "", "",'');
        $url = str_ireplace($bad_entities, $safe_entities, $url);
        return $url;
    }

    /**
     * Prevent any possible XSS attacks via $_GET Super Global
     *
     * @param mixed url who want to filter
     *
     * @access private
     */
    private function clean_get_xss($url) {
        if (is_array($url)) {
            foreach ($url as $value) {
                if ($this->clean_get_xss($value) == true) {
                    return true;
                }
            }
        } else {
            $url = str_replace(array("\"", "\'"), array("", ""), urldecode($url));
            if (preg_match("/<[^<>]+>/i", $url)) {
                return true;
            }
        }
        return false;
    }

}

/**
 * File information
 *
 * @name      security.php
 * @directory ./system/core/
 */

?>