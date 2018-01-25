<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

// 类名 + Test

class FaceTest extends TestCase
{
    public $ai;

    // 初始化

    // 每次在开始执行测试函数之前，会先执行 setUp 进行测试之前的初始化

    public function setup()
    {
        # code...
        $config = [
        'app_id' => 1106560031,
        'app_key' => 'ZbRY9cf72TbDO0xb',
    ];

        $this->ai = new TencentAI($config);
    }

    // test + 函数名

    public function testDetect()
    {
        // code...
        $array = $this->ai->face->detect(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertContains('ok', $array['msg']);
    }

    public function testMultiDetect()
    {
        # code...
        $array = $this->ai->face->multiDetect(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertContains('ok', $array['msg']);
    }

    public function testShape()
    {
        # code...
        $array = $this->ai->face->shape(getcwd().'/tests/image/ai/tencent/face/wxc.jpg');
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }

    // 如果一个测试函数添加了 @test 注解，那么测试函数名字就不必以 test 开头

    /**
    * @test
    */

    public function compare()
    {
        $array = $this->ai->face->compare([
        getcwd().'/tests/image/ai/tencent/face/wxc.jpg',
        getcwd().'/tests/image/ai/tencent/face/verify.jpg'
      ]);

        $this->assertEquals(0, $array['ret']);
    }

    // 在测试函数执行完毕之后调用 tearDown 函数

    public function tearDown()
    {
        # code...
    }
}
