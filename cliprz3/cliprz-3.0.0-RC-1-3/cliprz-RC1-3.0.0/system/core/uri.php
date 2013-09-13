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

class cliprz_uri {

    /**
     * Request URI
     *
     * @var string
     *
     * @access public
     */
    public $uri;

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct () {
        $this->uri = $this->request_uri();
    }

    /**
     * Detects the Request URI
     *
     * @access private
     */
    private function request_uri () {
        if (!$this->is_request_validate()) {
            exit("REQUEST_URI or SCRIPT_NAME cannot access to the request.");
        } else {
            /** set request URI */
            $request_uri = $_SERVER['REQUEST_URI'];
            if (strpos($request_uri, $_SERVER['SCRIPT_NAME']) === 0) {
                $request_uri = mb_substr($request_uri, mb_strlen($_SERVER['SCRIPT_NAME']));
            } else if (strpos($request_uri,dirname($_SERVER['SCRIPT_NAME'])) === 0) {
                $request_uri = mb_substr($request_uri, mb_strlen(dirname($_SERVER['SCRIPT_NAME'])));
            }
            /** fix query string */
            $request_uri = $this->fix_query_string($request_uri);
            /** if request URI equal / or empty return to null value */
            if ($request_uri == '/' || empty($request_uri)) {
                return;
            }
            /** parse url */
            $request_uri = parse_url($request_uri,PHP_URL_PATH);
            /** fix slashes */
            $request_uri = $this->fix_slashes($request_uri);
            return (string) $request_uri;
        }
    }

    /**
     * Fix the query string
     *
     * @param string request URI
     *
     * @access public
     */
    private function fix_query_string($request_uri) {
        if (strncmp($request_uri, '?/', 2) === 0) {
            $request_uri = mb_substr($request_uri,2);
        }

        $parts = preg_split('#\?#i', $request_uri,2);

        $request_uri = $parts[0];

        if (isset($parts[1])) {
            $_SERVER['QUERY_STRING'] = $parts[1];
            parse_str($_SERVER['QUERY_STRING'],$_GET);
        } else {
            $_SERVER['QUERY_STRING'] = '';
            $_GET = array();
        }
        return $request_uri;
    }

    /**
     * Validate request URI and secript name
     *
     * @access private
     */
    private function is_request_validate () {
        return (boolean) ((isset($_SERVER['REQUEST_URI']) || isset($_SERVER['SCRIPT_NAME'])) ? true : false);
    }

    /**
     * Fix slashes from request uri
     *
     * @param string request URI
     *
     * @access private
     */
    private function fix_slashes ($request_uri) {
        $request_uri = str_replace(array('//', '../','\\'),'/',$request_uri);
        return trim_separator($request_uri);
    }

}

/**
 * File information
 *
 * @name      uri.php
 * @directory ./system/core/
 */

?>