<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 3.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_application/config/ .
 *  File name config.php .
 *  Created date 21/11/2012 01:00 AM.
 *  Last modification date 29/12/2012 11:05 AM.
 *
 * Description :
 *  Config file.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

/**
 * Database Connection.
 *
 * @var (string) $_config['db']['host'] - Database host server.
 * @var (string) $_config['db']['user'] - Database username.
 * @var (string) $_config['db']['pass'] - Database password.
 * @var (string) $_config['db']['name'] - Database name.
 * @var (string) $_config['db']['prefix'] - Database prefix, Be sure to end the prefix with  _ mark.
 * @var (string) $_config['db']['charset'] - Database charset, We believe that the best encoding is UTF-8,
 *  You can change charset to what you need.
 * @var (boolean) $_config['db']['pconnect'] - if you wan't to use mysql and pconnect function, Change the value to true.
 */
$_config['db']['host']     = "localhost";
$_config['db']['user']     = "root";
$_config['db']['pass']     = "";
$_config['db']['name']     = "";
$_config['db']['prefix']   = "";
$_config['db']['charset']  = "utf8";
$_config['db']['pconnect'] = false;


/**
 * Output, Multibyte String and charset.
 *
 * @var (string) ['output']['url'] - your website full URL.
 * @var (string) ['output']['charset'] - your website charset as default UTF-8.
 */
$_config['output']['url']     = "http://localhost/Cliprz/";
$_config['output']['charset'] = "UTF-8";

/**
 * Database driver.
 *
 * @var (string) $_config['db']['driver_path'] - Driver path name in 'cliprz_system/databases' folder.
 * @var (string) $_config['db']['driver_path'] - Driver name.
 */
$_config['db']['driver_path'] = "mysql";
$_config['db']['driver_name'] = "mysql";

/**
 * Languages
 *
 * @var (string) $_config['language']['name'] - Language name.
 * @var (string) $_config['language']['path'] - Language path in cliprz_application/languages.
 * @var (string) $_config['language']['code'] - Language short code name.
 * @var (string) $_config['language']['direction'] - Language direction.
 *  $_config['language']['direction'] :
 *   'ltr' - Left to right.
 *   'rtl' - Right to left.
 *
 * Note: You can change the values later, in c_language() function.
 */
$_config['language']['name']      = "english";
$_config['language']['path']      = "english";
$_config['language']['code']      = "en";
$_config['language']['direction'] = "ltr";

/**
 * Date and time
 *
 * @var (string) $_config['datetime']['timezone'] - Sets the default timezone used by all date/time functions in a script.
 *  Get List of Supported Timezones : http://php.net/manual/en/timezones.php
 */
$_config['datetime']['timezone'] = "UTC";

/**
 * Sessions and Cookies
 *
 * @var (string) $_conifg['session']['name'] - Session name.
 * @var (string) $_conifg['session']['prefix'] - Session prefix, You can change prefix for security reasons.
 * @var (integer) $_conifg['session']['gc_maxlifetime'] - Change gc_maxlifetime value in php.ini.
 * @var (integer) $_conifg['session']['gc_probability'] - Change gc_probability value in php.ini.
 * @var (integer) $_conifg['session']['gc_divisor'] - Change gc_divisor value in php.ini.
 */
$_conifg['session']['name']           = "CLIPRZCOOKIE";
$_conifg['session']['prefix']         = "cliprz_session_";
$_conifg['session']['gc_maxlifetime'] = 34560;
$_conifg['session']['gc_probability'] = 1;
$_conifg['session']['gc_divisor']     = 100;

/**
 * ReCaptcha Keys
 *
 * @var (string) $_config['recaptcha']['publickey'] - Use this in the JavaScript code that is served to your users.
 * @var (string) $_config['recaptcha']['privatekey'] - Use this when communicating between your server and our server.
 *
 * Get more about recaptcha https://www.google.com/recaptcha/.
 */
$_config['recaptcha']['publickey']  = "xxxxxxxxxxxxxxxxxxxxxxxxxxx";
$_config['recaptcha']['privatekey'] = "xxxxxxxxxxxxxxxxxxxxxxxxxxx"; // Be sure to keep it a secret.
$_config['recaptcha']['response']   = null;
$_config['recaptcha']['error']      = null;


?>