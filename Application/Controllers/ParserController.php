<?php

require_once '../Application/Libs/Crawler.php';
require_once '../Application/Core/Controller.php';

class ParserController extends Controller
{
    private  $list = ["vietnamnet", "dantri", "vnexpress"];

    public function __construct()
    {

    }

    public function parserData(){

        // Application url to get website name
        $url = $_POST['url'];
        $arrayUrl = explode("/", $url);
        $website = explode(".",$arrayUrl[2]);

        //return back if website it not on available list
        if (!in_array($website[0], $this->list)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        // Call class base on website
        $parser = ucfirst($website[0]).'Parser';

        require_once '../Application/PageParser/'.$parser.'.php';


        //change crawler method here
        $crawler = new CurlCrawler();

        $parser = new $parser($url, $crawler, PregHtmlForNews);

        $data = [
            'link'=> $url,
            'title'=>$parser->getTitle() ? $parser->getTitle() : "no title",
            'date'=>$parser->getDate() ? $parser->getDate() : "",
            'content'=>$parser->getContent() ? $parser->getContent() : ""
        ];

        // return view
        $this->view(ContentDetail ,$data);
    }   

}


