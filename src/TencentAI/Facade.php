<?php

declare(strict_types=1);

namespace TencentAI;

/**
 * @method static Audio                     audio()
 * @method static Face                      face()
 * @method static Image                     image()
 * @method static NaturalLanguageProcessing nlp()
 * @method static OCR                       ocr()
 * @method static Photo                     photo()
 * @method static Translate                 translate()
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return TencentAI::class;
    }
}
