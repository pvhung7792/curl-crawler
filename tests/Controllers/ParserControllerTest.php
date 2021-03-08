<?php
use PHPUnit\Framework\TestCase;

use Controllers\ParserController;
use PHPUnit\Util\InvalidDataSetException;

class ParserControllerTest extends TestCase
{
    public function testGetParserThrowExceptionWithWebNotOnList()
    {
        $url = 'https://otherweb.com.vn';
        $parserController = new ParserController();

        $this->expectException(InvalidDataSetException::class);

        $parserController->getParser($url);
    }

    public function testGetParserReturnObject()
    {
        $url = 'https://vnexpress.net/cao-toc-la-son-tuy-loan-thong-xe-vao-quy-2-4245008.html';
        $parserController = new ParserController();

        $this->assertIsObject($parserController->getParser($url));
    }
}