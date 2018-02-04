<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Face
{
    use Module\Image;

    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/face/';

    /**
     * 人脸分析
     *
     * @param string $image
     * @param int    $mode 检测模式，0-正常，1-大脸模式
     * @return mixed
     * @throws TencentAIError
     */
    public function detect(string $image, $mode = 1)
    {
        $data = [
            'image' => self::encode($image),
            'mode' => $mode,
        ];
        $url = self::BASE_URL.'face_detectface';

        return TencentAI::exec($url, $data);
    }

    /**
     * 多人脸检测
     *
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function multiDetect(string $image)
    {
        $url = self::BASE_URL.'face_detectmultiface';
        return $this->image($url, $image);
    }

    /**
     * 人脸对比
     *
     * @param array $images
     * @return mixed
     * @throws TencentAIError
     */
    public function compare(array $images)
    {
        if (count($images) !== 2) {
            throw new TencentAIError(90001);
        }
        $data = [
            'image_a' => self::encode($images[0]),
            'image_b' => self::encode($images[1]),
        ];
        $url = self::BASE_URL.'face_facecompare';

        return TencentAI::exec($url, $data);
    }

    /**
     * 五官检测
     *
     * @param string $image
     * @param int    $mode 检测模式，0-正常，1-大脸模式
     * @return mixed
     * @throws TencentAIError
     */
    public function shape(string $image, int $mode)
    {
        if ($mode !== 0 && $mode !== 1) {
            throw new TencentAIError('20002');
        }
        $data = [
            'image' => self::encode($image),
            'mode' => $mode,
        ];
        $url = self::BASE_URL.'face_detectface';

        return TencentAI::exec($url, $data);
    }

    /**
     * 人脸识别
     *
     * @param string $group_id
     * @param string $image
     * @param int    $topon 返回的候选人个数
     * @return mixed
     * @throws TencentAIError
     */
    public function identify(string $group_id, string $image, int $topon = 9)
    {
        $data = [
            'image' => self::encode($image),
            'group_id' => $group_id,
            'topn' => $topon,
        ];
        $url = self::BASE_URL.'face_faceidentify';

        return TencentAI::exec($url, $data);
    }

    /**
     * 人脸验证
     *
     * @param string $person_id
     * @param string $image
     * @return mixed
     * @throws TencentAIError
     */
    public function verify(string $person_id, string $image)
    {
        $data = [
            'person_id' => $person_id,
            'image' => self::encode($image),
        ];
        $url = self::BASE_URL.'face_faceverify';

        return TencentAI::exec($url, $data);
    }

    /**
     * 个体管理 => 增加人脸(一个或一组人脸)
     *
     * @param string       $person_id
     * @param string|array $image
     * @param string       $tag
     * @return mixed
     * @throws TencentAIError
     */
    public function add(string $person_id, $image, string $tag)
    {
        $data = [
            'person_id' => $person_id,
            'images' => self::encode($image),
            'tag' => $tag,
        ];
        $url = self::BASE_URL.'face_addface';

        return TencentAI::exec($url, $data);
    }

    /**
     * 个体管理 => 删除人脸(一个或一组人脸)
     *
     * @param string       $person_id
     * @param string|array $face_ids
     * @return mixed
     */
    public function delete(string $person_id, $face_ids)
    {
        $data = [
            'person_id' => $person_id,
            'face_ids' => $face_ids,
        ];
        $url = self::BASE_URL.'face_delface';

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取人脸列表
     *
     * @param string $person_id
     * @return mixed
     */
    public function getList(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];
        $url = self::BASE_URL.'face_getfaceids';

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取人脸信息
     *
     * @param string $face_id
     * @return mixed
     */
    public function getInfo(string $face_id)
    {
        $data = [
            'face_id' => $face_id,
        ];
        $url = self::BASE_URL.'face_getfaceinfo';

        return TencentAI::exec($url, $data);
    }

    /**
     * 人体创建(属于一个组，或多个组)
     *
     * @param string|array $group_ids
     * @param string       $person_id
     * @param string       $person_name
     * @param string       $image
     * @param string       $tag
     * @return mixed
     * @throws TencentAIError
     */
    public function createPerson($group_ids,
                                 string $person_id,
                                 string $person_name,
                                 string $image,
                                 string $tag)
    {
        $data = [
            'group_ids' => $group_ids,
            'person_id' => $person_id,
            'image' => self::encode($image),
            'person_name' => $person_name,
            'tag' => $tag,
        ];
        $url = self::BASE_URL.'face_newperson';

        return TencentAI::exec($url, $data);
    }

    /**
     * 删除个体
     *
     * @param string $person_id
     * @return mixed
     */
    public function deletePerson(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];
        $url = self::BASE_URL.'face_delperson';

        return TencentAI::exec($url, $data);
    }

    /**
     * 设置个体信息
     *
     * @param string $person_id
     * @param string $person_name
     * @param string $tag
     * @return mixed
     */
    public function setPersonInfo(string $person_id, string $person_name, string $tag)
    {
        $data = [
            'person_id' => $person_id,
            'person_name' => $person_name,
            'tag' => $tag,
        ];
        $url = self::BASE_URL.'face_setinfo';

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取个体信息
     *
     * @param string $person_id
     * @return mixed
     */
    public function getPersonInfo(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];
        $url = self::BASE_URL.'face_getinfo';

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取组列表
     *
     * @return mixed
     */
    public function getGroupList()
    {
        $url = self::BASE_URL.'face_getgroupids';
        return TencentAI::exec($url, []);
    }

    /**
     * 获取人体列表
     *
     * @param string $group_id
     * @return mixed
     */
    public function getPersonList(string $group_id)
    {
        $data = [
            'group_id' => $group_id,
        ];
        $url = self::BASE_URL.'face_getpersonids';

        return TencentAI::exec($url, $data);
    }
}
