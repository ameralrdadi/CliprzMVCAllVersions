<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Stability Stable.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/libraries/refresh_page/ .
 *  File name refresh_page.php .
 *  Created date 18/01/2013 04:00 AM.
 *  Last modification date 18/01/2013 05:30 AM.
 *
 * Description :
 *  Refrech page and show message.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */
/**
 *
 *
 * @author m.elfergany
 */
if (!defined("IN_CLIPRZ"))
    die('Access Denied');

class library_beacom {

    



    public function style() {

        echo '
            <link href="public/css/bootstrap-responsive.css" rel="stylesheet">
	 <link href="public/css/bootstrap.css" rel="stylesheet">
	


';
    }

    public function script() {

        echo
        '
         <script src="public/javascript/jquery-1.7.2.min.js"></script>
         <script src="public/javascript/bootstrap.js"></script>
         

        ';
    }

    public static function textboxs($id, $name, $len, $label) {


        for ($x = 0; $x < count($id); $x++) {

            echo "<label>" . $label[$x] . "</label><input type= 'text' id='" . $id[$x] . "' name = '" . $name[$x] . "' class='span" . $len[$x] . "' /><br />";
        }
    }

    public static function textbox($id, $name, $len, $label) {

        echo "<label>" . $label . "</label><input type= 'text' id='" . $id . "' name = '" . $name . "' class= 'span" . $len . "' />";
    }

    public static function mtextarea($id, $name, $value, $label) {


        for ($x = 0; $x < count($id); $x++) {


            echo "<label>" . $label[$x] . "</label><textarea name='" . $name[$x] . "' id='" . $id[$x] . "'>" . $value[$x] . "</textarea>";
        }
    }

    public static function textarea($id, $name, $value, $label) {
        echo "<label>" . $label . "</label><textarea name='" . $name . "' id='" . $id . "'>" . $value . "</textarea>";
    }

}

?>
