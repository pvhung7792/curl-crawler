<?php

require_once './lib/PregHtmlOption.php';

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
    protected $htmlPreg;

    public function __construct($url, $crawler, $htmlPregOption)
    {
        $this->html = $crawler->crawlData($url);
        $this->htmlPreg = new $htmlPregOption();
    }

    // get website title
    public function getTitle()
    {
        $title = $this->htmlPreg->preg_substr($this->regexTitleStart, $this->regexTitleEnd, $this->html);
        return $title;
    }

    // get publish date of website
    public function getDate()
    {
        $date = $this->htmlPreg->preg_substr($this->regexStartDate, $this->regexEndDate, $this->html);
        return $date;
    }

    // Parser maincontent to get text only
    public function getContent()
    {
        $mainContent = $this->getArticle();
        return $this->htmlPreg->multi_preg_substr($this->regexStartContent, $this->regexEndContent, $mainContent);
    }

    // get main content from website
    protected function getArticle()
    {
        return $this->htmlPreg->preg_substr($this->regexArticleStart, $this->regexArticleEnd, $this->html);
    }
}


?>