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

class cliprz_language {

    /**
     * Default language
     *
     * @var string
     *
     * @access private
     */
    private $default_language = 'english';

    /**
     * Language file prefix
     *
     * @var string
     *
     * @access private
     */
    private $language_file_prefix = "_language.php";

    /**
     * __CLASS__ constructor
     *
     * @access public
     */
    public function __construct() {
        $config = &autoloader::set('config','core');
        /** set the system language package */
        if (isset($config->project_language)) {
            $this->get_package($config->project_language,true);
        } else {
            $this->get_package($this->default_language,true);
        }
    }

    /**
     * This function will load all languages package
     *
     * @param string  Configurations language name
     * @param boolean Is loading from system
     *
     * @access private
     */
    public function get_package ($language_package,$is_system=false) {
        /** set a language path */
        if (!$is_system) {
            $language_path = APP_PATH.'language/'.trim_separator($language_package).'/';
        } else {
            $language_path = SYS_PATH.'language/'.trim_separator($language_package).'/';
        }
        /** check if language directory is exists */
        if (is_dir($language_path)) {
            /** Load all languages files in this folder */
            $glob = (string) $language_path."*".$this->language_file_prefix;
            $this->set_package($glob);
        } else {
            trigger_error($language_package.' language packages not exists.');
        }
    }

    /**
     * Call all language package
     *
     * @param string The pattern. No tilde expansion or parameter substitution is done
     *
     * @access private
     */
    private function set_package ($glob) {
        global $_language;
        foreach (glob($glob) as $package_files) {
            include_once ($package_files);
        }
    }

    /**
     * Replace some data from language variable
     *
     * @param string array key
     * @param array  Replacing words as array with keys, As in example array('{site}'=>'www.cliprz.org','{cliprz}'=>'Yousef Ismaeil').
     *
     * @access private
     */
    private function replace_to ($lang,$replacing) {
        $search  = array_keys($replacing);
        $replace = (array) $replacing;
        unset($replacing);
        return str_replace($search,$replace,$lang);
    }

    /**
     * Get a language array
     *
     * @param string array key
     * @param array  Replacing words as in example array('{name}'=>'Yousef') so any word in lang variable that have {name} will replaced to Yousef
     *
     * @access public
     */
    public function lang ($key,$replacing=null) {
        global $_language;
        if (isset($_language[$key])) {
            if (is_array($replacing)) {
                return $this->replace_to($_language[$key],$replacing);
            } else {
                return $_language[$key];
            }
        } else {
            trigger_error('Undefined $_language['.$key.'] key.');
        }
    }


}

/**
 * File information
 *
 * @name      language.php
 * @directory ./system/core/
 */

?>