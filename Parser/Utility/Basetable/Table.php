<?php 
require_once './Config/Database.php';

class Table 
{
    protected $dbConnect;

    public function __construct(){
        $dataConnect = new MySQLConnection();
        $this->dbConnect = $dataConnect->connectToDatabase();
    }
    
}

?>