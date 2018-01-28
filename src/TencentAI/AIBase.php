<?php

namespace TencentAI;

use Curl\Curl;

class AIBase
{
    public function __construct(array $config)
    {
        // code...
        $config = (object) $config;
        $this->app_id = $config->app_id;
        $this->app_key = $config->app_key;
        $this->curl = new Curl();
    }

    // 生成签名

    public function sign($body)
    {
        // code...
        $app_key = $this->app_key;
        $sign = strtoupper(md5($body.'&app_key='.$app_key));

        return $sign;
    }

    // 逻辑处理

    public function exec(string $url, array $arg, string $type = 'utf8')
    {
        // code...
        $app_id = $this->app_id;
        $time_stamp = time();
        $nonce_str = 'fa577ce340859f95b';

        $data = [
        'app_id' => $app_id,
        'time_stamp' => $time_stamp,
        'nonce_str' => $nonce_str,
      ];

        $array = array_merge($data, $arg);
        ksort($array);
        $body = http_build_query($array);

        $sign = $this->sign($body);
        $data = $body."&sign=$sign";
        $json = $this->curl->post($url, $data);

        if ($type === 'gbk') {
            $json=mb_convert_encoding($json, 'utf8', 'gbk');

            return $array=json_decode($json, true);
        }

        return $array = json_decode($json, true);
    }
}
