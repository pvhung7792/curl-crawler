<?php

/**
 * Class Model
 * Base model of the application
 * Init connection with database
 */

class Model
{
    protected $dbConnect;

    public function __construct(){
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $this->dbConnect = $mysqli;
    }

}

?>