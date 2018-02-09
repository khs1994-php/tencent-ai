<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class FaceTest extends AI
{
    const IMAGE = __DIR__.'/../resource/face/';

    const OUTPUT = __DIR__.'/../output/face/';

    const IMAGE1 = self::IMAGE.'wxc.jpg';

    const IMAGE2 = self::IMAGE.'wxc2.jpg';

    const IMAGE3 = self::IMAGE.'wxc3.jpg';

    const IMAGE5 = self::IMAGE.'wxc5.jpg';

    const PERSON_ID = 'testPersonId';

    const PERSON_NAME = 'testPersonName';

    const PERSON_TAG = 'testPersonTag';

    private $name;

    private $array;

    private function face()
    {
        return $this->ai()->face();
    }

    /**
     * 人体创建
     *
     * @return mixed
     * @throws TencentAIError
     * @throws \Exception
     */
    public function testCreatePerson()
    {
        $this->name = __FUNCTION__;

        // 单个组ID
        $this->array = $array = $this
            ->face()
            ->createPerson
            (['test'], self::PERSON_ID, self::PERSON_NAME, self::IMAGE1, self::PERSON_TAG);
        $this->face()->deletePerson(self::PERSON_ID);

        // 多个组ID为
        $this->array = $array = $this
            ->face()
            ->createPerson
            (['test1', 'test2'], self::PERSON_ID, self::PERSON_NAME, self::IMAGE1, self::PERSON_TAG);
        $this->assertEquals(0, $array['ret']);

        return $faceId = $array['data']['face_id'];
    }

    /**
     * 获取人体列表.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testGetPersonList()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->getPersonList('test1');

        // $this->assertContains('ok', $array['msg']);
        // $this->assertJsonStringEqualsJsonString('0', json_encode($array['ret']));
    }

    /**
     * 获取组列表.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testGetGroupList()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->getGroupList();
    }

    /**
     * 个体 => 增加人脸.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     * @throws \Exception
     */
    public function testAdd()
    {
        $this->name = __FUNCTION__;

        $this->array = $array = $this->face()->add(self::PERSON_ID, [self::IMAGE2], self::PERSON_TAG);
        $this->assertEquals(0, $array['ret']);
        $this->array = $array = $this->face()->add(self::PERSON_ID, [self::IMAGE3, self::IMAGE5], self::PERSON_TAG);
        $this->assertEquals(0, $array['ret']);

        return $faceIds = $array['data']['face_ids'];
    }

    /**
     * 个体 => 获取人脸列表.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testGetList()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->getList(self::PERSON_ID);
    }

    /**
     * 获取人脸信息.
     *
     * @param string $faceId
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testGetInfo(string $faceId)
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->getInfo($faceId);
    }

    /**
     * 个体 => 删除人脸.
     *
     * @param array $faceIds
     *
     * @depends testAdd
     * @throws TencentAIError
     */
    public function testDelete(array $faceIds)
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->delete('testPersonId', $faceIds);
    }

    /**
     * 设置个体信息.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testSetPersonInfo()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->setPersonInfo(self::PERSON_ID, 'testPersonNewName', 'testPersonNewTag');
    }

    /**
     * 获取个体信息.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testGetPersonInfo()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->getPersonInfo(self::PERSON_ID);
    }

    /**
     * 人脸分析
     *
     * @throws TencentAIError
     */
    public function testDetect()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->detect(self::IMAGE1);
    }

    /**
     * 多人脸识别
     * @throws TencentAIError
     */
    public function testMultiDetect()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->multiDetect(self::IMAGE1);
    }

    /**
     *五官检测
     * @throws TencentAIError
     */
    public function testShape()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->shape(self::IMAGE1, 0);
    }

    /**
     * 如果一个测试函数添加了 @test 注解，那么测试函数名字就不必以 test 开头.
     *
     * 人脸对比
     *
     * @test
     * @throws TencentAIError
     */
    public function compare()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->compare([self::IMAGE1, self::IMAGE3]);
    }

    /**
     * 人脸识别.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testIdentify()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->identify('test1', self::IMAGE3, 9);
    }

    /**
     * 人脸验证
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testVerify()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->verify(self::PERSON_ID, self::IMAGE3);
    }

    /**
     * 删除个体.
     *
     * @depends testCreatePerson
     * @throws TencentAIError
     */
    public function testDeletePerson()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->face()->deletePerson(self::PERSON_ID);
    }

    /**
     * 在测试函数执行完毕之后调用 tearDown 函数
     *
     * @throws \Exception
     */
    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
