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

class cliprz_cache {

    /**
     * Create a new cache file
     *
     * @param string  File name with full path in views
     * @param array   File data
     * @param integer Cache expiration time as minutes
     *
     * @access public
     */
    public function create($filename,$_data=null,$cache_time=null) {
        if (file_exists($filename)) {
            $cache_folder = APP_PATH.'cache'.DS.'views'.DS.$this->get_last_path_segment($filename).DS;
            $cache_name   = $cache_folder.$this->get_real_file_name($filename).'.html';
            /** Check cache directory */
            if (is_dir($cache_folder)) {
                $this->conditions($filename,$cache_name,$_data,$cache_time);
            } else {
                if (mkdir($cache_folder,0777,true)) {
                    $this->conditions($filename,$cache_name,$_data,$cache_time);
                } else {
                    trigger_error('Can not create '.$cache_folder.' Folder');
                }
            }
        } else {
            trigger_error('You are call a bad file path '.$filename);
        }
    }

    /**
     * Create a output buffering cache file
     *
     * @param string Cache file name
     * @param array  Cache file data from view object
     *
     * @access private
     */
    private function ob_cache ($filename,$cache_name,$_data=null) {
        ob_start();
        if (is_array($_data)) {
            extract($_data);
        }
        include ($filename);
        file_put_contents($cache_name,ob_get_contents());
        ob_end_clean();
    }

    /**
     * Create cache file conditions
     *
     * @param string  File name with full path in views
     * @param string  Cache file name with current path
     * @param array   File data
     * @param integer Cache expiration time as minutes
     *
     * @access private
     */
    private function conditions ($filename,$cache_name,$_data=null,$cache_time=null) {
        $config = &autoloader::set('config','core');
        $expiration_time = (is_null($cache_time)) ? (int) $config->cache_time : (int) $cache_time;
        if (file_exists($cache_name) && (filemtime($cache_name) < filemtime($filename))) {
            $this->ob_cache($filename,$cache_name,$_data);
            include ($cache_name);
        }
        else if (file_exists($cache_name) && (time() - $expiration_time < filemtime($cache_name))) {
            include ($cache_name);
        } else {
            $this->ob_cache($filename,$cache_name,$_data);
            include ($cache_name);
        }
    }

    /**
     * Get Real file name
     *
     * @param string File name with full path
     *
     * @access private
     */
    private function get_real_file_name ($filename) {
        $file      =  pathinfo($filename);
        return (string) rtrim($file['basename'],'.php');
    }

    /**
     * get last path segment to create a cache folder
     *
     * @param string File name with full path
     *
     * @access public
     */
    private function get_last_path_segment($filename) {
        $path = parse_url($filename, PHP_URL_PATH);
        $path_trimmed = trim_separator($path);
        $path_tokens  = explode('/', $path_trimmed);
        if (substr($path, -1) !== '/') {
            array_pop($path_tokens);
        }
        return end($path_tokens);
    }

}

/**
 * File information
 *
 * @name      cache.php
 * @directory ./system/core/
 */

?>