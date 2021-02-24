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
        $data = $_POST;
        $this->table->store($data);
        session_unset();
        header('Location: http://localhost/demo/PhpCrawler/?succcess="them_du_lieu_thanh_cong"');
    }

}

?>