<?php
use PHPUnit\Framework\TestCase;
require_once './Application/Controllers/ContentController.php';

class ContentControllerTest extends TestCase
{

    public function testSuccessStoreDataReturnTrue()
    {
        $contentController = Mockery::mock(ContentController::class);

        $data = [
            'link'=>'url',
            'title'=>'title',
            'date'=>'date',
            'content'=>'content'
        ];
        $contentController->shouldReceive('storeContent')->with($data)->andReturn(true);

        $this->assertTrue($contentController->storeContent($data));
    }



}