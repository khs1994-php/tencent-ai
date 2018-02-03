<?php

namespace TencentAI;

class Face
{
    use Module\Image;

    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/face/';

    // 人脸分析

    public function detect(string $image)
    {

        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'mode' => 0,
        ];

        $url = self::BASE_URL.'face_detectface';

        return TencentAI::exec($url, $data);
    }

    // 多人脸检测

    public function multiDetect($image)
    {
        $url = self::BASE_URL.'face_detectmultiface';

        return $this->image($url, $image);
    }

    // 人脸对比

    public function compare(array $images)
    {
        if (count($images) !== 2) {
            die('数组长度小于 2');
        }
        $data = [
            'image_a' => base64_encode(file_get_contents($images[0])),
            'image_b' => base64_encode(file_get_contents($images[1])),
        ];

        $url = self::BASE_URL.'face_facecompare';

        return TencentAI::exec($url, $data);
    }

    // 五官检测

    public function shape(string $image)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'mode' => 0,
        ];

        $url = self::BASE_URL.'face_detectface';

        return TencentAI::exec($url, $data);
    }

    // 人脸识别

    public function identify(string $group_id, string $image, int $topon = 9)
    {
        $data = [
            'image' => base64_encode(file_get_contents($image)),
            'group_id' => $group_id,
            'topn' => $topon,
        ];

        $url = self::BASE_URL.'face_faceidentify';

        return TencentAI::exec($url, $data);
    }

    // 人脸验证

    public function verify(string $person_id, string $image)
    {
        $data = [
            'person_id' => $person_id,
            'image' => base64_encode(file_get_contents($image)),
        ];

        $url = self::BASE_URL.'face_faceverify';

        return TencentAI::exec($url, $data);
    }

    // 个体管理 -》增加人脸

    public function add(string $person_id, string $image, string $tag)
    {
        $data = [
            'person_id' => $person_id,
            'images' => base64_encode(file_get_contents($image)),
            'tag' => $tag,
        ];

        $url = self::BASE_URL.'face_addface';

        return TencentAI::exec($url, $data);
    }

    // 个体管理 -》删除人脸

    public function delete(string $person_id, string $face_ids)
    {
        $data = [
            'person_id' => $person_id,
            'face_ids' => $face_ids,
        ];

        $url = self::BASE_URL.'face_delface';

        return TencentAI::exec($url, $data);
    }

    // 获取人脸列表

    public function getList(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];

        $url = self::BASE_URL.'face_getfaceids';

        return TencentAI::exec($url, $data);
    }

    // 获取人脸信息

    public function getInfo(string $face_id)
    {
        $data = [
            'face_id' => $face_id,
        ];

        $url = self::BASE_URL.'face_getfaceinfo';

        return TencentAI::exec($url, $data);
    }

    // 人体创建

    public function createPerson(string $group_ids, string $person_id, string $person_name, string $image, string $tag)
    {
        $data = [
            'group_ids' => $group_ids,
            'person_id' => $person_id,
            'image' => base64_encode(file_get_contents($image)),
            'person_name' => $person_name,
            'tag' => $tag,
        ];

        $url = self::BASE_URL.'face_newperson';

        return TencentAI::exec($url, $data);
    }

    // 删除个体

    public function deletePerson(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];

        $url = self::BASE_URL.'face_delperson';

        return TencentAI::exec($url, $data);
    }

    // 设置信息

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

    // 获取信息

    public function getPersonInfo(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];

        $url = self::BASE_URL.'face_getinfo';

        return TencentAI::exec($url, $data);
    }

    // 获取组列表

    public function getGroup()
    {
        $data = [];

        $url = self::BASE_URL.'face_getgroupids';

        return TencentAI::exec($url, $data);
    }

    // 获取人体列表

    public function getPersonList(string $group_id)
    {
        $data = [
            'group_id' => $group_id,
        ];

        $url = self::BASE_URL.'face_getpersonids';

        return TencentAI::exec($url, $data);
    }
}
