<?php
namespace Controllers;

use Libs\Crawler\CurlCrawler;
use Libs\Parser\ParserFactory;
use Core\Controller;
use PHPUnit\Util\InvalidDataSetException;

/**
 * Class ParserController
 * Current available web site to parser VietNameNet.vn, Dantri.com, VnExpress.net
 */

class ParserController extends Controller
{
    private $list = ["vietnamnet", "dantri", "vnexpress"];

    /**
     * parserData function
     * @return array
     * show view combine with parsed data
     */

    public function parserData(){
        $url = $_POST['url'];

        try {
            $parser = $this->getParser($url);
        }catch (InvalidDataSetException $e){
            echo $e->getMessage();
            die();
        }

        $data = [
            'link'=> $url,
            'title'=>$parser->getTitle() ? : "no title",
            'date'=>$parser->getDate() ? : "",
            'content'=>$parser->getContent() ? : ""
        ];

        // return view
        $this->view(ContentDetail, $data);
    }

    public function getParser($url)
    {
        // Application url to get website name
        $arrayUrl = explode("/", $url);
        $website = explode(".",$arrayUrl[2])[0];

        //return back if website it not on available list
        if (!in_array($website, $this->list)) {
            throw new InvalidDataSetException('Website are not in the list');
        }

        //change crawler method here
        $crawler = new CurlCrawler();

        // Call parser class base on website
        $includeParser = new ParserFactory();
        return $parser = $includeParser->getParser($url, $crawler, $website);
    }



}


