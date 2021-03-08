<?php
namespace Libs\Parser;
/**
 * ParserFactory class
 * Return required parser class base on input website
 */

use PageParser\DantriParser;
use PageParser\VietnamnetParser;
use PageParser\VnexpressParser;

class ParserFactory
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