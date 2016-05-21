<?php

class Kontakt_Model extends Model {

    public function getKontaktPage() {
        $kontakt = array();
        $sql = "SELECT `page_id`,`page`,`title`,`description`
                FROM `pages`
                WHERE `page_id` = 2";
        $result = $this->db->query($sql);
            if ($result->rowCount()>0){
            $kontakt = $result->fetch(PDO::FETCH_ASSOC);
        }
        return $kontakt;
    }
    
    public function addContact($name, $email, $text) {
        $createDate = time();
        
        $sql = "INSERT INTO `contacts` (`name`, `email`, `text`, `create_date`)
                VALUES (:name, :email, :text, :create_date)";
        $result = $this->db->prepare($sql);
        $result->execute(array(':name' => $name, 
                               ':email' => $email,
                               ':text' => $text,
                               ':create_date' => $createDate
                               )
                        );
        
    }
    
    public function updateContactPage($title, $description) {
        $sql = "UPDATE `pages` SET `title` = :title, `description` = :description
                WHERE `page` = 'kontakt_page'";
        $result = $this->db->prepare($sql);
        
        $result->execute(array( 'title' => $title,
                                'description' => $description));
                
    }
    
}
?>