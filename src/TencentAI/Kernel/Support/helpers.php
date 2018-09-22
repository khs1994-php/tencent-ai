<?php

declare(strict_types=1);

if (!class_exists(\Illuminate\Support\Facades\Facade::class)) {
    return;
}

if (!(function_exists('tencent_ai'))) {
    function tencent_ai()
    {
        return app('tencent-ai');
    }
}

/**
 * @method static TencentAI\Audio                     audio()
 * @method static TencentAI\Face                      face()
 * @method static TencentAI\Image                     image()
 * @method static TencentAI\NaturalLanguageProcessing nlp()
 * @method static TencentAI\OCR                       ocr()
 * @method static TencentAI\Photo                     photo()
 * @method static TencentAI\Translate                 translate()
 */
class TencentAI extends TencentAI\Kernel\Facade
{
}
