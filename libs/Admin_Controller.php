<?php

class Admin_Controller {

    var $view;
    var $model;

    public function __construct($name) {
        $this->view = new Admin_View();

        $path = BASE_PATH . 'models/'.$name.'_admin_model.php';
        if (file_exists($path)) {
            include $path;

            $modelName = ucfirst($name).'_Admin_Model';
            $this->model = new $modelName();
        }
    }

}
?>