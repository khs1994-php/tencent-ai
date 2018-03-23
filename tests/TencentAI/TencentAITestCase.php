<?php

namespace TencentAI\Tests;

use TencentAI\TencentAI;
use PHPUnit\Framework\TestCase;

class TencentAITestCase extends TestCase
{
    private static $ai;

    public static function ai()
    {
        if (!(self::$ai instanceof TencentAI)) {
            $app_id = 1106560031;
            $app_key = 'ZbRY9cf72TbDO0xb';
            self::$ai = TencentAI::tencentAI($app_id, $app_key);
        }

        return self::$ai;
    }
}
