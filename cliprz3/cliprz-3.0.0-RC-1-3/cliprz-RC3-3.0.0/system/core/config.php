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

class cliprz_config {

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {
        if (file_exists(APP_PATH.'config/config.php')) {
            require_once (APP_PATH.'config/config.php');
            if (isset($_config)) {
                foreach ($_config as $key => $value) {
                    $this->$key = $value;
                }
                /** set the project and PHP encodeing */
                $this->set_encoding();
                /** define a website URL */
                defined('URL') or define('URL',(isset($this->project_url) ? trim_separator($this->project_url).'/' : website_url()),1);
            } else {
                exit('We kill your project, the configuration file is bad.');
            }
        } else {
            exit(APP_PATH.'config/config.php not found');
        }
    }

    /**
     * Set charset encoding
     *
     * @access public
     */
    private function set_encoding () {
        /** set the internal character encoding */
        mb_internal_encoding($this->project_charset);
        /** Set current setting for character encoding conversion */
        iconv_set_encoding('internal_encoding',$this->project_charset);
    }

}

/**
 * File information
 *
 * @name      config.php
 * @directory ./system/core/
 */

?>