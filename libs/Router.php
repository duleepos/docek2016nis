<?php

class Router {

    public function __construct($access = 'public') {
        $url = !empty($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/',$url);

        $Controller = !empty($url[0]) ? $url[0] : 'objekti';
        $Function = !empty($url[1]) ? $url[1] : '';
        $Parameter1 = !empty($url[2]) ? $url[2] : '';

        $adminPrefix = $access == 'admin' ? '_admin' : '';

        if ( $access == 'admin' && empty($_SESSION['user_id']) && $Function != 'login' && $Function != 'ulogujSe' ) {
            header('Location: ' . ADMIN_URL . 'korisnici/login');
            die();
        }

        if ( $access == 'admin' && !empty($_SESSION['user_id']) && (empty($_SESSION['group_id']) || $_SESSION['group_id'] != 1) ) {
            unset($_SESSION);
            session_destroy();
            header('Location: ' . ADMIN_URL . 'korisnici/login');
            die();
        }

        $file = BASE_PATH . 'controllers/' . $Controller . $adminPrefix . '_controller.php';
        if (file_exists($file)) {
            require $file;
            $controllerName = ucfirst($Controller) . $adminPrefix . '_Controller';
            $controller = new $controllerName($Controller);
        } else {
            $this->error404($access);
        }


        if (!empty($Function)) {
            if (!method_exists($controller, $Function)) {
                $this->error404($access);
            }
            if (!empty($Parameter1)) {
                $controller->{$Function}($Parameter1);
            } else {
                $controller->{$Function}();
            }
        } else {
            $controller->index();
        }
    }

    private function error404($access) {
      if ($access == 'public') {
        require BASE_PATH . 'controllers/error_controller.php';
        $controller = new Error_Controller('error');
        $controller->index();
        die();
      } else {
        require BASE_PATH . 'controllers/error_admin_controller.php';
        $controller = new Error_Admin_Controller('error');
        $controller->index();
        die();
      }
    }

}
?>