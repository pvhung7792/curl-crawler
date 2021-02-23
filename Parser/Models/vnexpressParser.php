<?php 
require_once './Models/BaseModel/Parser.php';

echo "<br>vnexpress";
class vnexpressParser extends Parser
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