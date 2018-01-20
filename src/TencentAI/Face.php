<?php

namespace TencentAI;

class Face extends TencentAI
{
    // 人脸分析

    private $baseUrl = 'https://api.ai.qq.com/fcgi-bin/face/';

    public function detect(string $image)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'mode' => 0,
        ];

        $url = $this->baseUrl.'face_detectface';

        return $this->exec($url, $data);
    }

    // 人脸对比

    public function compare(array $images)
    {
        // code...
        if (count($images) !== 2) {
            die('数组长度小于 2');
        }
        $data = [
          'image_a' => base64_encode(file_get_contents($images[0])),
          'image_b' => base64_encode(file_get_contents($images[1])),
        ];

        $url = $this->baseUrl.'face_facecompare';

        return $this->exec($url, $data);
    }

    // 五官检测

    public function shape(string $image)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'mode' => 0,
        ];

        $url = $this->baseUrl.'face_detectface';

        return $this->exec($url, $data);
    }

    // 人脸识别

    public function identify(string $group_id = 'idol', string $image, int $topon = 9)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($image)),
          'group_id' => $group_id,
          'topn' => $topon,
        ];

        $url = $this->baseUrl.'face_faceidentify';

        return $this->exec($url, $data);
    }

    // 人脸验证

    public function verify(string $person_id, string $image)
    {
        // code...

        $data = [
              'person_id' => $person_id,
              'image' => base64_encode(file_get_contents($image)),
        ];

        $url = $this->baseUrl.'face_faceverify';

        return $this->exec($url, $data);
    }

    // 个体管理 -》增加人脸

    public function add(string $person_id, string $image, string $tag)
    {
        // code...
        $data = [
          'person_id' => $person_id,
          'images' => base64_encode(file_get_contents($image)),
          'tag' => $tag,
        ];

        $url = $this->baseUrl.'face_addface';

        return $this->exec($url, $data);
    }

    // 个体管理 -》删除人脸

    public function delete(string $person_id, string $face_ids)
    {
        // code...
        $data = [
          'person_id' => $person_id,
          'face_ids' => $face_ids,
        ];

        $url = $this->baseUrl.'face_delface';

        return $this->exec($url, $data);
    }

    // 获取人脸列表

    public function getList(string $person_id)
    {
        // code...
        $data = [
          'person_id' => $person_id,
        ];

        $url = $this->baseUrl.'face_getfaceids';

        return $this->exec($url, $data);
    }

    // 获取人脸信息

    public function getInfo(string $face_id)
    {
        // code...
        $data = [
          'face_id' => $face_id,
        ];

        $url = $this->baseUrl.'face_getfaceinfo';

        return $this->exec($url, $data);
    }
}
