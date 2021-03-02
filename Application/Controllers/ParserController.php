<?php

require_once '../Application/Libs/Crawler.php';
require_once '../Application/Libs/Parser/IncludeParser.php';

/**
 * Class ParserController
 * Current available web site to parser VietNameNet.vn, Dantri.com, VnExpress.net
 */

class ParserController extends Controller
{
    private  $list = ["vietnamnet", "dantri", "vnexpress"];

    /**
     * parserData function
     * @return html view combine with parsed data
     */

    public function parserData(){

        // Application url to get website name
        $url = $_POST['url'];
        $arrayUrl = explode("/", $url);
        $website = explode(".",$arrayUrl[2])[0];

        //return back if website it not on available list
        if (!in_array($website, $this->list)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }


        //change crawler method here
        $crawler = new CurlCrawler();

        // Call parser class base on website
        $includeParser = new IncludeParser();
        $parser = $includeParser->getParser($url, $crawler, $website);

        $data = [
            'link'=> $url,
            'title'=>$parser->getTitle() ? : "no title",
            'date'=>$parser->getDate() ? : "",
            'content'=>$parser->getContent() ? : ""
        ];

        // return view
        $this->view(ContentDetail, $data);
    }   

}


