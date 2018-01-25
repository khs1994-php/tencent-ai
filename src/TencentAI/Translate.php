<?php

namespace TencentAI;

class Translate extends TencentAI
{
    private $baseUrl='https://api.ai.qq.com/fcgi-bin/nlp/';

    public function AILabText(string $text, int $type=0)
    {
        # code...
        $data=[
          'text'=>$text,
          'type'=>$type
        ];
        $url=$this->baseUrl.'nlp_texttrans';
        return $this->exec($url, $data);
    }

    public function text(string $text, string $source='en', string $target='zh')
    {
        # code...
        $data=[
          'text'=>$text,
          'source'=>$source,
          'target'=>$target
        ];

        $url=$this->baseUrl.'nlp_texttranslate';
        return $this->exec($url, $data);
    }

    public function image(string $image, string $session_id, string $scene='word', string $source='zh', string $target='en')
    {
        # code...
        $data=[
          'image'=>base64_encode(file_get_contents($image)),
          'session_id'=>$session_id,
          'scene'=>$scene,
          'source'=>$source,
          'target'=>$target
        ];
        $url=$this->baseUrl.'nlp_imagetranslate';
        return $this->exec($url, $data);
    }

    public function audio(int $format, int $seq, int $end, string $session_id, string $speech_chunk, string $source, string $target)
    {
        # code...
        $data=[

        ];
        $url=$this->baseUrl.'nlp_speechtranslate';
        return $this->exec($url, $data);
    }

    public function detect(string $text, string $candidate_langs='zh', int $force=0)
    {
        # code...

        $data=[

        ];
        $url=$this->baseUrl.'nlp_textdetect';
        return $this->exec($url, $data);
    }
}
