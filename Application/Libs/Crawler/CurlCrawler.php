<?php
namespace Libs\Crawler;


/**
 * Class CurlCrawler
 * Defined function to get data from website with curl
 */

class CurlCrawler implements CrawlerInterface
{

    /**
     * @param string $url input url of the website
     * @return bool|string html of the website by string
     */

    public function crawlData($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $str = curl_exec($ch);
        curl_close($ch);

        return $str;
    }
}

