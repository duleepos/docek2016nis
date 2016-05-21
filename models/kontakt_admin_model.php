<?php

require_once LIBS . 'Model.php';
require_once BASE_PATH . 'models/kontakt_model.php';

class Kontakt_Admin_Model extends Kontakt_Model {

    public function getContacts() {
        $contacts = array();
        $sql = "SELECT `contact_id`, `name`, `email`, `text`, `create_date`
                FROM `contacts`
                ORDER BY `create_date` DESC";
        $result = $this->db->query($sql);
        if ($result->rowCount()>0){
            while ($rs = $result->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = $rs;
            }
        }

        return $contacts;
    }

    public function deleteContact($contactId) {
        $sql = "DELETE FROM `contacts` WHERE `contact_id` = $contactId";
        $this->db->exec($sql);
    }

    public function getContact($contactID){
        $contact = array();

        $sql ="SELECT * FROM `contacts` WHERE `contact_id` = '$contactID'";

        $result= $this->db->query($sql);
        if($result->rowCount() > 0) {
            $contact = $result->fetch(PDO::FETCH_ASSOC);
        }
        return $contact;
    }

    public function replied($contactID) {
        $sql = "UPDATE `contacts` SET `replied` = 1
                WHERE `contact_id`= '$contactID';";
        $result = $this->db->exec($sql);
    }

}
?>