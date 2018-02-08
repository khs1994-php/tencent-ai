<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

// 类名 + Test

class FaceTest extends TestCase
{
    public $aiFace;

    public $image;

    public $image2;

    public $image3;

    public $image5;

    public $groupId;

    public $personId;

    public $personName;

    public $personTag;

    // 初始化，每次在开始执行测试函数之前，会先执行 setUp 进行测试之前的初始化

    public function setup()
    {
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];
        $this->aiFace = TencentAI::tencentAI($config)->face();
        $this->image = __DIR__.'/../image/ai/tencent/face/wxc.jpg';
        $this->image2 = __DIR__.'/../image/ai/tencent/face/wxc2.jpg';
        $this->image3 = __DIR__.'/../image/ai/tencent/face/wxc3.jpg';
        $this->image5 = __DIR__.'/../image/ai/tencent/face/wxc5.jpg';
        $this->groupId = 'testGroupId1|testGroupId2';
        $this->personId = 'testPersonId';
        $this->personName = 'testPersonName';
        $this->personTag = 'testPersonTag';
    }

    // 人体创建

    public function testCreatePerson()
    {
        // 组ID为字符串
        $array = $this->aiFace->createPerson([$this->groupId], $this->personId, $this->personName, $this->image, $this->personTag);
        $this->assertEquals(0, $array['ret']);
        $this->aiFace->deletePerson($this->personId);
        // 组ID为数组
        $array = $this->aiFace->createPerson(['test1', 'test2'], $this->personId, $this->personName, $this->image, $this->personTag);
        $this->assertEquals(0, $array['ret']);

        return $faceId = $array['data']['face_id'];
    }

    /**
     * 获取人体列表.
     *
     * @depends testCreatePerson
     */
    public function testGetPersonList()
    {
        $array = $this->aiFace->getPersonList($this->groupId);
        $this->assertContains('ok', $array['msg']);
    }

    /**
     * 获取组列表.
     *
     * @depends testCreatePerson
     */
    public function testGetGroupList()
    {
        $array = $this->aiFace->getGroupList();
        $this->assertContains('ok', $array['msg']);
    }

    /**
     * 个体 => 增加人脸.
     *
     * @depends testCreatePerson
     */
    public function testAdd()
    {
        $array = $this->aiFace->add($this->personId, [$this->image2], $this->personTag);
        $this->assertEquals(0, $array['ret']);
        $array = $this->aiFace->add($this->personId, [$this->image3, $this->image5], $this->personTag);
        $this->assertEquals(0, $array['ret']);

        return $faceIds = $array['data']['face_ids'];
    }

    /**
     * 个体 => 获取人脸列表.
     *
     * @depends testCreatePerson
     */
    public function testGetList()
    {
        $array = $this->aiFace->getList($this->personId);
        $this->assertContains('ok', $array['msg']);
    }

    /**
     * 获取人脸信息.
     *
     * @param string $faceId
     *
     * @depends testCreatePerson
     */
    public function testGetInfo(string $faceId)
    {
        $array = $this->aiFace->getInfo($faceId);
        $this->assertContains('ok', $array['msg']);
    }

    /**
     * 个体 => 删除人脸.
     *
     * @param array $faceIds
     *
     * @depends testAdd
     */
    public function testDelete(array $faceIds)
    {
        $array = $this->aiFace->delete('testPersonId', $faceIds);
        $this->assertContains('ok', $array['msg']);
    }

    /**
     * 设置个体信息.
     *
     * @depends testCreatePerson
     */
    public function testSetPersonInfo()
    {
        $array = $this->aiFace->setPersonInfo($this->personId, 'testPersonNewName', 'testPersonNewTag');
        $this->assertContains('ok', $array['msg']);
    }

    /**
     * 获取个体信息.
     *
     * @depends testCreatePerson
     */
    public function testGetPersonInfo()
    {
        $array = $this->aiFace->getPersonInfo($this->personId);
        $this->assertContains('ok', $array['msg']);
        $this->assertContains('testPersonNewName', $array['data']['person_name']);
    }

    // 人脸分析

    public function testDetect()
    {
        $array = $this->aiFace->detect($this->image);
        $this->assertContains('ok', $array['msg']);
    }

    // 多人脸识别

    public function testMultiDetect()
    {
        $array = $this->aiFace->multiDetect($this->image);
        $this->assertContains('ok', $array['msg']);
    }

    // 五官检测

    public function testShape()
    {
        $array = $this->aiFace->shape($this->image, 0);
        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }

    /**
     * 如果一个测试函数添加了 @test 注解，那么测试函数名字就不必以 test 开头.
     *
     * 人脸对比
     *
     * @test
     */
    public function compare()
    {
        $array = $this->aiFace->compare([$this->image, $this->image2]);
        $this->assertEquals(0, $array['ret']);
    }

    /**
     * 人脸识别.
     *
     * @depends testCreatePerson
     */
    public function testIdentify()
    {
        $array = $this->aiFace->identify($this->groupId, $this->image3, 9);
        $this->assertEquals(0, $array['ret']);
    }

    /**
     * 人脸验证
     *
     * @depends testCreatePerson
     */
    public function testVerify()
    {
        $array = $this->aiFace->verify($this->personId, $this->image3);
        $this->assertEquals(0, $array['ret']);
    }

    /**
     * 删除个体.
     *
     * @depends testCreatePerson
     */
    public function testDeletePerson()
    {
        $array = $this->aiFace->deletePerson($this->personId);
        $this->assertEquals(0, $array['ret']);
    }

    // 在测试函数执行完毕之后调用 tearDown 函数

    public function tearDown()
    {
    }
}
