<?php

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class NLPTest extends TestCase
{
    public $aiNLP;

    public function setUp()
    {
        $config = [
            'app_id' => 1106560031,
            'app_key' => 'ZbRY9cf72TbDO0xb',
        ];
        $this->aiNLP = TencentAI::tencentAI($config)->nlp;
    }

    // 分词

    public function testWordseg()
    {
        $array = $this->aiNLP->wordseg('腾讯人工智能');
        $this->assertEquals(0, $array['ret']);
    }

    // 词性标注

    public function testWordpos()
    {
        $array = $this->aiNLP->wordpos('腾讯人工智能');
        $this->assertEquals(0, $array['ret']);
    }

    // 专有名词识别

    public function testWordner()
    {
        $array = $this->aiNLP->wordner('最近张学友在深圳开了一场演唱会');
        $this->assertEquals(0, $array['ret']);
    }

    // 同义词识别

    public function testWordsyn()
    {
        $array = $this->aiNLP->wordsyn('今天的天气怎么样');
        $this->assertEquals(0, $array['ret']);
    }

    // 语义解析 => 意图成分识别

    public function testWordcom()
    {
        $array = $this->aiNLP->wordcom('今天深圳的天气怎么样？明天呢');
        $this->assertEquals(0, $array['ret']);
    }

    // 情感分析

    public function testTextPolar()
    {
        $array = $this->aiNLP->textPolar('今天的天气不错呀');
        $this->assertEquals(0, $array['ret']);
    }

    // 智能闲聊

    public function testChat()
    {
        $array = $this->aiNLP->chat('中国女演员王晓晨');
        $this->assertEquals(0, $array['ret']);
    }
}