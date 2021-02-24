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

    protected $html;

    public function __construct($url, $crawler)
    {
        $this->html = $crawler->crawlData($url);
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
        $temp = $this->preg_substr($this->regexTitleStart, $this->regexTitleEnd, $this->html);
        $title = substr($temp, 0 ,-2);  
        return $title;
    }
    // get publish date of website
    public function getDate()
    {
        $temp = $this->preg_substr($this->regexStartDate, $this->regexEndDate, $this->html);
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
        return $this->preg_substr($this->regexArticleStart, $this->regexArticleEnd, $this->html);
    }
    
     // get single string from website 
     protected function preg_substr($start, $end, $html)   
     {      
         $temp = preg_split($start, $html);    
         $content = preg_split($end, $temp[1]);      
         return trim($content[0]);      
     } 
 
     //get multiple string from website
     protected function multi_preg_substr($start, $end, $html)    
     {      
         $content = [];
         $temp = preg_split($start, $html);   
         for($i =1; $i < count($temp); $i++){
             $text = trim(strip_tags($temp[$i]));
             if (!$text=="") {
                $content[] = $text;
             }
         }
         return $content;      
     }  
}


?>