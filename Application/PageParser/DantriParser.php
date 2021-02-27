<?php
require_once '../Application/Libs/Parser.php';

/**
 * Class DantriParser
 * Redefine the properties of Parser class with
 * regex to parser the html data get from website Dantri.com
 */


class DantriParser extends Parser
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