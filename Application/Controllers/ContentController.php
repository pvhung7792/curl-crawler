<?php
require_once '../Application/Models/PageData.php';

class ContentController
{
    protected $table;
    protected $data;

    public function __construct()
    {
        $this->table = new PageData();
        $this->data = $_POST;
    }

    public function storeContent()
    {

        //store data
        $this->table->store($this->data);

        //redirect back to main page
        header('Location: http://localhost/demo/PhpCrawler/');
    }

}

?>