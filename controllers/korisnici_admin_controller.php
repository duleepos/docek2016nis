<?php

class Korisnici_Admin_Controller extends Admin_Controller {

    public function index() {
        $this->view->activeNavigation = 'korisnici';
        $list = $this->model->usersList('1,2');
        $this->view->list = $list;
        $this->view->render('korisnici/svikorisnici_page.php');
    }

    public function administratori() {
        $this->view->activeNavigation = 'korisnici';
        $list = $this->model->usersList(1);
        $this->view->list = $list;
        $this->view->render('korisnici/admins_page.php');
    }

    function korisnici() {
        $this->view->activeNavigation = 'korisnici';
        $list = $this->model->usersList(2);
        $this->view->list = $list;
        $this->view->render('korisnici/users_page.php');
    }

    public function registracijaKorisnika() {
        $this->view->activeNavigation = 'korisnici';
        $this->view->render('korisnici/novi_korisnik.php');
    }

    function dodajKorisnika() {
        if ( empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['first_name']) || empty($_POST['last_name'])
            || empty($_POST['address']) || empty($_POST['phone']) ) {
            header('Location: ' . ADMIN_URL . 'korisnici/registracijaKorisnika?error=prazna_polja');
            die();
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: ' . ADMIN_URL . 'korisnici/registracijaKorisnika?error=neispravan_email');
            die();
        }

        $user['login'] = $_POST['login'];
        $user['password'] = $_POST['password'];
        $user['email'] = $_POST['email'];
        $user['first_name'] = $_POST['first_name'];
        $user['last_name'] = $_POST['last_name'];
        $user['address'] = $_POST['address'];
        $user['phone'] = $_POST['phone'];
        $user['fk_group_id'] = $_POST['group'];
        $user['active'] = 1;
        if ($this->model->userAdd($user)) {
            if ($user['fk_group_id'] == 1) {
                header('Location: '.ADMIN_URL.'korisnici/administratori');
                die();
            } else {
                header('Location: '.ADMIN_URL.'korisnici/korisnici');
                die();
            }

        } else {
            header('Location: '.ADMIN_URL.'korisnici/registracijaKorisnika?error=neuspesno_dodavanje');
            die();
        }

    }

    public function obrisiKorisnika($id) {
        $this->model->obrisiKorisnika($id);
        header('Location: '.ADMIN_URL.'korisnici?korisnik_obrisan=true');
        return true;
    }



    public function login() {
        $this->view->activeNavigation = 'login';
        $this->view->render('korisnici/login.php');
    }

    public function ulogujSe() {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            header('Location: ' . ADMIN_URL . 'korisnici/login?error=prazna_polja');
            die();
        }

        if ($this->model->loginCheck($_POST['login'], $_POST['password']) ) {
            header('Location: ' . ADMIN_URL . 'home');
            die();
        } else {
            header('Location: ' . ADMIN_URL . 'korisnici/login?error=korisnik_ne_postoji');
            die();
        }
    }

    public function logout() {
        unset($_SESSION);
        session_destroy();
        header('Location: ' . ADMIN_URL . 'korisnici/login');
        die();
    }

}
?>