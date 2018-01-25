<?php

namespace TencentAI;

class OCR extends AIBase
{
    use ImageCommon;

    private $baseUrl = 'https://api.ai.qq.com/fcgi-bin/ocr/';

    // 身份证识别

    public function idCard(string $file_path, int $card_type = 0)
    {
        // code...
        $data = [
          'image' => base64_encode(file_get_contents($file_path)),
          'card_type' => 0,
        ];

        $url = $this->baseUrl.'ocr_idcardocr';

        return $this->exec($url, $data);
    }

    // 名片识别

    public function bc(string $image)
    {
        // code...
        $url = $this->baseUrl.'ocr_bcocr';
        return $this->image($url, $image);
    }

    // 行驶证驾驶证识别

    public function driverLicense(string $image, int $type=0)
    {
        // code...
        $data=[
          'image'=>base64_encode(file_get_contents($image)),
          'type'=>$type
        ];
        $url=$this->baseUrl.'ocr_driverlicenseocr';

        return $this->exec($url, $data);
    }

    // 营业执照识别

    public function bizLicense(string $image)
    {
        // code...
        $url=$this->baseUrl.'ocr_bizlicenseocr';
        return $this->image($url, $image);
    }

    // 银行卡识别

    public function creditCard(string $image)
    {
        // code...
        $url=$this->baseUrl.'ocr_creditcardocr';
        return $this->image($url, $image);
    }

    // 通用识别

    public function general(string $image)
    {
        // code...
        $url=$this->baseUrl.'ocr_generalocr';
        return $this->image($url, $image);
    }
}
