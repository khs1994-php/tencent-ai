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

    private function __construct(array $config)
    {
        self::$app_id = $config['app_id'];
        self::$app_key = $config['app_key'];

        // default format is array

        if (array_key_exists('format', $config)) {
            self::$format = $config['format'];
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

    public static function tencentAI(array $config)
    {
        if (!self::$tencentAI instanceof self) {
            self::$tencentAI = new self($config);
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
    public static function sign(string $request_body)
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
        $nonce_str = 'fa577ce340859f95b';
        $data = [
            'app_id' => $app_id,
            'time_stamp' => time(),
            'nonce_str' => $nonce_str,
        ];
        $array = array_merge($data, $arg);
        ksort($array);
        $request_body = http_build_query($array);
        $sign = self::sign($request_body);
        $data = $request_body."&sign=$sign";
        $json = self::$curl->post($url, $data);
        if ($charSetUTF8) {
            $array = json_decode($json, true);
        } else {
            $json = mb_convert_encoding($json, 'utf8', 'gbk');
            $array = json_decode($json, true);
        }
        $ret = $array['ret'];
        if ($ret !== 0) {
            throw new TencentAIError($ret);
        }
        if (strtolower(self::$format) === 'json') {
            return json_encode($array);
        } else {
            return $array;
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
