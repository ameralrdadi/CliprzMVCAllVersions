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

class cliprz_encrypt_library {


    /**
     * Lower case characters
     *
     * @var string
     *
     * @access private
     */
    private $lower_case = 'abcdefghijklmnopqrstuvwxyz';

    /**
    * Upper case characters
    *
    * @var string
    *
    * @access private
    */
    private $upper_case = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Numbers
     *
     * @var integer
     *
     * @access private
     */
    private $numbers    = 0123456789;

    /**
     * Complex characters
     *
     * @var string
     *
     * @access private
     */
    private $complex    = '!@#$%&*?';

    /**
     * Double md5
     *
     * @param string Input value
     *
     * @access public
     * @static
     */
    public function md5 ($str) {
        return md5(md5($str));
    }

    /**
     * Generate a salt
     *
     * @param integer Salt length, By default 50 characters
     * @param boolean Complex salt, by default FALSE
     *
     * @access public
     */
    public function generate_salt ($length=50,$complex=false) {
        $chars = $this->lower_case.$this->upper_case.$this->numbers;

        if ($complex === true) {
            $chars .= $this->complex;
        }

        $i = 0;

        $salt = '';

        while ($i < $length) {
            $salt .= $chars{mt_rand(0, (mb_strlen($chars) - 1))};
            $i++;
        }

        return $salt;
    }

    /**
     * Create double md5 password with double md5 salt and return to final password
     *
     * @param string password value
     * @param string $this->generate_salt() or any salt function you create
     *
     * @access public
     */
    public function salt_password($password,$salt) {
        $md5password = $this->md5($password);
        return $this->md5($this->md5($salt).$md5password);
    }

    /**
     * Generate a serial number
     *
     * @param array Serial number options
     *                         'bars'    Bars count as in example if 4 you will get (JHG3-32FS-322F-2394)
     *                         'codes'   Codes count as in example if 2 you will get (G3-3S-32-94)
     *                         'mark'    Separator Mark as in example if | you will get (G3|3S|32|94)
     *                         'prepend' Prepend some data in beginning as in example HELLO| you will get (HELLO|G3|3S|32|94)
     *                         'append'  Apend some data in ending as in example |YOUSEF you will get (G3|3S|32|94|YOUSEF)
     *
     * @access public
     */
    public function generate_serial_number ($_options=array()) {
        if (is_array($_options)) {
            $result = '';

            $bars    = (isset($_options['bars']))    ? (int) $_options['bars']  : 5;
            $codes   = (isset($_options['codes']))   ? (int) $_options['codes'] : 4;
            $mark    = (isset($_options['mark']))    ? $_options['mark']        : '-';
            $prepend = (isset($_options['prepend'])) ? $_options['prepend']     : null;
            $append  = (isset($_options['append']))  ? $_options['append']      : null;

            for ($i = 0; $i < $bars; $i++) {
                $result .= $this->generate_salt($codes,null);

                if ($i == $bars - 1) { continue; }

                $result .= $mark;
            }

            $serial_number = $prepend.mb_strtoupper($result).$append;

            // unset($result); # Removed by Negix

            return $serial_number;
        }
    }

}

/**
 * File information
 *
 * @name      encrypt_library.php
 * @directory ./system/libraries/
 */

?>