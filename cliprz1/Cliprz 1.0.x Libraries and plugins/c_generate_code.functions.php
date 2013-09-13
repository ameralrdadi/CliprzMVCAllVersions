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
 *  File name c_generate_code.functions.php .
 *  Created date 26/01/2013 09:06 AM.
 *  Last modification date 26/01/2013 09:06 AM.
 *
 * Description :
 *  Generate Code.
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

if (!function_exists('c_generate_code'))
{
    /**
     * this function use to Cenerate Code.
     *
     * @param (integer) $count count code.
     */
    function c_generate_code($length=5) 
    {
		
		$chars = array(
			"A", "B", "C", "D", "E", "F", "G", "H", "I", 
			"0", "1","2", "3", "4", "5", "6", "7", "8", 
			"9", "J","K", "L", "m", "N", "O", "P", "Q", 
			"r", "S", "T", "u", "V", "w", "x", "y", "Z"
		);
		
		$string = array_rand($chars, $length);
		$code   = NULL;
		
		foreach($string as $s) 
		{
		
    		$code = $code.$chars[$s];
			
		}
		    
			return $code;

    }

}

?>