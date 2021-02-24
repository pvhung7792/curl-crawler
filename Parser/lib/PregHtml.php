<?php

class PregHtml
{
    // get single string from website 
    protected function preg_substr($start, $end, $html)   
    {      
        $temp = preg_split($start, $html);    
        $content = preg_split($end, $temp[1]);      
        return trim($content[0]);      
    } 

    //get multiple string from website
    protected function multi_preg_substr($start, $end, $html)    
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