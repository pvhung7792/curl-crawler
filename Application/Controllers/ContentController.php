<?php
require_once '../Application/Models/PageData.php';


class ContentController
{
    protected $table;
    protected $data;

    /**
     * ContentController constructor.
     * Include PageData model
     * Add $data base on POST request
     * @return void
     */

    public function __construct()
    {
        $this->table = new PageData();
        $this->data = $_POST;
    }

    /**
     * function storeContent
     * Add parsed data into database
     * redirect back to home page
     */

    public function storeContent()
    {

        //store data
        $this->table->store($this->data);

        //redirect back to main page
        header('Location: http://localhost/demo/PhpCrawler/');
    }

}

?>