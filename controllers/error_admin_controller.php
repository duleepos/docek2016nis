<?php

class Error_Admin_Controller extends Admin_Controller {
    
    function index(){
        $this->view->render('error/error_404.php');
    }
}

?>