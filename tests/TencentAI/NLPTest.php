<?php

namespace TencentAI\Tests;

use TencentAI\Error\TencentAIError;

class NLPTest extends TencentAITests
{
    const OUTPUT = __DIR__.'/../output/nlp/';
    private $name;

    private $array;

    private function nlp()
    {
        return $this->ai()->nlp();
    }

    /**
     * 分词.
     *
     * @throws TencentAIError
     */
    public function testWordseg()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->wordseg('腾讯人工智能');
    }

    /**
     * 词性标注.
     *
     * @throws TencentAIError
     */
    public function testWordpos()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->wordpos('腾讯人工智能');
    }

    /**
     * 专有名词识别.
     *
     * @throws TencentAIError
     */
    public function testWordner()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->wordner('最近张学友在深圳开了一场演唱会');
    }

    /**
     * 同义词识别.
     *
     * @throws TencentAIError
     */
    public function testWordsyn()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->wordsyn('今天的天气怎么样');
    }

    /**
     * 语义解析 => 意图成分识别.
     *
     * @throws TencentAIError
     */
    public function testWordcom()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->wordcom('今天深圳的天气怎么样？明天呢');
    }

    /**
     * 情感分析.
     *
     * @throws TencentAIError
     */
    public function testTextPolar()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->textPolar('今天的天气不错呀');
    }

    /**
     * 智能闲聊.
     *
     * @throws TencentAIError
     */
    public function testChat()
    {
        $this->name = __FUNCTION__;

        $this->array = $this->nlp()->chat('中国女演员王晓晨', 1);
    }

    /**
     * @throws \Exception
     */
    public function tearDown()
    {
        $this->assertEquals(0, $this->array['ret']);

        file_put_contents(self::OUTPUT.$this->name.'.json', json_encode($this->array, JSON_UNESCAPED_UNICODE));
    }
}
