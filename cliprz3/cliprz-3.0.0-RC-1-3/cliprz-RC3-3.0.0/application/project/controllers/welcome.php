<?php

/**
 * This is a example for a new controller
 */

class welcome extends cliprz {

    /**
     * Index method, this method display welcome file from application/project/views/welcome.php
     *
     * @access public
     */
    public function index () {
        $this->view->display('welcome');
    }

}

?>