<?php

namespace TencentAI;

class Face extends TencentAIController
{
    // 人脸检测

    private $baseUrl = 'https://api.ai.qq.com/fcgi-bin/face/';

    public function detect(string $image = './image/ai/tencent/face/wxc.jpg')
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

    public function compare(array $images = ['./image/ai/tencent/face/wxc.jpg', './image/ai/tencent/face/verify.jpg'])
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

    public function shape(string $image = './image/ai/tencent/face/wxc.jpg')
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

    public function identify(string $group_id = 'idol', string $image = './image/ai/tencent/face/wxc.jpg', int $topon = 9)
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

    public function verify(string $person_id = 'wangxiaochen', string $image = './image/ai/tencent/face/verify.jpg')
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

    public function add(string $person_id = 'wangxiaochen', string $image = './image/ai/tencent/face/wxc.jpg', string $tag = 'wangxiaochen')
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

    public function delete(string $person_id = 'wangxiaochen', string $face_ids = 'wangxiaochen')
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

    public function getList(string $person_id = 'wangxiaochen')
    {
        // code...
        $data = [
          'person_id' => $person_id,
        ];

        $url = $this->baseUrl.'face_getfaceids';

        return $this->exec($url, $data);
    }

    // 获取人脸信息

    public function getInfo(string $face_id = '2376480510367017825')
    {
        // code...
        $data = [
          'face_id' => $face_id,
        ];

        $url = $this->baseUrl.'face_getfaceinfo';

        return $this->exec($url, $data);
    }
}
