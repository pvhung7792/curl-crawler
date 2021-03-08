<?php
use PHPUnit\Framework\TestCase;

use Libs\Crawler\CurlCrawler;
use Libs\Parser\Parser;

class ParserTest extends TestCase
{

    /**
     * check if the crawler working correctly
     * expect data return from crawler is string of html
     */

    public function testReturnHtmlOfConstructorIsString()
    {
        $crawler = new CurlCrawler();

        $parser = new Parser("https://vietnamnet.vn/vn/tuanvietnam/media/dang-sau-viec-luan-toi-cuu-tong-thong-donald-trump-lan-hai-715281.html",$crawler);

        $reflector = new ReflectionClass($parser);

        $prop = $reflector->getProperty('html');
        $prop->setAccessible(true);
        $val = $prop->getValue($parser);

        $this->assertIsString($val);
    }


}