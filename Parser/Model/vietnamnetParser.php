<?php 

require_once "./Parser.php";

class vietnamnetParser extends Parser
{
    protected $regexTitleStart = '/class="title f-22 c-3e">/';
    protected $regexTitleEnd = '/h1>/';

    protected $regexArticleStart = '/class="pop/';
    protected $regexArticleEnd = '/class="button-load-more"/';

    protected $regexStartContent = '/class="lead">/';
    protected $regexEndContent = '/</p>/';

    protected $regexStartDate = '/class="ArticleDate">/';
    protected $regexEndDate = '/span>/';

}


?>