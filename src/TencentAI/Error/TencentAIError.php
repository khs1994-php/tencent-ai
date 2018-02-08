<?php
/**
 * Created by PhpStorm.
 * User: khs1994
 * Date: 04/02/2018
 * Time: 12:08 PM.
 */

namespace TencentAI\Error;

use Throwable;

class TencentAIError extends \Error
{
    public static $array = [
        4096 => '参数非法',
        12289 => '应用不存在，请检查app_id是否有效的应用标识',
        12801 => '素材不存在，请检查app_id对应的素材模版id',
        12802 => '素材ID与应用ID不匹配，请检查app_id对应的素材模版id',
        16385 => '缺少app_id参数',
        16386 => '缺少time_stamp参数',
        16387 => '缺少nonce_str参数',
        16388 => '请求签名无效',
        16389 => '缺失API权限',
        16390 => 'time_stamp参数无效，请检查time_stamp距离当前时间是否超过5分钟',
        16391 => '同义词识别结果为空',
        16392 => '专有名词识别结果为空',
        16393 => '意图识别结果为空',
        16394 => '闲聊返回结果为空',
        16396 => '图片格式非法',
        16397 => '图片体积过大',
        16402 => '图片没有人脸',
        16403 => '相似度错误',
        16404 => '人脸检测失败',
        16405 => '图片解码失败',
        16406 => '特征处理失败',
        16407 => '提取轮廓错误',
        16408 => '提取性别错误',
        16409 => '提取表情错误',
        16410 => '提取年龄错误',
        16411 => '提取姿态错误',
        16412 => '提取眼镜错误',
        16413 => '提取魅力值错误',
        16414 => '语音合成失败',
        16415 => '图片为空',
        16416 => '个体已存在',
        16417 => '个体不存在',
        16418 => '人脸不存在',
        16419 => '分组不存在',
        16420 => '分组列表不存在',
        16421 => '人脸个数超过限制',
        16422 => '个体个数超过限制',
        16423 => '组个数超过限制',
        16424 => '对个体添加了几乎相同的人脸',
        16425 => '无效的图片格式',
        16426 => '图片模糊度检测失败',
        16427 => '美食图片检测失败',
        16428 => '提取图像指纹失败',
        16429 => '图像特征比对失败',
        16430 => 'OCR照片为空',
        16431 => 'OCR识别失败',
        16432 => '输入图片不是身份证',
        16433 => '名片无足够文本',
        16434 => '名片文本行倾斜角度太大',
        16435 => '名片模糊',
        16436 => '名片姓名识别失败',
        16437 => '名片电话识别失败',
        16438 => '图像为非名片图像',
        16439 => '检测或者识别失败',
        16440 => '未检测到身份证，请对准边框(避免拍摄时倾角和旋转角过大、摄像头)',
        16441 => '请使用第二代身份证件进行扫描',
        16442 => '不是身份证正面照片',
        16443 => '不是身份证反面照片',
        16444 => '证件图片模糊',
        16445 => '请避开灯光直射在证件表面',
        16446 => '行驾驶证OCR识别失败',
        16447 => '通用OCR识别失败',
        16448 => '银行卡OCR预处理错误',
        16449 => '银行卡OCR识别失败',
        16450 => '营业执照OCR预处理失败',
        16451 => '营业执照OCR识别失败',
        16452 => '意图识别超时',
        16453 => '闲聊处理超时',
        16454 => '语音识别解码失败',
        16455 => '语音过长或空',
        16456 => '翻译引擎失败',
        16457 => '不支持的翻译类型',
        16460 => '输入图片与识别场景不匹配',
        16461 => '识别结果为空，当前图片无法匹配已收录的标签，请尝试更换图片',
        // 语音
        90100 => '语音文件格式错误',
        90101 => '语音速率错误',
        // 人脸
        90200 => '人脸对比必须为两张图片',
        // 图片
        90300 => '图片翻译类型必须为二者之一 word-单词识别，doc-文档识别',
        // 自然语言处理
        90400 => null,
        // OCR
        90500 => null,
        // 照片处理
        90600 => null,
        // 翻译
        90700 => '语音翻译文件格式错误',
    ];

    public $code;

    public $message;

    public function __construct(int $code = 0, string $message = null, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->code = $code;

        $array = self::$array;

        $this->message = $message;

        if (array_key_exists($code, $array)) {
            $this->message = $array[$code];
        }
    }

    public function __toString()
    {
        header('content-type', 'application/json;charset=utf-8');

        return json_encode(['ret' => $this->code, 'msg' => $this->message]);
    }

    public function getArray()
    {
        return ['ret' => $this->code, 'msg' => $this->message];
    }

    public function getJson()
    {
        return json_encode(['ret' => $this->code, 'msg' => $this->message]);
    }
}