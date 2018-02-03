<?php

namespace TencentAI;

use Curl\Curl;

class TencentAI
{
    private static $tencentAI;

    private static $app_id;

    private static $app_key;

    private static $curl;

    private function __construct(array $config)
    {
        self::$app_id = $config['app_id'];
        self::$app_key = $config['app_key'];
        self::$curl = new Curl();
    }

    public static function tencentAI(array $config)
    {
        if (!self::$tencentAI instanceof TencentAI) {
            self::$tencentAI = new self($config);
        }
        return self::$tencentAI;
    }

    // 生成签名

    public static function sign($request_body)
    {
        $app_key = self::$app_key;
        $sign = strtoupper(md5($request_body.'&app_key='.$app_key));

        return $sign;
    }

    // 逻辑处理

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

        if (!$charSetUTF8) {
            $json = mb_convert_encoding($json, 'utf8', 'gbk');

            return $array = json_decode($json, true);
        }

        return $array = json_decode($json, true);
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
}
