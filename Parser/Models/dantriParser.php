<?php 
require_once './Models/BaseModel/Parser.php';

class dantriParser extends Parser
{
    protected $regexTitleStart = '/class="dt-news__title">/';
    protected $regexTitleEnd = '/h1>/';

    protected $regexArticleStart = '/class="dt-news__body"/';
    protected $regexArticleEnd = '/data-tin-lien-quan/';

    protected $regexStartContent = '/p>/';
    protected $regexEndContent = '/</p>/';

    protected $regexStartDate = '/class="dt-news__time">/';
    protected $regexEndDate = '/span>/';
}


?>