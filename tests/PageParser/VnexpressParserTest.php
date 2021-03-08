<?php
use PHPUnit\Framework\TestCase;

use Libs\Crawler\CurlCrawler;
use PageParser\VnexpressParser;

class VnexpressParserTest extends TestCase
{
    protected $pageParser;

    protected function setUp(): void
    {
        $url = 'https://vnexpress.net/nhan-chung-ke-ve-ngay-38-nguoi-chet-trong-bieu-tinh-myanmar-4243303.html';
        $crawler = new CurlCrawler();

        $this->pageParser = new VnexpressParser($url, $crawler);
    }

    /**
     * test if parsed title from web page is correct
     */

    public function testReturnTitleIsCorrect()
    {
        $this->assertEquals('Nhân chứng kể về ngày 38 người chết trong biểu tình Myanmar', $this->pageParser->getTitle());
    }

    /**
     * test if parsed date from web page is correct
     */

    public function testReturnDateIsCorrect()
    {
        $this->assertNotEmpty($this->pageParser->getDate());
        $this->assertEquals('Thứ năm, 4/3/2021, 10:12 (GMT+7)',$this->pageParser->getDate());
    }

    /**
     * Test if main content are getable
     */

    public function testReturnContentIsCorrect()
    {
        $this->assertNotEmpty($this->pageParser->getContent()[0]);
    }
}