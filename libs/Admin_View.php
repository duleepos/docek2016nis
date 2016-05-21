<?php

class Admin_View {

    public function __construct() {
    }

    public function render($template) {
        include_once BASE_PATH . 'views/admin/header.php';
        include_once BASE_PATH . 'views/admin/'.$template;
        include_once BASE_PATH . 'views/admin/footer.php';
    }

}
?>