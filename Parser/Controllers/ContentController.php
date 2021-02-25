<?php 
require_once './Utility/pageData.php';

class ContentController
{
    protected $table;

    public function __construct()
    {
        $this->table = new pageData();
    }
    
    public function storeContent()
    {
        //get data
        $data = $_POST;

        //store data
        $this->table->store($data);

        //redirect back to main page
        header('Location: http://localhost/demo/PhpCrawler/');
    }

}

?>