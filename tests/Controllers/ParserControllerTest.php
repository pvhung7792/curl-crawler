<?php
use PHPUnit\Framework\TestCase;

use Controllers\ParserController;
use PHPUnit\Util\InvalidDataSetException;

class ParserControllerTest extends TestCase
{
    /**
     * Check when input url are not in the available list
     * will throw an error
     */

    public function testGetParserThrowExceptionWithWebNotOnList()
    {
        $url = 'https://otherweb.com.vn';
        $parserController = new ParserController();

        $this->expectException(InvalidDataSetException::class);

        $parserController->getParser($url);
    }

    /**
     * Test when input correct url will return an object as required parser class
     */

    public function testGetParserReturnObject()
    {
        $url = 'https://vnexpress.net/cao-toc-la-son-tuy-loan-thong-xe-vao-quy-2-4245008.html';
        $parserController = new ParserController();

        $this->assertIsObject($parserController->getParser($url));
    }
}