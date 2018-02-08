<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

// 类名 + Test

class FaceTest extends TestCase
{
    private $aiFace;

    private $image;

    private $image2;

    private $image3;

    private $image5;

    private $groupId;

    private $personId;

    private $personName;

    private $personTag;

    private $name;

    private $array;

    // 初始化，每次在开始执行测试函数之前，会先执行 setUp 进行测试之前的初始化

    public function setup()
    {

        $app_id = 1106560031;
        $app_key = 'ZbRY9cf72TbDO0xb';

        $this->aiFace = TencentAI::tencentAI($app_id, $app_key)->face();
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
        $this->name = __FUNCTION__;

        // 单个组ID
        $this->array = $array = $this->aiFace->createPerson([$this->groupId], $this->personId, $this->personName, $this->image, $this->personTag);
        $this->assertEquals(0, $array['ret']);
        $this->aiFace->deletePerson($this->personId);

        // 多个组ID为
        $this->array = $array = $this->aiFace->createPerson(['test1', 'test2'], $this->personId, $this->personName, $this->image, $this->personTag);
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
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->getPersonList($this->groupId);

//        $this->assertContains('ok', $array['msg']);
//        $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }

    /**
     * 获取组列表.
     *
     * @depends testCreatePerson
     */
    public function testGetGroupList()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->getGroupList();
    }

    /**
     * 个体 => 增加人脸.
     *
     * @depends testCreatePerson
     */
    public function testAdd()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->aiFace->add($this->personId, [$this->image2], $this->personTag);
        $this->assertEquals(0, $array['ret']);
        $this->array = $array = $this->aiFace->add($this->personId, [$this->image3, $this->image5], $this->personTag);
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
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->getList($this->personId);
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
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->getInfo($faceId);
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
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->delete('testPersonId', $faceIds);
    }

    /**
     * 设置个体信息.
     *
     * @depends testCreatePerson
     */
    public function testSetPersonInfo()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->setPersonInfo($this->personId, 'testPersonNewName', 'testPersonNewTag');
    }

    /**
     * 获取个体信息.
     *
     * @depends testCreatePerson
     */
    public function testGetPersonInfo()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->getPersonInfo($this->personId);
    }

    // 人脸分析

    public function testDetect()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->detect($this->image);
    }

    // 多人脸识别

    public function testMultiDetect()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->multiDetect($this->image);
    }

    // 五官检测

    public function testShape()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->shape($this->image, 0);
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
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->compare([$this->image, $this->image2]);
    }

    /**
     * 人脸识别.
     *
     * @depends testCreatePerson
     */
    public function testIdentify()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->identify($this->groupId, $this->image3, 9);
    }

    /**
     * 人脸验证
     *
     * @depends testCreatePerson
     */
    public function testVerify()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->verify($this->personId, $this->image3);
    }

    /**
     * 删除个体.
     *
     * @depends testCreatePerson
     */
    public function testDeletePerson()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiFace->deletePerson($this->personId);
    }

    // 在测试函数执行完毕之后调用 tearDown 函数

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(__DIR__.'/../output/face/'.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
