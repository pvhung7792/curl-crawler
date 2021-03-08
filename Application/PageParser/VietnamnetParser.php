<?php
namespace PageParser;

//require_once '../Application/Libs/Parser/Parser.php';
use Libs\Parser\Parser;
/**
 * Class VietnamnetParser
 * Redefine the properties of Parser class with
 * regex to parser the html data get from website Vietnamnet.vn
 */

class VietnamnetParser extends Parser
{
    protected $regexTitleStart = '/class="title f-22 c-3e">/';
    protected $regexTitleEnd = '/\<\/h1\>/';

    protected $regexArticleStart = '/class="article-relate/';
    protected $regexArticleEnd = '/class="inner-article"/';

    protected $regexStartContent = '/p>/';
    protected $regexEndContent = '/\<\/p\>/';

    protected $regexStartDate = '/class="ArticleDate">/';
    protected $regexEndDate = '/\<\/span\>/';

}


?>


