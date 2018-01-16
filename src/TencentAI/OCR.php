<?php
namespace TencentAI;

class OCRController extends TencentAIController
{
    private $baseUrl='https://api.ai.qq.com/fcgi-bin/ocr/';

    // 身份证识别

    public function idCard(string $file_path='./image/ai/tencent/ocr/idcard/f.png', int $card_type=0)
    {
        # code...
        $data=[
          'image'=>base64_encode(file_get_contents($file_path)),
          'card_type'=>0
        ];

        $url=$this->baseUrl.'ocr_idcardocr';

        return $this->exec($url, $data);
    }

    public function bc($value='')
    {
      # code...
    }

    public function driverLicense($value='')
    {
      # code...
    }

    public function bizLicense($value='')
    {
      # code...
    }

    public function creditCard($value='')
    {
      # code...
    }

    public function general($value='')
    {
      # code...
    }
}
