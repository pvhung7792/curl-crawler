<?php

interface PregHtml
{
    public  function preg_substr($start, $end, $html);
    public  function multi_preg_substr($start, $end, $html);
}

class PregHtmlForNews implements PregHtml
{
    // get single string from website 
    public function preg_substr($start, $end, $html)
    {
        $temp = preg_split($start, $html);
        $content = preg_split($end, $temp[1]);
        return substr(trim($content[0]), 0 ,-2);
    }

    //get multiple string from website
    public function multi_preg_substr($start, $end, $html)
    {      
        $content = [];
        $temp = preg_split($start, $html);   
        for($i =1; $i < count($temp); $i++){
            $content[] = trim(strip_tags($temp[$i]));
        }
        return $content;      
    }  
}

