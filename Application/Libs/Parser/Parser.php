<?php

/**
 * Class Parser
 * Defined function to get different component of the website
 */

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

    /**
     * Parser constructor.
     * Set value of $html
     * @param string $url input url to parser
     * @param object $crawler method of crawler
     * @return void
     */

    public function __construct($url, $crawler)
    {
        $this->html = $crawler->crawlData($url);
    }

    /**
     * Get title of the given html article
     * @return false|string
     */

    public function getTitle()
    {
        $title = $this->preg_substr($this->regexTitleStart, $this->regexTitleEnd, $this->html);
        return $title;
    }

    /**
     * Get publish time of the given html article
     * @return false|string
     */

    public function getDate()
    {
        $date = $this->preg_substr($this->regexStartDate, $this->regexEndDate, $this->html);
        return $date;
    }

    /**
     * Get separate content of the main content
     * @return false|array
     */

    public function getContent()
    {
        $mainContent = $this->getArticle();
        return $this->multi_preg_substr($this->regexStartContent, $this->regexEndContent, $mainContent);
    }

    /**
     * Get main content of the given html
     * @return false|string
     */

    private function getArticle()
    {
        return $this->preg_substr($this->regexArticleStart, $this->regexArticleEnd, $this->html);
    }

    /**
     * Get one string line of the given html string base on regex
     * @param string $start regex for begin of string
     * @param string $end  regex for end of string
     * @param string $html string of html
     * @return false|string
     */

    private function preg_substr($start, $end, $html)
    {
        $temp = preg_split($start, $html);
        $content = preg_split($end, $temp[1]);
        return substr(trim($content[0]), 0 ,-2);
    }

    /**
     * Get multiple string line of the given html string base on regex
     * @param string $start regex for begin of each string
     * @param string $end  regex for end of each string
     * @param string $html string of html
     * @return false|array
     */

    private function multi_preg_substr($start, $end, $html)
    {
        $content = [];
        $temp = preg_split($start, $html);
        for($i =1; $i < count($temp); $i++){
            $line = trim(strip_tags($temp[$i]));
            if ($line){
                $content[] = $line;
            }
        }
        return $content;
    }
}

?>