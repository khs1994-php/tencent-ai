<?php

declare(strict_types=1);

if (!(function_exists('tencent_ai'))) {
    function tencent_ai()
    {
        return app('tencent-ai');
    }
}

class TencentAI extends \TencentAI\Facade
{
}
