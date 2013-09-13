<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 4.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_application/config/ .
 *  File name router.php .
 *  Created date 21/11/2012 01:01 AM.
 *  Last modification date 03/12/2012 10:05 AM.
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

/**
 * Warning :
 *  Do not use
 *   ('index.php','index','public','cliprz_temporary','cliprz_system','cliprz_application') as routing regex.
 */

/*
    Rplace you regex [0-9] with :INT check below array
    // You can use regex but if regex in array you can use below array
    protected static $_mask = array(
        ":ANY"   => ".+",
        ":INT"   => "[0-9]+",
        ":FLO"   => "[0-9]+.+[0-9]+",
        ":STR"   => "[a-z0-9-_]+"
    );
*/
cliprz::system(router)->index("home");
 
cliprz::system(router)->rule(array(
	"regex"    => "home",
	"class"    => "home",
	"function" => "index",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "show_forum/[1-9]",
	"class"    => "forums",
	"function" => "index",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	//"regex"    => "show_thread/[1-9]", // الارقام ضع :INT كمثال ادناه لكن مازلت طريقتك صحيحة
    "regex"    => "show_thread/:INT",
	"class"    => "threads",
	"function" => "show_thread",
	"method"   => "GET"
));

// add by Cliprz Yousef Ismaeil
cliprz::system(router)->rule(array(
	"regex"    => "add_thread/checking",
	"class"    => "threads",
	"function" => "add_thread",
	"method"   => "POST"
));

cliprz::system(router)->rule(array(
	"regex"    => "add_thread",
	"class"    => "threads",
	"function" => "add_thread",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
    //                 0/1
	"regex"    => "edit_thread/:INT",
	"class"    => "threads",
	"function" => "add_thread",
    "parameters" = array(1),
	"method"   => "GET"
));
// قم بعد السلاشات وهي تبدء من الصفر لاحظ اعلاه كم سلاش لدينا فقط واحد اذاً عد
// edit_thread = 0
// :INT = 1

// ولو كان لدي مثلاً
// edit/example/test/:ANY
// edit = 0
// example = 1
// test = 2
// :ANY = 3
// وهكذا وتستخدم كانها مصفوفة في parameters كمثال اريد :ANY كبارمتر اقوم بعدها وهو الرقم ثلاث سيكون الناتج
// "parameters" => array(3);
// ولو كان هناك الكثير من البارمترات ثم بعد السلاشات ابتداءاً من الصفر حتى تصل للبرامتر المرغوب ورقمه وضعه بالمصوفة
// سيقوم النظام بتحويل مصفوفة parameters على انها بارمترات الدالة الموجودة في كنترولر

cliprz::system(router)->rule(array(
	"regex"    => "users",
	"class"    => "users",
	"function" => "index",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "register",
	"class"    => "users",
	"function" => "register",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "login",
	"class"    => "users",
	"function" => "login",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "logout",
	"class"    => "users",
	"function" => "logout",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "myaccount",
	"class"    => "users",
	"function" => "myaccount",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "user/([a-z|1-9]+)",
	"class"    => "users",
	"function" => "user",
	"method"   => "GET"
));

cliprz::system(router)->rule(array(
	"regex"    => "contact",
	"class"    => "contact",
	"function" => "index",
	"method"   => "GET"
));


?>