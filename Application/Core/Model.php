<?php

/**
 * Class Model
 * Base model of the application
 * Init connection with database
 */

class Model
{
    private static $instance = null;

    /**
     * Disable instantiation.
     */

    function __construct(){
    }

    /**
     * Create or retrieve the instance of our database client.
     *
     * @return Database
     */

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        }
        return self::$instance;
    }

    /**
     * Disable the cloning of this class.
     *
     * @return void
     */

    final public function __clone()
    {
        throw new Exception('Feature disabled.');
    }

    /**
     * Disable the wakeup of this class.
     *
     * @return void
     */

    final public function __wakeup()
    {
        throw new Exception('Feature disabled.');
    }
}

?>