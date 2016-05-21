<?php

class Model {

    public function __construct() {
        $this->db = new Database(DB_TYPE,DB_HOST,DB_NAME,DB_USER,DB_PASS);
        $this->db->exec("SET character_set_connection = 'utf8',
                             character_set_server = 'utf8',
                             character_set_client = 'utf8',
                             character_set_database = 'utf8',
                             character_set_results = 'utf8'
                        ");
    }
    
}
?>