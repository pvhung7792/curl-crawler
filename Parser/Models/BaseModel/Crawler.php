<?php 

interface Crawler
{
    public function crawData();
}

class curlCrawler implements Crawler
{
    public function crawData($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $str = curl_exec($ch);
        curl_close($ch);
        
        return $str;
    }
}

?>