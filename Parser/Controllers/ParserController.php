<?php 
require_once './lib/Crawler.php';
require_once './Controllers/BaseController/Controller.php';

class ParserController extends Controller
{
    private  $list = ["vietnamnet", "dantri", "vnexpress"];

    public function __construct()
    {
    }

    public function parserData(){
        // Parser url to get website name
        $url = $_POST['url'];
        $arrayUrl = explode("/", $url);
        $website = explode(".",$arrayUrl[2]);

        //return back if website it not on available list
        if (!in_array($website[0], $this->list)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        // Call class base on website
        $class = $website[0].'Parser';
        require_once './Models/'.$class.'.php';

        //change crawler method here
        $crawler = new CurlCrawler();
        $parser = new $class($url, $crawler);

        $data = [
            'link'=> $url,
            'title'=>$parser->getTittle(),
            'date'=>$parser->getDate(),
            'content'=>$parser->getContent()
        ];

        // return view
        $this->view(viewContent ,$data);
    }   

}


