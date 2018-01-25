<?php

namespace TencentAI;

class TencentAI
{
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function __get(string $name)
    {
        $config = $this->config;
        switch ($name) {
        case 'audio':
          return new Audio($config);
          break;

        case 'face':
          return new Face($config);
          break;

        case 'image':
          return new Image($config);
          break;

        case 'nlp':
          return new NaturalLanguageProcessing($config);
          break;

        case 'ocr':
          return new OCR($config);
          break;

        case 'photo':
          return new Photo($config);
          break;

        case 'translate':
          return new Translate($config);
          break;

        default:
          // code...
          exit();
          break;
      }
    }
}
