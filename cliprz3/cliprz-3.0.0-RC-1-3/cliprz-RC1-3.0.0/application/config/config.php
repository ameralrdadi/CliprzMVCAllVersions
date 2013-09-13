<?php

/**
 * The configuration file
 */

$_config = array(

    /**
     * Database configuration
     */
    /** Use MySQL database object, if TRUE MySQL database will enabled to use */
    'enable_database'    => true,
    /** Database Host name */
    'database_host'      => 'localhost',
    /** Database name */
    'database_name'      => 'cliprz',
    /** Database Username */
    'database_user'      => 'root',
    /** Database password */
    'database_pass'      => '',
    /** Database tables names prefix */
    'database_prefix'    => 'cliprz_',
    /** Database port */
    'database_port'      => '',
    /** Database charset we prefer utf8 */
    'database_charset'   => 'utf8',
    /** Database collation */
    'database_collation' => 'utf8_unicode_ci',
    /** Databaase mysql driver options */
    #'database_options'   => array(),

    /**
     * Project configuration
     */
    #'project_url'      => null,
    'project_charset'  => 'UTF-8',

    /**
     * Sessions and Cookies configuration
     */
    'cookie_name'           => 'CLIPRZCOOKIE',
    'cookie_prefix'         => 'cliprz_cookie_',
    'cookie_handler'        => 'files',
    'cookie_save_path'      => APP_PATH.'cache/sessions/',
    'cookie_domain'         => '',
    'cookie_secure'         => false,
    'cookie_lifetime'       => 604800,
    'cookie_path'           => '/',
    'cookie_httponly'       => true,
    'cookie_gc_maxlifetime' => 65535,
    'cookie_gc_probability' => 1,
    'cookie_gc_divisor'     => 100,
    'cookie_encrypt'        => 100,

    /**
     * Errors configuration
     */
    'DEVELOPMENT_ENVIRONMENT' => true,
    'error_log'               => 'error_log.txt',

);

?>