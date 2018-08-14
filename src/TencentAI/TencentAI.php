<?php

declare(strict_types=1);

namespace TencentAI;

use Curl\Curl;

/**
 * Class TencentAI.
 *
 * @version v18.06
 *
 * @method Audio                     audio()
 * @method Face                      face()
 * @method Image                     image()
 * @method NaturalLanguageProcessing nlp()
 * @method OCR                       ocr()
 * @method Photo                     photo()
 * @method Translate                 translate()
 */
class TencentAI
{
    private const VERSION = '18.06.0';

    private static $tencentAI;

    private function __construct($appId, string $appKey, bool $jsonFormat = false, $timeout = 100)
    {
        Request::setAppId($appId);
        Request::setAppKey($appKey);

        // default format is array

        if ($jsonFormat) {
            Request::setFormat('json');
        } else {
            Request::setFormat('array');
        }

        Request::setCurl(new Curl(), (int) $timeout);
    }

    private function __clone()
    {
        /*
         * Private clone
         */
    }

    /**
     * @param        $appId
     * @param string $appKey
     * @param bool   $jsonFormat
     * @param int    $timeout
     *
     * @return TencentAI
     */
    public static function getInstance($appId, string $appKey, bool $jsonFormat = false, $timeout = 100)
    {
        if (!(self::$tencentAI instanceof self)) {
            self::$tencentAI = new self($appId, $appKey, $jsonFormat, $timeout);
        }

        return self::$tencentAI;
    }

    /**
     * 返回对象
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        switch ($name) {
            case 'nlp':
                $service = '\\TencentAI\\NaturalLanguageProcessing';

                break;
            case 'ocr':
                $service = '\\TencentAI\\OCR';

                break;
            default:
                $service = '\\TencentAI\\'.ucfirst($name);
        }

        return new $service();
    }

    /**
     * 查看版本号.
     *
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    public static function close(): void
    {
        Request::close();
    }
}
