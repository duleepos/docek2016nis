<?php

class Kontakt_Controller extends Controller {
    public function index(){
        $kontaktPage = $this->model->getKontaktPage();
        $this->view->kontaktPage = $kontaktPage;
        $this->view->render('kontakt/kontakt_page.php');
    }

    public function dodajKontakt() {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['text']) ) {
            header('Location: ' . URL . 'kontakt?error=1');
            die();
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: ' . URL . 'kontakt?error=2');
            die();
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];

        $this->model->addContact($name, $email, $text);

//        header('Location: ' . URL . 'kontakt/porukaJePoslata');
        header('Location: ' . URL . 'kontakt?message=sent');
    }

    public function porukaJePoslata() {
        $this->view->render('kontakt/kontakt_sent.php');
    }
}

?>