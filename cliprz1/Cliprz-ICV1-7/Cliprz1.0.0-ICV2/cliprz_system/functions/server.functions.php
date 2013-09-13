<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 2.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name server.functions.php .
 *  Created date 18/10/2012 09:05 AM.
 *  Last modification date 17/11/2012 09:55 PM.
 *
 * Description :
 *  server functions.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists('c_get_request_resource'))
{
    /**
     * Get requested URI that the sent by the Client.
     */
    function c_get_request_resource()
    {
        if(isset($_SERVER["PATH_INFO"]))
        {
            return $_SERVER["PATH_INFO"];
        }
        else if(isset($_SERVER["PHP_SELF"]))
        {
            return $_SERVER["PHP_SELF"];
        }
        else if(isset($_SERVER["REQUEST_URI"]))
        {
            $uri = $_SERVER["REQUEST_URI"];

            if($request_uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH))
            {
                $uri = $request_uri;
            }

            return rawurldecode($uri);
        }
        else
        {
            exit('Could not find the request URI using PATH_INFO, PHP_SELF, or REQUEST_URI.');
        }
    }
}

if (!function_exists('c_get_request_method'))
{
    /**
     * get request method.
     */
    function c_get_request_method ()
    {
        if (isset($_SERVER["REQUEST_METHOD"]))
        {
            return $_SERVER["REQUEST_METHOD"];
        }
    }
}

if (!function_exists('c_get_ip'))
{
    /**
     * return to get the real ip address.
     */
    function c_get_ip()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            $ip = $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            $ip = $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            $ip = $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        return $ip;
    }
}

?>