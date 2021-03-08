<?php
use PHPUnit\Framework\TestCase;

use Libs\Crawler\CurlCrawler;
use PageParser\VietnamnetParser;

class VietnamnetParserTest extends TestCase
{
    protected $pageParser;

    protected function setUp(): void
    {
        $url = 'https://vietnamnet.vn/vn/tuanvietnam/dachieu/mot-con-duong-khac-cho-vaccine-covid-19-717034.html';
        $crawler = new CurlCrawler();

        $this->pageParser = new VietnamnetParser($url, $crawler);
    }

    /**
     * test if parsed title from web page is correct
     */

    public function testReturnTitleIsCorrect()
    {
        $this->assertEquals('Một con đường khác cho vắc-xin Covid-19', $this->pageParser->getTitle());
    }

    /**
     * test if parsed date from web page is correct
     */

    public function testReturnDateIsCorrect()
    {
        $this->assertNotEmpty($this->pageParser->getDate());
    }

    /**
     * Test if main content are getable
     */

    public function testReturnContentIsCorrect()
    {
        $this->assertNotEmpty($this->pageParser->getContent()[1]);
    }

}
