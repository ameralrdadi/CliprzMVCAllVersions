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
 *  File path BASE_PATH/cliprz_application/config/ .
 *  File name router.php .
 *  Created date 21/11/2012 01:01 AM.
 *  Last modification date 01/12/2012 04:20 PM.
 *
 * Description :
 *  Routing file.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');


// redirecting to (Home) - default index page
cliprz::system(router)->index("Home");

cliprz::system(router)->rule(array(
    "regex"    => "Home",
    "class"    => "home",
    "function" => "index",
    "method"   => "GET"
));


/*
//==================================>
// After
//==================================>
//==========================>
// Info Use Router
// Add array new in $date_array 
// Example : array("name_regex","name_class","name_function","name_method")

$data_array = array(
	array("home","home","index","GET"),
	array("info","info","show","GET"),
	array("news","news","index","GET"),
	array("show_new","news","show","GET"),
	array("pages","pages","index","GET"),
	array("register","users","register","GET"),
	array("show_page","pages","show","GET")
// Here Add New array 
);

$count = count($data_array); // Count Array 

for($i = 0; $i < $count; $i++)
{
	cliprz::system(router)->rule(array(
		"regex"    => $data_array[$i][0],
		"class"    => $data_array[$i][1],
		"function" => $data_array[$i][2],
		"method"   => $data_array[$i][3]
	));
	
}
//==================================>
*/

?>