<?php
require_once '../Application/Libs/Parser.php';

/**
 * Class VnexpressParser
 * Redefine the properties of Parser class with
 * regex to parser the html data get from website VnExpress.net
 */

class VnexpressParser extends Parser
{
    protected $regexTitleStart = '/class="title-detail">/';
    protected $regexTitleEnd = '/h1>/';

    protected $regexArticleStart = '/class="fck_detail/';
    protected $regexArticleEnd = '/article>/';

    protected $regexStartContent = '/class="Normal">/';
    protected $regexEndContent = '/</p>/';

    protected $regexStartDate = '/class="date">/';
    protected $regexEndDate = '/span>/'; 

}


?>