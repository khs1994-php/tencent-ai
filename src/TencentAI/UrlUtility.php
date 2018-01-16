<?php

namespace TencentAI;

class UrlUtility
{
    public function curl(string $url, string $type = 'get', string $data = null)
    {
        // code...
        $header = ['content-type: application/x-www-form-urlencoded;charset=UTF-8'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        if ($type === 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}
