<?php

declare(strict_types=1);

namespace TencentAI\Tests;

use PHPUnit\Framework\TestCase;
use TencentAI\TencentAI;

class TencentAITestCase extends TestCase
{
    /**
     * @var TencentAI
     */
    private static $ai;

    public static function ai()
    {
        if (!(self::$ai instanceof TencentAI)) {
            $app_id = getenv('TENCENT_AI_APP_ID');
            $app_key = getenv('TENCENT_AI_APP_KEY');
            self::$ai = TencentAI::getInstance($app_id,
                $app_key, false, 10, 3, true);
        }

        return self::$ai;
    }
}
