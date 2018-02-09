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
     * 人脸分析：识别上传图像上面的人脸信息.
     *
     * 检测给定图片中的所有人脸的位置 (x, y, w, h) 和相应的面部属性
     * 包括性别 (gender),年龄, 表情 (expression), 魅力 (beauty), 眼镜 (glass) 和姿态 (pitch，roll，yaw).
     *
     * @param  string $image
     * @param  bool   $big 检测模式，false-正常，true-大脸模式(默认).
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/detectface.shtml
     */
    public function detect(string $image, bool $big = true)
    {
        $data = [
            'image' => self::encode($image),
            'mode' => (int) $big,
        ];
        $url = self::DETECT;

        return TencentAI::exec($url, $data);
    }

    /**
     * 多人脸检测：识别上传图像上面的人脸位置，支持多人脸识别.
     *
     * 检测图片中的人脸位置，可以识别出一张图片上的多个人脸.
     *
     * @param  string $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/detectmultiface.shtml
     */
    public function multiDetect(string $image)
    {
        $url = self::MULTI_DETECT;

        return $this->image($url, $image);
    }

    /**
     * 人脸对比：对请求图片进行人脸对比.
     *
     * 对请求图片的两个人脸进行对比，计算相似性以及五官相似度.
     *
     * @param  array $images
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/facecompare.shtml
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
     * 五官检测：对请求图片进行五官定位.
     *
     * 计算构成人脸轮廓的 88 个点，包括眉毛（左右各 8 点）、眼睛（左右各 8 点）、鼻子（13 点）、嘴巴（22 点）、脸型轮廓（21 点）.
     *
     * @param  string $image
     * @param  bool   $big 检测模式，false-正常，true-大脸模式(默认).
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/faceshape.shtml
     */
    public function shape(string $image, bool $big = true)
    {
        $data = [
            'image' => self::encode($image),
            'mode' => (int) $big,
        ];
        $url = self::SHAPE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 人脸识别.
     *
     * 对于一个待识别的人脸图片，在一个组中识别出最相似的 N 个个体作为候选人返回，返回的 N 个个体按照相似度从大到小排列，N 由参数 topn 指定.
     *
     * @param  string $group_id
     * @param  string $image
     * @param  int    $topon 返回的候选人个数 默认 9
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/faceidentify.shtml
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
     * 根据提供的图片和个体 ID，返回图片和个体是否是同一个人的判断以及置信度.
     *
     * @param  string $person_id
     * @param  string $image
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/faceverify.shtml
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
     * 个体管理 => 增加人脸：将一个或一组人脸加入到一个个体中.
     *
     * 一个人脸只能被加入到一个个体中.一个个体最多允许包含 20 个人脸；加入几乎相同的人脸会返回错误.
     *
     * @param  string $person_id
     * @param  array  $images
     * @param  string $tag 备注信息
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/addface.shtml
     *
     * @example
     *
     * <pre>
     * add('personID',[$image1],'example');         // 单个人脸
     * add('personID',[$image1,$image2],'example'); // 一组人脸
     * </pre>
     */
    public function add(string $person_id, array $images, string $tag)
    {
        $images_array = [];
        foreach ($images as $k) {
            $images_array[] = self::encode($k);
            $images = implode('|', $images_array);
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
     * 个体管理 => 删除人脸：从一个个体中删除一个或一组人脸.
     *
     * @param  string $person_id
     * @param  array  $face_ids
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/delface.shtml
     */
    public function delete(string $person_id, array $face_ids)
    {
        $face_ids = implode('|', $face_ids);
        $data = [
            'person_id' => $person_id,
            'face_ids' => $face_ids,
        ];
        $url = self::DELETE;

        return TencentAI::exec($url, $data);
    }

    /**
     * 获取人脸列表.
     *
     * 获取一个个体下所有人脸 ID.
     *
     * @param  string $person_id
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/getfaceids.shtml
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
     * 获取人脸信息.
     *
     * @param  string $face_id
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/getfaceinfo.shtml
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
     * 人体创建(属于一个组，或多个组).
     *
     * 创建一个个体，并将个体放置到指定的组当中。一个组里面的个体总数上限为 20000 个。如果 ID 指定的组不存在，则会新建组并创建个体。
     *
     * @param  array  $group_ids
     * @param  string $person_id
     * @param  string $person_name
     * @param  string $image
     * @param  string $tag
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/newperson.shtml
     */
    public function createPerson(array $group_ids,
                                 string $person_id,
                                 string $person_name,
                                 string $image,
                                 string $tag)
    {
        $group_ids = implode('|', $group_ids);
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
     * 删除个体.
     *
     * @param  string $person_id
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/delperson.shtml
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
     * 设置个体信息：设置个体的名字或备注.
     *
     * @param  string $person_id
     * @param  string $person_name
     * @param  string $tag
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/setinfo.shtml
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
     * 获取个体信息.
     *
     * 获取一个个体的信息，包括 ID，名字，备注，相关的人脸 ID 列表，以及所属组 ID 列表.
     *
     * @param  string $person_id
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/getinfo.shtml
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
     * 获取组列表.
     *
     * 获取一个 AppId 下所有组 ID.
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/getgroupids.shtml
     */
    public function getGroupList()
    {
        $url = self::GET_GROUP_LIST;

        return TencentAI::exec($url, []);
    }

    /**
     * 获取人体列表.
     *
     * 获取一个组中的所有个体 ID.
     *
     * @param  string $group_id
     *
     * @throws TencentAIError
     *
     * @return mixed
     *
     * @link   https://ai.qq.com/doc/getpersonids.shtml
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
