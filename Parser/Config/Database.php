<?php 
interface Database
{
    public function connectToDatabase();
}
 
class MySQLConnection implements Database
{
    
    protected $host = "localhost";
    protected $user = "hung";
    protected $password = "123456";
    protected $database = "curl_parser";

    public function connectToDatabase()
    {
        return new mysqli($this->host,$this->user,$this>password,$this->database);
    }
}

?>