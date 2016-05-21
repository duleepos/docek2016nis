<?php

require_once LIBS . 'Model.php';
require_once BASE_PATH . 'models/home_model.php';

class Home_Admin_Model extends Home_Model {
    
    public function updateHomePage($title, $description) {
        $sql = "UPDATE `pages` SET `title` = :title, `description` = :description 
                WHERE `page` = 'home_page' ";
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->execute();
    }
    
}
?>