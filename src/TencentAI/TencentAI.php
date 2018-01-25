<?php

namespace TencentAI;

class TencentAI
{
    public function __construct(array $config)
    {
        $this->config=$config;
    }

    public function __get(string $name)
    {
        switch ($name) {
        case 'image':
          return $image=new Image($this->config);
          break;

        case 'face':
          return $face=new Face($this->config);
          break;

        default:
          # code...
          break;
      }
    }
}
