<?php

namespace TencentAI;

use TencentAI\Error\TencentAIError;

class Face
{
    use Module\Image;

    const BASE_URL = 'https://api.ai.qq.com/fcgi-bin/face/';

    const DETECT = self::BASE_URL.'face_detectface';

    const MULTI_DETECT = self::BASE_URL.'face_detectmultiface';

    const COMPARE = self::BASE_URL.'face_facecompare';

    const SHAPE = self::BASE_URL.'face_faceshape';

    const IDENTIFY = self::BASE_URL.'face_faceidentify';

    const VERIFY = self::BASE_URL.'face_faceverify';

    const ADD = self::BASE_URL.'face_addface';

    const DELETE = self::BASE_URL.'face_delface';

    const GET_LIST = self::BASE_URL.'face_getfaceids';

    const GET_INFO = self::BASE_URL.'face_getfaceinfo';

    const CREATE_PERSON = self::BASE_URL.'face_newperson';

    const DELETE_PERSON = self::BASE_URL.'face_delperson';

    const SET_PERSON_INFO = self::BASE_URL.'face_setinfo';

    const GET_PERSON_INFO = self::BASE_URL.'face_getinfo';

    const GET_GROUP_LIST = self::BASE_URL.'face_getgroupids';

    const GET_PERSON_LIST = self::BASE_URL.'face_getpersonids';

    /**
     * 接口名称：人脸分析
     * 接口描述：识别上传图像上面的人脸信息.
     * 详细描述：
     *
     * 检测给定图片（Image）中的所有人脸（Face）的位置和相应的面部属性.
     * 位置包括（x, y, w, h）.
     * 面部属性包括性别（gender）, 年龄（age）, 表情（expression）, 魅力（beauty）, 眼镜（glass）和姿态（pitch，roll，yaw）.
     *
     * @param  string $image
     * @param  int    $mode 检测模式，0-正常，1-大脸模式.
     * @return mixed
     * @link   https://ai.qq.com/doc/detectface.shtml
     *
     * @throws TencentAIError
     */
    public function detect(string $image, $mode = 1)
    {
        $data = [
            'image' => self::encode($image),
            'mode' => $mode,
        ];
        $url = self::DETECT;

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
        $url = self::MULTI_DETECT;
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
        $url = self::COMPARE;

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
        $url = self::SHAPE;

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
        $url = self::IDENTIFY;

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
        $url = self::VERIFY;

        return TencentAI::exec($url, $data);
    }

    /**
     * 个体管理 => 增加人脸(一个或一组人脸)
     *
     * @param string       $person_id
     * @param string|array $images
     * @param string       $tag
     * @return mixed
     * @throws TencentAIError
     */
    public function add(string $person_id, $images, string $tag)
    {
        $images_array = [];
        if (is_array($images)) {
            foreach ($images as $k) {
                $images_array[] = self::encode($k);
            }
            $images = implode('|', $images_array);
        } else {
            $images = self::encode($images);
        }
        $data = [
            'person_id' => $person_id,
            'images' => $images,
            'tag' => $tag,
        ];
        $url = self::ADD;

        return TencentAI::exec($url, $data);
    }

    /**
     * 个体管理 => 删除人脸(一个或一组人脸)
     *
     * @param string       $person_id
     * @param string|array $face_ids
     * @return mixed
     * @throws TencentAIError
     */
    public function delete(string $person_id, $face_ids)
    {
        $face_ids = is_array($face_ids) ? implode('|', $face_ids) : $face_ids;

        $data = [
            'person_id' => $person_id,
            'face_ids' => $face_ids,
        ];
        $url = self::DELETE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取人脸列表
     *
     * @param string $person_id
     * @return mixed
     * @throws TencentAIError
     */
    public function getList(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];
        $url = self::GET_LIST;

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取人脸信息
     *
     * @param string $face_id
     * @return mixed
     * @throws TencentAIError
     */
    public function getInfo(string $face_id)
    {
        $data = [
            'face_id' => $face_id,
        ];
        $url = self::GET_INFO;

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
        $group_ids = is_array($group_ids) ? implode('|', $group_ids) : $group_ids;
        $data = [
            'group_ids' => $group_ids,
            'person_id' => $person_id,
            'image' => self::encode($image),
            'person_name' => $person_name,
            'tag' => $tag,
        ];
        $url = self::CREATE_PERSON;

        return TencentAI::exec($url, $data);
    }

    /**
     * 删除个体
     *
     * @param string $person_id
     * @return mixed
     * @throws TencentAIError
     */
    public function deletePerson(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];
        $url = self::DELETE_PERSON;

        return TencentAI::exec($url, $data);
    }

    /**
     * 设置个体信息
     *
     * @param string $person_id
     * @param string $person_name
     * @param string $tag
     * @return mixed
     * @throws TencentAIError
     */
    public function setPersonInfo(string $person_id, string $person_name, string $tag)
    {
        $data = [
            'person_id' => $person_id,
            'person_name' => $person_name,
            'tag' => $tag,
        ];
        $url = self::SET_PERSON_INFO;

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取个体信息
     *
     * @param string $person_id
     * @return mixed
     * @throws TencentAIError
     */
    public function getPersonInfo(string $person_id)
    {
        $data = [
            'person_id' => $person_id,
        ];
        $url = self::GET_PERSON_INFO;

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取组列表
     *
     * @return mixed
     * @throws TencentAIError
     */
    public function getGroupList()
    {
        $url = self::GET_GROUP_LIST;
        return TencentAI::exec($url, []);
    }

    /**
     * 获取人体列表
     *
     * @param string $group_id
     * @return mixed
     * @throws TencentAIError
     */
    public function getPersonList(string $group_id)
    {
        $data = [
            'group_id' => $group_id,
        ];
        $url = self::GET_PERSON_LIST;

        return TencentAI::exec($url, $data);
    }
}
