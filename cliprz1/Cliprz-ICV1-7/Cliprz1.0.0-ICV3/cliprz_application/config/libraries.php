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
 *  File name libraries.php .
 *  Created date 25/11/2012 03:20 PM.
 *  Last modification date 25/11/2012 03:24 PM.
 *
 * Description :
 *  libraries you wan't to use.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

#cliprz::library_use("session_handler","session_handler");
#cliprz::library_use("recaptcha","recaptcha");
#cliprz::library_use("simple_mailto","simple_mailto");
#cliprz::library_use("template","tpl");
#cliprz::library_use("pagination","pagination");
#cliprz::library_use("mysqli","mysqli");
#cliprz::library_use("pdo","pdo");
#cliprz::library_use("captcha","captcha");
#cliprz::library_use("xml","xml");
#cliprz::library_use("zip","zip");

?>