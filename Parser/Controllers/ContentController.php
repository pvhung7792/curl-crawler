<?php 
require_once './Utility/page_data_tb.php';

class ContentController
{
    protected $table;

    public function __construct()
    {
        $this->table = new page_data_tb();
    }
    
    public function storeContent()
    {
        //get data
        $data = $_POST;

        //store data
        $this->table->store($data);

        //unset session
        session_unset();

        //redirect back to main page
        header('Location: http://localhost/demo/PhpCrawler/?succcess=them_du_lieu_thanh_cong');
    }

}

?>