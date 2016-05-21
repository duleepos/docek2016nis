<?php

class Error_Controller extends Controller {
    
    function index(){
        $this->view->render('error/error_404.php');
    }
}

?>