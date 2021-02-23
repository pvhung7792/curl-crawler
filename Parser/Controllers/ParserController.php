<?php 

class ParserController
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
            header('Location: ' . $_SERVER['HTTP_REFERER'].'?error=notinlist');
        }
        
        // Call class
        $class = $website[0].'Parser';
        require_once './Models/'.$class.'.php';
        $parser = new $class($url);

        //Get data
        $title = $parser->getTittle();
        $date = $parser->getDate();
        $content = $parser->getContent();

        var_dump($content);

    }   

}


?>