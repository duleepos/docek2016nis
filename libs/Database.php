<?php

class Database extends PDO {

    public function __construct($dbtype, $dbhost, $dbname, $dbuser, $dbpass) {
        parent::__construct($dbtype.':host='.$dbhost.';dbname='.$dbname ,$dbuser, $dbpass);
    }
    
}
?>