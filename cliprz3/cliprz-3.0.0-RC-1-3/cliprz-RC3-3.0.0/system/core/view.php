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

class cliprz_view {

    /**
     * Display a view file from project views folder
     *
     * @param string  file name with directory if exists
     * @param array   data as index array
     * @param boolean Use caching system
     * @param integer Cache expiration time as minutes, as in example 60 = 1 minute
     *
     * @access public
     */
    public function display ($filename,$_data=null,$use_cache=false,$cache_time=null) {
        $view_file = APP_PATH.'project/views/'.trim_separator($filename).'.php';
        if (file_exists($view_file)) {

            /** extract data */
            if (is_array($_data)) {
                extract($_data);
            }

            /** check if using cache */
            if ($use_cache === true) {
                $cache = &autoloader::set('cache','core');
                $cache->create($view_file,$_data,$cache_time);
            } else {
                ob_start();
                include_once ($view_file);
                $contents = ob_get_contents();
                ob_end_clean();
                echo $contents;
            }
        } else {
            trigger_error($view_file.' file does not exists');
        }
    }

}

/**
 * File information
 *
 * @name      view.php
 * @directory ./system/core/
 */

?>