<?php

class Korisnici_Controller extends Controller {

    public function index(){
    }
    
    public function login() {
        $this->view->render('korisnici/login.php');
    }

    public function registracija() {
        $this->view->render('korisnici/registracija.php');
    }

    public function dodajKorisnika() {

        if ( empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['first_name']) || empty($_POST['last_name'])
            || empty($_POST['address']) || empty($_POST['phone']) ) {
            header('Location: ' . URL . 'korisnici/registracija?error=prazna_polja');
            die();
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header('Location: ' . URL . 'korisnici/registracija?error=neispravan_email');
            die();
        }

        $user['login'] = $_POST['login'];
        $user['password'] = $_POST['password'];
        $user['email'] = $_POST['email'];
        $user['first_name'] = $_POST['first_name'];
        $user['last_name'] = $_POST['last_name'];
        $user['address'] = $_POST['address'];
        $user['phone'] = $_POST['phone'];

        $user['email_code'] = substr(MD5(microtime()), 0, 5);
        
        if ($this->model->userAdd($user)) {
            require_once LIBS . 'email/swift_required.php';

            $subject = 'ONLINE SHOP - registracija';
            $from = SMTP_USER;
            $to = $user['email'];
            $body = 'Uspešno ste se registrovali! <br/>
                     Da bi aktivirali svoj nalog kliknite <a href="' . URL . 'korisnici/aktivacijaNaloga?code=' . $user['email_code'] . '">ovde</a>.';

            // Create the Transport
            $transport = Swift_SmtpTransport::newInstance()->setHost(SMTP_SERVER);
            $transport->setPort(SMTP_PORT);
            $transport->setUsername(SMTP_USER);
            $transport->setPassword(SMTP_PASSWORD);
            if (SMTP_SSL) {
                 $transport->setEncryption('ssl');
            }


            // Create the Mailer using your created Transport
            $mailer = Swift_Mailer::newInstance($transport);

            // Create a message
            $message = Swift_Message::newInstance($subject);
            $message->setFrom($from);
            $message->setTo($to);
            $message->setBody($body);
            $message->setContentType("text/html");
            $message->setPriority(3);
            $message->getHeaders()->addTextHeader('User-Agent', 'Mozilla Thunderbird 1.5.0.8 (Windows/20061025)');

            // Send the message
            $result = $mailer->send($message);
        } else {
            header('Location: ' . URL . 'korisnici/registracija?error=neuspesna_registracija');
        }

        $this->view->render('korisnici/uspesna_registracija.php');
    }

    public function ulogujSe() {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            header('Location: ' . URL . 'korisnici/login?error=prazna_polja');
            die();
        }

        if ($this->model->loginCheck($_POST['login'], $_POST['password']) ) {
            header('Location: ' . URL . 'objekti');
            die();
        } else {
            header('Location: ' . URL . 'korisnici/login?error=korisnik_ne_postoji');
            die();
        }
    }

    public function logout() {
        unset($_SESSION);
        session_destroy();
        header('Location: ' . URL . 'korisnici/login');
        die();
    }
    public function aktivacijaNaloga() {
        $code = $_GET['code'];
        if (!empty($code)) {
            $this->model->userActivate($code);
        }

        header('Location: ' . URL . 'korisnici/login');
        die();
    }
    
    public function proveriLogin($login) {
        
        echo (int)$this->model->isLoginAvailable($login);
    }

}

?>