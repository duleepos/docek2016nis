<?php

class Kupovina_admin_controller extends Admin_Controller {

    public function index() {
        
        $this->view->activeNavigation = 'kupovina';
        $kupovinaPage = $this->model->getPurchases();
        $this->view->kupovinaPage = $kupovinaPage;
        
        $this->view->render('kupovina/kupovina_page.php');
       
        
    }

}

?>
