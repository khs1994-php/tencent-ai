<?php

namespace TencentAI;

use Curl\Curl;
use TencentAI\Error\TencentAIError;

class TencentAI
{
    private static $tencentAI;

    private static $app_id;

    private static $app_key;

    private static $format;

    private static $curl;

    public $audio;

    public $face;

    public $image;

    public $nlp;

    public $ocr;

    public $photo;

    public $translate;

    private function __construct(int $appId, string $appKey, bool $jsonFormat = false)
    {
        self::$app_id = $appId;
        self::$app_key = $appKey;

        // default format is array

        if ($jsonFormat) {
            self::$format = 'json';
        } else {
            self::$format = 'array';
        }

        self::$curl = new Curl();
        $this->audio = new Audio();
        $this->face = new Face();
        $this->image = new Image();
        $this->nlp = new NaturalLanguageProcessing();
        $this->ocr = new OCR();
        $this->photo = new Photo();
        $this->translate = new Translate();
    }

    public static function tencentAI(int $appId, string $appKey, bool $jsonFormat = false)
    {
        if (!self::$tencentAI instanceof self) {
            self::$tencentAI = new self($appId, $appKey, $jsonFormat);
        }

        return self::$tencentAI;
    }

    /**
     * 生成签名.
     *
     * @param  string $request_body
     *
     * @return string
     *
     * @link   https://ai.qq.com/doc/auth.shtml
     */
    private static function sign(string $request_body)
    {
        $app_key = self::$app_key;
        $sign = strtoupper(md5($request_body.'&app_key='.$app_key));

        return $sign;
    }

    /**
     * 逻辑处理.
     *
     * @param string $url
     * @param array  $arg
     * @param bool   $charSetUTF8
     *
     * @throws TencentAIError
     *
     * @return array
     */
    public static function exec(string $url, array $arg, bool $charSetUTF8 = true)
    {
        $app_id = self::$app_id;
        $format = strtolower(self::$format);
        $nonce_str = 'fa577ce340859f95b';
        $data = [
            'app_id' => $app_id,
            'time_stamp' => time(),
            'nonce_str' => $nonce_str,
        ];
        $array = array_merge($data, $arg);
        ksort($array);
        $request_body = http_build_query($array);

        // 签名

        $sign = self::sign($request_body);

        // 最终请求体

        $data = $request_body."&sign=$sign";

        // 发起请求

        $json = self::$curl->post($url, $data);
        if ($charSetUTF8) {
            $array = json_decode($json, true);
        } else {
            $json = mb_convert_encoding($json, 'utf8', 'gbk');
            $array = json_decode($json, true);
        }

        // 检查返回值

        self::checkReturn($array['ret']);

        if ($format === 'json') {
            return json_encode($array);
        } else {
            return $array;
        }
    }

    /**
     * 检查返回值，不为 0 抛出错误
     *
     * @param  int $ret
     * @throws TencentAIError
     */
    public static function checkReturn(int $ret)
    {
        if ($ret !== 0) {
            throw new TencentAIError($ret);
        }
    }

    public function nlp()
    {
        return new NaturalLanguageProcessing();
    }

    public function face()
    {
        return new Face();
    }

    public function image()
    {
        return new Image();
    }

    public function audio()
    {
        return new audio();
    }

    public function ocr()
    {
        return new OCR();
    }

    public function photo()
    {
        return new Photo();
    }

    public function translate()
    {
        return new translate();
    }
}
