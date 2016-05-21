<?php

class Home_Admin_Controller extends Admin_Controller {

    function index(){
        $this->view->activeNavigation = 'home';

        $homePage = $this->model->getPage('home_page');
        $this->view->homePage = $homePage;

        $this->view->render('home/home_page.php');
    }

    public function azuriraj() {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $this->model->updateHomePage($title, $description);

        header('Location: ' . ADMIN_URL . 'home');
        return true;
    }
}

?>