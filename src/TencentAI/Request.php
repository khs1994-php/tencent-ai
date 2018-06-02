<?php

namespace TencentAI;

use Curl\Curl;
use TencentAI\Error\TencentAIError;

class Request
{
    private static $app_key;

    private static $app_id;

    private static $format;

    /**
     * @var Curl
     */
    private static $curl;

    /**
     * @param mixed $app_key
     */
    public static function setAppKey($app_key): void
    {
        self::$app_key = $app_key;
    }

    /**
     * @param mixed $app_id
     */
    public static function setAppId($app_id): void
    {
        self::$app_id = $app_id;
    }

    /**
     * @param mixed $format
     */
    public static function setFormat($format): void
    {
        self::$format = $format;
    }

    public static function setCurl(Curl $curl, int $timeout)
    {
        self::$curl = $curl;

        self::$curl->setTimeout($timeout);
    }

    public static function close()
    {
        self::$curl = null;
        self::$app_id = null;
        self::$app_key = null;
        self::$format = null;
    }

    /**
     * 生成签名.
     *
     * @param string $request_body
     *
     * @return string
     *
     * @see   https://ai.qq.com/doc/auth.shtml
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
        if (PHP_OS === 'WINNT') {
            self::$curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        }
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
        try {
            $json = self::$curl->post($url, $data);
        } catch (\Throwable $e) {
            throw new TencentAIError(20000 + $e->getCode(), $e->getMessage());
        }

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

        if ('json' === $format) {
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
    public static function returnStr($str): void
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
     * @param int $ret
     *
     * @throws TencentAIError
     */
    private static function checkReturn(int $ret): void
    {
        if (0 !== $ret) {
            throw new TencentAIError($ret);
        }
    }
}
