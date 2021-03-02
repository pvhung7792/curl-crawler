<?php

/**
 * IncludeParser class
 * Return required parser class base on input website
 */

require_once '../Application/PageParser/DantriParser.php';
require_once '../Application/PageParser/VietnamnetParser.php';
require_once '../Application/PageParser/VnexpressParser.php';

class IncludeParser
{
    public function getParser($url, $crawler, $website){
        switch($website){
            case "dantri":
                return new DantriParser($url, $crawler);
                break;
            case "vietnamnet":
                return new VietnamnetParser($url, $crawler);
                break;
            case "vnexpress":
                return new VnexpressParser($url, $crawler);
                break;
            default:
                return false;
        }
    }
}