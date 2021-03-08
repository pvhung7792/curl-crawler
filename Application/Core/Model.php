<?php

/**
 * Class Model
 * Base model of the application
 * Init connection with database
 */

namespace Core;


use Exception;

class Model
{
    private static $instance = null;

    /**
     * Create or retrieve the instance of our database client.
     *
     * @return object
     */

    public static function getInstance(){

        if(self::$instance == null){
            try {
                self::$instance = self::connectDataBase();
            }catch (Exception $e){
                echo $e->getMessage();
                die();
            }
        }
        return self::$instance;
    }

    /**
     * @return \mysqli connection
     * @throws Exception
     */

    private function connectDataBase(){

        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if (!$conn){
            throw new Exception('Cant connect to database');
        }

        return $conn;
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

