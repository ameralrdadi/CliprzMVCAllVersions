<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 7.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/functions/ .
 *  File name c_convert_text_num.functions.php .
 *  Created date 28/01/2013 11:00 PM.
 *  Last modification date 28/01/2013 11:00 PM.
 *
 * Description :
 *  Convert Text to Number and Opposite .
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 * 
 * @author : Amer Alrdadi 
 * */

if (!defined("IN_CLIPRZ")) die('Access Denied');

if (!function_exists('c_text_to_num'))
{
    /**
     * this function use to Convert Text to Number.
     *
     * @param (string) $key Text.
     */
    function c_text_to_num($key) 
    {

		// Example 
    	$data = array(
    		"off" => 0,
    		"on"  => 1
    	);
    	
    	$result = $data[$key];
    
    	if(is_null($result))
    	{
    		return false;
    	}
    	else 
    	{
    		return $result;	
    	}

    }

}

if (!function_exists('c_num_to_text'))
{

    /**
     * this function use to Convert Number to Text.
     *
     * @param (integer) $key num.
     */
         
    function c_num_to_text($key) 
    {

		// Example 
    	$data = array(
    		0 => "off",
    		1 => "on"
    	);
    	
    	$result = $data[$key];
    
    	if(is_null($result))
    	{
    		return false;
    	}
    	else 
    	{
    		return $result;	
    	}


    }    
    
}

?>