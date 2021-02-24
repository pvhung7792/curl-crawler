<?php 

class Parser
{
    protected $regexTitleStart;
    protected $regexTitleEnd;

    protected $regexArticleStart;
    protected $regexArticleEnd;

    protected $regexStartContent;
    protected $regexEndContent;

    protected $regexStartDate;
    protected $regexEndDate;

    protected $str;

    public function __construct($url, $crawler)
    {
        $this->str = $crawler->crawlData($url);
    }

    // Gather data
    public function getData()
    {
        $title = $this->getTitle();
        $date = $this->getDate();
        $content = $this->getContent();

        return $data = [
            'title'=> $title,
            'date'=> $date,
            'content'=> $content
        ];
    }

    // get website title
    public function getTittle()
    {
        $temp = $this->preg_substr($this->regexTitleStart, $this->regexTitleEnd, $this->str);
        $title = substr($temp, 0 ,-2);  
        return $title;
    }
    // get publish date of website
    public function getDate()
    {
        $temp = $this->preg_substr($this->regexStartDate, $this->regexEndDate, $this->str);
        $date = substr($temp, 0 ,-2);  
        return $date;
    }

    // Parser maincontent to get text only
    public function getContent()
    {
        $mainContent = $this->getArticle();
        return $this->multi_preg_substr($this->regexStartContent, $this->regexEndContent, $mainContent);
    }

    // get main content from website
    protected function getArticle()
    {
        return $this->preg_substr($this->regexArticleStart, $this->regexArticleEnd, $this->str);
    }

    // get single string from website 
    protected function preg_substr($start, $end, $str)   
    {      
        $temp = preg_split($start, $str);    
        $content = preg_split($end, $temp[1]);      
        return trim($content[0]);      
    } 

    //get multiple string from website
    protected function multi_preg_substr($start, $end, $str)    
    {      
        $content = [];
        $temp = preg_split($start, $str);   
        for($i =1; $i < count($temp); $i++){
            $content[] = trim(strip_tags($temp[$i]));
        }
        return $content;      
    }  
}


?>