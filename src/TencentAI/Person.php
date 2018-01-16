<?php

namespace TencentAI;

class PersonController extends TencentAIController
{
    private $baseUrl='https://api.ai.qq.com/fcgi-bin/face';
    // 人体创建

    public function create(string $group_ids = 'idol', string $person_id = 'wangxiaochen', string $person_name = 'wangxiaochen', string $image = './image/ai/tencent/face/wxc.jpg', string $tag = 'wangxiaochen')
    {
        $data = [
          'group_ids' => $group_ids,
          'person_id' => $person_id,
          'image' => base64_encode(file_get_contents($image)),
          'person_name' => $person_name,
          'tag' => $tag,
        ];

        $url=$this->baseUrl . 'face_newperson';

        return $this->exec($url, $data);
    }

    // 删除个体

    public function delete(string $person_id = 'wangxiaochen')
    {
        // code...

        $data = [
          'person_id' => $person_id,
        ];

        $url=$this->baseUrl = 'face_delperson';

        return $this->exec($url, $data);
    }

    // 设置信息

    public function setInfo(string $person_id = 'wangxiaochen', string $person_name = 'wangxiaochen', string $tag = 'wangxiaochen')
    {
        // code...

        $data = [
          'person_id' => $person_id,
          'person_name' => $person_name,
          'tag' => $tag,
        ];

        $url=$this->baseUrl = 'face_setinfo';

        return $this->exec($url, $data);
    }

    // 获取信息

    public function getinfo(string $person_id = 'wangxiaochen')
    {
        // code...

        $data = [
          'person_id' => $person_id,
        ];

        $url=$this->baseUrl = 'face_getinfo';

        return $this->exec($url, $data);
    }

    // 获取组列表

    public function getGroup()
    {
        // code...
        $data = [];

        $url=$this->baseUrl = 'face_getgroupids';

        return $this->exec($data, $baseurl);
    }

    // 获取人体列表

    public function getList(string $group_id = 'idol')
    {
        // code...
        $data = [
          'group_id' => $group_id,
        ];

        $url=$this->baseUrl = 'face_getpersonids';

        return $this->exec($data, $baseurl);
    }
}
