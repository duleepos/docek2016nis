<?php

class Controller {

    var $view;
    var $model;

    public function __construct($name = '') {
        $this->view = new View();
        $this->view->controllerName = $name;
        
        $path = BASE_PATH . 'models/' . $name . '_model.php';
        if(file_exists($path)) {
            include $path;
            $modelName = ucfirst($name).'_Model';
            $this->model = new $modelName();
        }
    }
    
}
?>