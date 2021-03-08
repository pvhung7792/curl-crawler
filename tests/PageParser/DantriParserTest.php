<?php
use PHPUnit\Framework\TestCase;

use PageParser\DantriParser;
use Libs\Crawler\CurlCrawler;

class DantriParserTest extends TestCase
{
    protected $pageParser;

    protected function setUp(): void
    {
        $url = 'https://dantri.com.vn/phap-luat/khoi-to-vu-an-lam-lay-lan-dich-covid-19-o-thanh-pho-hai-duong-20210222174439227.htm';
        $crawler = new CurlCrawler();

        $this->pageParser = new DantriParser($url, $crawler);
    }

    /**
     * test if parsed title from web page is correct
     */

    public function testReturnTitleIsCorrect()
    {
        $this->assertEquals('Khởi tố vụ án làm lây lan dịch Covid-19 ở Thành phố Hải Dương', $this->pageParser->getTitle());
    }

    /**
     * test if parsed date from web page is correct
     */

    public function testReturnDateIsCorrect()
    {
        $this->assertEquals('Thứ hai, 22/02/2021 - 18:01', $this->pageParser->getDate());
    }

    /**
     * Test if main content are getable
     */

    public function testReturnContentIsCorrect()
    {
        $this->assertNotEmpty($this->pageParser->getContent()[0]);
    }
}