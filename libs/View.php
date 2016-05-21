<?php

class View {

    public function __construct() {
    }
    
    public function render($template) {
        include_once BASE_PATH . 'views/public/header.php';
        include_once BASE_PATH . 'views/public/'.$template;
        include_once BASE_PATH . 'views/public/footer.php';
    }

    public function urlName($name) {
        $trans = array( "ć" => "c", "č" => "c", "š" => "s", "ž" => "z", "š" => "s",
                        "Ć" => "c", "Č" => "c", "Š" => "s", "Ž" => "z", "Š" => "s",
                        " " => "-", "/" => "-"
        );

        $name = strtr($name, $trans);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
        $name = strtolower($name);
        return $name;
    }

}
?>