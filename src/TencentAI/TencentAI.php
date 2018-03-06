<?php

namespace TencentAI;

use Curl\Curl;
use TencentAI\Error\TencentAIError;

/**
 * Class TencentAI.
 *
 * @method Audio                      audio();
 * @method Face                       face();
 * @method Image                      image();
 * @method NaturalLanguageProcessing  nlp();
 * @method OCR                        ocr();
 * @method Photo                      photo();
 * @method Translate                  translate();
 */
class TencentAI
{
    private static $tencentAI;

    private static $app_id;

    private static $app_key;

    private static $format;

    private static $curl;

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
        /**
         * @since 7.1
         */
        $nonce_str = session_create_id();
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

        // 检查是否返回数组

        if (!is_array($array)) {
            self::returnStr($json);
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
     * 结果返回字符串则抛出错误.
     *
     * @param $str
     *
     * @throws TencentAIError
     */
    public static function returnStr($str)
    {
        throw new TencentAIError(90000, $str);
    }

    /**
     * 检查返回值，不为 0 抛出错误.
     *
     * 返回值声明为 void 类型的方法要么干脆省去 return 语句，要么使用一个空的 return 语句
     * 注意 NULL 不是一个合法的返回值
     *
     * @since 7.1
     *
     * @param  int $ret
     *
     * @throws TencentAIError
     */
    private static function checkReturn(int $ret) : void
    {
        if ($ret !== 0) {
            throw new TencentAIError($ret);
        }
    }

    /**
     * 返回对象
     *
     * @param  string $name
     * @param  array  $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        switch ($name) {
            case 'nlp':
                $service = '\\TencentAI\\NaturalLanguageProcessing';
                break;
            case 'ocr':
                $service = '\\TencentAI\\OCR';
                break;
            default:
                $service = '\\TencentAI\\'.ucfirst($name);
        }

        return new $service;
    }
}
