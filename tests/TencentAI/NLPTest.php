<?php

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class NLPTest extends TestCase
{
    private $aiNLP;

    private $name;

    private $array;

    public function setUp()
    {
        $app_id = 1106560031;
        $app_key = 'ZbRY9cf72TbDO0xb';

        $this->aiNLP = TencentAI::tencentAI($app_id, $app_key)->nlp;
    }

    // 分词

    public function testWordseg()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->wordseg('腾讯人工智能');

    }

    // 词性标注

    public function testWordpos()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->wordpos('腾讯人工智能');
    }

    // 专有名词识别

    public function testWordner()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->wordner('最近张学友在深圳开了一场演唱会');
    }

    // 同义词识别

    public function testWordsyn()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->wordsyn('今天的天气怎么样');
    }

    // 语义解析 => 意图成分识别

    public function testWordcom()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->wordcom('今天深圳的天气怎么样？明天呢');
    }

    // 情感分析

    public function testTextPolar()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->textPolar('今天的天气不错呀');
    }

    // 智能闲聊

    public function testChat()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->aiNLP->chat('中国女演员王晓晨', 1);
    }

    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(__DIR__.'/../output/nlp/'.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
