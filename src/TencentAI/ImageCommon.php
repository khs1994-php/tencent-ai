<?php

namespace TencentAI;

trait ImageCommon
{
    public function image($url,$image)
    {
      $data = [
      'image' => base64_encode(file_get_contents($image)),
      ];

      return $this->exec($url, $data);
    }
}
