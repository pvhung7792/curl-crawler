<?php

use Models\PageData;
use Core\Controller;

class ContentController extends Controller
{
//    protected $table;

    protected $table;
    /**
     * ContentController constructor.
     * Include PageData model
     * Add $data base on POST request
     * @return void
     */

//    public function __construct()
//    {
//        $this->table = new PageData();
//    }

    /**
     * function storeContent
     * Add parsed data into database
     * redirect back to home page
     */

    public function storeContent($data)
    {
        $pageData = new PageData();
        //store data
        $pageData->store($data);

        //redirect back to main page
        //header('Location: http://localhost/demo/PhpCrawler/');
        $this->view('HomePage');
    }

}

