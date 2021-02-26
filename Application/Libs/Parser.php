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

    // get website title
    public function getTitle()
    {
        $title = $this->preg_substr($this->regexTitleStart, $this->regexTitleEnd, $this->html);
        return $title;
    }

    // get publish date of website
    public function getDate()
    {
        $date = $this->preg_substr($this->regexStartDate, $this->regexEndDate, $this->html);
        return $date;
    }

    // Application maincontent to get text only
    public function getContent()
    {
        $mainContent = $this->getArticle();
        return $this->multi_preg_substr($this->regexStartContent, $this->regexEndContent, $mainContent);
    }

    // get main content from website
    private function getArticle()
    {
        return $this->preg_substr($this->regexArticleStart, $this->regexArticleEnd, $this->html);
    }

    // get single string from website
    private function preg_substr($start, $end, $html)
    {
        $temp = preg_split($start, $html);
        $content = preg_split($end, $temp[1]);
        return substr(trim($content[0]), 0 ,-2);
    }

    //get multiple string from website
    private function multi_preg_substr($start, $end, $html)
    {
        $content = [];
        $temp = preg_split($start, $html);
        for($i =1; $i < count($temp); $i++){
            $content[] = trim(strip_tags($temp[$i]));
        }
        return $content;
    }
}


?>